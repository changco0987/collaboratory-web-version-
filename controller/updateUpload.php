<?php
   include_once '../db/connection.php';
   require_once '../Model/Updatedata.php';
   require_once '../db/tb_updates.php';


   $updatedata = new Updatedata();

   $updatedata->setTitle($_POST['editTitleTb']);
   $updatedata->setNote($_POST['editNoteTb']);
   $updatedata->setId($_POST['updateid']);

   UpdatePost($conn,$updatedata);

   header('Location: ../page/repoDashboard.php');

?>