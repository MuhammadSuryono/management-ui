import {
    convertIsoToDate,
    countColumnTable,
    DisLoadingButton,
    LoadingButton,
    loadingTable,
    noDataTable, paginationTable, params
} from "../api/module.js";
import {httpRequest, httpRequestUrlApp} from "../api/index.js";
const bodyTablePosition = document.getElementById("body-position")
const footerTable = document.querySelector('#foot-pagination');
const tablePositionFolder = document.getElementById("table-position")
let totalColumn = countColumnTable(tablePositionFolder)
getDataPosition(`/position`)

$("#positionModal").on("hide.bs.modal", () => {
    const btnSubmit = $(this).find('button[type="submit"]');
    $('#positionForm')[0].reset();
    DisLoadingButton(btnSubmit, "Save");
})

$('button[data-target="#positionModal"]').click(function () {
    let data = $(this).data("position") === undefined ? undefined : $(this).data("position");
    // set title of modal
    $("#positionModalLabel").text(
        typeof data !== "undefined" ? "Edit Position" : "Create Position"
    );

    // set data to form modal
    $("#positionForm").attr("action", `/position`);
    $("#positionForm").attr("method", `POST`);
    if (typeof data !== "undefined") {
        $('#positionModal').modal('show');
        $("#positionForm").attr("action", `/position/${data.id}`);
        $("#positionForm").attr("method", `PUT`);

        $('input[name="name"]').val(data.name).change();
    }
});

$('#positionForm').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let url = form.attr('action');
    let method = form.attr('method');
    let data = {};
    form.serializeArray().forEach(function (item) {
        data[item.name] = item.value;
    });

    const btnSubmit = $(this).find('button[type="submit"]');
    LoadingButton(btnSubmit);

    httpRequest(url, method, data, (res) => {
        if (res.response.code === 200) {
            form[0].reset();
            toastr.success(res.response.message);
            DisLoadingButton(btnSubmit);
            $('#positionModal').modal('hide');
            window.location.reload();
        } else {
            toastr.error(res.response.message);
            DisLoadingButton(btnSubmit, "Save");
        }
    }, function (status, msg, jqXHR, exception) {
        DisLoadingButton(btnSubmit, "Save");
        toastr.error(`[${status}] ${msg}`);
    })
});

function getDataPosition(path) {
    bodyTablePosition.innerHTML = loadingTable(totalColumn);
    httpRequest(path, "GET", null, (res) => {
        if (res.response.code === 200) {
            let data = res.data;
            let html = "";
            if (data.data.length > 0) {
                data.data.forEach((v, i) => {
                    let sortNumber = (i + 1) +((data.from - 1) * data.per_page);
                    html += `
                    <tr>
                        <td>${sortNumber}</td>
                        <td class="text-left">${v.name}</td>
                        <td>${convertIsoToDate(v.updated_at)}</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit" data-position='${JSON.stringify(v)}' data-target="#positionModal" data-toggle="modal"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" data-id="${v.id}" data-target="#deleteModal" data-toggle="modal"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `;
                });

                if (data.total > 0) {
                    paginationTable(data, totalColumn, footerTable);
                }
            } else {
                html = noDataTable(totalColumn);
            }
            bodyTablePosition.innerHTML = html;

        }
    });
}

$('button[data-target="#deleteModal"]').click(function () {
    let id = $(this).data("id")
    var deleteBtn = document.getElementById("delete")
    deleteBtn.dataset.id = id
    deleteBtn.disabled = false
    deleteBtn.innerHTML = `Delete`
});

$("#delete").on("click", () => {
    const id = document.getElementById("delete").dataset.id
    var deleteBtn = document.getElementById("delete")
    deleteBtn.disabled = true
    deleteBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Deleting...`

    httpRequest(
        `/position/${id}`,
        "DELETE",
        null,
        (res) => {
            if (res.response.code === 200) {
                toastr.success(res.response.message);
                deleteBtn.disabled = false
                deleteBtn.innerHTML = `Delete`
                $("#deleteModal").modal("hide");
                location.reload();
                return;
            }
        }, function (status, msg, jqXHR, exception) {
            deleteBtn.disabled = false
            deleteBtn.innerHTML = `Delete`
            toastr.error(`[${status}] ${msg}`);
        }
    );
})