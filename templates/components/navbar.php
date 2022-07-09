<header class="navbar bg-base-100 shadow-md sticky top-0 z-10">

    <div class="flex-1">

        <a href="<?= url() ?>" class="flex items-center gap-2 text-xl">
            <img src="<?= asset('img/logo.png') ?>" height="36" width="36">
            <!-- <span class="font-semibold">Student Portal</span> -->
        </a>

    </div>

    <nav class="flex-none">
        <ul class="hidden md:flex menu menu-horizontal p-0 mr-8 divide-x">
            <li><a href="<?= url('#home') ?>">Home</a></li>
            <li><a href="<?= url('#about') ?>">About</a></li>
            <li><a href="<?= url('#contact') ?>">Contact</a></li>
        </ul>
        <div class="hidden sm:flex gap-2 items-center">
            <a href="<?= route('login') ?>" class="transition flex items-center gap-2 bg-slate-700 text-white py-2 px-4 font-semibold shadow hover:bg-slate-800 hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="rotate-180 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Login
            </a>

            <a href="<?= url('register.php') ?>" class="transition flex items-center gap-2 bg-orange-500 text-white py-2 px-4 font-semibold shadow hover:bg-orange-600 hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Register
            </a>
        </div>

        <div class="dropdown dropdown-end">
            <label tabindex="0" class="sm:hidden btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                </svg>
            </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="<?= url('login.php') ?>">Login</a></li>
                <li><a href="<?= url('register.php') ?>">Register</a></li>
            </ul>
        </div>



    </nav>

</header>