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
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>
                                <div class="save-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                </div>
                                <?php if ($this->session->flashdata('pesan')) : ?>

                                <?php endif; ?>
                                <!-- /.card-header -->

                                <!-- TABLE -->
                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table id="mydatatable"
                                            class="table table-striped table-bordered display nowrap"
                                            style="width: 100%;">



                                            <!-- Modal Form Input Button -->

                                            <button type="button" class="btn btn-primary" style="margin-bottom: 20px;"
                                                data-toggle="modal" data-target="#Modalitemsout" data-whatever="@mdo"><i
                                                    class="fas fa-plus">Tambah Data</i></button>




                                            <!-- ISI TABLE -->
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <!-- <th>Kode User</th> -->
                                                    <th>Nama User</th>
                                                    <!-- <th>Request</th>
                                                    <th>Status</th>
                                                    <th>Tanggal/Waktu</th> -->
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
												$no = 0;
												$kode = 'mas-it.id';
												foreach ($items_out as $i) :
													$approve = $this->Mproduk->getquery("select count(id_user) as badge from barang_keluar 
													where id_user='$i->id_user' ");

													// print_r($approve);

													$x = $this->Mproduk->getquery("SELECT *
																							FROM barang_keluar bk
																							INNER JOIN produk p
																							ON p.id_produk = bk.id_produk
																							WHERE bk.id_user = '$i->id_user'");

													// print_r($x);
													$no++;
												?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <!-- <td><?= $i->id_user ?></td> -->
                                                    <td><?= $i->name ?></td>
                                                    <!-- <td><b>Nama Barang&nbsp;:</b> <?= $i->nama_produk ?>
                                                        <br><b>Keterangan &nbsp;&nbsp;&nbsp; :</b> <?= $i->keterangan ?>
                                                        <br><b>Jumlah<span style="margin-left: 40px;"> :</span></b>
                                                        <?= $i->qty ?>

                                                    </td> -->





                                                    <!-- <td><?= $i->tanggal ?></td> -->
                                                    <!-- <td>
                                                        <center>
                                                            <a type="submit"
                                                                href="<?= base_url('Home/Approve/' . $i->id_user) ?>"
                                                                class="btn btn-primary">Approve</a>
                                                        </center>
                                                    </td> -->







                                                    <td> <a href="<?= base_url(); ?>Home/Approve/<?= $i->id_user ?>"
                                                            class="btn btn-primary">Approval&nbsp;<span
                                                                class="badge badge-light"><?= $approve->badge; ?></span>
                                                            <span class="sr-only">unread messages</span></a> </td>
                                                    <!-- <td><a href="<?= base_url(); ?>Home/hapus_itemsout/<?= $i->id_user ?>"
                                                            class="btn btn-danger tombol-hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        <a href="<?= base_url(); ?>Home/edit/<?= $i->id_user ?>"
                                                            class="btn btn-primary" data-target="#Modalupdate"
                                                            data-whatever="@mdo">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td> -->
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
            </section>

            <!-- /.content -->

        </div>


        <!-- Modal Add Supplier -->

        <!-- <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
            data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus">Tambah Data</i></button> -->

        <div class="modal fade" id="Modalitemsout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form action="<?= base_url('Home/save_items_out'); ?>" method="POST">


                                <!-- <div class="form-group">
                                    <label for="cars">Kode Barang:</label>

                                    <select name="namabarang" id="kodebarang" class="form-control">
                                        <?php foreach ($produk as $p) : ?>
                                        <option value="<?php echo $p->id_produk; ?>">
                                            <?php echo $p->kode_produk; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->

                                <div class="form-group">
                                    <label for="cars">Jenis Barang:</label>

                                    <select name="kategori" id="kategori" class="form-control">
                                        <?php foreach ($produk as $p) : ?>
                                        <option value="<?php echo $p->id_produk; ?>">
                                            <?php echo $p->nama_kategori; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cars">Pilih Barang:</label>

                                    <select name="namabarang" id="nmbarang" class="form-control">
                                        <option value="0">

                                        </option>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="cari">Jumlah</label>
                                    <input type="number" class="form-control" id="" name="qty" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cari">Keterangan</label>
                                    <input type="text" class="form-control" id="" name="keterangan" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cari">Pengguna</label>
                                    <input type="text" class="form-control" id="" name="pengguna" value="">
                                </div>

                                <div class="form-group">
                                    <label for="cari">Tanggal</label>
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




</htm