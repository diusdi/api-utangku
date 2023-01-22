$(document).ready(function () {
    table = $("#categoryTable").DataTable({
        ajax: "",
        columns: [
            { data: "no" },
            { data: "judul" },
            { data: "nama" },
            { data: "info" },
        ],
    });
});
