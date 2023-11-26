<!-- dashboard extend dengan template -->
<?= $this->extend('layout/app') ?>

<!-- konten title -->
<?= $this->section('title') ?>
<title>Home &mdash; SIMS PPOB</title>
<?= $this->endSection()?>


<style>
.inline_banner {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.inline_banner img {
    width: 100%;
    height: 100%;
}

/* inline */
.inline {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
</style>

<!-- konten dashboard -->
<?= $this->section('content') ?>

<div class="container">

    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <?php foreach($services as $row) { ?>
                    <td>
                        <div class="card border-0" style="width: 6rem;">
                            <a href="<?= site_url($row->service_code . '/index');  ?>" style="text-decoration: none; color: inherit;">
                                <img src="<?= $row->service_icon ?>" class="card-img-top" alt="<?= $row->service_name ?>">
                                <div class="card-body" style="text-align: center;">
                                    <p class="card-title" style="font-size: 10px;"><?= $row->service_name ?></p>
                                </div>
                            </a>
                        </div>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="mt-3 mx-3">
        <h6 class="text-grey"><strong>Temukan promo yang menarik</strong></h6>

        <div class="table-responsive ">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <?php foreach($banner as $row) { ?>
                        <td>
                            <div class="card border-0" style="width: 15rem;">
                                <img src="<?= $row->banner_image ?>" class="card-img-top" alt="<?= $row->banner_name ?>">
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>



</div>
<?= $this->endSection()?>