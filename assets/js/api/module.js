const BASE_URL_API = "http://localhost:8000/api/v1";
const config = require("../../../config.json");

console.log(config.try)

/***
 *
 * @returns {string}
 * @constructor
 */
function URL_APP() {
    let url = window.location.href;
    let arr = url.split("/");
    const BASE_URL = arr[0] + "//" + arr[2];
    
    let splitHost = arr[2].split(":");
    let otherPath = splitHost[1] === undefined || splitHost[1] === "7793" || splitHost[1] === "80" ? `/${arr[3]}` : "";
    
    return BASE_URL + otherPath
}

/***
 *
 * @returns {boolean}
 */
function statusLogin() {
    let isLogin = localStorage.getItem("userIsLogin");
    let status = false;

    if (isLogin) status = true;
    if (typeof isLogin == "undefined") status = false;
    return status;
}

/***
 *
 */
function redirectLogin(query) {
    window.location.href = URL_APP() + "/auth/login" + query;
}

/***
 *
 * @param angka
 * @returns {string}
 */
function convertRupiah(angka) {
    angka = angka === null ? 0 : angka;
    let	number_string = angka.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return rupiah
}

function alertError(title, msg, timeOut = 4000) {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: timeOut
    };
    toastr.error(msg, title);
}

function LoadingButton(element) {
    element.prop("disabled", true);
    element.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
  }
  
function DisLoadingButton(element, htmlInput) {
    element.prop("disabled", false);
    element.html(htmlInput);
}

function lastPathUrl() {
    return window.location.pathname.split("/").pop();
}

function getQueryUrl(key) {
    const params = new URLSearchParams(window.location.search)
    return params.get(key)
}

function countColumnTable(element) {
    return element.tHead.children[0].children.length
}

function loadingTable(colspan) {
    return `<tr><td colspan="${colspan}" class="text-center"><i class="fa fa-spinner fa-spin"></i> Loading data...</td></tr>`
}

function noDataTable(colspan) {
    return `<tr><td colspan="${colspan}" class="text-center"><i class="fa fa-times"></i> No data</td></tr>`
}

function splitUrlPagination(url) {
    if (url == null) {
        return '';
    }
    let urlSplit = url.split('/');
    let splitPage = urlSplit[urlSplit.length - 1].split('?');
    let lastQuery = window.location.search;
    if (lastQuery !== '') {
        let splitLastQuery = lastQuery.split('?');
        let splitSeparatorAnd = splitLastQuery[1].split('&');
        lastQuery = '';
        splitSeparatorAnd.forEach(function (item, index) {
            if (!item.includes('page')) {
                lastQuery += '&' + item;
            }
        });
    }
    return `?${splitPage[1]}${lastQuery}`
}

function params() {
    return new URLSearchParams(window.location.search)
}

function convertIsoToDate(iso) {
    var today = new Date(iso);
    var day = today.getDate() + "";
    var month = (today.getMonth() + 1) + "";
    var year = today.getFullYear() + "";
    var hour = today.getHours() + "";
    var minutes = today.getMinutes() + "";
    var seconds = today.getSeconds() + "";

    day = checkZero(day);
    month = checkZero(month);
    year = checkZero(year);
    hour = checkZero(hour);
    minutes = checkZero(minutes);
    seconds = checkZero(seconds);
    return day + "-" + month + "-" + year + " " + hour + ":" + minutes + ":" + seconds;
}

function checkZero(data){
    if(data.length == 1){
        data = "0" + data;
    }
    return data;
}

function paginationTable(data, totalColumn, footerPagination) {
    let pagination = "";
    pagination += `<tr>
                    <td colspan="2" class="text-left">Show ${data.to} From ${data.total} </td>
                    <td colspan="${totalColumn - 2}" class="footable-visible">
                        <ul class="pagination float-right">
                            <li class="footable-page-arrow disabled"><a data-page="first" href="${splitUrlPagination(data.first_page_url)}">«</a></li>
                            <li class="footable-page-arrow ${data.links[0].url == null ? 'disabled': ''}">
                            <a data-page="prev" href="${splitUrlPagination(data.links[0].url)}">‹</a></li>`;
    for (let i = 0; i < data.links.length; i++) {
        if (data.links[i].label === "pagination.previous" || data.links[i].label === "pagination.next") {
            continue;
        }
        pagination += `
                            <li class="footable-page ${data.links[i].active ? 'active': ''}">
                            <a href="${splitUrlPagination(data.links[i].url)}">${data.links[i].label}</a>
                            </li>`;
    }
    pagination += `<li class="footable-page-arrow"><a data-page="next" href="${splitUrlPagination(data.next_page_url)}">›</a></li>
                            <li class="footable-page-arrow"><a data-page="last" href="${splitUrlPagination(data.last_page_url)}">»</a></li>
                        </ul>
                    </td>
                </tr>`;

    footerPagination.innerHTML = pagination;
}

function pushStateQuery(path) {
    window.history.pushState(null, null, path);
    return false;
}

/***
 *
 */
export {
    URL_APP,
    BASE_URL_API,
    statusLogin,
    redirectLogin,
    convertRupiah,
    alertError,
    LoadingButton,
    DisLoadingButton,
    lastPathUrl,
    getQueryUrl,
    countColumnTable,
    loadingTable,
    noDataTable,
    splitUrlPagination,
    convertIsoToDate,
    paginationTable,
    params
}