<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->lib('axios') ?>
<?= view()->data('work', $work) ?>
<?= view()->js('viewWork') ?>
<?php $this->end() ?>

<div class="content-container" x-data="{
        work: window.work
    }">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full">
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

        <div class="p-4">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="w-full">Name</th>
                            <th>Grade</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="work.submitted.length === 0">
                            <tr>
                                <td colspan="4">No students have submitted yet.</td>
                            </tr>
                        </template>
                        <template x-for="submit of work.submitted">
                            <tr x-data="{open: false}">
                                <td colspan="4">
                                    <div class="flex gap-4">
                                        <div class="align-top">
                                            <div class="py-2">
                                                <button x-show="!open" @click="open = true" class="bg-orange-200 text-orange-400 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button x-show="open" @click="open = false" class="bg-orange-400 text-white rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex items-center space-x-3">
                                                <div class="avatar">
                                                    <div class="mask mask-squircle w-12 h-12">
                                                        <img :src="submit.student.avatar" :alt="`Avatar of ${submit.student.fullname}`" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-bold" x-text="submit.student.fullname"></div>
                                                    <div class="text-sm opacity-50" x-text="submit.student.email"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div x-text="submit.grade || 'Not Graded'"></div>

                                        <div class="w-1/5 text-right" x-text="moment(submit.updated_at).fromNow()"></div>

                                    </div>

                                    <div x-show="open" x-collapse class="mt-2 flex flex-col py-2 gap-y-2 divide-y">
                                        <template x-for="file of submit.attachments">
                                            <div class="flex flex-col p-2">
                                                <div class="flex justify-between">
                                                    <div x-text="file.name"></div>
                                                    <a :href="window.api('work/files', {id:submit.id, file:file.id})" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </template>
                                        <div class="p-2" x-show="submit.attachments.length === 0">
                                            No files added
                                        </div>

                                        <template x-if="open">
                                            <div class="pt-4 flex flex-col gap-2" x-data="updateGrade(submit)">
                                                <div class="relative z-0 w-full group">
                                                    <input x-model="grade" type="text" name="floating_grade" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                                    <label for="floating_grade" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Grade</label>
                                                </div>
                                                <button @click="handleSubmit" x-loading="updateGrade.isLoading" class="self-end btn btn-primary">Submit</button>
                                            </div>
                                        </template>
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