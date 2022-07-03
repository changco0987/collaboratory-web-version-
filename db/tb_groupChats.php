<?php
    include_once '../db/connection.php';#connection to database
    include_once '../Model/Groupchatdata.php';#update Model



    

    function CreateGC($conn,$groupchatdata = new Groupchatdata)
    {

        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a');
        pg_query($conn,"insert into tb_groupchats(repository_id) values(". $groupchatdata->getRepositoryId(). ")");
    }

    function ReadGC($conn,$groupchatdata = new Groupchatdata)
    {
        
        $dbData = pg_query($conn, "select * from tb_groupchats where repository_id =" .$groupchatdata->getRepositoryId());
        
        return $dbData;
        exit();
    }


?>