import {convertRupiah, countColumnTable, lastPathUrl, loadingTable, noDataTable} from "../api/module.js";
import {httpRequestUrlApp} from "../api/index.js";

const bodyListBpu = document.getElementById("body-list-bpu")
const tableListBpu = document.getElementById("table-list-bpu")
let totalColumn = countColumnTable(tableListBpu)
let idItem = lastPathUrl()

$('#detailBpuModal').modal('show')

bodyListBpu.innerHTML = loadingTable(totalColumn)
httpRequestUrlApp(`/project/item/${idItem}/bpu`, 'GET', {}, function (res) {
    let json = JSON.parse(res)
    if (json.status) {
        let data = json.data
        let html = ''
        if (data.length > 0) {
            data.forEach(function (val, index) {
                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${val.noid}</td>
                    <td>${val.term}</td>
                    <td>${val.nomorstkb}</td>
                    <td>${val.namapenerima}</td>
                    <td>${val.waktustempel}</td>
                    <td>Rp. ${convertRupiah(val.jumlah)}</td>
                    <td>Rp. ${convertRupiah(val.jumlahbayar)}</td>
                    <td>${val.metode_pembayaran}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="detailBpu(${val.noid})"><i class="fa fa-search"></i></button>
                    </td>
                </tr>
            `
            })
            bodyListBpu.innerHTML = html
        } else {
            bodyListBpu.innerHTML = noDataTable(totalColumn)
        }
    } else {
        bodyListBpu.innerHTML = noDataTable(totalColumn)
    }
})

function detailBpu(id) {
}