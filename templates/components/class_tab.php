<?php
$isActive = fn ($page) => (
    $page === $active ? 'tab-active' : ''
);
?>

<div class="tabs mt-4">
    <a href="<?= route('teacher/classes/view', $class) ?>" class="tab tab-lifted <?= $isActive('lesson') ?>">Lessons</a>
    <a href="<?= route('teacher/classes/works', $class) ?>" class="tab tab-lifted <?= $isActive('work') ?>">Classworks</a>
    <a href="<?= route('teacher/classes/students', $class) ?>" class="tab tab-lifted <?= $isActive('student') ?>">Students</a>
    <a class="tab tab-lifted">Files</a>
    <a class="tab tab-lifted">Info</a>
</div>
