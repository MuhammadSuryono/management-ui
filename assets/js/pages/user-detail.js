import {alertError, DisLoadingButton, LoadingButton} from "../api/module.js";
import {httpRequest} from "../api/index.js";

$("#documentModal").on("hide.bs.modal", () => {
    const btnSubmit = $(this).find('button[type="submit"]');
    $('#documentForm')[0].reset();
    DisLoadingButton(btnSubmit, "Save");
})

$('#documentForm').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let data = {};
    form.serializeArray().forEach(function (item) {
        data[item.name] = item.value;
    });

    const file = form[0][2].files[0];
    data.document_name = file.name;

    const btnSubmit = $(this).find('button[type="submit"]');
    LoadingButton(btnSubmit);

    const formData = new FormData();
    formData.append("file_input", file);
    $.ajax({
        type: "POST",
        url: `http://180.211.92.131/api/v1/gcs/upload`,
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (msg) {
            if (msg.message === "success") {
                data.document_path = msg.public_url;

                httpRequest("/user/document", "POST", data, (res) => {
                    if (res.response.code === 200) {
                        form[0].reset();
                        toastr.success(res.response.message);
                        DisLoadingButton(btnSubmit);
                        $('#documentModal').modal('hide');
                        window.location.reload();
                    } else {
                        toastr.error(res.response.message);
                        DisLoadingButton(btnSubmit, "Save");
                    }
                }, function (status, msg, jqXHR, exception) {
                    DisLoadingButton(btnSubmit, "Save");
                    toastr.error(`[${status}] ${msg}`);
                })
            } else {
                alertError("Failed Upload File", "Failed to upload file");
                DisLoadingButton(btnSubmit, "Save");
            }
        },
        error: function () {
            alertError("Failed Upload File", "Failed to upload file");
            DisLoadingButton(btnSubmit, "Save");
        }
    });
});