$(document).ready(function () {
    $('#btn_login').click(function (e) {
        e.preventDefault();
        var validate = true;
        $('.required').each(function (e) {
            if ($(this).val() == null || $(this).val() == "") {
                validate = false;
            }
        });
        if (validate == true) {
            var form = $('.login-signup-form')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: base_url + "login/auth",
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
                    if (response['status'] == "success") {
                        window.location.replace(base_url + "Home");
                    } else {
                        $('.alert').remove();
                        $(response['message']).insertBefore('.login-signup-form');
                    }

                }
                // , complete: function () {
                //     $.unblockUI();
                // }
            });
        } else {
            $('<div class="alert alert-danger" role="alert">NISN dan Password tidak boleh kosong!</div>').insertBefore('.login-signup-form');
        }
    });
});
