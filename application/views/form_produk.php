<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>Tutorial CodeIgniter - JARANGUDA.COM</title>
  </head>
  <body>
    <div class="container">
      <hr>
      <h3>KODE PRODUK</h3>
      <hr>
			<?php echo form_open_multipart('Home/save');?>
        <div class="form-group">
          <label for="cari">Kode Produk</label>
          <input type="text" class="form-control" id="kodeproduk" name="kodeproduk" value="BRG<?php echo sprintf("%04s", $kode_produk) ?>" readonly>
        </div>
        <div class="form-group">
          <label for="cari">Nama Produk</label>
          <input type="text" class="form-control" id="namaproduk" name="namaproduk">
        </div>

        <!-- combobox -->
        <div class="form-group">
        <label for="cars">Pilih Kategori:</label>
          
            <select name="kategori" id="cars" class="form-control">
            <?php foreach($kategori as $k) : ?>
              <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
              <?php endforeach; ?>
            </select>
     
         
        </div>


        <div class="form-group">
          <label for="cari">Harga</label>
          <input type="number" class="form-control" id="" name="harga">
        </div>

				<div class="form-group">
          <label >Upload Foto</label>
          <input type="file" class="form-control" id="foto" name="userfile" required="">
        </div>

        <div class="form-group">
          <label for="cari">Deskripsi</label>
          <input type="textarea" class="form-control" id="namaproduk" name="deskripsi">
        </div>


        <input class="btn btn-primary" type="submit" value="Simpan">
        <input class="btn btn-primary" type="reset" value="Reset">
				
    </div>
		<?php echo form_close(); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
