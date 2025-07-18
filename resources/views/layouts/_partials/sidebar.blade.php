<div class="lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 bg-white min-h-screen">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
            <div class="text-xl font-bold text-indigo-600">{{ config('app.name', 'Listings SaaS') }}</div>
        </div>

        <!-- Sidebar content -->
        <div class="flex-1 flex flex-col overflow-y-auto sidebar-scroll">
            <nav class="flex-1 px-2 py-4 bg-white space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-4 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <!-- Properties -->
                <a href="{{ route('properties.index') }}" 
                   class="flex items-center px-4 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('properties.*') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Properties
                </a>

                <!-- Leads -->
                <a href="{{ route('leads.index') }}" 
                   :class="{ 'bg-indigo-600 text-white': currentPath === '{{ route('leads.index') }}', 'text-gray-600 hover:bg-gray-100': currentPath !== '{{ route('leads.index') }}' }"
                   class="flex items-center px-4 py-2 text-sm font-medium rounded-md group">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Leads
                </a>

                <!-- Plans -->
                <a href="{{ route('plans.index') }}" 
                   :class="{ 'bg-indigo-600 text-white': currentPath === '{{ route('plans.index') }}', 'text-gray-600 hover:bg-gray-100': currentPath !== '{{ route('plans.index') }}' }"
                   class="flex items-center px-4 py-2 text-sm font-medium rounded-md group">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Plans
                </a>
            </nav>

            <!-- User profile -->
            <div class="flex-shrink-0 p-4 border-t border-gray-200">
                <div class="flex items-center">
                    <div>
                        <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="Profile photo">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                        <p class="text-xs font-medium text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
