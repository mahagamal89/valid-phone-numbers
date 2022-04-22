<div class="px-16 py-4">
    <div>
        <h1 class="text-4xl bold px-7">
            Phone Numbers
        </h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <div class="block p-6 rounded-lg bg-white max-w-3xl">
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <select wire:model="selectedCountry" wire:click="getData" class="form-select block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="" selected>Select Country</option>
                        @foreach ($countries as $key => $item)
                            <option value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-6">
                    <select wire:model="selectedPhoneState" wire:click="getData" class="form-select block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="" selected>All phone numbers</option>
                        <option value="OK">Valid phone numbers</option>
                        <option value="NOK">Invalid phone numbers</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="py-2 inline-block min-w-full px-5">
                <div class="overflow-hidden">
                    <table class="min-w-full border">
                        <thead class="bg-gray-400 border">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Country
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    State
                                </th>
                                <th scope=" col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Country Code
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Phone number
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item['countries'] }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item['state'] }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item['countryCodes'] }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item['phoneNumbers'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
