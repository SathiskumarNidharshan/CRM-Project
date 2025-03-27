<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card mt-3">
                        <div class="card-body">
                            <a href="{{ url('/invoice/create') }}" class="bg-green-500 hover:bg-green-600 text-blue font-bold py-2 px-4 rounded-lg shadow-md inline-flex items-center">
                                <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add New Invoice
                            </a>

                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table w-full bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                    <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 uppercase text-sm font-semibold">
                                            <th class="py-3 px-4 text-center">#</th>
                                            <th class="py-3 px-4 text-center">Invoice Number</th>
                                            <th class="py-3 px-4 text-center">Customer Name</th>
                                            <th class="py-3 px-4 text-center">Amount</th>
                                            <th class="py-3 px-4 text-center">Due Date</th>
                                            <th class="py-3 px-4 text-center">Status</th>
                                            <th class="py-3 px-4 text-center">Send</th>
                                            <th class="py-3 px-4 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $key => $item)
                                        <tr class="border-b border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                            <td class="py-4 px-4 text-center">{{ ($invoices->currentPage() - 1) * $invoices->perPage() + $key + 1 }}</td>
                                            <td class="py-4 px-4 font-medium text-gray-700 dark:text-gray-200 text-center">{{ $item->invoice_number }}</td>
                                            <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->customer->name }}</td>
                                            <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">Rs.{{ $item->amount }}</td>
                                            <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->due_date }}</td>
                                            <!-- <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->status }}</td> -->
                                            <td class="py-4 px-4 text-center">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                                    @if($item->status == 'success') bg-green-500 text-white 
                                                    @elseif($item->status == 'pending') bg-yellow-500 text-white 
                                                    @elseif($item->status == 'paid') bg-blue-500 text-white 
                                                    @elseif($item->status == 'overdue') bg-red-500 text-white 
                                                    @else bg-gray-500 text-white 
                                                    @endif">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-4 text-center">
                                                <a href="{{ url('/invoice/' . $item->id . '/send') }}" title="Send Invoice">
                                                    <button class="px-3 py-1 text-sm font-medium bg-green hover:bg-green text-black rounded-lg shadow-md transition duration-200 flex items-center justify-center">
                                                        <i class="fa fa-envelope mr-1"></i> Send Invoice
                                                    </button>
                                                </a>
                                            </td>

                                            <td class="py-4 px-4 flex items-center justify-center space-x-8">
                                                <a href="{{ url('/invoice/' . $item->id) }}" title="View Invoice">
                                                    <button class="px-3 py-1 text-sm font-medium bg-blue-500 hover:bg-blue-600 text-black rounded-lg shadow-md transition duration-200 flex items-center">
                                                        <i class="fa fa-eye mr-1"></i> View
                                                    </button>
                                                </a>
                                                <a href="{{ url('/invoice/' . $item->id . '/edit') }}" title="Edit Invoice">
                                                    <button class="px-3 py-1 text-sm font-medium bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg shadow-md transition duration-200 flex items-center">
                                                        <i class="fa fa-pencil-square-o mr-1"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('/invoice' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="px-3 py-1 text-sm font-medium bg-red-500 hover:bg-red-600 text-white rounded-lg shadow-md transition duration-200 flex items-center" title="Delete Invoice" onclick="return confirm('Confirm delete?')">
                                                        <i class="fa fa-trash-o mr-1"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $invoices->links() }} <!-- Ensure this is inside the Blade view -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>