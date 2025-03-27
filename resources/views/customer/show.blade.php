<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center items-center">
        <div class="max-w-3xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <div class="p-10 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">Customer Details</h2>

                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md inline-block text-left">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Name: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $customers->name }}</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Email: <span class="font-medium">{{ $customers->email }}</span>
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            Phone: <span class="font-medium">{{ $customers->phone }}</span>
                        </p>
                    </div>



                    <!-- Optionally, add a button or link to return to the customer list or dashboard -->
                    <div class="mt-6">
                        <a href="{{ url('customer') }}" class="text-blue-500 hover:text-blue-700 underline">Back to Customer List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>