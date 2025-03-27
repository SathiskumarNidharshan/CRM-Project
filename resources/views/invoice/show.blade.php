<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center items-center">
        <div class="max-w-3xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <div class="p-10 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">Invoice Details</h2>

                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md inline-block text-left">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Invoice Number: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $invoices->invoice_number }}</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Customer Name: <span class="font-medium">{{ $invoices->customer->name }}</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Amount: <span class="font-medium">Rs.{{ $invoices->amount }}</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Due Date: <span class="font-medium">{{ $invoices->due_date }}</span>
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ url('invoice') }}" class="text-blue-500 hover:text-blue-700 underline">Back to Invoice List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>