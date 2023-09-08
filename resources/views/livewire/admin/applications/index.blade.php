<div>
    <x-slot name="header">
        <p class="text-xl text-gray-800 leading-tight">
            {{ __('Applications') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <x-jet-input type="search" wire:model="search" placeholder="Search by Last Name" autofocus class="max-w-lg"/>
                <div class="flex items-center space-x-4">
                    <x-jet-label for="qty" value="Show items" />
                    <select id="qty" wire:model="qty" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="35">35</option>
                        <option value="50">50</option>
                        <option value="{{ $applications->count() }}">Show all</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Start Date")}}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Name")}}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Status")}}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Payment")}}</th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{__("Edit")}}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($applications as $application)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ date('M d, Y h:i a', strtotime($application->created_at)) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{$application->first_name . ' ' . $application->middle_name . ' ' . $application->last_name}}</div>
                                                <div class="text-sm text-gray-500">{{$application->email}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm">
                                                    @if ($application->applicant_signature && $application->applicant_signature_ip && $application->completed_at)
                                                        <span class="text-green-600">{{__("Ready")}}</span>
                                                    @else
                                                        <span class="text-yellow-600">{{__("In progress")}}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if ($application->received_payment)
                                                    <span class="text-green-600">{{__("Paid")}}</span>
                                                    @else
                                                    <span class="text-red-600">{{__("Needs payment")}}</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{route('applications.show', ['language' => 'en', 'application' => $application->id])}}" class="text-indigo-600 hover:text-indigo-900">{{__("Details")}}</a>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
