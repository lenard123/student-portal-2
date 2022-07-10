<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= asset('img/logo.png') ?>" type="image/x-icon">
    <title>Login</title>
    <?= view()->css('main') ?>
    <?= view()->lib('axios') ?>
    <?= view()->lib('alpine') ?>
    <?= view()->js('util') ?>
    <?= view()->js('login') ?>
</head>

<body>
    <?= view()->layout('navbar')->render() ?>

    <div x-data="loginPage" class="container py-8" id="login-page">
        <div class="card rounded-none mx-auto max-w-md bg-base-100">
            <div class="card-body">

                <div class="card-title">Login to Student Portal</div>

                <form @submit.prevent="handleSubmit" method="POST">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input x-model="email" :class="{'input-error': login.hasError('email')}" class="input input-bordered" required type="email" name="email">
                        <label class="label" x-show="login.hasError('email')">
                            <span class="label-text-alt text-error" x-text="login.error('email')"></span>
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input x-model="password" class="input input-bordered" required type="password" name="password">
                    </div>

                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Remember me</span>
                            <input type="checkbox" checked="checked" class="checkbox checkbox-xs" />
                        </label>
                    </div>

                    <div class="form-control mt-4">
                        <button type="submit" :class="{'loading': login.isLoading }" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</body>

</html>