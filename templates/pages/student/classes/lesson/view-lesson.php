<?php $this->layout('layouts::student/index') ?>
<div class="p-8">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

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
