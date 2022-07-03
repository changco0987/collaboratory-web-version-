<?php
    include_once '../db/connection.php';
    require_once '../Model/Messagedata.php';
    require_once '../db/tb_messages.php';


    session_start();
    
    $msgdata = new Messagedata();
    $msgdata->setMessage($_POST['chatTb']);
    $msgdata->setAccountId($_SESSION['id']);
    $msgdata->setGroupchatId($_SESSION['gcId']);

    CreateMsg($conn,$msgdata);


    header("Location: ../page/repoDashboard.php");







    /*
    $row = pg_num_rows(ReadMsg($conn,$msgdata));


    $dbData = pg_fetch_assoc(ReadMsg($conn,$msgdata),$row);

    echo $dbData['message'];

    */





?>