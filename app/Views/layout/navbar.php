<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('home/index'); ?>">
            <img src="<?= base_url('/assets/img/Logo.png') ?>" width="30" height="30" class="d-i`nline-block align-top" alt="">
            <strong>SIMS PPOB</strong>
        </a>

        <div class="float-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-grey" href="<?= site_url('topup/index'); ?>"><strong>Top Up</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-grey" href="<?= site_url('transaction/index/0'); ?>"><strong>Transaction</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-grey" href="<?= site_url('auth/edit'); ?>"><strong>Akun</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>