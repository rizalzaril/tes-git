<!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>/assets/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/templates/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assets/templates/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
var tabel = null;
$(document).ready(function() {
    tabel = $('#example1').DataTable({
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [
            [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax": {
            "url": "<?= base_url('datatables/view_data_where'); ?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
        ], // Combobox Limit
        "columns": [{
                "data": 'id_artikel',
                "sortable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "judul"
            }, // Tampilkan judul
            {
                "data": "kategori"
            }, // Tampilkan kategori
            {
                "data": "penulis"
            }, // Tampilkan penulis
            {
                "data": "tgl_posting"
            }, // Tampilkan tgl posting
            {
                "data": "id_artikel",
                "render": function(data, type, row, meta) {
                    return '<a href="show/' + data + '">Show</a>';
                }
            },
        ],
    });
});
</script>
