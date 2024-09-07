<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="relative isolate px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        You're signed in!
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">EAW Client Form Application</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Get started on a new client form or view all of our clients!</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route("clients.create")}}"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Client Form</a>
                        <a href="{{ route("clients.index")}}" class="text-sm font-semibold leading-6 text-gray-900">View All Clients <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
