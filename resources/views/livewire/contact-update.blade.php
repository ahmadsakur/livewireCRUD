<div>
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" wire:submit.prevent="update">
        <input type="hidden" wire:model="contactId">
        <div class="mb-4 md:flex md:justify-left">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                    Name
                </label>
                <input wire:model="name"
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="Name" type="text" placeholder="Jane Doe" />
                @error('name')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                    Phone Number
                </label>
                <input wire:model="phone"
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="Phone" type="text" placeholder="08xxxxxxx" />
                @error('phone')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <button
                class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300"
                type="submit">Update</button>
        </div>
    </form>
</div>
