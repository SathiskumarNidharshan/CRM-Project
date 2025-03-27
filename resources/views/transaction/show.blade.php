<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center items-center">
        <div class="max-w-3xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <div class="p-10 text-center">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Transaction Details</h3>

                    <!-- Customer Info -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Customer Name:</span> {{ $customer->name }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Customer Email:</span> {{ $customer->email }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Invoice Number:</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Amount:</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Status:</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Transaction ID:</span>
                        </p>
                    </div>

                    <!-- Transactions Section -->
                    @foreach($transactions as $transaction)
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Transaction ID:</span> {{ $transaction->id }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Amount:</span> ${{ $transaction->amount }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Status:</span> {{ ucfirst($transaction->status) }}
                        </p>

                        <!-- Additional transaction details, if needed -->
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Date:</span> {{ $transaction->created_at->format('M d, Y') }}
                        </p>
                    </div>
                    @endforeach

                    <!-- Button to return to the customer list -->
                    <div class="mt-6">
                        <a href="{{ url('transaction') }}" class="text-blue-500 hover:text-blue-700 underline">Back to Transactions List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>