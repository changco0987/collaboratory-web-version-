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

        //This will check if the inputted password is equal to inputted userid
        if($dbData['password']==$userdata->getPassword())
        {
            session_start();
            $_SESSION['id'] = $dbData['account_id'];
            $_SESSION['userid'] = $dbData['userid'];
            $_SESSION['username'] = $dbData['firstname']. " " .$dbData['lastname'];
            $_SESSION['profilepicname'] = $dbData['profilepicname'];
            header('Location: ../page/userDashboard.php');
            
        }
        else 
        {
            //This will throw a incorrect password message
            echo '<script> localStorage.setItem("state",2); window.location = "../page/login.php";</script>';
        }

    }
    else
    {
        //This will throw a incorrect userid message
        echo '<script> localStorage.setItem("state",1); window.location = "../page/login.php";</script>';
    }



?>