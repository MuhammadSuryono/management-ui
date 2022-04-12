import {countColumnTable, loadingTable, noDataTable} from "../api/module.js";

const bodyTableItemBudget = document.getElementById("body-item-budget")
const tableListItemBudget = document.getElementById("table-item-budget")
let totalColumn = countColumnTable(tableListItemBudget)

bodyTableItemBudget.innerHTML = loadingTable(totalColumn)

setInterval(() => {
    bodyTableItemBudget.innerHTML = noDataTable(totalColumn)
}, 5000)