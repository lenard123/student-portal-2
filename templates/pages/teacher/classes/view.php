<?php $this->layout('layouts::teacher/index') ?>

<div class="p-8">

    <?= view()->start('components::header', ['title' => $class->name . ' | ' . $class->code]) ?>
    <a href="<?= route('teacher') ?>" class="btn btn-outline btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
        </svg>
        Back to List of Classes
    </a>
    <?= view()->end() ?>

    <?= view()->components('class_tab')->render(['active' => 'lesson', 'class' => $class]) ?>
    <div class="bg-white rounded shadow h-full">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">List of Lessons</h4>

            <a href="<?= route('teacher/classes/create-lesson', $class) ?>" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add New Lesson
            </a>

        </div>

        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-20">#</th>
                            <th>Title</th>
                            <th class="w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($class->lessons->isEmpty()) : ?>
                            <tr>
                                <td colspan="3">No Lessons added yet</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($class->lessons as $lesson) : ?>
                                <tr>
                                    <td><?= $lesson->created_at->diffForHumans() ?></td>
                                    <td><?= $lesson->title ?></td>
                                    <td>
                                        <a href="">View</a>
                                        <a href="">Edit</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>