<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     style="display: flex; justify-items: center; align-content: space-evenly">
                    <div class="display-flex max-w-xl justify-items-center flex-row">
                        <div class="mx-auto box-border w-[365px] border bg-white p-4">
                            <h1>Sell {{ $cryptoAsset->name }}</h1>
                            <form method="POST" action="/transactions/{{ $cryptoAsset->id }}/sell">
                                @csrf
                                <input type="hidden" name="transactionType" value="sell">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" type="text" name="quantity"/>
                                <span>{{  number_format($cryptoAsset->price_usd_pennies / 1000, 3, '.', '') }}</span>
                                <button type="submit">Sell</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>