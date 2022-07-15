<?php $this->layout('layouts::teacher/index') ?>
<?php $this->start('head') ?>
    <?= view()->lib('axios') ?>
    <?= view()->lib('tinymce') ?>
    <?= view()->js('util') ?>
    <?= view()->js('editLesson') ?>
    <?= view()->data('lesson', $lesson) ?>   
<?php $this->end() ?>

<div class="p-8">

    <?= $this->insert('components/class_header', ['class' => $class]) ?>

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
