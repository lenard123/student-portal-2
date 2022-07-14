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
            <div>
                <h4 class="uppercase"><?= $lesson->title ?></h4>
                <div class="text-light text-sm text-gray-600">Posted: <?= $lesson->created_at->diffForHumans() ?></div>
            </div>
        </div>
        <div class="p-4">
            <div class="Prose">
                <?= $lesson->description ?>
            </div>
        </div>
    </div>
</div>
