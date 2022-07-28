<aside class="h-screen flex-shrink-0 bg-[#141423] w-[260px] shadow">

    <div class="h-16 bg-[#1A1A27] text-white shadow flex items-center gap-4 px-4">
        <img src="<?= asset('img/logo.png') ?>" class="h-8" />
        <span class="text-xl font-bold">Admin Panel</span>
    </div>

    <ul class="mt-8">

        <li>
            <a href="#" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </span>
                <span class="flex-grow">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="flex-grow">Announcements</span>
            </a>
        </li>

        <li>
            <a href="#" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="flex-grow">Events</span>
            </a>
        </li>

        <li x-data="toggler">
            <button @click="toggle" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                </span>
                <span class="flex-grow text-left">Faculty</span>
            </button>
            <div class="text-gray-400" x-show="open" x-collapse>
                <a class="block hover:text-white py-2 pl-12 text-sm" href="#">Faculty Teachers</a>
                <a class="block hover:text-white py-2 pl-12 text-sm" href="#">Pending Registrations</a>
            </div>
        </li>

        <li>
            <a href="#" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </span>
                <span class="flex-grow">Students</span>
            </a>
        </li>

        <li x-data="{open: false}">
            <button @click="open = !open" class="nav-link" href="#">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                </span>
                <span class="flex-grow text-left">Classes</span>
            </button>
            <div class="text-gray-400" x-show="open" x-collapse>
                <a class="block hover:text-white py-2 pl-12 text-sm" href="#">View All Classes</a>
                <a class="block hover:text-white py-2 pl-12 text-sm" href="#">Manage Subjects</a>
            </div>
        </li>

    </ul>

</aside>