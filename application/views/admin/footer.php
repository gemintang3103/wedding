</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.transit.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/notyf.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/script.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/status.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/notification.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/datatables.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/pdfmake.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/vfs_fonts.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/dataTables.buttons.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/buttons.html5.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/js/jszip.min.js' ?>"></script>


<?php
$this->load->model('pengaturan_model', 'pengaturan');
$pengaturan    =   $this->pengaturan->get_all(1);
foreach ($pengaturan->result() as $row) {
    $judul = $row->nama_web;
    $nama = $row->nama_pengantin;
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var getUrl = window.location;
        var baseUrl = "<?= base_url(); ?>";

        let uri = baseUrl + "eticket/qr/";
        let encoded = encodeURIComponent(uri);
        //console.log(encoded);

        var table = $("#myTable").DataTable({
            initComplete: function() {
                var api = this.api();
                $('#myTable_filter input')
                    .off('.DT')
                    .on('input.DT', function() {

                        api.search(this.value).draw();

                    });
            },
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            stateSave: true,
            lengthMenu: [
                [5, 10, 50, 100, -1],
                [5, 10, 50, 100, "All"]
            ],
            oLanguage: {
                sProcessing: "memuat..."
            },
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                "url": "<?= base_url() ?>admin/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "nohp",
                    "render": function(data, type, row) {
                        return '<a data-id="' + row.id + '" id="kirim" href="https://wa.me/' + row.nohp + '?text=Hai%20' + encodeURIComponent(row.nama) + '%2C%20anda%20diundang%20dalam%20Acara%20' + encodeURIComponent('<?= $judul . ' ' . $nama ?>') + '.%20Ini%20adalah%20link%20E-Ticket%20anda%3A%20' + encoded + row.id + '" alt="Kirim WA" title="Kirim WA" uk-tooltip="Kirim WA" target="_blank">' + row.nohp + '</a>';
                    }
                },
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "id",
                    "orderable": false,
                    "render": function(data, type, row) {
                        return '<a href="eticket/qr/' + data + '" target="_blank" title="Link untuk Tamu" alt="Link untuk Tamu" uk-tooltip="Link untuk Tamu">' + baseUrl + 'eticket/qr/' + data + '</a>';
                    }
                },
                {
                    "data": "qr_code",
                    "orderable": false,
                    "render": function(data, type, row) {
                        return '<a href="admin/lihatqr/' + row.id + '" target="_blank" alt="Lihat QR" title="Lihat QR" uk-tooltip="Lihat QR"><img style="width: 60px;" src="' + baseUrl + data + '"></a>';
                    }
                },
                {
                    "data": "opsi",
                    "orderable": false,
                    "render": function(data, type, row) {
                        return '<a class="uk-button uk-button-default uk-button-small" uk-toggle="target: #modal_edit' + row.id + '" alt="Edit" title="Edit" uk-tooltip="Edit"> Edit</a><a class="uk-button uk-button-secondary uk-button-small" href="admin/kirim_email/' + row.id + '" alt="Kirim Email" title="Kirim Email" uk-tooltip="Kirim Email"><span uk-icon="mail"></span></a><a class="uk-button uk-button-danger uk-button-small" id="confirm" href="admin/hapus/' + row.id + '" alt="Hapus" title="Hapus" uk-tooltip="Hapus"><span uk-icon="trash"></span></a>';
                    }
                }

            ],
            order: [
                [0, 'asc']
            ]
        });

        $('#btn-filter').click(function() {
            table.ajax.reload();
        });

        $('#myTable tbody').on('click', '#confirm', function() {
            var retVal = confirm("Do you want to continue ?");
            if (retVal == true) {

                return true;
            } else {

                return false;
            }


        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable2').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            lengthMenu: [
                [10, 100, -1],
                [10, 100, "All"]
            ],
        });

        $('#myTable3').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            lengthMenu: [
                [10, 100, -1],
                [10, 100, "All"]
            ],
            order: [],
            // "ordering": false
        });
    });
</script>

</body>

</html>