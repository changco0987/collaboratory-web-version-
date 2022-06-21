<?php 

    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    session_start();
    $userdata = new Userdata();
    $userdata->setId($_SESSION['account_id']);

    $row = pg_fetch_assoc(ReadUser($conn,$userdata));

    if($_POST['passwordTb'] == $_POST['confirmpassTb'])
    {
        //This will check if the inputted uak is equal to the uak in database
        if($row['uak'] == $_POST['uakTb'])
        {
            $userdata->setFirstName($row['firstname']);
            $userdata->setLastName($row['lastname']);
            $userdata->setUserId($row['userid']);
            $userdata->setPassword($_POST['passwordTb']);
            $userdata->setBirthday($row['birthday']);
            $userdata->setGender($row['gender']);
            $userdata->setProfilePicName($row['profilepicname']);
            $userdata->setUak("");
            $userdata->setEmail($row['email']);

            UpdateUser($conn,$userdata);
            
            echo '<script> window.location = "../page/login.php";</script>';
        }
        else
        {
            //error notification incase that the inputted email address doesn't have a linked to the database
            echo '<script> localStorage.setItem("state",2); window.location = "../page/resetpass.php";</script>';
        }
    }
    else
    {
        //error notification incase that the inputted email address doesn't have a linked to the database
        echo '<script> localStorage.setItem("state",1); window.location = "../page/resetpass.php";</script>';
    }

  


?>