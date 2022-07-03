<?php
    include_once '../db/connection.php';
    require_once '../Model/Updatedata.php';
    require_once '../db/tb_updates.php';

    session_start();
    if(isset($_POST['submitBtn']))
    {
        $updatedata = new Updatedata();

        $webPath = 'C:/xampp/htdocs/server/repoFile_id'.$_SESSION["repositoryid"].'/';
        $desktopPath = 'C:/Users/willi/AppData/Roaming/Collaboratory/Collaboratory/1.0.0/repoFile_id'.$_SESSION["repositoryid"].'/';
        $tempFilename = '';
        $fileExtension = pathinfo($_FILES['fileTb']['name'],PATHINFO_EXTENSION);

        $updatedata->setTitle($_POST['titleTb']);
        $updatedata->setNote($_POST['noteTb']);
        $updatedata->setAccountId($_SESSION['id']);
        $updatedata->setRepositoryId($_SESSION['repositoryid']);


        //This will check if the user has file uploaded
        if($_FILES['fileTb']['name']!="")
        {
            //This will check if the directory folder is already exist (web)
            if (!file_exists($webPath))
            {
                mkdir($webPath.$_SESSION['repositoryid'], 0777, true);
            }


            //This will check if the directory folder is already exist (desktop)
            if (!file_exists($desktopPath))
            {
                mkdir($desktopPath.$_SESSION['repositoryid'], 0777, true);
            }



            //This will check if the filename is not more than 50 characters
            if(strlen($_FILES['fileTb']['name'])>50)
            {
                $updatedata->setFilename(substr($_FILES['fileTb']['name'],0,40).".".$fileExtension);
                
            }
            else
            {
                $updatedata->setFilename($_FILES['fileTb']['name']);
            }

            $tempFilename = $updatedata->getFilename();//This will be use in renaming the file if it was already exist in the storage path

            //This will insert the file numbering example: filename(1).txt to avoid overwriting the file in the folder directory
            $fileCount = 1;
            while(file_exists($webPath.$tempFilename))
            {
                $tempFilename = substr($updatedata->getFilename(),0,strpos($updatedata->getFilename(),'.')) .'(' .$fileCount. ')'. '.' .$fileExtension;
                $fileCount++;
            }
            $updatedata->setFilename($tempFilename);
            $uploadedFile = $_FILES['fileTb']['tmp_name'];
            echo $tempFilename;
            copy($uploadedFile,$webPath.$tempFilename);//This will move the uploaded file into file directory (web)
            copy($uploadedFile,$desktopPath.$tempFilename);//This will move the uploaded file into file directory (desktop) 
           
        }

        CreatePost($conn,$updatedata);
        header('Location: ../page/repoDashboard.php');
        

    }

?>