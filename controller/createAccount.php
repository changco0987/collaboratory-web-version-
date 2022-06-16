<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    $userdata = new Userdata();
    $userdata->setFirstName($_POST['firstnameTb']);
    $userdata->setLastName($_POST['lastnameTb']);
    $userdata->setUserId($_POST['useridTb']);
    $userdata->setPassword(strtoupper(hash('sha256',$_POST['passwordTb'])));
    $userdata->setBirthday($_POST['birthday']);
    $userdata->setGender($_POST['genderRb']);
    $userdata->setEmail($_POST['emailTb']);

    CreateUser($conn,$userdata);#This will call the funtion to create data in the database
?>