<style>
.background-red {
    background-color: #FF0000;
    /* add background img from public/assets/img/Background Saldo.png*/
    background-image: url("<?= base_url('assets/img/Background Saldo.png') ?>");
    background-repeat: no-repeat;
    background-size: cover;

}

.font-size-15px {
    font-size: 15px;
}

.pointer {
    cursor: pointer;
}

.max-width-180px {
    max-width: 180px;
}
</style>

<header class="mx-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <!-- make table without border -->
                <table class="">
                    <tbody>
                        <tr>
                            <td>
                                <?php 
                                    $imageUrl = base_url('assets/img/Profile_photo.png'); // Set a default value

                                    if (is_array(session()->profile) || is_object(session()->profile)) {
                                        foreach (session()->profile as $key => $value) {
                                            if ($key === 'profile_image') {
                                                if ($value === "https://minio.nutech-integrasi.app/take-home-test/null") {
                                                    $imageUrl = base_url('assets/img/Profile_photo.png');
                                                } else {
                                                    $imageUrl = $value;
                                                }
                                            }
                                        }
                                    }

                                ?>

                                <!-- Display the image outside of PHP tags -->
                                <img src="<?= $imageUrl ?>" alt="Profile" class="rounded-circle" width="128" height="128"><br>

                                <!-- add space -->
                                <br>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <h5>Selamat Datang,</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                                    $fullName = ''; // Initialize an empty variable
                                    if ((is_array(session()->profile) || is_object(session()->profile))):
                                    foreach (session()->profile as $key => $value): 
                                        // Check if the key is 'first_name'
                                        if ($key === 'first_name') {
                                            $fullName .= $value; // Concatenate the first name to the variable
                                        }

                                        // Check if the key is 'last_name'
                                        if ($key === 'last_name') {
                                            $fullName .= ' ' . $value; // Concatenate a space and the last name to the variable
                                        }
                                    endforeach; 
                                    endif;
                                ?>


                                <h1><strong><?= $fullName ?></strong></h1>


                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>


            <div class="col-md-8">
                <div class="card w-200 background-red">
                    <div class="card-body">
                        <span class="text-white font-size-15px"><strong>Saldo anda</strong></span>
                        <div class="d-flex mt-2">
                            <h3 class="text-white mr-2">Rp&nbsp;</h3>
                            <h6 class="text-white mt-2 ml-2" id="saldo">
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2 mr-1"></i>
                                <i class="bi bi-circle-fill mt-2"></i>
                            </h6>

                            <div class="text-white mt-2 ml-2">
                                <h3 id="saldo_hide" class="text-white mr-4" style="display: none;">
                                    <strong><text id="isi_saldo"></text></strong>
                                </h3>
                            </div>

                        </div>
                        <div class="d-flex mt-2" id="div_saldo">
                            <span class="text-white mr-3 font-size-15px"><strong>Lihat Saldo <i class="bi bi-eye" id="show_saldo" onclick="showSaldo()"></i></strong></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>