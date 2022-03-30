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
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            <div class="col-sm-5">
                                                <?php foreach ($produk as $p) : ?>
                                                <form action="<?php echo base_url() . 'Home/update_barang'; ?>"
                                                    method="post">
                                                    <div class="form-group">
                                                        <label for="cari"></label>
                                                        <input type="hidden" class="form-control" id="kodeproduk"
                                                            name="id_produk" value="<?= $p->id_produk ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="cari">Nama Produk</label>
                                                        <input type="text" class="form-control" id="namaproduk"
                                                            name="namaproduk" value="<?= $p->nama_produk ?>">
                                                    </div>

                                                    <!-- combobox -->
                                                    <div class="form-group">
                                                        <label for="cars">Pilih Kategori:</label>

                                                        <select name="kategori" id="cars" class="form-control">
                                                            <?php foreach ($kategori as $k) : ?>
                                                            <option value="<?php echo $k->id_kategori; ?>"
                                                                <?= $k->id_kategori == $p->id_kategori ? "selected" : null ?>>
                                                                <?php echo $k->nama_kategori; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <label for="cari">Harga</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input type="number" name="harga" class="form-control"
                                                            aria-label="Amount (to the nearest dollar)"
                                                            value="<?= number_format($p->harga, 0, ',', '.');  ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>


                                            </div>

                                            <div class="col-sm-1">

                                            </div>

                                            <div class="col-sm-5">

                                                <div class="form-group">
                                                    <label for="cari">Stok</label>
                                                    <input type="number" class="form-control" id="" name="stok"
                                                        value="<?= $p->stok ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="cari">Deskripsi</label>
                                                    <input type="textarea" class="form-control" id="deskripsi"
                                                        name="deskripsi">
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-primary" type="submit" value="Update">
                                                    <input class="btn btn-danger" type="reset" value="Reset">
                                                </div>
                                                </form>
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
    </div>


    </section>

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





    <!-- /.content-wrapper -->




    <!-- FLASHDATA JQUERY -->
    <!-- FLASHDATA JQUERY -->

























































































</body>




</html>