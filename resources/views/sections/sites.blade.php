@extends('layouts.app')

@section('content')

    <div class="w-screen h-screen pt-14">
        <div class="w-full h-full p-4">

            {{-- CONTROLS --}}
                <div class="flex items-center justify-between w-full h-12">
                    <div class="h-full">
                        {{-- ADD USER --}}
                        <livewire:sites.add-site>
                    </div>
                    {{-- SEARCH --}}
                    <livewire:sites.search-site>
                </div>
            {{-- CONTROLS --}}

            {{-- TABLE LIST --}}
            <livewire:sites.list-site>
        </div>
    </div>

@endsection