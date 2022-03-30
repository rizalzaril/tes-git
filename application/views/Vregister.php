<!-- FLASHDATA JQUERY FAILED VALIDATION -->

<!doctype html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/login_form/css/style.css">

</head>

<body>

    <section class="ftco-section">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <img src="<?= base_url(); ?>assets/foto/bg-register.jpg" class="img card-body"
                            alt="Responsive image" height="500px">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="<?= base_url('Login/register') ?>" class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name"
                                        value="<?php echo set_value('name'); ?>">
                                </div>
                                <?= form_error('name'); ?>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email"
                                        value="<?php echo set_value('email'); ?>">
                                </div>
                                <?= form_error('email'); ?>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password1">
                                </div>
                                <?= form_error('password1'); ?>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password2"
                                        name="password2">
                                </div>
                                <?= form_error('password2'); ?>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-success rounded submit px-3">Sign
                                        Up</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Do Yo Have Account? <a href="<?php echo base_url('Login'); ?>">Login
                                    in Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>































































































<!-- /.login-box -->