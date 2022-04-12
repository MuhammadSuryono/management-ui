import { URL_APP } from "../api/module.js";

$(document).ready(function () {
    $('#form-login').submit(function (e){
        e.preventDefault()
        $.ajax({
            url: URL_APP() + "/auth/login/check",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function () {
                btnLoading()
            },
            complete: function () {
                btnLoading(false)
            },
            success: function (result) {
                console.log(result)
                let obj = JSON.parse(result);

                if (obj.status) {
                    toastr.success(obj.message);
                    localStorage.setItem("userIsLogin", true);
                    localStorage.setItem("userData", JSON.stringify(obj.data.user));
                    localStorage.setItem("token", obj.data.access_token);
                    localStorage.setItem("tokenType", obj.data.token_type);
                    localStorage.setItem("expiresIn", obj.data.expires_in);

                    document.getElementById("form-login").reset();
                    setInterval(function(){ window.location.reload(); }, 1000);
                }else{
                    toastr.error(obj.message)
                }
            },
            error: function (xhr) {
                toastr.error("Something wrong!")
            }
        });

    });

    function btnLoading(isLoading = true) {
        if (isLoading) {
            $("#btn-login").attr("disabled", true);
            $("#btn-login").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
        } else {
            $("#btn-login").attr("disabled", false);
            $("#btn-login").html('<i class="fa fa-sign-in"></i> Login');
        }
    }
})