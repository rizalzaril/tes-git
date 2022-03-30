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
                                    <h3 class="card-title">Data Inventory</h3>
                                </div>
                                <div class="save-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
                                </div>
                                <?php if ($this->session->flashdata('pesan')) : ?>

                                <?php endif; ?>
                                <!-- /.card-header -->

                                <!-- TABLE -->
                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <div class="table-responsive">

                                            <table id="mydatatable"
                                                class="table table-striped table-bordered display nowrap"
                                                style="width: 100%;">



                                                <!-- Modal Form Input Button -->

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
                                                                            <option
                                                                                value="<?php echo $k->id_kategori; ?>">
                                                                                <?php echo $k->nama_kategori; ?>
                                                                            </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="cari">Harga</label>
                                                                        <input type="number" class="form-control" id=""
                                                                            name="harga">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="cari">Stok</label>
                                                                        <input type="number" class="form-control" id=""
                                                                            name="stok">
                                                                    </div>

                                                                    <!-- <div class="form-group">
                                                                        <label>Upload Foto</label>
                                                                        <input type="file" class="form-control"
                                                                            id="foto" name="foto" required="">
                                                                    </div> -->

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


                                                    <!-- ISI TABLE -->
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Kategori</th>
                                                            <th>Stok</th>
                                                            <th>Harga</th>
                                                            <th>foto</th>
                                                            <th>Extn.</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
														$no = 0;
														foreach ($produk as $p) :
															$no++;
														?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $p->kode_produk ?></td>
                                                            <td><?= $p->nama_produk ?></td>
                                                            <td> <?php if ($i->stok == 0) {
																		?>
                                                                <center>
                                                                    <a href="#" class="badge badge-warning"><i
                                                                            class="fas fa-hourglass"></i>
                                                                        Pending<span class="badge badge-light"></span>
                                                                        <span class="sr-only">unread messages</span></a>
                                                                </center>

                                                                <?php
																		} elseif ($i->status == 1) {
																	?>
                                                                <center>
                                                                    <a href="#" class="badge badge-success"><i
                                                                            class="fas fa-check"></i>
                                                                        Diterima<span class="badge badge-light"></span>
                                                                        <span class="sr-only">unread messages</span></a>
                                                                </center>

                                                                <?php
																		} elseif ($i->status == 2) {
																	?>
                                                                <center>
                                                                    <a href="#" class="badge badge-danger"><i
                                                                            class="fas fa-times"></i>
                                                                        Ditolak<span class="badge badge-light"></span>
                                                                        <span class="sr-only">unread messages</span></a>
                                                                </center>

                                                                <?php
																		}
																	?>
                                                            </td>
                                                            <td><?= $p->harga ?></td>
                                                            <td></td>
                                                            <td>5421</td>
                                                            <td><a href="<?= base_url(); ?>Home/hapus/<?= $p->id_produk ?>"
                                                                    class="btn btn-danger tombol-hapus">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>

                                                                <a href="<?= base_url(); ?>Home/edit/<?= $p->id_produk ?>"
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
                                </div>
            </section>

            <!-- /.content -->

        </div>


        <!-- Modal Form Update Button -->

        <!-- <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
            data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus">Tambah Data</i></button> -->

        <div class="modal fade" id="Modalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <?php echo form_open_multipart('Home/edit'); ?>
                            <?php foreach ($produk as $p) : ?>
                            <div class="form-group">
                                <label for="cari">Kode Produk</label>
                                <input type="text" class="form-control" id="kodeproduk" name="kodeproduk"
                                    value="<?= $p->kode_produk ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="cari">Nama Produk</label>
                                <input type="text" class="form-control" id="namaproduk" name="namaproduk"
                                    value="<?= $p->nama_produk ?>">
                            </div>

                            <!-- combobox -->
                            <div class="form-group">
                                <label for="cars">Pilih Kategori:</label>

                                <select name="kategori" id="cars" class="form-control">
                                    <?php foreach ($kategori as $k) : ?>
                                    <option value="<?php echo $k->id_kategori; ?>">
                                        <?php echo $k->nama_kategori; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cari">Harga</label>
                                <input type="number" class="form-control" id="" name="harga" value="<?= $p->harga ?>">
                            </div>


                            <div class="form-group">
                                <label for="cari">Stok</label>
                                <input type="number" class="form-control" id="" name="stok" value="<?= $p->stok ?>">
                            </div>

                            <!-- <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" required="">
                            </div> -->

                            <div class="form-group">
                                <label for="cari">Deskripsi</label>
                                <input type="textarea" class="form-control" id="deskripsi" name="deskripsi">
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                            <input class="btn btn-primary" type="reset" value="Reset">
                        </div>
                        <?php echo form_close(); ?>
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