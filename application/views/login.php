<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Clustering</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('<?= base_url('assets/img/All Logo PNG/bg 1.jpg') ?>');
            background-size: cover;
            background-repeat: no-repeat;
           
        }

        #logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px; /* Lebar logo */
        }
    </style>
</head>

<body>
    <div class="wraper">
        <div class="container">
            <div class="row">
                <img id="logo" src="<?= base_url('assets/img/All Logo PNG/Logo Emblem Pusri Dark.png') ?>" alt="Logo Pusri"> <!-- Logo di pojok kanan atas -->
                        
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mt-4">
                    <section id="login-body" class="pt-3">
                        <div>
                            <center>
                                <span class="card-info text-center" style="color: #FFD700; font-weight: bold; font-size: 24px;">SELAMAT DATANG</span><br>
                                <span class="card-info text-center" style="color: white; font-weight: bold; font-size: 20px;">Warehouse Management Smart Pusri</span>
                            </center>
                        </div>
                        
                        <div class="card border-0 shadow pt-3; mt-5" style="background-color: rgba(255, 255, 255, 0.8);">
                            <div class="card-header bg-transparent border-bottom-0 pb-0 text-center">
                            </div>
                            <div class="card-body">
                                <?php if (@$this->session->error) : ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <button class="close" aria-dismissable="alert">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <p><?= $this->session->error ?></p>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('auth/login') ?>" method="post">
                                <center><span class="card-info text-center" style="font-weight: bold; font-size: 24px;">LOGIN</span></center>
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" name="username" id="username" class="form-control" autocomplete="username" placeholder="Masukan Username anda" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="current-password" placeholder="**********" />
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill" style="background-color: #172B7D;">Login</button>
                                        <center><br><span class="card-info text-center" style="font-weight: bold;">Buat Akun / SignUp</span></br></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
