$(document).ready(function () {
    $("#current_pwd").keyup(function () {
        var current_pwd = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/admin/verify-password',
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp.valid === true) {
                    $("#verifyPwd")
                        .text("Current Password is correct")
                        .removeClass("text-danger")
                        .addClass("text-success");
                    
                    $("#submitBtn").prop('disabled', false); // Activar el botón
                } else {
                    $("#verifyPwd")
                        .text("Current Password is incorrect")
                        .removeClass("text-success")
                        .addClass("text-danger");
                    
                    $("#submitBtn").prop('disabled', true); // Desactivar el botón
                }
            },
            error: function () {
                $("#verifyPwd")
                    .text("Error al verificar la contraseña")
                    .removeClass("text-success")
                    .addClass("text-danger");
                
                $("#submitBtn").prop('disabled', true);
            }
        });
    });
});
