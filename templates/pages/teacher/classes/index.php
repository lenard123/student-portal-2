<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
    <?= view()->data('classes', $classes) ?>
<?php $this->end() ?>

<div class="p-8">
    <?= view()->start('components::header', ['title' => 'Clasess']) ?>
        <a href="<?= route('teacher/classes/create') ?>" class="btn btn-outline btn-sm btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add New Class
        </a>
    <?= view()->end() ?>

    <div class="bg-white rounded shadow mt-4">
        <div class="p-4 border-b border-gray-300">
            <h4 class="uppercase">List of Classes</h4>
        </div>

        <div class="p-4">

            <?php if ($classes->isEmpty()) : ?>
                <div class="hero bg-base-100 rounded-lg py-8">
                    <div class="hero-content text-center">
                        <div class="max-w-md">

                            <img class="h-40 mx-auto" src="<?= asset('img/illustrations/no_data.svg') ?>" />

                            <h1 class="text-2xl font-bold mt-4">You don't have any classes</h1>
                            <button for='find-class-modal' class="btn btn-primary mt-4">Create Now</button>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="grid grid-cols-4 gap-4" x-data="{classes: window.classes}">
                    <template x-for="_class in classes">
                        <?= view()->components('class_card') ?>
                    </template>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
