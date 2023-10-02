<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex">

                @php
                $routes = [
                ['name' => 'All', 'path' => 'inventory', 'to' => 'inventory' ],
                ['name' => 'Stocks', 'path' => 'stocks', 'to' => 'stocks' ],
                ['name' => 'Display', 'path' => 'display', 'to' => 'display' ],
                ['name' => 'Outlet', 'path' => 'outlet', 'to' => 'outlet' ],
                ]
                @endphp

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-2 sm:flex">
                    @foreach ($routes as $route)
                    <x-nav-link :href="route($route['path'])" :active="request()->routeIs($route['to'])">
                        {{ __($route['name']) }}
                    </x-nav-link>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>