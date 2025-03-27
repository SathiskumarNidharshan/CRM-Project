<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proposal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold text-center mb-6">Add New Proposal</h3>
                    <form action="{{ url('proposal') }}" method="post" class="space-y-6">
                        {!! csrf_field() !!}

                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div>
                            <label for="description" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" class="form-control mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Customer ID Field (Dropdown) -->
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

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full py-3 px-4 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>