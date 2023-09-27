<div class="fixed w-full h-14 bg-neutral-600">
    <div class="flex items-center justify-between w-full h-full p-2">
        <div class="flex items-center h-full bg-white rounded-lg aspect-square hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <button id="sidebarBtn" class="h-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                    <path d="M95-203v-95h771v95H95Zm0-230v-94h771v94H95Zm0-229v-95h771v95H95Z"/>
                </svg>
            </button>
            <span class="ml-2 text-2xl font-bold text-white">{{ $title ?? config('app.name', 'MRF - System') }}</span>
        </div>
        <div class="justify-center h-full px-1 bg-white rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <a href="{{ route('logout') }}" class="flex items-center h-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                    <path xmlns="http://www.w3.org/2000/svg" d="M189-95q-39.05 0-66.525-27.475Q95-149.95 95-189v-582q0-39.463 27.475-67.231Q149.95-866 189-866h296v95H189v582h296v94H189Zm467-174-67-66 97-98H354v-94h330l-97-98 67-66 212 212-210 210Z"/>
                </svg>
                <span class="ml-1 font-medium">LOGOUT</span>
            </a>
        </div>
    </div>
</div>

<div id="backdrop" class="h-screen w-screen z-[95] bg-neutral-900 fixed top-0 left-0 bg-opacity-0 hidden transition-opacity duration-1000"></div>
<aside id="sidebar" class="absolute top-0 h-screen transition-transform duration-500 transform -translate-x-full bg-white w-[300px] z-[99]">
    <div class="flex flex-col w-full h-full p-4 gap-y-1">

        <a href="{{ route('departments') }}" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="M97-57v-299h126v-165h216v-83H313v-299h334v299H521v83h216v165h126v299H534v-299h120v-83H306v83h120v299H97Z"/>
            </svg>
            <span class="ml-2 font-medium">DEPARTMENTS</span>
        </a>

        <a href="{{ route('sites') }}" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="m612-94-263-93-170 69q-30 14-57-3.5T95-173v-558q0-21 12-38t32-24l210-73 263 92 169-69q30-13 57.5 4t27.5 51v565q0 20-12.5 34.5T822-168L612-94Zm-34-112v-484l-196-66v484l196 66Z"/>
            </svg>
            <span class="ml-2 font-medium">SITES</span>
        </a>

        <a href="{{ route('customers') }}" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="M-12-228v-65.434q0-44.133 45-71.35Q78-392 150.376-392H162q5 0 11 .652-10 20.348-15.18 41.671-5.181 21.323-5.181 44.501V-228H-12Zm240 0v-77q0-35 18-64t52-50q34-21 80.294-32 46.293-11 101.43-11 56.197 0 101.99 11 45.794 11 80.286 32 34 21 52 50t18 64v77H228Zm579 0v-77.429q0-23.802-5-45.121-5-21.32-14-40.723 6-.727 11.257-.727H810q73.7 0 117.85 27.046Q972-337.907 972-293v65H807ZM149.78-419Q118-419 95.5-441.83T73-496.719Q73-529 95.624-551.5t54.394-22.5Q182-574 205-551.465q23 22.536 23 54.977Q228-465 205.261-442t-55.481 23Zm660 0q-31.78 0-54.28-22.83T733-496.719Q733-529 755.624-551.5t54.394-22.5Q842-574 865-551.465q23 22.536 23 54.977Q888-465 865.261-442t-55.481 23Zm-329.289-72q-55.204 0-93.848-38.643Q348-568.286 348-623.491 348-679 386.643-717q38.644-38 93.848-38Q536-755 574-717t38 93.509q0 55.205-38 93.848T480.491-491Z"/>
            </svg>
            <span class="ml-2 font-medium">CUSTOMERS</span>
        </a>

        <a href="#" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="M583-73q-28 28-67.5 28T448-73L73-448q-15-15-21-32t-6-36v-304q0-40 27-67.5t67-27.5h304q19 0 37 6.5t33 21.5l373 372q29 29 29 69t-29 69L583-73ZM245-664q21 0 36.5-15.5T297-716q0-21-15.5-36.5T245-768q-21 0-36.5 15.5T193-716q0 21 15.5 36.5T245-664Z"/>
            </svg>
            <span class="ml-2 font-medium">FORKLIFT BRANDS</span>
        </a>

        <a href="#" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="M433-66 142-233q-23.25-13.426-35.125-35.42T95-315v-330q0-24.586 11.875-46.58T142-727l291-168q22.328-12 47.164-12Q505-907 527-895l291 168q23.25 13.426 35.625 35.42T866-645v330q0 24.586-12.375 46.58T818-233L527-66q-22.328 13-47.164 13Q455-53 433-66Zm4-389.625V-173l43 25 44-25v-282.787L771-600v-44.985L723-672 480-530 236-672l-47 26.672V-599l248 143.375Z"/>
            </svg>
            <span class="ml-2 font-medium">FORKLIFT MODELS</span>
        </a>

        <a href="#" class="flex items-center w-full h-12 p-2 rounded-lg hover:bg-neutral-100 text-neutral-700 hover:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="h-full aspect-square">
                <path xmlns="http://www.w3.org/2000/svg" d="m366-55-21-134q-13-4-29.5-13.5T288-221l-125 58L47-368l114-83q-1-6-1.5-14.5T159-480q0-6 .5-14.5T161-509L47-593l116-203 127 57q10-8 26-17t29-13l21-137h228l21 136q13 5 29.5 13.5T672-739l126-57 115 203-115 82q1 7 2 15.5t1 15.5q0 7-1 15t-2 15l115 82-116 205-126-58q-11 9-26.5 18.5T615-189L594-55H366Zm112-295q54 0 92-38t38-92q0-54-38-92t-92-38q-54 0-92 38t-38 92q0 54 38 92t92 38Z"/>
            </svg>
            <span class="ml-2 font-medium">FORKLIFT PARTS</span>
        </a>
        
    </div>
</aside>

<script>
    $(document).ready(function () {
        $("#sidebarBtn").click(function () {
            $('#backdrop').toggleClass('hidden');
            setTimeout(function () {
                $('#sidebar').toggleClass("-translate-x-full");
                $('#backdrop').toggleClass('bg-opacity-0');
                $('#backdrop').toggleClass('bg-opacity-50');
            }, 50);
        });

        $("#backdrop").click(function () {
            $('#sidebar').toggleClass("-translate-x-full");
            $('#backdrop').toggleClass('bg-opacity-0');
            $('#backdrop').toggleClass('bg-opacity-50');
            setTimeout(function () {
                $('#backdrop').toggleClass('hidden');
            }, 200);
        });
    });
</script>