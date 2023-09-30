<div class="h-full">

    {{-- SUCCESS ALERT --}}
        @if (session('success'))
            <div class="absolute flex items-center p-4 mb-4 text-green-800 -translate-x-1/2 border border-green-700 rounded-lg left-1/2 top-20 bg-green-50">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="pr-5 ml-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 hideAlert">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
    {{-- SUCCESS ALERT --}}

    {{-- ADD MODAL --}}
        <div id="addModal" class="{{ ($addModal) ? '' : 'hidden' }} absolute top-0 left-0 w-screen h-screen bg-gray-900 z-[99] !bg-opacity-50 overflow-hidden flex items-center justify-center p-5">
            <div class="w-1/3 bg-white rounded-lg">
                <!-- Modal content -->
                <form wire:submit='store' class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Add Forklift Model
                        </h3>
                        <button type="button" wire:click='cancel' class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4">
                        <div class="space-y-4">
                            <div>
                                <label for="brand" class="block text-sm font-medium text-gray-900">Brand</label>
                                <select id="brand" wire:model='brand' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option hidden>Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                                <input type="text" id="name" wire:model='name' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autocomplete="off">
                                @error('name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">SUBMIT</button>
                        <button type="button" wire:click='cancel' class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    {{-- ADD MODAL --}}

    <button wire:click='add' class="flex items-center h-full px-8 text-lg font-bold text-white bg-blue-500 rounded-lg">ADD</button>
</div>
