//import './bootstrap';

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

$().ready(function () {});
