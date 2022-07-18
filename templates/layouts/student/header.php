<header class="h-16 bg-white sticky top-0 shadow flex justify-end flex-shrink-0 z-20">

    <div 
        @click.outside="open = false" 
        :class="open ? 'dropdown-open': 'dropdown-close'" 
        class="dropdown dropdown-end" 
        x-data="{open: false}"
        >

        <button tabindex="1" @click="open = !open" class="h-full px-4 border-l border-gray-300 flex items-center gap-2">
            <div class="avatar">
                <div class="w-12 rounded-full">
                    <img :src="window.user.avatar" />
                </div>
            </div>

            <div class="flex flex-col items-start">
                <span class="font-semibold text-base" x-text="window.user.fullname"></span>
                <span class="text-sm text-gray-500">Student</span>
            </div>

            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>

        </button>

        <ul x-cloak class="dropdown-content divide-y menu p-2 shadow bg-base-100 w-52 mr-2">
            <li><a>Account Settings</a></li>
            <li @click="$refs.logoutForm.submit()">
                <form x-ref="logoutForm" method="POST" action="<?= route('logout') ?>">
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>

    </div>
</header>