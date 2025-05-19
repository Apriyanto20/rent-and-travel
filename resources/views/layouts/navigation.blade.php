<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <div
                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('dashboard') || request()->routeIs('dashboard') ? 'text-black' : '' }}">
                            Dashboard</div>
                    </x-nav-link>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <li class="relative list-none">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div
                                        class="text-[16px] font-bold tracking-wide {{ request()->routeIs('dashboard') || request()->routeIs('dashboard') ? 'text-black' : '' }}">
                                        Master Data</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('transportations.index')" :class="request()->routeIs('transportations.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-ss-truck-side"></i></div>
                                        <div>Transportasi</div>
                                    </div>
                                </x-dropdown-link>
                                <hr>
                                <x-dropdown-link :href="route('merks.index')" :class="request()->routeIs('merks.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-brands-slack"></i></div>
                                        <div>Merk</div>
                                    </div>
                                </x-dropdown-link>
                                <hr>
                                <x-dropdown-link :href="route('rentalOptions.index')" :class="request()->routeIs('rentalOptions.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-br-dot-circle"></i></div>
                                        <div>Opsi Rental</div>
                                    </div>
                                </x-dropdown-link>
                                <hr>
                                <x-dropdown-link :href="route('members.index')" :class="request()->routeIs('members.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-ss-member-list"></i></div>
                                        <div>Member</div>
                                    </div>
                                </x-dropdown-link>
                                <hr>
                                <x-dropdown-link :href="route('drivers.index')" :class="request()->routeIs('drivers.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-ss-driver-man"></i></div>
                                        <div>Driver</div>
                                    </div>
                                </x-dropdown-link>
                                <hr>
                                <x-dropdown-link :href="route('transportationRoutes.index')" :class="request()->routeIs('transportationRoutes.index')
                                    ? 'text-gray-500 font-bold'
                                    : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-ss-route"></i></div>
                                        <div>Rute Travel</div>
                                    </div>
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </li>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <li class="relative list-none">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div
                                        class="text-[16px] font-bold tracking-wide {{ request()->routeIs('dashboard') || request()->routeIs('dashboard') ? 'text-black' : '' }}">
                                        Rental</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                {{-- Dropdown Item Transportasi --}}
                                <div class="relative">
                                    <button id="transportasi-button"
                                        class="flex justify-between items-center w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs('transportationsRental.index') ? 'text-gray-500 font-bold' : '' }}">
                                        <div class="flex items-center justify-start gap-5">
                                            <div class="mt-1"><i class="fi fi-ss-truck-side"></i></div>
                                            <div>Transportasi</div>
                                        </div>
                                        <i class="fi fi-rr-caret-right ml-auto"></i>
                                    </button>

                                    <div id="transportasi-submenu"
                                        class="hidden absolute left-full top-0 -mt-1 ml-2 w-52 bg-white dark:bg-gray-800 shadow-lg rounded-md border z-50">
                                        <x-dropdown-link :href="route('transportationsRental.index')" :class="request()->routeIs('transportationsRental.index')
                                            ? 'text-gray-500 font-bold'
                                            : ''">
                                            <div class="flex items-center justify-start gap-5">
                                                <div class="mt-1"><i class="fi fi-ss-truck-side"></i></div>
                                                <div>Mobil</div>
                                            </div>
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('transportationsRentalMotorcycle.index')" :class="request()->routeIs('transportationsRentalMotorcycle.index')
                                            ? 'text-gray-500 font-bold'
                                            : ''">
                                            <div class="flex items-center justify-start gap-5">
                                                <div class="mt-1"><i class="fi fi-ss-moped"></i></div>
                                                <div>Motor</div>
                                            </div>
                                        </x-dropdown-link>
                                    </div>
                                </div>

                                <hr>

                                {{-- Transaction --}}
                                <x-dropdown-link :href="route('transactionsRental.index')" :class="request()->routeIs('transactionsRental.index') ? 'text-gray-500 font-bold' : ''">
                                    <div class="flex items-center justify-start gap-5">
                                        <div class="mt-1"><i class="fi fi-ss-receipt"></i></div>
                                        <div>Transaction</div>
                                    </div>
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </li>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('coba')" :active="request()->routeIs('coba')">
                        <div
                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('coba') || request()->routeIs('coba') ? 'text-black' : '' }}">
                            COBA</div>
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('cobaLoop')" :active="request()->routeIs('cobaLoop')">
                        <div
                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs('cobaLoop') || request()->routeIs('cobaLoop') ? 'text-black' : '' }}">
                            COBA LOOP</div>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const transportasiButton = document.getElementById('transportasi-button');
        const transportasiSubmenu = document.getElementById('transportasi-submenu');

        // Toggle submenu on click
        transportasiButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            transportasiSubmenu.classList.toggle('hidden');
        });

        // Hide when clicking outside
        document.addEventListener('click', function(e) {
            if (!transportasiButton.contains(e.target) && !transportasiSubmenu.contains(e.target)) {
                transportasiSubmenu.classList.add('hidden');
            }
        });

        // Prevent submenu from closing when clicked inside
        transportasiSubmenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>
