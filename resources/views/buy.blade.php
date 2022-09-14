<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <h1>Buy {{ $cryptoAsset->name }}</h1>
    <form method="POST" action="/transactions/{{ $cryptoAsset->id }}/buy">
        @csrf
        <input type="hidden" name="transactionType" value="buy">
        <label for="quantity">Quantity</label>
        <input id="quantity" type="text" name="quantity"/>
        <span>{{  number_format($cryptoAsset->price_usd_pennies / 1000, 3, '.', '') }}</span>
        <button type="submit">Submit</button>
    </form>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     style="display: flex; justify-items: center">
                    <div class="max-w-2xl mx-auto bg-white p-16">
                        <div class="mt-4 p-4">
                            <h2 class="text-xl font-semibold text-gray-700 text-center">Card information</h2>
                            <form method="POST" action="/transactions/{{ $cryptoAsset->id }}/buy">
                                @csrf
                                <input type="hidden" name="transactionType" value="buy">
                                <div class="my-3">
                                    <input type="text" id="card_holder_name"
                                           class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                           placeholder="Card holder" >
                                </div>
                                <div class="my-3">
                                    <input type="text" id="card_number"
                                           class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                           placeholder="xxxx-xxxx-xxxx-xxxx-xxxx" >
                                </div>
                                <div class="my-3 flex flex-col">
                                    <div class="mb-2">
                                        <label for="" class="text-gray-700">Expired</label>
                                    </div>
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                        <select
                                            name=""
                                            id=""
                                            class="form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"

                                        >
                                            <option value="" selected disabled>MM</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>

                                        <select
                                            name=""
                                            id=""
                                            class="form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                        >
                                            <option value="" selected disabled>YY</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>

                                        <input
                                            type="text"
                                            class="block w-full col-span-2 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Security code"
                                            maxlength="3"/>
                                    </div>
                                </div>


                                <div class="my-3">
                                    <input type="email" id="email"
                                           class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                           placeholder="example@ecample.com" >
                                </div>


                                <div class="my-3">
                                    <h1 class="text-xl font-semibold text-gray-700 text-center">Crypto value information</h1>
                                </div>

                                <div class="my-3">
                                    <span class="text-gray-700">{{ $cryptoAsset->name }} price: ${{ number_format($cryptoAsset->price_usd_pennies / 1000, 3, '.', '') }}</span>
                                </div>

                                <div class="my-3">
                                    <input type="text" id="quantity"
                                           name="quantity"
                                           class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                           placeholder="100" >
                                </div>

                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value=""
                                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                               >
                                    </div>
                                    <label for="remember"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I
                                        agree with the <a href="#"
                                                          class="text-blue-600 hover:underline dark:text-blue-500">terms
                                            and conditions</a>.</label>
                                </div>
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Buy {{ $cryptoAsset->name }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
