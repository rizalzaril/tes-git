<html>

<head>
    <?php
	$js  = base_url("/assets/js");
	$css = base_url("/assets/css");
	$bootstrap = base_url("/assets/bootstrap");
	$npath = site_url("/Cmahasiswa");
	?>

    <script src="<?= $js ?>/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= $css ?>/trans.css">
    <link rel="stylesheet" type="text/css" href="<?= $bootstrap ?>/css/bootstrap.css">


</head>

<body>



    <div class="container">

        <center>

            <div class="card card-header" style="box-shadow: 2px 2px 8px black;">
                <h1 style="text-shadow: 2px 2px 8px  grey;">Input Nilai Mahasiswa</h1>
        </center>

        <div class="card card-body" style="margin-top: 2px; background: #DCDCDC; box-shadow: 2px 2px 8px black;">
            <div class="row">



                <table align="center" width="70%" bgcolor="#DCDCDC" style="margin-top: 10px; margin-bottom: 100px;">
                    <tr>
                        <td width="20%">Kode Nilai</td>
                        <td><input type="text" id="tid" style="width:150px"></td>
                        <td width=20%><input type="button" value="Save" id="save"
                                style="background: orange; color: black">

                            <input type="button" value="Delete" id="delete" style="background: red; color: white;">

                        </td>

                    </tr>
                    <tr>
                        <td width="20%">Kode Mata Kuliah</td>
                        <td><select id="km" style="width:150px"></select></td>
                    </tr>

                    <tr>
                        <td width="20%">Mata Kuliah</td>
                        <td><input type="text" id="mk" style="width:150px"></td>
                    </tr>
                    <tr>
                        <td width="20%">Dosen</td>
                        <td><input type="text" id="dosen" style="width:150px"></td>
                    </tr>


                </table>

                <table width="70%" align=center>
                    <tr bgcolor="brown">

                        <th class="table-dark">Nim</th>
                        <th class="table-dark">Nama</th>
                        <th class="table-dark">UTS</th>
                        <th class="table-dark">UAS</th>
                        <th class="table-dark">NILAI</th>
                        <th class="table-dark">Action</th>
                    </tr>
                    <tr>
                        <td width="20%" bgcolor="white"><select id="nim"></select></td>
                        <td width="30%" bgcolor="white"><input type="text" id="nama"></td>
                        <td width="15%" bgcolor="white"><input type="text" id="uts"></td>
                        <td width="10%" bgcolor="white"><input type="text" id="uas"></td>
                        <td width="15%" bgcolor="white"><input type="text" id="nilai"></td>
                        <td width="15%" bgcolor="white" align="center"><input type="button" value="Insert" id="insert"
                                style="background: blue; color: white; float: center;">

                            <input type="button" value="Delete" id="delete-row" style="background: red; color: white;">
                        </td>

                    </tr>
                </table>
                <table id="myTable" width="70%" align=center>
                </table>
            </div>
        </div>
    </div>

    <p align="center" style="font-family: sans-serif; margin-top: 240px;">© Rizal Liyan Syah. 2020</p>
</body>

</html>


<script>
$(document).ready(function() {




    //Load Page
    fillMatkul();
    fillMhs();

    $("#km").change(function() {
        showMatkul();
    })


    $("#nim").change(function() {
        showmhs();
    })

    //-------------------------------
    function fillMatkul() {
        $.post("Cmahasiswa/fill_matkul", {}, function(x) {
            $("#km").html(x);
        })
    }

    function showMatkul() {
        var km = $("#km").val();
        $.post("Cmahasiswa/getmatkul", {
            x: km
        }, function(dt) {
            var matakuliah = JSON.parse(dt);
            $("#mk").val(matakuliah.mk);

        })
    }

    function fillMhs() {
        $.post("Cmahasiswa/isi_mhs", {}, function(x) {
            $("#nim").html(x);
        })
    }

    function showmhs() {
        var nim = $("#nim").val();
        $.post("Cmahasiswa/getnama", {
            x: nim
        }, function(dt) {
            var mahasiswa = JSON.parse(dt);
            $("#nim").val(mahasiswa.nim);
            $("#nama").val(mahasiswa.nama);
        })
    }

    $("#uas").keyup(function() {

        var uts = $("#uts").val();
        var uas = $("#uas").val();

        if (uts == "") {
            $("#nilai").val();


        } else {
            var nilai = (0.40 * uts) + (0.60 * uas);
            $("#nilai").val(nilai);
        }

    })

    //--------------INSERT DATA KE DATAGRID--------------------
    function insertGrid() {
        var nim = $("#nim").val();
        var nama = $("#nama").val();
        var uts = $("#uts").val();
        var uas = $("#uas").val();
        var nilai = $("#nilai").val();
        var button = "<input type='checkbox' name='record'>";
        var brs = "<tr><td width='15%'>" + nim + "</td>" +
            "<td width='30%'>" + nama + "</td>" +
            "<td width='15%' align='right'>" + uts + "</td>" +
            "<td width='10%' align='right'>" + uas + "</td>" +
            "<td width='15%' align='right'>" + nilai + "</td>" +
            "<td width='15%' align='center'>" + button + "</td></tr>";
        if (nilai > 0) $("#myTable").append(brs);
    }
    //-------------------------------------------------------------------
    $("#insert").click(function() {
        if (nilai > 0) $("#myTable").append(brs);
        insertGrid();
        clearIsianGrid();
    })




    //--------Hapus datagrid-------

    $("#delete-row").click(function() {
        $("#myTable").find('input[name="record"]').each(function() {
            if ($(this).is(":checked")) {
                $(this).parents("tr").remove();
                GrandTotal();
            }
        });
    });



});
</script>






t>