<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- EAW Form --}}
            <form method="POST" action="/clients">
                @csrf {{-- Cross-site Request Forgery protection --}}
                <div class="space-y-12">

                    {{-- Client Information --}}
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Client Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be for EAW only.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            {{-- First name --}}
                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('first_name')}}">
                                </div>
                                @error('first_name')
                                    <p class="text-xs text-red-500 font-semibold mt-1">The first name field is required.</p>
                                @enderror
                            </div>

                            {{-- Last name --}}
                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('last_name')}}">
                                </div>
                                @error('last_name')
                                    <p class="text-xs text-red-500 font-semibold mt-1">The last name field is required.</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('email')}}">
                                </div>
                                @error('email')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            {{-- Address --}}
                            <div class="sm:col-span-3">
                                <label for="country"
                                    class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                                <div class="mt-2">
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" value="{{ old('country')}}">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="street_address"
                                    class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                                <div class="mt-2">
                                    <input type="text" name="street_address" id="street_address"
                                        autocomplete="street_address"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('street_address')}}">
                                </div>
                                @error('street_address')
                                    <p class="text-xs text-red-500 font-semibold mt-1">The street address field is required.</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="city"
                                    class="block text-sm font-medium leading-6 text-gray-900">City</label>
                                <div class="mt-2">
                                    <input type="text" name="city" id="city" autocomplete="address-level2"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('city')}}">
                                </div>
                                @error('city')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State
                                    / Province</label>
                                <div class="mt-2">
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('region')}}">
                                </div>
                                @error('region')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900">ZIP
                                    / Postal code</label>
                                <div class="mt-2">
                                    <input type="text" name="postal_code" id="postal_code" autocomplete="postal_code"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('postal_code')}}">
                                </div>
                                @error('postal_code')
                                    <p class="text-xs text-red-500 font-semibold mt-1">The postal code field is required.</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Heating System</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600"><span class="font-extrabold">emc</span>20/20
                            will help buildings lower its energy costs, comply to local laws and provide optimal
                            occupant comfort.</p>

                        {{-- Heating System Type --}}
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="heating_system"
                                    class="block text-sm font-medium leading-6 text-gray-900">Type of Heating
                                    System</label>
                                <div class="mt-2">
                                    <select id="heating_system" name="heating_system" autocomplete="heating_system"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" value="{{ old('heating_system')}}">
                                        <option>Steam</option>
                                        <option>Hot Water</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Cancel or Submit --}}
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
