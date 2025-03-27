<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold py-4">Transactions</h3>
                    <!-- Table to display all transactions -->
                    <table class="table w-full bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 uppercase text-sm font-semibold">
                                <th class="px-6 py-3  text-center">Transaction ID</th>
                                <th class="px-6 py-3  text-center">Invoice Number</th>
                                <th class="px-6 py-3  text-center">Customer Name</th>
                                <th class="px-6 py-3  text-center">Amount</th>
                                <th class="px-6 py-3  text-center">Status</th>

                                <!-- <th class="px-6 py-3">Actions</th> -->


                                <!-- <th class="px-6 py-3">Date</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($transactions as $transaction)
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-6 py-4 text-center">{{ $transaction->transaction_id }}</td>
                                <td class="px-6 py-4 text-center">{{ $transaction->invoice->invoice_number }}</td>
                                <td class="px-6 py-4 text-center">{{ $transaction->customer->name }}</td>
                                <td class="px-6 py-4 text-center">Rs. {{ number_format($transaction->amount, 2) }}</td>
                                <td class="px-6 py-4 flex items-center justify-center ">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($transaction->status == 'success') bg-green-500 text-white @elseif($transaction->status == 'pending') bg-yellow-500 text-white @else bg-red-500 text-white @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>

                                <!-- <td class="py-4 px-4 flex items-center justify-center space-x-8">
                                    <a href="{{ url('/transaction/' . $transaction->id) }}" title="View Invoice">
                                        <button class="px-3 py-1 text-sm font-medium bg-blue-500 hover:bg-blue-600 text-black rounded-lg shadow-md transition duration-200 flex items-center">
                                            <i class="fa fa-eye mr-1"></i> View Transaction
                                        </button>
                                    </a>
                                </td> -->

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>