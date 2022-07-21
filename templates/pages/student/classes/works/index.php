<?php $this->layout('layouts::student/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->data('works', $works) ?>
<?php $this->end() ?>


<div class="content-container">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>


    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>


    <div class="bg-white rounded shadow h-full" x-data="classWorks(window.works)">

        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">List of Classworks</h4>
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
                                        <span class="font-semibold">Status: </span>
                                        <span>Pending</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex gap-2">

                                        <a :href="window.route('student/classes/view-work', {id: work.id})" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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