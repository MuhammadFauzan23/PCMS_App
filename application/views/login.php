<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('vendor/template') ?>/login/css/style.css">
</head>
<style>
    body {
        background: #456;
        font-family: 'Open Sans', sans-serif;
    }

    .login {
        width: 400px;
        margin: 16px auto;
        font-size: 16px;
    }

    /* Reset top and bottom margins from certain elements */
    .login-header,
    .login p {
        margin-top: 0;
        margin-bottom: 0;
    }

    .login-header {
        background: #28d;
        padding: 20px;
        font-size: 1.4em;
        font-weight: normal;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
    }

    .login-container {
        background: #ebebeb;
        padding: 12px;
    }

    /* Every row inside .login-container is defined with p tags */
    .login p {
        padding: 12px;
    }

    .login input {
        box-sizing: border-box;
        display: block;
        width: 100%;
        border-width: 1px;
        border-style: solid;
        padding: 16px;
        outline: 0;
        font-family: inherit;
        font-size: 0.95em;
    }

    .login input[type="email"],
    .login input[type="password"] {
        background: #fff;
        border-color: #bbb;
        color: #555;
    }

    /* Text fields' focus effect */
    .login input[type="email"]:focus,
    .login input[type="password"]:focus {
        border-color: #888;
    }

    .login input[type="submit"] {
        background: #28d;
        border-color: transparent;
        color: #fff;
        cursor: pointer;
    }

    .login input[type="submit"]:hover {
        background: #17c;
    }

    /* Buttons' focus effect */
    .login input[type="submit"]:focus {
        border-color: #05a;
    }
</style>

<body>
    <div class="login">
        <h2 class="login-header">Form Login</h2>
        <form action="<?php echo base_url('index.php/Auth/proses_login') ?>" method="POST" class="login-container">
            <p>
                <input type="text" id="username" value="<?= set_value('username') ?>" name="username" placeholder="Username">
            </p>
            <p>
                <input type="password" id="password" value="<?= set_value('password') ?>" name="password" placeholder="Password">
            </p>
            <p>
                <input type="submit" value="Log in">
            </p>
        </form>
    </div>
</body>
<script src="<?= base_url('vendor/template') ?>/login/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('vendor/template') ?>/login/js/popper.min.js"></script>
<script src="<?= base_url('vendor/template') ?>/login/js/bootstrap.min.js"></script>
<script src="<?= base_url('vendor/template') ?>/login/js/main.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('vendor/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    <?php $pesan = $this->session->flashdata('pesan') ?>
    $(function() {
        <?php if ($pesan) { ?>
            <?php if ($pesan['stts'] != true) { ?>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '<?= $pesan['msg'] ?>',
                    timer: 1500,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    showConfirmButton: false,
                })
            <?php } else { ?>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Proses berhasil!',
                    text: '<?= $pesan['msg'] ?>',
                    timer: 1500,
                    showClass: {
                        popup: 'animate__animated animate__fadeInUp'
                    },
                    showConfirmButton: false,
                })
        <?php }
        } ?>
    });
</script>

</html>