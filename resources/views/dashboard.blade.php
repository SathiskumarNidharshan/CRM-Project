<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CRM Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Card 1: Total Customers -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Customers</p>
                            <h3 class="text-3xl font-semibold text-green-500">{{ $totalCustomers }}</h3>
                        </div>
                        <div class="p-4 bg-green-100 dark:bg-green-900 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M15 11a4 4 0 10-6 0M12 5a3 3 0 110 6 3 3 0 010-6z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Proposals -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Proposals</p>
                            <h3 class="text-3xl font-semibold text-yellow-500">{{ $totalProposals }}</h3>
                        </div>
                        <div class="p-4 bg-yellow-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 14H7a2 2 0 01-2-2V7a2 2 0 012-2h10a2 2 0 012 2v5a2 2 0 01-2 2h-2m-4 0v4m0 0h4m-4 0H9" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Total Invoices -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Invoices</p>
                            <h3 class="text-3xl font-semibold text-red-500">{{ $totalInvoices }}</h3>
                        </div>
                        <div class="p-4 bg-red-100 dark:bg-red-900 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 16H15M9 12H15M9 8H12M4 6V18C4 19.1 4.9 20 6 20H18C19.1 20 20 19.1 20 18V6C20 4.9 19.1 4 18 4H6C4.9 4 4 4.9 4 6Z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Total Transactions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Transactions</p>
                            <h3 class="text-3xl font-semibold text-blue-500">{{ $totalTransactions }}</h3>
                        </div>
                        <div class="p-4 bg-blue-100 dark:bg-blue-900 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2v4H8v-4c0-2.2 1.8-4 4-4s4 1.8 4 4v4h-2v-4c0-1.1-.9-2-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h16v2H4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 mt-6 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-4">Recent Activity</h3>

                    <!-- Recent Customers -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Recent Customers</h4>
                        <div class="flex flex-col space-y-4">
                            @foreach($recentCustomers as $customer)
                            <div class="flex justify-between">
                                <div class="text-gray-500 dark:text-gray-400">{{ $customer->name }} -- >> {{ $customer->email }} </div>

                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $customer->created_at->diffForHumans() }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Proposals -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Recent Proposals</h4>
                        <div class="flex flex-col space-y-4">
                            @foreach($recentProposals as $proposal)
                            <div class="flex justify-between">
                                <div class="text-gray-500 dark:text-gray-400">{{ $proposal->customer->name }} -- >>{{ $proposal->title }} </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $proposal->created_at->diffForHumans() }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Invoices -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Recent Invoices</h4>
                        <div class="flex flex-col space-y-4">
                            @foreach($recentInvoices as $invoice)
                            <div class="flex justify-between">
                                <div class="text-gray-500 dark:text-gray-400">{{ $invoice->invoice_number }} -- >>{{ $invoice->customer ->name}} </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $invoice->created_at->diffForHumans() }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>