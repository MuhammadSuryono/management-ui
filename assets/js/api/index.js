import {alertError, BASE_URL_API, redirectLogin, URL_APP} from "./module.js";

function httpRequest(url, method, body, handle, errorHandler) {
  let path = url + window.location.search;
  $.ajax({
    url: BASE_URL_API + path,
    type: method,
    dataType: "json",
    headers: {
      "Authorization": `${localStorage.getItem("tokenType")} ${localStorage.getItem("token")}`,
      "Access-Control-Allow-Origin":"*",
      "Accept": "application/json",
    },
    data: JSON.stringify(body),
    processData: false,
    contentType: "application/json",
    cache: false,
    async: false,
    success: function (result) {
      handle(result);
    },
    error: function (jqXHR, exception) {
      let msg = "";
      if (jqXHR.status === 0) {
        msg = "Not connect.\n Verify Network.";
      } else if (jqXHR.status === 404) {
        msg = "Requested page not found. [404]";
      } else if (jqXHR.status === 401) {
        msg = `${jqXHR.statusText}`;
        alertError(msg);
        setInterval(() => {
          redirectLogin("?session=expired");
        }, 2000);
        return;
      }  else if (jqXHR.status === 422) {
        let res = jqXHR.responseJSON;
        let messageArray = JSON.parse(res.response.message);
        let message = "";
        messageArray.forEach((obj) => {
          message += `${Object.values(obj)} \n`;
        });
        msg = `${jqXHR.statusText}\n ${message}`;
      } else if (jqXHR.status === 500) {
        msg = "Internal Server Error [500].";
      } else if (exception === "parsererror") {
        msg = "Requested JSON parse failed.";
      } else if (exception === "timeout") {
        msg = "Time out error.";
      } else if (exception === "abort") {
        msg = "Ajax request aborted.";
      } else {
        msg = "Uncaught Error.\n" + jqXHR.responseText;
      }
      errorHandler(jqXHR.status, msg, jqXHR, exception);
    }
  });
}

function httpRequestUrlApp(url, method, body, handle, errorHandler) {
  $.ajax({
    url: URL_APP() + url,
    type: method,
    // dataType: "json",
    data: body,
    processData: false,
    // contentType:'application/json',
    cache: false,
    async: false,
    success: function (result) {
      handle(result);
    },
    error: function (jqXHR, exception) {
      var msg = "";
      if (jqXHR.status === 0) {
        msg = "Not connect.\n Verify Network.";
      } else if (jqXHR.status == 404) {
        msg = "Requested page not found. [404]";
      } else if (jqXHR.status == 500) {
        msg = "Internal Server Error [500].";
      } else if (exception === "parsererror") {
        msg = "Requested JSON parse failed.";
      } else if (exception === "timeout") {
        msg = "Time out error.";
      } else if (exception === "abort") {
        msg = "Ajax request aborted.";
      } else {
        msg = "Uncaught Error.\n" + jqXHR.responseText;
      }
      alertError("Error Request", msg);
      errorHandler(jqXHR.status, msg, jqXHR, exception);
    }
  });
}

export { httpRequest, httpRequestUrlApp };
