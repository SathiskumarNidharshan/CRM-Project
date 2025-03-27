<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold text-center mb-6">Edit Invoice</h3>

                    <!-- Update Invoice Form -->
                    <form action="{{ url('invoice/' . $invoice->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method("PATCH")

                        <!-- Invoice Number (Read-Only) -->
                        <div>
                            <label for="invoice_number" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Invoice Number</label>
                            <input type="text" name="invoice_number" id="invoice_number" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600" value="{{ $invoice->invoice_number }}" readonly>
                        </div>

                        <!-- Customer Name (Read-Only) -->
                        <div>
                            <label for="customer_name" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600" value="{{ $invoice->customer->name }}" readonly>
                        </div>

                        <!-- Amount Field -->
                        <div>
                            <label for="amount" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Amount</label>
                            <input type="number" step="0.01" name="amount" id="amount" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ old('amount', $invoice->amount) }}">
                            @error('amount')
                            <div class="text-danger mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Due Date Field -->
                        <div>
                            <label for="due_date" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ old('due_date', $invoice->due_date) }}">
                            @error('due_date')
                            <div class="text-danger mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Dropdown -->
                        <div>
                            <label for="status" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500">
                                <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full py-3 px-4 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Update Invoice</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>