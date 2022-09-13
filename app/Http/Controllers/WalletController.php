<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateCryptoAssetUserTableJob;
use App\Models\CryptoAsset;
use App\Models\CryptoAssetUser;
use App\Services\GetCryptoAssetsUserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class WalletController extends Controller
{
    private GetCryptoAssetsUserService $userService;

    public function __construct(GetCryptoAssetsUserService $userService)
    {
        $this->userService = $userService;
    }

    //Parāda visus lietotāja wallet datus
    public function index(): Factory|View|Application
    {
        if (!auth()->id()) {
            abort(403, 'Unauthorized access');
        }
        $cryptoAssetUserResponse = $this->userService->execute();
        return view('wallet', ['cryptoAssetUser' => $cryptoAssetUserResponse[0]]);
    }

    //Parāda buy logu
    public function buy(CryptoAsset $cryptoAsset)
    {
        return view('buy', ['cryptoAsset' => $cryptoAsset]);
    }

    //Parāda sell logu
    public function sell(CryptoAsset $cryptoAsset)
    {

        return view('sell', ['cryptoAsset' => $cryptoAsset]);
    }

    public function favorite(CryptoAssetUser $cryptoAssetUser)
    {
        dispatch(new UpdateCryptoAssetUserTableJob($cryptoAssetUser));
        return back();
    }
}
