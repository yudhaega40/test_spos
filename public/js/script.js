$(document).ready(function () {
    var fitur_json = [];

    $(document).on("click", ".number-spinner button", function () {
        var btn = $(this),
            oldValue = btn
                .closest(".number-spinner")
                .find("input")
                .val()
                .trim(),
            newVal = 0;

        if (btn.attr("data-dir") == "up") {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest(".number-spinner").find("input").val(newVal);
    });

    $(document).on("click", "#btn_simpan_jadwal", function () {
        var forms = [];

        $.each(["form_utama", "form_tanggal"], function (index, value) {
            forms[index] = document.forms[value];
        });

        var targetForm = forms[1];

        alert("Target form: " + targetForm.name);

        $.each(forms, function (i, form) {
            if (i != 0) {
                $(form)
                    .find("input, select, textarea")
                    .appendTo($("#form-group-target"));
            }
        });

        $(targetForm).submit();
    });

    $(".modal-aksi").on("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var action = $(button).data("bs-aksi");
        var idPaket = $(button).data("bs-id-paket");

        if (action == "aktifkan") {
            $(this)
                .find("#btn_aksi")
                .attr("href", "/paket/aktifkan/" + idPaket);
        } else if (action == "nonaktifkan") {
            $(this)
                .find("#btn_aksi")
                .attr("href", "/paket/nonaktifkan/" + idPaket);
        } else if (action == "hapus") {
            $(this)
                .find("#btn_aksi")
                .attr("href", "/paket/hapus-paket/" + idPaket);
        }
    });

    $(".modal-tagihan").on("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var action = $(button).data("bs-aksi");
        var idTagihan = $(button).data("bs-id-tagihan");

        if (action == "aktifkan") {
            //unused
            $(this)
                .find("#btn_aksi")
                .attr("href", "/paket/aktifkan/" + idTagihan);
        } else if (action == "nonaktifkan") {
            //unused
            $(this)
                .find("#btn_aksi")
                .attr("href", "/paket/nonaktifkan/" + idTagihan);
        } else if (action == "hapus") {
            $(this)
                .find("#btn_aksi")
                .attr("href", "/riwayat-tagihan/hapus/" + idTagihan);
        }
    });

    $(".modal-logout").on("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var action = $(button).data("bs-aksi");

        if (action == "logout") {
            $(this).find("#btn_aksi").attr("href", "/logout");
        }
    });

    $(document).on(
        "click",
        ".caret, .parent-checkbox, .parent-checklabel",
        function (e) {
            // console.log($(this));
            // if ($(this).hasClass("caret")) {
            $(this)
                .parents(".parent")
                .find(".nested")
                .toggleClass("show-children");
            $(this)
                .parents(".parent")
                .find(".caret-icon")
                .toggleClass("rotate");

            // }
        }
    );
});
