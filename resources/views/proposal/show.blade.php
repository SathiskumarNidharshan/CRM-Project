<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proposal') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center items-center">
        <div class="max-w-3xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <div class="p-10 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">Proposal Details</h2>

                    <!-- Proposal Section -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-6">


                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Title:</span> {{ $proposals->title }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Description:</span> {{ $proposals->description }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Name:</span> {{ $proposals->customer->name }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Email:</span> {{ $proposals->customer->email }}
                        </p>

                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Phone:</span> {{ $proposals->customer->phone }}
                        </p>
                    </div>

                    <!-- Button to return to the proposals list -->
                    <div class="mt-6">
                        <a href="{{ url('proposal') }}" class="text-blue-500 hover:text-blue-700 underline">Back to Proposal List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>