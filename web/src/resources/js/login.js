function start() {
    $("#capaprogress").html(
        `<img src="/assets/img/loading01.svg" style="width:25px"/> cargando`
    ),
        $("#loading-super").css("width", $(document).width()),
        $("#loading-super").css("height", $(document).height()),
        $("#loading-super").show(),
        $("#loading-progress").show();
}
function stop() {
    window.setTimeout(() => {
        $("#capaprogress").empty(),
            $("#loading-super").hide(),
            $("#loading-progress").hide();
    }, 1000);
}
function stop2() {
    $("#capaprogress").empty();
    $("#loading-super").hide();
    $("#loading-progress").hide();
}
jQuery.ajaxSetup({ cache: !1 }),
    $().ready(function () {
        $(document)
            .ajaxStart(function () {
                start();
            })
            .ajaxComplete(function () {
                stop();
            });
    });

$().ready(function () {
    $("#btn-back").click(function () {
        location.reload();
    });
    $("#login").keyup(function (e) {
        $("#btn-login").attr("disabled", false);
        if (!$(this).val()) {
            $("#btn-login").attr("disabled", true);
        }
    });

    $("#passwd").keyup(function (e) {
        $("#btn-passwd").attr("disabled", false);
        if (!$(this).val()) {
            $("#btn-passwd").attr("disabled", true);
        }
    });

    $("#code").keyup(function (e) {
        $("#btn-sign-in").attr("disabled", false);
        if (!$(this).val()) {
            $("#btn-sign-in").attr("disabled", true);
        }
    });

    $("#formActionLogin").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            timeout: 1200000,
            beforeSend: function () {
                start();
            },
            error: function (response) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.responseJSON.message,
                });
            },
            success: function (response) {
                if (response.redirect === 1) {
                    location.href = "/login/cas";
                } else {
                    stop2();
                    $("#loginPasswd").val(response.data.login);
                    $("#section-login").hide("slow");
                    $("#section-passwd").show("slow");
                }
            },
            complete: function () {
                stop();
            },
        });
    });

    $("#formActionPasswd").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            timeout: 1200000,
            beforeSend: function () {
                start();
            },
            error: function (response) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.responseJSON.message,
                });
            },
            success: function (response) {
                stop2();
                $("#loginSigin").val(response.data.login);
                $("#section-passwd").hide("slow");
                $("#section-code").show("slow");
            },
            complete: function () {
                stop();
            },
        });
    });

    $("#formActionSignIn").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            timeout: 1200000,
            beforeSend: function () {
                start();
            },
            error: function (response) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.responseJSON.message,
                });
            },
            success: function (response) {
                location.href = "/dashboard";
            },
            complete: function () {
                stop();
            },
        });
    });
});
