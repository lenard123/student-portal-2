<?php $this->layout('layouts::teacher/index') ?>

<div class="p-8">

    <?= view()->start('components::header', ['title' => 'Add New Clas']) ?>
        <a href="<?= route('teacher') ?>" class="btn btn-outline btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
            Back to List of Classes
        </a>
    <?= view()->end() ?>

    <div class="bg-white rounded shadow mt-4">
        <div class="p-4 border-b border-gray-300">
            <h4 class="uppercase">Enter Class Information</h4>
        </div>
        <div class="p-4">
            <form>

            </form>
        </div>
    </div>

</div>