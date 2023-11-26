<?= $this->extend('layout/app') ?>

<!-- konten title -->
<?= $this->section('title') ?>
<title>Home &mdash; SIMS PPOB</title>
<?= $this->endSection()?>



<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <h5 class="text-grey">Pembayaran Listrik</h5>
        <h1 class="mb-4" style="display: inline;"><img src="/assets/img/Listrik.png" class="card-img-top" style="width: 50px; height: 50px; display: inline;"><strong>Listrik Prabayar</strong></h1>
        <!-- Flashdata from session()->setFlashdata() -->
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('warning'); ?>
            <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <div class="table-responsive">
            <form class="mt-5" action="<?= site_url('PLN/create'); ?>" method="POST" id="listrik_create">
                <?= csrf_field()?>
                <table class="col-12" style="border: none;">
                    <tr>
                        <td>
                            <?php foreach($services as $row) { ?>
                            <?php 

                                    
                                    if($row->service_code == 'PLN') {
                                        $harga = $row->service_tariff;
                                        // $harga berformat 10000, saya maunya seperti rupiah 10.000
                                        $harga = number_format($harga, 0, ',', '.');
                                        
                                    } else {
                                        null;
                                    }
                                ?>

                            <?php } ?>

                            <input type="text" value="PLN" name="service_code" hidden>

                            <input id="input_listrik" oninput="this.value=this.value.replace(/[^0-9]/g,'');" type="number" name="bayar" class="form-control custom-form text-black-50 mb-4" placeholder="Masukan nominal Pembayaran"
                                aria-label="listrik" aria-describedby="topup" style="height: 47px;" value="<?php echo $harga ?>" disabled>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class=" btn btn-danger btn-lg col-12 mb-2" id="button_bayar"><strong>Bayar</strong></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>