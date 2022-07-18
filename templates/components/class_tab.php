<?php
$isActive = fn ($page) => (
    $page === $active ? 'tab-active' : ''
);
$role = auth()->role();
?>

<div class="tabs mt-4">
    <a href="<?= route("$role/classes/view", $class) ?>" class="tab tab-lifted <?= $isActive('lesson') ?>">Lessons</a>
    <a href="<?= route("$role/classes/works", $class) ?>" class="tab tab-lifted <?= $isActive('work') ?>">Classworks</a>
    <a href="<?= route("$role/classes/students", $class) ?>" class="tab tab-lifted <?= $isActive('student') ?>">Students</a>
    <a href="<?= route("$role/classes/files", $class) ?>" class="tab tab-lifted <?= $isActive('files') ?>">Files</a>
    <a class="tab tab-lifted">Info</a>
</div>
