<style>
/* custom-label */
.custom-label-topup {
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
.custom-form-topup {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-left: 0;
}
</style>


<?= $this->extend('layout/app') ?>

<!-- konten title -->
<?= $this->section('title') ?>
<title>Home &mdash; SIMS PPOB</title>
<?= $this->endSection()?>



<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <h5 class="text-grey">Silahkan Masukan</h5>
        <h1 class="mb-4"><strong>Nominal Top up</strong></h1>

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
            <form class="mt-5" action="<?= site_url('topup/create'); ?>" method="POST" id="topup_create">
                <?= csrf_field()?>
                <table class="col-12" style="border: none;">
                    <tr>
                        <td>
                            <div class="input-group">
                                <label class="input-group-text custom-label text-black-50" id="topup"><i class="bi bi-keyboard"></i></label>
                                <input id="input_topup" oninput="this.value=this.value.replace(/[^0-9]/g,'');" type="number" name="top_up_amount" class="form-control custom-form text-black-50" placeholder="Masukan nominal Top up"
                                    aria-label="topup" aria-describedby="topup" style="height: 47px;" min="10000" max="1000000" onkeyup="if(parseInt(this.value)>1000000){ this.value =1000000; return false; }">
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-lg col-12" disabled style="border: none;"></button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=10000>Rp10.000</button></td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=50000>Rp50.000</button></td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=250000>Rp250.000</button></td>
                    </tr>
                    <tr>
                        <td>
                            <button class=" btn btn-secondary btn-lg col-12 mb-2" id="button_topup"><strong>Top Up</strong></button>
                        </td>
                        <td>
                            <button class=" btn btn-lg col-12" disabled style="border: none;"></button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=20000>Rp20.000</button></td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=100000>Rp100.000</button></td>
                        <td><button class="btn btn-outline-secondary btn-lg col-11 mb-2" data-topup=500000>Rp500.000</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection()?>