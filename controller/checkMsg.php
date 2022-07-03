<?php
    include_once '../db/connection.php';
    require_once '../Model/Messagedata.php';
    require_once '../db/tb_messages.php';

    $messsagedata = new Messagedata();

    session_start();
    $messsagedata->setMessage($_POST['chatTb']);
    $messsagedata->setAccountId($_SESSION['id']);
    $messsagedata->setGroupchatId($_SESSION['gcId']);

    CreateMsg($conn,$messsagedata);











    $row = pg_num_rows(ReadMsg($conn,$messagedata));


    $dbData = pg_fetch_assoc(ReadMsg($conn,$messagedata),$row-1);

    echo $dbData['message'];







?>