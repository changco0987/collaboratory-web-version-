<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';



    $userdata = new Userdata();

    $userlist = array();
    $rowCount = pg_num_rows(ReadUser($conn,$userdata));
    for($count = 0; $count < $rowCount; $count++)
    {
        $dbData = pg_fetch_assoc(ReadUser($conn,$userdata),$count);
        $userlist[] = array($dbData['account_id'], $dbData['firstname']." ".$dbData['lastname'],$dbData['profilepicname']);
    }
    
?>