<!doctype html>
<html lang="en">

<head>
    <title>Inventaris Stti Niit I-Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/jpeg" href="assets/images/i-tech.jpeg">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/dist/css/login.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Inventaris Kampus</h2>
                    <h2 class="heading-section">STTI NIIT I-TECH</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <h3 class="mb-4">Silahkan Login</h3>
                                    <?php if (session()->getFlashdata('message')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('message') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <form action="<?= base_url('login') ?>" method="post" class="signin-form">
                                <?= csrf_field(); ?>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="username" autocomplete="off">
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password" autocomplete="off">
                                    <label class="form-control-placeholder mt-1" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>