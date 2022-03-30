<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>

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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">DataTable with default features</h3>
                                        <div class="save-data"
                                            data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                        </div>
                                        <?php if ($this->session->flashdata('pesan')) : ?>

                                        <?php endif; ?>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive-sm">

                                            <table id="example1" class="table table-bordered table-striped">

                                                <!-- Button add data -->
                                                <!-- <a class="btn btn-success mb-3" href="<?php echo base_url('/Home/add') ?>"><i class="fas fa-plus">Tambah Data</i></a> -->
                                                <!-- end -->

                                                <!-- Modal Button -->
                                                <button type="button" class="btn btn-primary"
                                                    style="margin-bottom: 20px;" data-toggle="modal"
                                                    data-target="#exampleModal" data-whatever="@mdo"><i
                                                        class="fas fa-plus">Tambah Data</i></button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Form
                                                                    Input Data
                                                                    Kategori</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <div class="container">
                                                                    <form action="<?= base_url('Kategori/save'); ?>"
                                                                        method="POST">


                                                                        <div class="form-group">
                                                                            <label for="cari">Nama Kategori</label>
                                                                            <input type="text" class="form-control"
                                                                                id="kategori" name="kategori">
                                                                        </div>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input class="btn btn-primary" type="submit"
                                                                        value="Simpan">
                                                                    <input class="btn btn-primary" type="reset"
                                                                        value="Reset">
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- end Modal-->


                                                    <!-- TABLE DATA -->

                                                    <thead>
                                                        <tr>
                                                            <th width="100px">No</th>
                                                            <th width="100px">Id Kategori</th>
                                                            <th width="100px">Nama Kategori</th>

                                                            <th width="100px">Aksi</th>
                                                            <!-- <th width="100px">CSS grade</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!-- LOOPING DATA -->
                                                        <?php
														$no = 0;
														foreach ($kategori as $k) :
															$no++;
														?>
                                                        <tr align="center">
                                                            <td width="100px"><?= $no;  ?></td>
                                                            <td width="100px"><?= $k->id_kategori;  ?></td>
                                                            <td width="100px"><?= $k->nama_kategori;  ?></td>

                                                            <td> <a href="<?= base_url(); ?>Kategori/hapus_kategori/<?= $k->id_kategori; ?>"
                                                                    class="btn btn-danger tombol-hapus"></btn-danger><i
                                                                        class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
            </section>

            <!-- /.content -->

        </div>












        <!-- /.content-wrapper -->


        <!-- FLASHDATA JQUERY -->
        <!-- FLASHDATA JQUERY -->




















</body>






















</html>




</body>

</html>