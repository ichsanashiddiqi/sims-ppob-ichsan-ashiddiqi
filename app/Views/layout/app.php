<!DOCTYPE html>
<html lang="en">

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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?= $this->include('layout/navbar') ?>
    <?= $this->include('layout/header') ?>

    <!-- content -->
    <main class="content">
        <!-- konten dinamis -->
        <?= $this->renderSection('content') ?>
    </main>

    <!-- script -->

    <!-- jquery js -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- pilihan tombol topup -->
    <script>
    const topupButtons = document.querySelectorAll('[data-topup]');

    topupButtons.forEach(button => {
        button.addEventListener('click', () => {
            const topupValue = button.dataset.topup;
            const inputTopup = document.getElementById('input_topup');
            inputTopup.value = topupValue;
        });
    });
    </script>

    <!-- disabled tombol topup ketika kurang dari 10000 atau melebihi 1000000 -->
    <script>
    const inputTopup = document.getElementById('input_topup');
    const buttonTopup = document.getElementById('button_topup');

    inputTopup.addEventListener('input', () => {
        const inputValue = parseInt(inputTopup.value);
        if (inputValue < 10000) {
            buttonTopup.disabled = true;
        } else {
            buttonTopup.disabled = false;
        }


    });
    </script>

    <!-- submit topup -->
    <script>
    document.querySelectorAll('.btn-outline-secondary').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // agar button lain tidak bekerja ketika submit
        });
    });
    </script>

    <!-- show saldo -->
    <script>
    function showSaldo() {
        var saldoElement = document.getElementById("saldo");
        var saldoHideElement = document.getElementById("saldo_hide");

        // Toggle visibility
        if (saldoElement.style.display !== "none") {
            saldoElement.style.display = "none";
            saldoHideElement.style.display = "block";
        } else {
            saldoElement.style.display = "block";
            saldoHideElement.style.display = "none";
        }
    }

    // Add click event listener to starIcon
    var starIconElement = document.getElementById("starIcon");
    starIconElement.addEventListener("click", showSaldo);
    </script>

    <!-- get balance -->
    <script>
    var url = "<?php echo site_url('balance/index'); ?>";

    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function(jsonResponse) {
            var balance = jsonResponse.data.balance;

            $("#isi_saldo").text(balance);
        },
        error: function(xhr, status, error) {
            console.error('Gagal mengambil data saldo. Status:', xhr.status);
        }
    });
    </script>

    <!-- close alert -->
    <script>
    // Close alert when close button is clicked
    document.querySelectorAll('.alert .close').forEach(function(closeBtn) {
        closeBtn.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    });
    </script>

    <!-- script preview gambar -->
    <script>
    function previewImg() {
        // ambil image-nya
        const imgPreview = document.querySelector('.img-preview');
        // ambil file yg diupload (di tag input wajib set id='foto_profil')
        const fileImage = new FileReader();
        fileImage.readAsDataURL(foto_profil.files[0]);
        // ganti preview-nya
        fileImage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    </script>

    <!-- script agar ketika tag span diklik maka yg keluar adalah input file (yg terhidden) -->
    <!-- script ini digunakan di tombol upload di user -->
    <script>
    document.getElementById('button_upload').addEventListener('click', openDialog);

    function openDialog() {
        document.getElementById('foto_profil').click();
    }
    </script>

    <!-- show more -->
    <script>
    document.getElementById('showMoreButton').addEventListener('click', function() {
        var currentURL = window.location.href;

        var lastIndex = currentURL.lastIndexOf('/');
        var currentNumber = parseInt(currentURL.substring(lastIndex + 1));

        var newNumber = currentNumber + 1;
        var newURL = currentURL.substring(0, lastIndex + 1) + newNumber;

        window.location.href = newURL;
    });
    </script>



</body>

</html>