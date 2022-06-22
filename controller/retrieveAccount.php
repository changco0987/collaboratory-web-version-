<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';


    $userdata = new Userdata();
    $userdata->setUserId($_POST['useridTb']);
    $userdata->setPassword($_POST['passwordTb']);

    $rowCount = pg_num_rows(ReadUser($conn,$userdata));

    //This will check if there's fetch data
    if($rowCount>0)
    {
        $dbData = pg_fetch_assoc(ReadUser($conn,$userdata));

        if($dbData['userid']==$_POST['useridTb'] &&
           $dbData['password']==$userdata->getPassword())
        {
            session_start();
            $_SESSION['id'] = $dbData['account_id'];
            header('Location: ../page/userDashboard.php');
            
        }

    }
    else
    {
        //return to login page and return an error message
    }



?>