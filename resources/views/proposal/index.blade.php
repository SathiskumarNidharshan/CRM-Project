<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proposal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card mt-3">
                        <!-- <div class="card-header">
                            <h2>Proposals</h2>
                        </div> -->
                        <div class="card-body">
                            <a href="{{ url('/proposal/create') }}" class="bg-green-500 hover:bg-green-600 text-blue font-bold py-2 px-4 rounded-lg shadow-md inline-flex items-center">
                                <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add New Proposal
                            </a>

                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table w-full bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                    <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 uppercase text-sm font-semibold">
                                            <th class="py-3 px-4 text-center">#</th>
                                            <th class="py-3 px-4 text-center">Title</th>
                                            <th class="py-3 px-4 text-center">Description</th>
                                            <th class="py-3 px-4 text-center">Customer</th>
                                            <th class="py-3 px-4 text-center">Status</th>
                                            <th class="py-3 px-4 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($proposals as $key => $item)
                                        <tr class="border-b border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                            <td class="py-4 px-4 text-center">{{ ($proposals->currentPage() - 1) * $proposals->perPage() + $key + 1 }}</td>
                                            <td class="py-4 px-4 font-medium text-gray-700 dark:text-gray-200 text-center">{{ $item->title }}</td>
                                            <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->description }}</td>
                                            <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->customer->name }}</td> <!-- Assuming 'customer' is a relationship -->
                                            <!-- <td class="py-4 px-4 text-gray-600 dark:text-gray-300 text-center">{{ $item->status }}</td> -->
                                            <td class="py-4 px-4 text-center">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                                    @if($item->status == 'pending') bg-yellow-500 text-white 
                                                    @elseif($item->status == 'approved') bg-green-500 text-white 
                                                    @elseif($item->status == 'rejected') bg-red-500 text-white 
                                                    @else bg-gray-500 text-white 
                                                    @endif">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-4 flex items-center justify-center space-x-8">
                                                <!-- View Button -->
                                                <a href="{{ url('/proposal/' . $item->id) }}" title="View Proposal">
                                                    <button class="px-3 py-1 text-sm font-medium bg-blue-500 hover:bg-blue-600 text-black rounded-lg shadow-md transition duration-200 flex items-center">
                                                        <i class="fa fa-eye mr-1"></i> View
                                                    </button>
                                                </a>
                                                <!-- Edit Button -->
                                                <a href="{{ url('/proposal/' . $item->id . '/edit') }}" title="Edit Proposal">
                                                    <button class="px-3 py-1 text-sm font-medium bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg shadow-md transition duration-200 flex items-center">
                                                        <i class="fa fa-pencil-square-o mr-1"></i> Edit
                                                    </button>
                                                </a>
                                                <!-- Delete Button -->
                                                <form method="POST" action="{{ url('/proposal' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="px-3 py-1 text-sm font-medium bg-red-500 hover:bg-red-600 text-white rounded-lg shadow-md transition duration-200 flex items-center" title="Delete Proposal" onclick="return confirm('Confirm delete?')">
                                                        <i class="fa fa-trash-o mr-1"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $proposals->links() }} <!-- Ensure this is inside the Blade view -->
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>