<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
    <?= view()->lib('axios') ?>
    <?= view()->js('createClass') ?>
<?php $this->end() ?>

<div class="p-8">

    <?= view()->start('components::header', ['title' => 'Add New Clas']) ?>
    <a href="<?= route('teacher') ?>" class="btn btn-outline btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
        </svg>
        Back to List of Classes
    </a>
    <?= view()->end() ?>

    <div x-data="createClass" class="bg-white rounded shadow mt-4">
        <div class="p-4 border-b border-gray-300">
            <h4 class="uppercase">Enter Class Information</h4>
        </div>
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="max-w-lg mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-5 mb-4 items-start">
                    <label class="label sm:w-1/5">
                        <span class="label-text">Class Name: </span>
                    </label>
                    <input x-model="data.name" class="input input-bordered col-span-4" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-5 mb-4 items-start">
                    <label class="label">
                        <span class="label-text">Grade Level: </span>
                    </label>
                    <!-- <input class="input input-bordered col-span-4" required> -->
                    <select x-model="data.grade" class="input input-bordered col-span-4" required>
                        <?php foreach($levels as $level) : ?>
                        <option value="<?= $level->id ?>"><?= $level->level ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-5 mb-4 items-start">
                    <label class="label">
                        <span class="label-text">Section</span>
                    </label>
                    <input x-model="data.section" class="input input-bordered col-span-4" required>
                </div>

                <div class="mb-4 grid grid-cols-1 sm:grid-cols-5">
                    <button :class="{loading: createClass.isLoading}" class="btn btn-primary col-start-2 col-span-full">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>