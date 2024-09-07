<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-emerald-500 py-2 px-4 text-white rounded mb-4">{{ session('success')}}</div>
            @endif


            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($clients as $client)
                    <a href="clients/{{ $client->id }}">
                        <li class="flex justify-between gap-x-6 py-5 px-2 hover:bg-gray-300 rounded">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $client->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $client->email }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{ $client->city . ', ' . $client->region }}
                                </p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">Heating System:
                                    {{ $client->heating_system }}</p>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>

            <div class="mt-10">
                {{ $clients->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
