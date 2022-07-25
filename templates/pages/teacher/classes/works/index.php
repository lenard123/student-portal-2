<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->lib('axios') ?>
<?= view()->js('classWorks') ?>
<?= view()->data('works', $works) ?>
<?php $this->end() ?>


<div class="content-container">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>


    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>


    <div class="bg-white rounded shadow h-full" x-data="classWorks(window.works)">

        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">List of Classworks</h4>

            <a href="<?= route('teacher/classes/create-work', $class) ?>" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add New Classwork
            </a>

        </div>

        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-20">Posted</th>
                            <th>Title</th>
                            <th class="w-40">Info</th>
                            <th class="w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr x-show="works.length === 0">
                            <td colspan="4">No Classwork Posted</td>
                        </tr>
                        <template x-for="work, i of works" :key="work.id">
                            <tr x-show="!work.deleted">
                                <td x-text="moment(work.created_at).fromNow()"></td>
                                <th x-text="work.title"></th>
                                <td>
                                    <div>
                                        <span class="font-semibold">Deadline: </span>
                                        <span x-text="work.deadline ? (new Date(work.deadline)).toLocaleDateString() : 'No deadline'"></span>
                                    </div>
                                    <div>
                                        <span class="font-semibold">Submitted: </span>
                                        <span x-text="work.submitted_count"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex gap-2">

                                        <a :href="window.route('teacher/classes/view-work', {id: work.id})" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <a href="" class="border border-blue-200 bg-blue-100 p-2 rounded-full text-blue-400 hover:bg-blue-400 hover:text-white hover:border-blue-400 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <a @click="confirmDeleteWork(work.id, i)" class="border border-red-200 bg-red-100 p-2 rounded-full text-red-400 hover:bg-red-400 hover:text-white hover:border-red-400 transition-all cursor-pointer">
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
        </div>
    </div>

</div>