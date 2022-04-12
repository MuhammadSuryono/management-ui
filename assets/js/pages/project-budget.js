import {convertRupiah, countColumnTable, lastPathUrl, loadingTable, noDataTable, URL_APP} from "../api/module.js";
import {httpRequestUrlApp} from "../api/index.js";

const bodyTableItemBudget = document.getElementById("body-item-budget")
const tableListItemBudget = document.getElementById("table-item-budget")
let totalColumn = countColumnTable(tableListItemBudget)
let idSubmission = lastPathUrl()

let pathName = window.location.pathname
let splitPath = pathName.split("/")

let idProject = splitPath[splitPath.length - 1]
let typeFolder = splitPath[splitPath.length - 3]

bodyTableItemBudget.innerHTML = loadingTable(totalColumn)

httpRequestUrlApp(`/project/pengajuan/${idSubmission}/items`,'GET', {}, function (res) {
    let json = JSON.parse(res)
    let data = json.data

    if (json.response.code === 200) {
        let html = ''
        if (data.length > 0) {
            data.forEach(function (val, index) {
                let path = `${URL_APP()}/folder/${typeFolder}/project/${idProject}/item/${val.id}`
                html += `
                    <tr>
                        <td>${val.no}</td>
                        <td>${val.rincian}</td>
                        <td>${val.kota}</td>
                        <td>${val.status}</td>
                        <td>${val.penerima}</td>
                        <td>Rp. ${convertRupiah(parseInt(val.total))}</td>
                        <td>Rp. ${convertRupiah(parseInt(val.total_pembayaran))}</td>
                        <td>${val.total_bpu}</td>
                        <td><a href="${path}" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a></td>
                    </tr>
                `
            })
            bodyTableItemBudget.innerHTML = html
        } else {
            bodyTableItemBudget.innerHTML = noDataTable(totalColumn)
        }
    } else {
        bodyTableItemBudget.innerHTML = noDataTable(totalColumn)
    }
})