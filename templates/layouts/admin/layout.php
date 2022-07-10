<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?= view()->css('main') ?>
</head>
<body class="flex admin">

    <?= $this->fetch('layouts::admin/sidebar') ?>

    <div class="flex-grow flex flex-col min-h-screen">

        <?= $this->fetch('layouts::admin/header') ?>

        <div class="flex-grow">
            <?= $this->section('content') ?>
        </div>

    </div>

</body>
</html>