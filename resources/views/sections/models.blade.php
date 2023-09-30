@extends('layouts.app')

@section('content')

    <div class="w-screen h-screen pt-14">
        <div class="w-full h-full p-4">

            {{-- CONTROLS --}}
                <div class="flex items-center justify-between w-full h-12">
                    <div class="h-full">
                        {{-- ADD USER --}}
                        <livewire:models.add-model>
                    </div>
                    {{-- SEARCH --}}
                    <livewire:models.search-model>
                </div>
            {{-- CONTROLS --}}

            {{-- TABLE LIST --}}
            <livewire:models.list-model>
        </div>
    </div>

@endsection