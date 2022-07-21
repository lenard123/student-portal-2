<?php $this->layout('layouts::student/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->data('files', $files) ?>
<?= view()->data('class', $class) ?>
<?php $this->end() ?>

<div class="content-container">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'files', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full">

        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">Class Files</h4>
        </div>

        <div class="p-4" x-data="{files: window.files}">

            <div class="overflow-x-auto">
                <table class="table w-full">

                    <thead>
                        <tr>
                            <th class="w-full">Name</th>
                            <th>Size</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="files.length === 0">
                            <tr>
                                <td colspan="4">No files added</td>
                            </tr>
                        </template>
                        <template x-for="file in files" :key="file.name">
                            <tr>
                                <td class="flex items-center gap-1">
                                    <span class="text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span x-text="file.name"></span>
                                </td>
                                <td x-text="window.humanFileSize(file.size)"></td>
                                <td x-text="moment(file.last_modified).fromNow()"></td>
                                <td>
                                    <div class="flex gap-2">

                                        <a :href="window.api('class/file', {class:window.class.id, file:file.name})" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>