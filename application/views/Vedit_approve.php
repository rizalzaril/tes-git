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
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>./Logo-masit.png" alt="AdminLTELogo"
                height="100" width="300">
        </div>


        <!-- SIDEBAR -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">



                                <div class="card-header">
                                    <h3 class="card-title"><b>Form Update Data</b></h3>
                                </div>
                                <div class="save-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                </div>
                                <?php if ($this->session->flashdata('pesan')) : ?>

                                <?php endif; ?>
                                <!-- /.card-header -->

                                <!-- FORM UPDATE -->
                                <form action="<?php echo base_url() . 'Home/update_approve'; ?>" method="post">
                                    <div class="card-body col-sm-7">
                                        <div class="container">
                                            <div class="row justify-content-md-center">
                                                <?php foreach ($items_out as $i) :
													$x = $this->Mproduk->getquery("SELECT *
																																FROM barang_keluar bk
																																INNER JOIN produk p
																																ON p.id_produk = bk.id_produk
																																WHERE bk.id_user = '$i->id_user'");

													$u = $this->Mproduk->getquery("SELECT *
																																FROM user u
																																INNER JOIN barang_keluar bk
																																ON bk.id_user = u.id_user
																																WHERE u.id_user = '$i->id_user'");

													$k = $this->Mproduk->getquery("SELECT *
																																FROM barang_keluar bk
																																INNER JOIN kategori k
																																ON k.id_kategori = bk.id_kategori
																																WHERE bk.id_user = '$i->id_user'");

													$st = $this->Mproduk->getquery("SELECT *
																																FROM barang_keluar bk
																																INNER JOIN tb_status st
																																ON st.id_status = bk.id_status
																																WHERE bk.id_user = '$i->id_user'");

												?>
                                                <div class="container">

                                                    <h5 class="card-subtitle mb-2 text-muted">Request Detail
                                                    </h5>
                                                    <p class="card-text" align="left"><b>Nama User:</b>
                                                        <?= $u->name ?></p>
                                                    <p class="card-text" align="left"><b>Nama Barang:</b>
                                                        <?= $x->nama_produk ?>
                                                    </p>
                                                    <p class="card-text" align="left"><b>Kategori:</b>
                                                        <?= $k->nama_kategori ?>
                                                    </p>
                                                    <p class="card-text" align="left"><b>Tanggal:</b>
                                                        <?= $i->tanggal ?></p>
                                                    <p class="card-text" align="left"><b>Keterangan:</b>
                                                        <?= $i->keterangan ?>
                                                    </p>
                                                    <p class="card-text" align="left"><b>Jumlah Permintaan:</b>
                                                        <?= $i->qty_request ?></p>

                                                    <input type="hidden" name="id_bk" <?= $i->id_bk ?>">
                                                    <input type="hidden" name="id_user" <?= $i->id_user ?>">


                                                    <div class="form-group">
                                                        <label for="cari"></label>
                                                        <input type="hidden" class="form-control" id="kodeproduk"
                                                            name="id_bk" value="<?= $i->id_bk ?>" readonly>
                                                    </div>

                                                    <div id="p" class="form-group col-sm-5">
                                                        <label for="cari">QTY</label>
                                                        <input type="text" class="form-control" id="namaproduk"
                                                            name="qty" value="<?= $i->qty_request ?>">
                                                    </div>


                                                    <!-- combobox -->
                                                    <div class="form-group col-sm-5">
                                                        <label for="cars">Status Update:</label>

                                                        <select name="status" id="" class="form-control">
                                                            <?php foreach ($status as $s) : ?>
                                                            <option value="<?php echo $s->id_status; ?>"
                                                                <?= $s->id_status == $i->id_status ? "selected" : null ?>>
                                                                <?php echo $s->nama_status; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <input class="btn btn-primary" type="submit" value="Update">
                                                    <input class="btn btn-danger" type="reset" value="Reset">
                                                </div>




                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
    </div>
    </div>


    </section>

    <!-- /.content -->

    </div>




    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>./Logo-masit.png" alt="AdminLTELogo"
                height="100" width="300">
        </div>


        <!-- SIDEBAR -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <br>
            <?php foreach ($items_out as $i) :
				$x = $this->Mproduk->getquery("SELECT *
																							FROM barang_keluar bk
																							INNER JOIN produk p
																							ON p.id_produk = bk.id_produk
																							WHERE bk.id_user = '$i->id_user'");

				$u = $this->Mproduk->getquery("SELECT *
																							FROM user u
																							INNER JOIN barang_keluar bk
																							ON bk.id_user = u.id_user
																							WHERE u.id_user = '$i->id_user'");

				$k = $this->Mproduk->getquery("SELECT *
																							FROM barang_keluar bk
																							INNER JOIN kategori k
																							ON k.id_kategori = bk.id_kategori
																							WHERE bk.id_user = '$i->id_user'");

				$st = $this->Mproduk->getquery("SELECT *
																							FROM barang_keluar bk
																							INNER JOIN tb_status st
																							ON st.id_status = bk.id_status
																							WHERE bk.id_user = '$i->id_user'");

			?>


            <section class="content responsive">
                <div class="container-fluid">
                    <div class="row ">





                        <div class="save-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                        </div>
                        <?php if ($this->session->flashdata('pesan')) : ?>

                        <?php endif; ?>
                        <!-- /.card-header -->

                        <!-- FORM UPDATE -->


                    </div>



                </div>
        </div>
        </section>


        <!-- end wrapper -->
    </div>

    <?php endforeach; ?>

    <!-- /.content -->

    </div>









</body>

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
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>./Logo-masit.png" alt="AdminLTELogo"
                height="100" width="300">
        </div>


        <!-- SIDEBAR -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <br>

            <!-- /.content -->

        </div>




        <script>
        $(document).ready(function() {
            load_data();

            function load_data(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Home/fetch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {





                        $('#result').html(data);

                    }

                });
            }
        });
        </script>


        <!-- select change -->
        <script>
        $(document).ready(function() {
            $("#sell").change(function() {
                var nilai = $($this).val(0);

                $("input").html("")
            });
        });
        </script>





        <!-- /.content-wrapper -->




        <!-- FLASHDATA JQUERY -->
        <!-- FLASHDATA JQUERY -->



</body>




</html>





























































































































































































</htm