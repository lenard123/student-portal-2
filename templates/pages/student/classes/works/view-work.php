<?php $this->layout('layouts::student/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->lib('axios') ?>
<?= view()->data('work', $work) ?>
<?= view()->data('class', $class) ?>
<?= view()->data('submitted', $submitted) ?>
<?= view()->js('submitWork') ?>
<?php $this->end() ?>

<div class="content-container">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full" x-data="{work: window.work}">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <div>
                <h4 class="uppercase" x-text="work.title"></h4>
                <div class="text-light text-sm text-gray-600">
                    Posted: <span x-text="moment(work.created_at).fromNow()"></span>
                </div>
                <div class="text-light text-sm text-gray-600">
                    Deadline: <span x-text="!work.deadline ? 'No Deadline' : moment(work.deadline).fromNow()"></span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="Prose" x-html="work.instruction"></div>
        </div>
    </div>

    <div class="bg-white rounded shadow h-full mt-4">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4>Submitted Works</h4>
        </div>

        <div class="p-4" x-data="submitWork()">

            <div>
                <p>Status: <span x-text="submitted.status"></span></p>
            </div>

            <div class="mt-4 overflow-x-auto">
                <table class="table w-full">

                    <thead>
                        <tr>
                            <th class="w-full">Name</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="files.length === 0">
                            <tr>
                                <td colspan="3">No files added</td>
                            </tr>
                        </template>
                        <template x-for="file in files" :key="file.id">
                            <tr>
                                <td x-show="isFileLoading(file)" colspan="3"><span x-text="file.status"></span> <span x-text="file.name"></span></td>
                                <td x-show="!isFileLoading(file)" class="flex items-center gap-1">
                                    <span class="text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span x-text="file.name"></span>
                                </td>
                                <td x-show="!isFileLoading(file)" x-text="window.humanFileSize(file.size)"></td>
                                <td x-show="!isFileLoading(file)">
                                    <div class="flex gap-2">

                                        <a :href="window.api('work/files', {id:window.submitted.id, file:file.id})" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                        </a>

                                        <a @click="handleRemoveAttachment(file)" x-show="!submitted.is_submitted" class="border border-red-200 bg-red-100 p-2 rounded-full text-red-400 hover:bg-red-400 hover:text-white hover:border-red-400 transition-all cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-end gap-4">
                <label x-show="!submitted.is_submitted" class="btn btn-outline">
                    Add File
                    <input @change="uploadFile" type="file" class="hidden" />
                </label>
                <button x-show="!submitted.is_submitted" x-loading="submitWork.isLoading" @click="handleSubmit" class="btn btn-primary">Submit Work(s)</button>
                <button x-show="submitted.is_submitted" x-loading="unSubmitWork.isLoading" @click="handleUnsubmit" class="btn btn-outline">Unsubmit</button>
            </div>

        </div>

    </div>

</div>