$(document).ready(function () {
    $("input.fileinput").bootstrapFileInput();
    $('#btn-save-perubahan').click(function (e) {
        e.preventDefault();
        var form = $('#form_data_siswa')[0];
        var data = new FormData(form);
        $.ajax({
            type: "post",
            url: base_url + "siswa/biodata/simpan_perubahan",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $.blockUI({
                    message: '<img src="' + base_url + '/assets/img/loading.gif" height="80px" style="image-rendering: auto;"/>',
                    css: { border: 'none', backgroundColor: 'none', color: '#fff' }
                });
            },
            success: function (response) {
                if (response['status'] == "success") {
                    window.location.replace(base_url + "siswa/biodata/update_session");
                }
            }
            , complete: function () {
                $.unblockUI();
            }
        });
    });
});