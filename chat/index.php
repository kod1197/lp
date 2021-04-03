<?php
session_start();
require_once "../cnf/includes.php";
require_once "../cnf/db_rb.php";

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    foreach ($js as $js_file){
        echo $js_file;
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
        function send() {
            var message = $("#message").val();
            $.ajax({
                async: false,
                type: "POST",
                url: "save.php",
                dataType:"text",
                data: 'message=' + message,
                error: function () {
                    alert( "Не смог" );
                },
                success: function (response) {
                    $("#message").val('');
                }
            })
        }
        function load() {
            $.ajax({
                async: false,
                type: "POST",
                url: "load.php",
                dataType:"text",
                data: 'empty=' + 1,
                error: function () {
                    alert( "Не смог" );
                },
                success: function (response) {
                    $("#chatbox").html(response);
                }
            })
        }
        load();
        setInterval(load,3000);
    </script>
</head>
<body>
<div id="chatbox">
    
</div>
<form action="javascript:send();">
    <input type="text" placeholder="Сообщение" id="message"><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>