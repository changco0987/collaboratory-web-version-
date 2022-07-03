<?php
    include_once '../db/connection.php';#connection to database
    require_once '../Model/Updatedata.php';#update Model
    require_once '../db/tb_updates.php';

    session_start();
    $updatedata = new Updatedata();
    $updatedata->setRepositoryId($_SESSION['repositoryid']);

    $rowCount = pg_num_rows(ReadPost($conn,$updatedata));


    if($rowCount > $_SESSION['currentRow'])
    {
        $dbData = pg_fetch_assoc(ReadPost($conn,$updatedata),$rowCount-1);
        echo json_encode($dbData);
    }

?>