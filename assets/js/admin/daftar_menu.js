$(document).ready(function () {
    var table_menu = $('#table_menu').DataTable({
        "processing": true,
        "sort": true,
        "filter": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + "admin/Daftar_menu/list_menu",
            "type": "POST",
            "data": function (data) {
                data.id_surat = $('#id_surat').val();
                return data;
            }
        },
        "columns": [
            {
                "data": "no",
                "orderable": false,
                "targets": 'no-sort'
            },
            {
                "data": "nama_menu",
                "orderable": false,
                "targets": 'no-sort'
            },
            {
                "data": "menuid",
                "orderable": false,
                "targets": 'no-sort'
            },
            {
                "data": "actions",
                "orderable": false,
                "targets": 'no-sort'
            }
        ]
    });

    $('#btn_tambah_menu').click(function (e) {
        e.preventDefault();
        $('#modal_add_menu').modal("show");
    });
});