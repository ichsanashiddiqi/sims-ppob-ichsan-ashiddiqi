<?= $this->extend('layout/akun') ?>

<!-- konten title -->
<?= $this->section('title') ?>
<title>Home &mdash; SIMS PPOB</title>
<?= $this->endSection()?>



<?= $this->section('content') ?>

<div class="container">
    <div class="row">

        <div class="row mt-4">
            <!-- Flashdata from session()->setFlashdata() -->
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('warning'); ?>
                <button type="button" class="close btn-close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
            <?php endif; ?>
        </div>



        <div class="table-responsive">
            <?php 
                foreach ($profile as $key => $value): 

                    if ($key === 'profile_image') {
                        $img = $value;
                    }
                    
                endforeach; 

            ?>

            <table class="col-8 mx-auto" style="border: none;">
                <form class="mt-5" action="<?= site_url('auth/updateimage'); ?>" method="POST" id="formUpdateImgProfile" enctype="multipart/form-data">
                    <?= csrf_field()?>
                    <tr>
                        <td>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <img id="button_upload" src="<?php echo $img ?>" onerror="this.src='/assets/img/Profile_photo.png'" class="rounded-circle img-preview" width="128" height="128" />
                                    <span class="position-absolute bottom-0 start-50 translate-left-x ms-4">
                                        <a href="#" class="text-decoration-none" id="submitUpdateImgProfile">
                                            <i class="bi bi-pencil rounded-circle p-2 text-secondary" style="background-color: white;"></i>
                                        </a>
                                    </span>
                                </div>




                                <div class="mt-2">
                                    <!-- ini adalah tombol upload yg ketika diklik akan mengeluarkan input file -->
                                    <!-- disini tidak pakai button, tapi pakai span agar tidak terdeteksi oleh form action -->
                                    <input type="file" class="form-control" id="foto_profil" name="img_upload" onchange="previewImg()" hidden>
                                </div>
                                <!-- <small>Agar tidak gagal upload, masukkan foto profil dengan ukuran tidak lebih dari 100KB didalam format jpg/jpeg/png.</small> -->
                            </div>
                        </td>
                    </tr>
                </form>

                <form class="mt-5" action="<?= site_url('auth/update'); ?>" method="POST" id="">
                    <?= csrf_field()?>
                    <tr>
                        <td>
                            <?php 
                                $fullName = '';
                                foreach ($profile as $key => $value): 
                                    if ($key === 'first_name') {
                                        $fullName .= $value;
                                    }

                                    if ($key === 'last_name') {
                                        $fullName .= ' ' . $value;
                                    }

                                    
                                endforeach; 

                            ?>
                            <div class="mt-3 d-flex justify-content-center">
                                <h3><strong><?= $fullName ?></strong></h3>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                $fullName = '';
                                foreach ($profile as $key => $value): 

                                    if ($key === 'email') {
                                        $email = $value;
                                    }

                                    if ($key === 'first_name') {
                                        $firstName = $value;
                                    }

                                    if ($key === 'last_name') {
                                        $lastName = $value;
                                    }

                                    
                                endforeach; 

                            ?>
                            <div class="form-group has-icon-left mb-4">
                                <label for="name" style="font-weight: bold">Email</label>
                                <div class="position-relative">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text form-control-icon">
                                                @
                                            </div>
                                        </div>
                                        <input type="text" id="name" class="form-control" placeholder="<?= $email ?>" name="name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left mb-4">
                                <label for="name" style="font-weight: bold">Nama Depan</label>
                                <div class="position-relative">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="name" class="form-control" placeholder="<?= $firstName ?>" name="first_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left mb-4">
                                <label for="name" style="font-weight: bold">Nama Belakang</label>
                                <div class="position-relative">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="name" class="form-control" placeholder="<?= $lastName ?>" name="last_name">
                                    </div>
                                </div>
                            </div>




                            <button class=" btn btn-outline-danger btn-lg col-12 mb-2" id="" type="submit"><strong>Edit Profile</strong></button>
                </form>


                <form action="<?= site_url('auth/logout'); ?>" method="POST">
                    <?= csrf_field()?>
                    <button class="btn btn-danger btn-lg col-12 mb-2" type="submit"><strong>Logout</strong></button>
                </form>
                </td>
                </tr>
            </table>

        </div>
    </div>

</div>
<?= $this->endSection()?>