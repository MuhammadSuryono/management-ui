import {httpRequest, httpRequestUrlApp} from "../api/index.js";
import {
    convertRupiah,
    countColumnTable,
    getQueryUrl,
    lastPathUrl,
    loadingTable,
    noDataTable,
    URL_APP
} from "../api/module.js";

let year = getQueryUrl('year');
year = year ? year : new Date().getFullYear();

const bodyTableListFolder = document.getElementById("body-list-folder")
const tableListFolder = document.getElementById("table-list-folder")
let totalColumn = countColumnTable(tableListFolder)
let type = lastPathUrl()
type = type.replace("-", " ")

bodyTableListFolder.innerHTML = loadingTable(totalColumn);

httpRequestUrlApp(`/api/folder/${type}?year=${year}`, 'GET', {}, function (res) {
    let json = JSON.parse(res);
    if (json.response.code === 200) {
        let data = json.data;
        let html = '';
        if (data.length > 0) {
            data.forEach(function (item, index) {
                let label = item.status !== 'Disetujui' ? 'danger' : 'primary';
                let pathDetail = `${URL_APP()}/folder/${type}/project/${item.noid}`;
                html += `<tr>
                        <td>${index + 1}</td>
                        <td><a href="${pathDetail}">${item.nama}</a></td>
                        <td>${item.tahun}</td>
                        <td>${item.pengaju}</td>
                        <td>${item.divisi}</td>
                        <td>Rp. ${convertRupiah(parseInt(item.totalbudget))}</td>
                        <td>Rp. ${convertRupiah(parseInt(item.total_biaya_uang_muka))}</td>
                        <td>Rp. ${convertRupiah(parseInt(item.sisa_budget))}</td>
                        <td><span class="label label-${label}">${item.status}</span></td>
                    </tr>`
            })
            bodyTableListFolder.innerHTML = html;
        } else {
            bodyTableListFolder.innerHTML = noDataTable(totalColumn);
        }

    } else {
        bodyTableListFolder.innerHTML = noDataTable(totalColumn);
    }
})