<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>
<style>
div.dataTables_wrapper {
    width: 1000px;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 80px;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>./assets/templates/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- SIDEBAR -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-12">
                            <div class="card">
                                <?php foreach ($dataqr as $qr) : ?>
                                <?php
									$url_view = 'http://localhost/ci_rizal/Home/renderqr/' . $qr->id_produk;
									$qrcode = 'https://chart.googleapis.com/chart?chs=350x350&cht=qr&chl=' . $url_view . '&choe=UTF-8';
									?>
                                <center>
                                    <img src="<?= $qrcode; ?>">

                                </center>
                                <center>

                                    <a href="http://" class="btn btn-primary col-sm-3"
                                        style="margin-bottom: 20px;">Export</a>
                                </center>
                                <center>
                                    <table class="table table-bordered">
                                        <tr>

                                        </tr>
                                    </table>
                                    Id Barang: <?php echo $qr->id_produk; ?>
                                    <br>
                                    Kode Barang: <?php echo $qr->kode_produk; ?>
                                </center>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





</body>











































</html>