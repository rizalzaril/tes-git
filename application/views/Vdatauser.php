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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data User</h3>
                                        <div class="save-data"
                                            data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                        </div>
                                        <?php if ($this->session->flashdata('pesan')) : ?>

                                        <?php endif; ?>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">

                                            <!-- Button add data -->
                                            <!-- <a class="btn btn-success mb-3" href="<?php echo base_url('/Home/add') ?>"><i class="fas fa-plus">Tambah Data</i></a> -->
                                            <!-- end -->

                                            <!-- Modal Button -->
                                            <button type="button" class="btn btn-primary" style="margin-bottom: 20px;"
                                                data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i
                                                    class="fas fa-plus">Tambah Data</i></button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Form Input
                                                                Data
                                                                Produk</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="container">
                                                                <?php echo form_open_multipart('Home/save'); ?>
                                                                <div class="form-group">
                                                                    <label for="cari">Kode Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="kodeproduk" name="kodeproduk"
                                                                        value="BRG<?php echo sprintf("%04s", $kode_produk) ?>"
                                                                        readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="cari">Nama Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="namaproduk" name="namaproduk">
                                                                </div>

                                                                <!-- combobox -->
                                                                <div class="form-group">
                                                                    <label for="cars">Pilih Kategori:</label>

                                                                    <select name="kategori" id="cars"
                                                                        class="form-control">
                                                                        <?php foreach ($kategori as $k) : ?>
                                                                        <option value="<?php echo $k->id_kategori; ?>">
                                                                            <?php echo $k->nama_kategori; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="cari">Harga</label>
                                                                    <input type="number" class="form-control" id=""
                                                                        name="harga">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Upload Foto</label>
                                                                    <input type="file" class="form-control" id="foto"
                                                                        name="foto" required="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="cari">Deskripsi</label>
                                                                    <input type="textarea" class="form-control"
                                                                        id="deskripsi" name="deskripsi">
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="Simpan">
                                                                <input class="btn btn-primary" type="reset"
                                                                    value="Reset">
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end -->


                                                <!-- TABLE DATA -->

                                                <thead>
                                                    <tr>
                                                        <th width="100px">No</th>
                                                        <th width="100px">Nama User</th>
                                                        <th width="100px">Email User</th>
                                                        <th width="100px">Status</th>
                                                        <th width="100px">Position</th>
                                                        <th width="100px">Date Created</th>
                                                        <th width="100px">Aksi</th>
                                                        <!-- <th width="100px">CSS grade</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <!-- LOOPING DATA -->
                                                    <?php
													$no = 0;
													foreach ($userdata as $u) :
														$no++;
													?>
                                                    <tr align="center">
                                                        <td width="100px"><?= $no;  ?></td>
                                                        <td width="100px"><?= $u->name;  ?></td>
                                                        <td width="100px"><?= $u->email;  ?></td>
                                                        <td width="100px"><?php if ($u->is_active == 0) {
																					echo '  Aktif';
																				} else {
																					echo 'Aktif';
																				};  ?></td>
                                                        <td width="100px"><?= $u->name_role;  ?></td>
                                                        <td width="100px">
                                                            <?php $date = $u->date_created;
																echo date('d M Y', $date);  ?>
                                                        </td>
                                                        <td> <a href="<?= base_url(); ?>Datauser/hapus_user/<?= $u->id_user; ?>"
                                                                class="btn btn-danger tombol-hapus"></btn-danger><i
                                                                    class="fas fa-trash"></i></a>
                                                            <a href="<?= base_url(); ?>Home/hapus/<?= $u->id_user; ?>"
                                                                class="btn btn-primary tombol-hapus"></btn-danger><i
                                                                    class="fas fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->

        </div>














       
 <!-- /.content-wrapper -->

        <!-- FLASHDATA JQUERY -->
        <!-- FLASHDATA JQUERY -->










</body>





</html>