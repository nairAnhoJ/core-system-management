@extends('layouts.app')

@section('content')

    <div class="w-screen h-screen pt-14">
        <div class="w-full h-full p-4">

            {{-- CONTROLS --}}
                <div class="flex items-center justify-between w-full h-12">
                    <div class="h-full">
                        {{-- ADD USER --}}
                        <livewire:departments.add-department>
                    </div>
                    {{-- SEARCH --}}
                    <livewire:departments.search-department>
                </div>
            {{-- CONTROLS --}}

            {{-- TABLE LIST --}}
            <livewire:departments.list-department>
        </div>
    </div>

@endsection