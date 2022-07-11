<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= asset('img/logo.png') ?>" type="image/x-icon">
    <title>Register</title>
    <?= view()->css('main') ?>
    <?= view()->lib('axios') ?>
    <?= view()->lib('alpine') ?>
    <?= view()->js('util') ?>
    <?= view()->js('register') ?>
</head>

<body>
    <?= view()->components('navbar')->render() ?>

    <div x-data="register" class="container py-8" id="login-page">
        <div class="card rounded-none mx-auto max-w-md bg-base-100">
            <div class="card-body">

                <div class="card-title">Register now to be part of our Academy</div>

                <form @submit.prevent="handleSubmit" method="POST">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Register As</span>
                        </label>
                        <select x-model="data.role" class="input input-bordered" required>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Firtname</span>
                        </label>
                        <input x-model="data.firstname" class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Middlename</span>
                        </label>
                        <input x-model="data.middlename" class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Lastname</span>
                        </label>
                        <input x-model="data.lastname" class="input input-bordered" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <select x-model="data.gender" class="input input-bordered" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Birthday</span>
                        </label>
                        <input x-model="data.birthday" class="input input-bordered" required type="date">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input x-model="data.email" class="input input-bordered" type="email" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input x-model="data.password" class="input input-bordered" type="password" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Re-enter Password</span>
                        </label>
                        <input x-model="data.password_confirmation" class="input input-bordered" type="password" required>
                    </div>

                    <div class="form-control mt-4">
                        <button :class="{loading: register.isLoading}" type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</body>

</html>