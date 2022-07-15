<?php $this->layout('layouts::teacher/index') ?>

<?php $this->start('head') ?>
<?= view()->lib('moment') ?>
<?= view()->data('work', $work) ?>
<?php $this->end() ?>

<div class="content-container">
    
    <?= $this->insert('components/class_header', ['class' => $class]) ?>

    <?= view()->components('class_tab')->render(['active' => 'work', 'class' => $class]) ?>

    <div class="bg-white rounded shadow h-full" x-data="{work: window.work}">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <div>
                <h4 class="uppercase" x-text="work.title"></h4>
                <div class="text-light text-sm text-gray-600">
                    Posted: <span x-text="moment(work.created_at).fromNow()"></span>
                </div>
                <div class="text-light text-sm text-gray-600">
                    Deadline: <span x-text="!work.deadline ? 'No Deadline' : moment(work.deadline).fromNow()"></span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="Prose" x-html="work.instruction"></div>
        </div>
    </div>

    <div class="bg-white rounded shadow h-full mt-4">
        <div class="p-4 border-b border-gray-300 flex justify-between">
            <h4>Submitted Works</h4>
        </div>

        <div class="p-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero fugit eius nulla! Obcaecati, hic necessitatibus modi doloribus adipisci nesciunt fugit culpa ut est quam, mollitia fuga illum iste deleniti quo
        </div>

    </div>

</div>
