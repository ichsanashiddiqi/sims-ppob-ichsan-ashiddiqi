<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>SIMS PPOB Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <script type="text/javascript" src="/assets/vendor/jquery/jquery.js"></script>
    <script src="/assets/vendor/jquery-blockui/jquery.blockUI.js"></script>
    <script src="/assets/vendor/jquery.session.js"></script>
    <script src="/assets/js/helper.js"></script>
    <!-- Custom styles for this template -->
    <link href="/assets/css/login.css" rel="stylesheet">
</head>

<style>
/* custom-label */
.custom-label {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-right-radius: 0;
    /* No border on the right side */
    border-bottom-right-radius: 0;
    /* No border on the right side */
    border-right: 0;
    background-color: #fff;
    color: #495057;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    text-align: center;
    white-space: nowrap;
}

/* custom form without left border */
.custom-form {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-left: 0;
}

/* custom form without left & right border */
.custom-form-password {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-left: 0;
    border-right: 0;
}

/* custom-label-password */
.custom-label-password {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-left: 0;
    background-color: #fff;
    color: #495057;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    text-align: center;
    white-space: nowrap;
}

.text-logo {
    font-family: 'Helvetica', serif;
    font-size: 35px;
}
</style>


<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-login w-100 mx-5 px-5">
        <div class="row">
            <div class="col col-left">
                <div class="col-6 align-self-center">
                    <div class="h3 mb-3 fw-normal text-center"><img class="align-middle me-2" src="../assets/img/Logo.png" alt="Logo.png"><span class="align-middle text-logo"><strong class="text-logo">SIMS PPOB</strong></span></div>
                    <h1 class="h3 mb-3 fw-medium text-center"><strong class="text-logo">Masuk atau buat akun untuk memulai</strong></h1>
                    <div class="berhasil-pesan"></div>

                    <form class="mt-5" action="<?= site_url('auth/login'); ?>" method="POST">
                        <?= csrf_field()?>

                        <div class="input-group mb-3">
                            <label class="input-group-text custom-label text-black-50" id="email">@</label>
                            <input type="email" name="email" class="form-control custom-form text-black-50" placeholder="Masukkan email Anda" aria-label="email" aria-describedby="email" value="<?= old('email') ?>">
                        </div>


                        <div class="input-group mb-3">
                            <label class="input-group-text custom-label text-black-50" id="password"><i class="bi bi-lock"></i></label>
                            <input type="password" name="password" class="form-control custom-form-password text-black-50" placeholder="masukan password anda" aria-label="password" aria-describedby="password" value="<?= old('password') ?>">
                            <label class="input-group-text custom-label-password text-black-50" id="password"><i class="bi bi-eye"></i></label>
                        </div>

                        <button class="btn-login btn btn-danger w-100 py-2 mt-4" type="submit">Masuk</button>
                        <p class="my-3 text-body-secondary text-center">Belum punya akun? registrasi <a href="auth/register" target="_self" class="text-danger fw-medium link-underline link-underline-opacity-0"><strong>di
                                    sini</strong></a></p>
                    </form>
                    <div class="error-pesan"></div>
                </div>

            </div>
            <div class="col col-right">
                <img class="thumbnail" src="../assets/img/Illustrasi Login.png" alt="Illustrasi Login.png">
            </div>
        </div>

        <div class="row">
            <!-- add footer -->
            <?php echo view('layout/footer'); ?>
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>