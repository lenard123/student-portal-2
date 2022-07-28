<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= asset('img/logo.png') ?>" type="image/x-icon">
    <title>Admin</title>
    <?= view()->lib('alpine/collapse') ?>
    <?= view()->lib('alpine') ?>
    <?= view()->js('util') ?>
    <?= view()->css('main') ?>
    <?= view()->data('user', user()) ?>
</head>
<body class="flex admin">

    <?= $this->fetch('layouts::admin/sidebar') ?>

    <div class="flex-grow flex flex-col h-screen overflow-y-auto">

        <?= $this->fetch('layouts::admin/header') ?>

        <div class="flex-grow">
            <?= $this->section('content') ?>
        </div>

    </div>

</body>
</html>