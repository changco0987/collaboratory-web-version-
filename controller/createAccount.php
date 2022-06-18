<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    $userdata = new Userdata();
    $userdata->setFirstName($_POST['firstnameTb']);
    $userdata->setLastName($_POST['lastnameTb']);
    $userdata->setUserId($_POST['useridTb']);




    $rowCount = pg_num_rows(ReadUser($conn,$userdata));
    #this function will check if the userid is already taken by another user, if the rowCount is > 0 it means it retrieve same userid in database
    if($rowCount==0)
    {

        print_r($rowCount);

        $userdata->setPassword(strtoupper(hash('sha256',$_POST['passwordTb'])));
        $userdata->setBirthday($_POST['birthday']);
        $userdata->setGender($_POST['genderRb']);
        $userdata->setEmail($_POST['emailTb']);
        
        $rowCount = pg_num_rows(ReadUser($conn,$userdata));
        
         #this function will check if the email is already taken by another user, if the rowCount is > 0 it means it retrieve same email in database
        if($rowCount==0)
        {
            CreateUser($conn,$userdata);#This will call the funtion to create data in the database
            header('Location: ../page/login.php');
            exit();
        }


    }

    #this will be trigger if the userid or email has already taken in database
    header('Location: ../page/signup.php');
    exit();
    

        



?>