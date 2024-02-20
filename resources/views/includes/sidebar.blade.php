<ul class="min-h-full space-y-2 ">
    <li><a href="{{ route('dashboard') }}"
            class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-house"></i>Dashboard</a>
    </li>
    @switch(Auth::user()->roles)
        @case('ADMIN')
            <li><a href="{{ route('category-services.index') }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('category-services*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-list-ol"></i>Category Services</a>
            </li>
            <li><a href="{{ route('support-admin.index') }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('support-admin*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-ticket"></i>Ticket Support Admin</a>
            </li>
        @break

        @case('USER')
            <li><a href="{{ route('support-user.index', ['id' => Auth::user()->id]) }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('support-user*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-headset"></i>Ticket Support User</a>
            </li>
        @break

        @default
            <li><a href="{{ route('category-services.index') }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('category-services*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-list-ol"></i>Category Services</a>
            </li>
            <li><a href="{{ route('support-admin.index') }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('support-admin*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-ticket"></i>Ticket Support Admin</a>
            </li>
            <li><a href="{{ route('support-user.index', ['id' => Auth::user()->id]) }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('support-user*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-headset"></i>Ticket Support User</a>
            </li>
            <li><a href="{{ route('user-settings.index') }}"
                    class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('user*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                        class="fa-solid fa-users"></i>User</a>
            </li>
    @endswitch


</ul>
