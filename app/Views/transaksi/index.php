<?= $this->extend('layout/app') ?>

<!-- konten title -->
<?= $this->section('title') ?>
<title>Home &mdash; SIMS PPOB</title>
<?= $this->endSection()?>



<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <!-- <h5 class="text-grey">Pembayaran Listrik</h5> -->
        <h1 class="mb-4" style="display: inline;"><strong>Semua Transaksi</strong></h1>

        <div class="table-responsive">
            <table class="col-12" style="border: none;">
                <?php 
                foreach ($transactions as $value): 
                ?>
                <tr>
                    <td>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php if($value->transaction_type == "PAYMENT") { ?>
                                        <h5 class="text-danger"><strong>- <?php echo $value->total_amount ?></strong></h5>
                                        <?php }else{ ?>
                                        <h5 class="text-success">+ <strong><?php echo $value->total_amount ?></strong></h5>
                                        <?php } ?>
                                        <span class="text-grey font-size-10px"><?php echo date('d F Y H:i', strtotime($value->created_on)) ?> WIB</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="float-end">
                                            <span class="font-size-13px"><?php echo $value->description ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- add space bsnp -->
                <tr>
                    <td>
                        <div class="d-flex justify-content-center mb-3 mt-3">
                            <span class="text-center text-danger"><strong></strong></span>
                        </div>
                    </td>
                </tr>
                <?php
                endforeach; 
                ?>

                <tr>
                    <td>
                        <div class="d-flex justify-content-center mb-3 mt-3">
                            <span id="showMoreButton" class="text-center text-danger pointer" style="cursor: pointer;"><strong>Show More</strong></span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection()?>