@extends('layouts.app')

@section('content')

    <div class="w-screen h-screen">
        <div class="flex flex-row-reverse w-full h-full bg-gray-300">
            <div class="flex items-center w-1/2 h-full z-[99] pl-16">
                @livewire('login.form')
            </div>
            <div class="absolute flex flex-col justify-center w-4/5 px-16 text-5xl font-bold tracking-wide text-white -translate-x-1/2 -translate-y-1/2 rounded shadow top-1/2 left-1/2 bg-neutral-600 h-1/3">
                <div>
                    CORE SYSTEM
                </div>
                <div>
                    MANAGEMENT
                </div>
            </div>
        </div>
    </div>

@endsection