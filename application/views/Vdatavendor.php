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
                                    <h3 class="card-title">Pengadaan stok</h3>
                                </div>
                                <div class="save-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                </div>
                                <?php if ($this->session->flashdata('pesan')) : ?>

                                <?php endif; ?>
                                <!-- /.card-header -->

                                <!-- TABLE -->
                                <div class="card-body">
                                    <div class="table table-striped table-responsive-lg">
                                        <table id="mydatatable"
                                            class="table table-striped table-bordered display nowrap"
                                            style="width: 100%;">



                                            <!-- Modal Form Input Button -->

                                            <button type="button" class="btn btn-primary" style="margin-bottom: 20px;"
                                                data-toggle="modal" data-target="#Modal_vendor" data-whatever="@mdo"><i
                                                    class="fas fa-plus">Tambah Data</i></button>



                                            <!-- end -->


                                            <!-- ISI TABLE -->
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Vendor</th>
                                                    <th>Nama Vendor</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
												$no = 0;
												foreach ($vendor as $v) :
													$no++;
												?>

                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $v->kode_vendor ?></td>
                                                    <td><?= $v->nama_vendor ?></td>
                                                    <td><?= $v->alamat ?></td>
                                                    <td><?= $v->telepon ?></td>
                                                    <td><?= $v->email ?></td>
                                                    <td><a href="<?= base_url(); ?>Support/hapus_vendor/<?= $v->id_vendor ?>"
                                                            class="btn btn-danger tombol-hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <a href="<?= base_url(); ?>Support/edit_vendor/<?= $v->id_vendor ?>"
                                                            class="btn btn-primary" data-target="#Modalupdate"
                                                            data-whatever="@mdo">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
            </section>

            <!-- /.content -->

        </div>


        <!-- Modal Form ADD CLIENT Button -->

        <!-- <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
            data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus">Tambah Data</i></button> -->

        <div class="modal fade" id="Modal_vendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form
                            Update data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <form action="<?= base_url('Support/save_vendor'); ?>" method="POST">

                                <div class="form-group">
                                    <label for="cari">Kode Vendor</label>
                                    <input type="text" class="form-control" id="kodeproduk" name="kodevendor"
                                        value="VR<?php echo sprintf("%04s", $kode_vendor) ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="cari">Nama Vendor</label>
                                    <input type="text" class="form-control" id="" name="namavendor" value="">
                                </div>


                                <div class="form-group">
                                    <label for="cari">Alamat</label>
                                    <input type="text" class="form-control" id="" name="alamat" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cari">Telepon</label>
                                    <input type="number" class="form-control" id="" name="telepon" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cari">Email</label>
                                    <input type="text" class="form-control" id="" name="email" value="">
                                </div>
                                <!-- combobox -->

                                <div class="form-group">
                                    <label for="cari">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="" name="tanggal" value="">
                                </div>


                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                            <input class="btn btn-primary" type="reset" value="Reset">
                        </div>
                        </form>

                    </div>
                </div>
            </div>


            <!-- end -->

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

            <!-- /.content-wrapper -->

            <!-- FLASHDATA JQUERY -->

            <!-- FLASHDATA JQUERY -->
</body>

</html>