@extends('layouts.app')

@section('content')

    <div class="w-screen h-screen pt-14">
        <div class="w-full h-full p-4">

            {{-- CONTROLS --}}
                <div class="flex items-center justify-between w-full h-12">
                    <div class="h-full">
                        {{-- ADD USER --}}
                        <livewire:brands.add-brand>
                    </div>
                    {{-- SEARCH --}}
                    <livewire:brands.search-brand>
                </div>
            {{-- CONTROLS --}}

            {{-- TABLE LIST --}}
            <livewire:brands.list-brand>
        </div>
    </div>

@endsection