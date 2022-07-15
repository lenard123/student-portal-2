<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
    <?= view()->lib('axios') ?>
    <?= view()->lib('tinymce') ?>
    <?= view()->js('util') ?>
    <?= view()->js('createWork') ?>
    <?= view()->data('class', $class) ?>
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


    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>


    <div class="bg-white rounded shadow h-full">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4 class="uppercase">Add New Classwork</h4>
        </div>

        <div class="p-4">

            <form @submit.prevent="handleSubmit" x-data="createWork(window.class)" class="max-w-2xl mx-auto">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Title</span>
                    </label>
                    <input x-model="data.title" type="text" class="input input-bordered" required>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Deadline</span>
                    </label>
                    <input min="<?= date('Y-m-d') ?>" x-model="data.deadline" type="date" class="input input-bordered">
                </div>

                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Instruction</span>
                    </label>
                    <textarea x-ref="instruction"></textarea>
                </div>

                <div class="flex justify-end mt-4">
                    <button :class="{loading: createWork.isLoading}" type="submit" class="btn btn-primary px-6">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>