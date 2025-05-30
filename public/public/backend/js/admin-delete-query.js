function getPlan(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("plan_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/delete-plan?id=" + parameter);
}

function getUser(parameter) {
    "use strict";
    $("#status-modal").modal("show");
    var link = document.getElementById("user_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/update-status?id=" + parameter);
}

function deleteUser(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("deleted_user_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/delete-user?id=" + parameter);
}

function getPaymentMethod(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("payment_gateway_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/delete-payment-method?id=" + parameter);
}

function getTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/transaction-status/" + parameter + "/SUCCESS");
}

function getOfflineTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", SITE_DATA.ROOT_URL+"/admin/offline-transaction-status/" + parameter + "/SUCCESS");
}

function loginUser(parameter) {
    "use strict";
    $("#login-modal").modal("show");
}

function addUser(parameter) {
    "use strict";
    $("#add-modal").modal("show");
}