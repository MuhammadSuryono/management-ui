import {httpRequestUrlApp} from "../api/index.js";

const otherFieldCreateFolder = document.getElementById("other_field")
$(function () {
    $('.selectpicker').selectpicker();
})

$('#createFolderProjectModal').on('show.bs.modal', function () {
    console.warn("Load Form and reset");
    let formModal = $('#create_folder_budget_form');
    formModal[0].reset();
    otherFieldCreateFolder.innerHTML = "";
})

const selectType = document.getElementById('type');
selectType.addEventListener("change", function () {
    let value = selectType.value;
    otherFieldCreateFolder.innerHTML = "<i class=\"fa fa-spinner fa-spin\"></i> Loading...";
    httpRequestUrlApp(`/api/folder/${value}/form`, 'GET', {}, function (res) {
        otherFieldCreateFolder.innerHTML = res;
    })
})

function selectTypeProject(e) {
    console.log(e)
}