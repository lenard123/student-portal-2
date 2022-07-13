<?php
$isActive = fn ($page) => (
    $page === $active ? 'tab-active' : ''
);
?>

<div class="tabs mt-4">
    <a href="<?= route('teacher/classes/view', $class) ?>" class="tab tab-lifted <?= $isActive('lesson') ?>">Lessons</a>
    <a class="tab tab-lifted">Classworks</a>
    <a class="tab tab-lifted">People</a>
    <a class="tab tab-lifted">Files</a>
</div>