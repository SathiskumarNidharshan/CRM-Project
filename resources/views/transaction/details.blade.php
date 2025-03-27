<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold text-center mb-6">Transaction Details</h3>
                    <form action="{{ url('transaction/' . $transaction->id) }}" method="post" class="space-y-6">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <!-- Invoice Number -->
                        <div>
                            <label for="invoice_number" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Invoice Number</label>
                            <input type="text" name="invoice_number" id="invoice_number" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ $transaction->invoice->invoice_number }}" readonly>
                        </div>

                        <!-- Customer Name -->
                        <div>
                            <label for="customer_name" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Customer</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ $transaction->customer->name }}" readonly>
                        </div>

                        <!-- Amount -->
                        <div>
                            <label for="amount" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="${{ $transaction->amount }}" readonly>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <input type="text" name="status" id="status" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ ucfirst($transaction->status) }}" readonly>
                        </div>

                        <!-- Transaction ID -->
                        <div>
                            <label for="transaction_id" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Transaction ID</label>
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ $transaction->transaction_id }}" readonly>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-4">
                            <a href="{{ route('transaction.index') }}" class="w-full py-3 px-4 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Back to Transactions</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>