@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Log sighting') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="space-y-6 max-w-xl" action="" method="">
                        @csrf

                        <div>
                            <label for="location" class="block font-medium text-sm text-gray-700">
                                {{ __('Location') }}
                            </label>
                            <input
                                id="location"
                                name="location"
                                type="text"
                                value=""
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            />
                        </div>

                        <div>
                            <label for="spotted_on" class="block font-medium text-sm text-gray-700">
                                {{ __('Spotted') }}
                            </label>
                            <input
                                id="spotted_on"
                                name="spotted_on"
                                type="date"
                                value=""
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            />
                        </div>

                        <div>
                            <label for="craft_type" class="block font-medium text-sm text-gray-700">
                                {{ __('Craft type') }}
                            </label>
                            <select
                                id="craft_type"
                                name="craft_type"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                                <option value="">{{ __('Choose…') }}</option>
                                @foreach ([...$craftTypes, "idk" => "This option is invalid"] as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">
                                {{ __('Description') }}
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="{{ __('Optional details') }}"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="button-primary"
                        >
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
