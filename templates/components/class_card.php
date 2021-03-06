<div class="border border-gray-300 rounded" :key="_class.id">
    <img class="h-32 object-cover" :src="_class.cover"/>
    <div class="p-2">
        <a :href="route(`${user.role}/classes/view`, { id: _class.id })" class="font-bold" x-text="_class.name"></a>
        <h6 x-text="_class.section"></h6>
    </div>
    <div class="p-2 flex justify-end">
        <a :href="route(`${user.role}/classes/files`, { id: _class.id })" class="btn btn-ghost btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
        </a>
    </div>
</div>