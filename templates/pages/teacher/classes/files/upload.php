<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('axios') ?>
<?= view()->js('uploadFile') ?>
<?= view()->data('class', $class) ?>
<?php $this->end() ?>

<div class="content-container">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'files', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full" x-data="uploadFile">

        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">Upload New File</h4>
        </div>

        <div class="p-4">

            <label class="hover:border-gray-500 cursor-pointer flex items-center justify-center h-32 border-2 border-dashed border-gray-300 text-gray-500 font-semibold text-lg">
                Drop files here
                <input class="hidden" @change="handleChange" type="file" />
            </label>

            <div x-cloak x-show="files.length > 0">
                <h4>Selected Files:</h4>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="w-full">Name</th>
                                <th>FileSize</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="file,i in files">
                                <tr>
                                    <td x-text="file.name"></td>
                                    <td x-text="window.humanFileSize(file.size)"></td>
                                    <td>
                                        <button @click="removeFile(i)" class="rounded-full hover:bg-gray-300 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                    <div class="flex justify-end mt-4">
                        <button x-loading="uploadClassFile.isLoading" @click="handleSubmit" class="btn btn-primary ml-auto">Submit</button>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>