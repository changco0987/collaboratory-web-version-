<?php
    include_once '../db/connection.php';#connection to database
    include_once '../Model/Updatedata.php';#update Model



    

    function CreatePost($conn,$updatedata = new Updatedata)
    {

        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a');
        pg_query($conn,"insert into tb_updates(title,filename,note,post_datetime,account_id,repository_id)".
        "values('".$updatedata->getTitle(). "','" .$updatedata->getFilename()."','".$updatedata->getNote().
        "','".$date."',".$updatedata->getAccountId().",".$updatedata->getRepositoryId().")");
    }

    function ReadPost($conn,$updatedata = new Updatedata)
    {
        
        if($updatedata->getRepositoryId() != 0 && $updatedata->getAccountId() != 0)
        {
            //This is used to update/edit user post
            //search by all members
            $dbData = pg_query($conn,"select * from tb_updates where account_id = " .$updatedata->getAccountId(). " and repository_id = ".
            $updatedata->getRepositoryId());
        }
        else if($updatedata->getId() == 0)
        {
            //This is used to get retrieve all repository post
            //search by repository creator
            $dbData = pg_query($conn, "select * from tb_updates where repository_id = " .$updatedata->getRepositoryId());
        }
        else
        {
            $dbData = pg_query($conn, "select * from tb_updates where update_id = " .$updatedata->getId());
        }

        return $dbData;
        exit();
    }

    function UpdatePost($conn,$updatedata = new Updatedata)
    {
        pg_query($conn,"update tb_updates set title = '".$updatedata->getTitle()."', filename = '".$updatedata->getFilename()."',".
        " note = '".$updatedata->getNote()."' where update_id = ".$updatedata->getId());
    }

    function DeletePost($conn,$updatedata = new Updatedata)
    {
        pg_query($conn,"delete from tb_updates where update_id = "+$updatedata->getId());
    }
?>