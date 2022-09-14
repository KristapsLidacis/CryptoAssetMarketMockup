<x-app-layout xmlns="http://www.w3.org/1999/html">
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg<null>-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     style="display: flex; justify-items: center; align-content: space-evenly">
                    <div>
                        <h1 class="text-2xl text-gray-800 font-bold align-middle">{{ Auth::user()->name }} wallet</h1>

                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" >#</th>
                                <th class="py-3 px-6 text-center" >Name</th>
                                <th class="py-3 px-6 text-center">Price</th>
                                <th class="py-3 px-6 text-center">Owned</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach($cryptoAssetUser as $key=>$cryptoAsset)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <span class="font-medium">{{ $key + 1 }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <form method="POST">
                                                    @csrf
                                                @if(is_null($cryptoAsset->pivot->favorited_at))
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <input type="hidden" value="{{ $cryptoAsset->symbol }}" name="symbol">
                                                        <button type="submit" formaction="/wallet/favorite/{{ $cryptoAsset->pivot->id }}"><i class="fa-regular fa-star"></i></button>
                                                    </div>
                                                @else
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <button type="submit" formaction="/wallet/favorite/{{ $cryptoAsset->pivot->id }}"><i class="fa-solid fa-star"></i></button>
                                                    </div>
                                                @endif
                                                </form>
                                            </div>
                                            <div class="mr-2">
                                                <img src="{{ $cryptoAsset->icon_path }}" y="0px"
                                                     width="24" height="24"
                                                     style=" fill:#000000;">
                                                <path fill="#80deea" d="M24,34C11.1,34,1,29.6,1,24c0-5.6,10.1-10,23-10c12.9,0,23,4.4,23,10C47,29.6,36.9,34,24,34z M24,16	c-12.6,0-21,4.1-21,8c0,3.9,8.4,8,21,8s21-4.1,21-8C45,20.1,36.6,16,24,16z"></path><path fill="#80deea" d="M15.1,44.6c-1,0-1.8-0.2-2.6-0.7C7.6,41.1,8.9,30.2,15.3,19l0,0c3-5.2,6.7-9.6,10.3-12.4c3.9-3,7.4-3.9,9.8-2.5	c2.5,1.4,3.4,4.9,2.8,9.8c-0.6,4.6-2.6,10-5.6,15.2c-3,5.2-6.7,9.6-10.3,12.4C19.7,43.5,17.2,44.6,15.1,44.6z M32.9,5.4	c-1.6,0-3.7,0.9-6,2.7c-3.4,2.7-6.9,6.9-9.8,11.9l0,0c-6.3,10.9-6.9,20.3-3.6,22.2c1.7,1,4.5,0.1,7.6-2.3c3.4-2.7,6.9-6.9,9.8-11.9	c2.9-5,4.8-10.1,5.4-14.4c0.5-4-0.1-6.8-1.8-7.8C34,5.6,33.5,5.4,32.9,5.4z"></path><path fill="#80deea" d="M33,44.6c-5,0-12.2-6.1-17.6-15.6C8.9,17.8,7.6,6.9,12.5,4.1l0,0C17.4,1.3,26.2,7.8,32.7,19	c3,5.2,5,10.6,5.6,15.2c0.7,4.9-0.3,8.3-2.8,9.8C34.7,44.4,33.9,44.6,33,44.6z M13.5,5.8c-3.3,1.9-2.7,11.3,3.6,22.2	c6.3,10.9,14.1,16.1,17.4,14.2c1.7-1,2.3-3.8,1.8-7.8c-0.6-4.3-2.5-9.4-5.4-14.4C24.6,9.1,16.8,3.9,13.5,5.8L13.5,5.8z"></path><circle cx="24" cy="24" r="4" fill="#80deea"></circle>
                                                </img>
                                            </div>
                                            <div class="mr-2">
                                                <a href="/assets/{{ $cryptoAsset->id }}"><span class="font-medium">{{ $cryptoAsset->name }}</span></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>${{ number_format($cryptoAsset->price_usd_pennies / 1000, 3, '.', '') }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            @if(!is_null($cryptoAsset->pivot->owned))
                                                <span>{{ number_format($cryptoAsset->pivot->owned, 3, '.', '') }}</span>
                                            @else
                                                <span>0</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <form method="POST">
                                            @csrf
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <button type="submit" formaction="/wallet/buy/{{ $cryptoAsset->id }}"><i class="fa-solid fa-money-bill-wave" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy"></i></button>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <button type="submit" formaction="/wallet/sell/{{ $cryptoAsset->id }}"><i class="fa-solid fa-money-bill-trend-up" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell"></i></button>
                                            </div>
                                        </div>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class='flex items-center flex-col '>
                            <h1 class="text-4xl font-medium pt-1">News</h1>
                            @for($i = 0; $i < 3; $i++)
                                <div class=" mx-auto lg:max-w-full mt-3 ">
                                    <div class="max-w-full mx-auto px-5 mb-3">
                                        <div
                                            class="max-w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                            <a href="{{ $news->articles[$i]->url }}">
                                                <img class="rounded-t-lg px-5 py-2"
                                                     src="{{ $news->articles[$i]->urlToImage }}" alt="step3">
                                            </a>
                                            <div class="p-5">
                                                <a href="{{ $news->articles[$i]->url }}">
                                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                                        {{ $news->articles[$i]->title }}</h5>
                                                </a>
                                                <div
                                                    class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{ $news->articles[$i]->source->name }}</div>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $news->articles[$i]->description}}</p>
                                                <a href="#"
                                                   class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Read more
                                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
