<?php $this->layout('layouts::teacher/index') ?>
<?php $this->start('head') ?>
    <?= view()->lib('axios') ?>
    <?= view()->lib('tinymce') ?>
    <?= view()->js('util') ?>
    <?= view()->js('editLesson') ?>
    <?= view()->data('lesson', $lesson) ?>   
<?php $this->end() ?>

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
            <h4 class="uppercase">Edit Lesson</h4>
        </div>
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="max-w-2xl mx-auto" x-data='editLesson(window.lesson)'>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Title</span>
                    </label>
                    <input type="text" class="input input-bordered" x-model="data.title">
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Description</span>
                    </label>
                    <textarea x-ref="description" x-text="data.description"></textarea>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" :class="{loading:editLesson.isLoading}" class="btn btn-primary px-6">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
