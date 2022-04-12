import {
    convertIsoToDate,
    countColumnTable,
    DisLoadingButton,
    LoadingButton,
    loadingTable,
    noDataTable, paginationTable, params, URL_APP
} from "../api/module.js";
import {httpRequest, httpRequestUrlApp} from "../api/index.js";
const bodyTableUser = document.getElementById("body-user")
const footerTable = document.querySelector('#foot-pagination');
const tableUserFolder = document.getElementById("table-user")
let totalColumn = countColumnTable(tableUserFolder)
getDataUser(`/user`)

$("#userModal").on("hide.bs.modal", () => {
    const btnSubmit = $(this).find('button[type="submit"]');
    $('#userForm')[0].reset();
    DisLoadingButton(btnSubmit, "Save");
})

$('button[data-target="#userModal"]').click(function () {
    let data = $(this).data("user") === undefined ? undefined : $(this).data("user");
    // set title of modal
    $("#userModalLabel").text(
        typeof data !== "undefined" ? "Edit User" : "Create User"
    );

    // set data to form modal
    $("#userForm").attr("action", `/user`);
    $("#userForm").attr("method", `POST`);
    if (typeof data !== "undefined") {
        $('#userModal').modal('show');
        $("#userForm").attr("action", `/user/${data.id}`);
        $("#userForm").attr("method", `PUT`);

        $('input[name="name"]').val(data.name).change();
    }
});

$('#userForm').on('submit', function (e) {
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
            $('#userModal').modal('hide');
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

function getDataUser(path) {
    bodyTableUser.innerHTML = loadingTable(totalColumn);
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
                        <td class="text-left">${v.full_name}</td>
                        <td class="text-left"><i class="fa fa-building"></i> ${v.division}<br/><i class="fa fa-map-pin"></i> ${v.position}</td>
                        <td class="text-left"><i class="fa fa-phone"></i> ${v.phone_number}<br/><i class="fa fa-envelope"></i> ${v.email}</td>
                        <td>${convertIsoToDate(v.updated_at)}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="${window.location.href}/detail/${v.id}"><i class="fa fa-edit"></i></a>
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
            bodyTableUser.innerHTML = html;

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
        `/user/${id}`,
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