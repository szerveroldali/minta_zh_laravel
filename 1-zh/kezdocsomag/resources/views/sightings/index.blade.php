<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Sightings') }}
</h2>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="mb-4">
            <a href="{{ Route::has('sightings.create') ? route('sightings.create') : "#" }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                {{ __('Log sighting') }}
            </a>
        </div>

        <div class="bg-green-200 overflow-hidden shadow-sm rounded-lg p-4 text-center">
            Sighting of <b>type</b> aircraft in <b>location</b> has been logged successfully.
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 overflow-x-auto">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('All sightings') }}</h3>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('ID') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Location') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Spotted') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Craft type') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Description') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Witnesses') }}</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
