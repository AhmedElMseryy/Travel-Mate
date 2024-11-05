<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg> --}}

                <img src="{{ asset('assets-front-auth/assets/img/favicon/Logo.png') }}" alt="Your Logo"
                    style="height: 120px;width: 100%">

            </a>
        </div>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="{{ route('admin.index') }}" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">{{ __('keywords.home') }}</span>
                </a>

            </li>
        </ul>



        <p class="text-muted nav-heading mt-4 mb-1">
            <span>{{ __('keywords.components') }}</span>
        </p>

        <ul class="navbar-nav flex-fill w-100 mb-2">

            <!-- Destinations Component -->
            <x-sidebar-tab href="{{ route('admin.destinations.index') }}" icon="fe-globe"
                name="{{ __('keywords.destinations') }}"></x-sidebar-tab>

            <!-- Guides Component -->
            <x-sidebar-tab href="{{ route('admin.guides.index') }}" icon="fe-users"
                name="{{ __('keywords.guides') }}"></x-sidebar-tab>

            <!-- Contacts Component -->
            <x-sidebar-tab href="{{ route('admin.contacts.index') }}" icon="fe-inbox"
                name="{{ __('keywords.contacts') }}"></x-sidebar-tab>

            <!-- Subscribes Component -->
            <x-sidebar-tab href="{{ route('admin.subscribers.index') }}" icon="fe-message-circle"
                name="{{ __('keywords.subscribers') }}"></x-sidebar-tab>

            <!-- About Section -->
            <x-sidebar-tab href="{{ route('admin.about.index') }}" icon="fe-info"
                name="{{ __('keywords.about') }}"></x-sidebar-tab>

            <!-- User Reservation -->
            {{-- <x-sidebar-tab href="{{ route('admin.about.index') }}" icon="fe-info"
                name="{{ __('keywords.about') }}"></x-sidebar-tab> --}}


        </ul>

    </nav>
</aside>
