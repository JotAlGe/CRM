<nav aria-label="alternative nav">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
        <div
            class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul
                class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="block py-1 md:py-3 pl-1 align-middle text-gray-200 no-underline hover:text-white border-b-2 border-gray-200 hover:border-pink-500">
                        <i class="fas fa-user text-gray-200 pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-200 md:text-gray-200 block md:inline-block">
                        Usuarios
                        </span>
                    </x-nav-link>
                </li>
                <li class="mr-3 flex-1">
                    <x-nav-link :href="route('admin.clients.index')" :active="request()->routeIs('admin.users.index')" class="block py-1 md:py-3 pl-1 align-middle text-gray-200 no-underline hover:text-white border-b-2 border-gray-200 hover:border-pink-500">
                        <i class="fas fa-users text-gray-200 pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-200 md:text-gray-200 block md:inline-block">
                        Clientes
                        </span>
                    </x-nav-link>
                </li>
                <li class="mr-3 flex-1">
                    <x-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.index')" class="block py-1 md:py-3 pl-1 align-middle text-gray-200 no-underline hover:text-white border-b-2 border-gray-200 hover:border-pink-500">
                        <i class="fas fa-tasks text-gray-200 pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-200 md:text-gray-200 block md:inline-block">
                        Proyectos
                        </span>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>                  