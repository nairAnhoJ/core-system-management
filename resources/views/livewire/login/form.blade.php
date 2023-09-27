<div class="flex flex-col justify-center w-3/5 px-8 bg-white rounded-lg shadow-2xl h-1/2">
    <h1 class="text-4xl font-bold text-center text-neutral-700">LOG IN</h1>
    <form wire:submit='authenticate' class="w-full py-4 mt-8">
        <div class="mb-8">
            <div class="flex">
              <span class="inline-flex items-center px-4 text-sm text-gray-900 border border-r-0 border-gray-300 bg-neutral-200 rounded-l-md">
                <svg class="text-gray-500 w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 -960 960 960">
                    <path xmlns="http://www.w3.org/2000/svg" d="M479.796-494q-77.203 0-126-48.796Q305-591.593 305-668.796 305-746 353.796-795q48.797-49 126-49Q557-844 606.5-795T656-668.796q0 77.203-49.5 126Q557-494 479.796-494ZM135-122v-120.795q0-44.507 22.828-77.721Q180.656-353.73 217-371q69-31 133.459-46.5T479.731-433q66.731 0 130.5 16 63.769 16 131.69 46.194 37.911 16.085 60.995 49.445Q826-288 826-243.055V-122H135Zm94-94h502v-23q0-15.353-9.5-29.324Q712-282.294 698-289q-60-28-110.495-38.5-50.496-10.5-108-10.5Q424-338 371.5-327.5 319-317 261.429-289.156 247-282.441 238-268.425q-9 14.016-9 29.425v23Zm250.796-372Q515-588 538-610.846t23-58.119q0-35.685-22.796-58.36-22.797-22.675-58-22.675Q445-750 422-727.279t-23 57.819q0 35.51 22.796 58.485 22.797 22.975 58 22.975Zm.204-81Zm0 453Z"/>
                </svg>
              </span>
              <input type="text" id="username" wire:model='username' class="flex-1 block w-full min-w-0 p-4 border border-gray-300 rounded-none rounded-r-lg bg-gray-50 text-neutral-600" placeholder="Username" required autocomplete="off">
            </div>
        </div>
        <div class="mb-8">
            <div class="flex">
              <span class="inline-flex items-center px-4 text-sm text-gray-900 border border-r-0 border-gray-300 bg-neutral-200 rounded-l-md">
                <svg class="text-gray-500 w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 -960 960 960">
                    <path xmlns="http://www.w3.org/2000/svg" d="M280.248-401Q248-401 224.5-424.252t-23.5-55.5Q201-512 224.252-535.5t55.5-23.5Q312-559 335.5-535.748t23.5 55.5Q359-448 335.748-424.5t-55.5 23.5ZM280-217q-108.667 0-185.833-77.235Q17-371.471 17-480.235 17-589 94.167-666 171.333-743 280-743q80 0 140 38t91.083 111H863l125 124-183 169-89-66-87 63-79-62h-39q-25 63-84.332 106Q367.335-217 280-217Zm0-83q61 0 110.5-41T452-448h127l50 42 88-63 82 60 73-60-42-43H452q-9-60-58.596-104Q343.809-660 280-660q-75 0-127.5 52.5T100-480q0 75 52.5 127.5T280-300Z"/>
                </svg>
              </span>
              <input type="password" id="password" wire:model='password' class="flex-1 block w-full min-w-0 p-4 border border-gray-300 rounded-none rounded-r-lg bg-gray-50 text-neutral-600" placeholder="Password" required autocomplete="off">
            </div>
        </div>
        <div>
            <button type="submit" class="w-full py-3 text-lg font-bold tracking-wider text-center text-white rounded-md !bg-neutral-400 hover:!bg-neutral-500">
                LOGIN
            </button>
        </div>
    </form>
</div>