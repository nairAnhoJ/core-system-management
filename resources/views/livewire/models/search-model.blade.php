<div class="relative h-full w-96">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </div>
    <input type="search" wire:model.live.debounce.200ms='search' id="default-search" class="block w-full h-full pl-10 pr-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"  placeholder="Search . . ." autocomplete="off">
</div>