$(document).ready(function () {
    $(".modal-logout").on("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var action = $(button).data("bs-aksi");

        if (action == "logout") {
            $(this).find("#btn_aksi").attr("href", "/logout");
        }
    });
});
