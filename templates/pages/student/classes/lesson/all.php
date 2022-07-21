<?php $this->layout('layouts::student/index') ?>

<div class="p-8">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'lesson', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">List of Lessons</h4>
        </div>

        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-20">Posted</th>
                            <th>Title</th>
                            <th class="w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <?php if ($class->lessons->isEmpty()) : ?>
                            <tr>
                                <td colspan="3">No Lessons added yet</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($class->lessons as $lesson) : ?>
                                <tr>
                                    <td><?= $lesson->created_at->diffForHumans() ?></td>
                                    <th><?= $lesson->title ?></th>
                                    <td>
                                        <div  class="flex gap-2">
                                            <a href="<?= route('student/classes/view-lesson', $lesson) ?>" class="border border-green-200 bg-green-100 p-2 rounded-full text-green-400 hover:bg-green-400 hover:text-white hover:border-green-400 transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
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