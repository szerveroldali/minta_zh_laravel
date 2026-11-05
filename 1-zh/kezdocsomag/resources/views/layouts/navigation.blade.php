<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('sightings.index')" :active="request()->routeIs('sightings.index')">
                        {{ __('Sightings') }}
                    </x-nav-link>
                    <x-nav-link :href="Route::has('sightings.create') ? route('sightings.create') : '#'" :active="request()->routeIs('sightings.create')">
                        {{ __('Log sighting') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sightings.index')" :active="request()->routeIs('sightings.index')">
                {{ __('Sightings') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="Route::has('sightings.create') ? route('sightings.create') : '#'" :active="request()->routeIs('sightings.create')">
                {{ __('Log sighting') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
