@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('UFO Watch Log') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-6">
                        {{ __('Log unidentified aerial phenomena and track investigations.') }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="rounded-lg border border-orange-200 bg-orange-50 p-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-orange-700">{{ __('Active investigations') }}</p>
                            <p class="mt-2 text-3xl font-bold text-orange-900">0</p>
                        </div>
                        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">{{ __('Closed investigations') }}</p>
                            <p class="mt-2 text-3xl font-bold text-gray-900">0</p>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('sightings.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            {{ __('View sightings') }}
                        </a>
                        <a href="{{ Route::has('sightings.create') ? route('sightings.create') : "#" }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            {{ __('Log sighting') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
