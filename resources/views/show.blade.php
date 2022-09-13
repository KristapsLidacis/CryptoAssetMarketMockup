<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     style="display: flex; justify-items: center; align-content: space-evenly">
                    <div class="display-flex max-w-xl justify-items-center flex-row">
                        <div>
                            <h1 class="font-bold">Name</h1>
                            <span>{{ $cryptoAsset->name }}</span>
                        </div>
                        <div>
                            <h1>Price</h1>
                            <span>${{ number_format($cryptoAsset->price_usd_pennies / 1000, 3, '.', '') }}</span>
                        </div>
                        <div>
                            <button type="submit" formaction="/favorite/{{ $cryptoAsset->id }}" formmethod="GET" >Favorite</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
