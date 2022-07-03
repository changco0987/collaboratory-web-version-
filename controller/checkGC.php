<?php
    include_once '../db/connection.php';
    require_once '../Model/Groupchatdata.php';
    require_once '../db/tb_groupChats.php';

    $gcdata = new Groupchatdata();
    $gcdata->setRepositoryId($_SESSION['repositoryid']);

    $row = pg_num_rows(ReadGC($conn,$gcdata));
    if($row>0)
    {
        $dbResult = pg_fetch_assoc(ReadGC($conn,$gcdata));
        $_SESSION['gcId'] = $dbResult['groupchat_id'];
    }
    else
    {
        CreateGC($conn,$gcdata);
        $dbResult = pg_fetch_assoc(ReadGC($conn,$gcdata));
        $_SESSION['gcId'] = $dbResult['groupchat_id'];
    }


?>