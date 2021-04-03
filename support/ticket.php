<?php
    session_start();
    require "../cnf/db_rb.php";
    require_once "../cnf/includes.php";
    
    $id = $_GET['id'];
    
    $ticket = R::findOne('support', "id = ?", array($_GET['id']));
    
    if (empty($ticket)){
        header("Location: https://kod1197.ru/lp/lk/testlk.php");
        die('Неверный адрес');
    }
?>
<head>
    <title>Тех. поддержка</title>
</head>
<body>
    <div id="support_chat">
        <div id="main_section">
            <?php 
                echo 'Вопрос: '.$ticket->header .'<br>';
                echo $ticket->text;
            ?>
            <hr>
        </div>
        <div id="chat_section">
            <?php 
                if($_SESSION['kod1197']['login'] == 'kod1197'){
                    echo '
                    <input type="hidden" id="id" value="'.$id.'">
                    <textarea id="answer"></textarea>
                    <br>
                    <input type="button" value="Ответить" id="do_answer" onclick="sendAnswer()">
                    <br>
                    <input type="button" value="Удалить" onclick="delTicket('.$id.')">
                    ';
                }
                if(!empty($ticket->answer)){
                    if($_SESSION['kod1197']['login'] == 'kod1197'){
                        
                    }
                    else{
                        echo 'Ответ: <br>';
                        echo $ticket->answer . '<br>';
                        echo '<hr>';
                        echo 'Статус тикета: '. $ticket->status;
                    }
                    
                }
                else{
                    if($_SESSION['kod1197']['login'] == 'kod1197'){
                        
                    }
                    else{
                       echo 'В ближайщее время Вам ответят!<br>';
                       echo 'Статус тикета: '. $ticket->status; 
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://kod1197.ru/lp/support/admin.js"></script>
    <?php
    foreach ($js as $js_file){
    echo $js_file;
    }
    ?>
</body>