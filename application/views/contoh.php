<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <center>
        <h1>Hallo Selamat Datang</h1>
        </center>

        
        <table border="1" cellspacing="0" cellpadding="0" align="center">

            <thead>
                <tr>
                    <td width="100" height="50" align="center">No</td>
                    <td width="300" height="50" align="center">Nama Produk</td>
                    <td width="300" height="50" align="center">Harga</td>
                    <td width="300" height="50" align="center">Foto</td>
                    <td width="300" height="50" align="center">Deskripsi</td>     
                </tr>
            </thead> 
            
           
            <tbody>
            <?php
                $no = 0;
                foreach ($produk->  result() as $p):
                $no++;
                
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $p->nama_produk; ?></td>
                    <td><?php echo $p->harga; ?></td>
                    <td><?php echo $p->foto; ?></td>
                    <td><?php echo $p->deskripsi; ?></td>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>



    </body>
</html>