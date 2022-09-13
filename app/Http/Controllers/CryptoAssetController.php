<?php

namespace App\Http\Controllers;

use App\Jobs\GetCryptoAssetsJob;
use App\Jobs\UpdateCryptoAssetsTableJob;
use App\Models\CryptoAsset;
use App\Services\GetCryptoAssetsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CryptoAssetController extends Controller
{
    private GetCryptoAssetsService $getCryptoAssetsService;

    public function __construct(GetCryptoAssetsService $getCryptoAssetsService)
    {
        $this->getCryptoAssetsService = $getCryptoAssetsService;
    }

    //Parāda visas kriptovalūtas
    public function index(): Factory|View|Application
    {
        return view('home', [
            'cryptoAssets' => $this->getCryptoAssetsService->execute()
        ]);
    }

    //Atjaunina datubāzē esošos datus
    public function update(): void
    {
        dispatch(new UpdateCryptoAssetsTableJob());
        redirect('/');
    }

    //Saglabā datubāzē visus datus
    public function store(): void
    {
        dispatch(new GetCryptoAssetsJob);
        redirect('/');
    }

    //Parāda individuālu kripto valūtu
    public function show(CryptoAsset $cryptoAsset): Factory|View|Application
    {
        return view('show', ['cryptoAsset' => $cryptoAsset]);
    }
}
