function download(){

    var url = $("#url").val();

    $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/test.php",
        datatype: "text",
        data: 'url=' + url + '&do_download=' + 'true',
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            alert(response);
        }
    });

}