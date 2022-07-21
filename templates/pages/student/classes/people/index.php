<?php $this->layout('layouts::student/index') ?>

<?= $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->data('students', $students) ?>
<?= $this->end() ?>

<div class="content-container">
    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'student', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">Students</h4>
        </div>

        <div class="p-4" x-data="{students: window.students}">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="students.length === 0">
                            <tr>
                                <td>No students enrolled in this class</td>
                            </tr>
                        </template>
                        <template x-for="student of students">
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img :src="student.avatar" :alt="`Avatar of ${student.fullname}`" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold" x-text="student.fullname"></div>
                                            <div class="text-sm opacity-50" x-text="student.email"></div>
                                        </div>
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