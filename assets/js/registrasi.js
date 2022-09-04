$(document).ready(function () {
    $('#check-terms').change(function () {
        if (this.checked == true) {
            $('#btn-daftar').prop('disabled', false);
        } else {
            $('#btn-daftar').prop('disabled', true);
        }
    });
    $('#btn-daftar').click(function (e) {
        e.preventDefault();
        $('.required').removeClass('error');
        var validate = true;
        $('.required').each(function (e) {
            if ($(this).val() == null || $(this).val() == "") {
                validate = false;
                $(this).addClass('error');

                // $('<br><label class="text-danger">Wajib diisi!</label>').insertAfter($(this));
            }
        });
        if (validate == true) {
            var form = $('.login-signup-form')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: base_url + "registrasi/daftar_akun",
                data: data,
                dataType: "json",
                contentType: false,
                processData: false,
                // beforeSend: function () {
                //     $.blockUI({
                //         message: '<img src="' + base_url + '/theme/dashboard/img/loading.gif" height="80px" style="image-rendering: auto;"/>',
                //         css: { border: 'none', backgroundColor: 'none', color: '#fff' }
                //     });
                // },
                success: function (response) {
                    console.log(response);
                    if (response['status'] == "error") {
                        alert(response['message']);
                    } else {
                        window.location.replace(base_url + "login");
                    }

                }
                // , complete: function () {
                //     $.unblockUI();
                // }
            });
        } else {
            alert("Lengkapi semua field!");
        }
    });
});