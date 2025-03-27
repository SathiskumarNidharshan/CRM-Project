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
                    <h3 class="text-2xl font-semibold text-center mb-6">Add New Invoice</h3>

                    <form action="{{ url('invoice') }}" method="POST" class="space-y-6">
                        {!! csrf_field() !!}

                        <!-- <div>
                            <label for="customer_id" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                                Select Customer
                            </label>
                            <select name="customer_id" id="customer_id" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500">
                                <option value="">-- Select Customer --</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div>
                            <label for="customer_id" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <div class="text-danger mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="amount" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ old('amount') }}">
                            @error('amount')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="due_date" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ old('due_date') }}">
                            @error('due_date')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="w-full py-3 px-4 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Create Invoice</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>