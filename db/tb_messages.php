<?php
    include_once '../db/connection.php';#connection to database
    require_once '../Model/Messagedata.php';#update Model



    

    function CreateMsg($conn,$messagedata = new Messagedata)
    {

        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a');
        pg_query($conn,"insert into tb_messages(message,account_id,groupchat_id) values('".$messagedata->getMessage()."'," .$messagedata->getAccountId().",".$messagedata->getGroupchatId().")");
    }

    function ReadMsg($conn,$messagedata = new Messagedata)
    {
        
        $dbData = pg_query($conn, "select * from tb_messages where groupchat_id =" .$messagedata->getGroupchatId());
        
        return $dbData;
        exit();
    }

    function UpdateMsg($conn,$messagedata = new Messagedata)
    {
        pg_query($conn,"update tb_messages set message = '" . $messagedata->getMessage() . "' where groupchat_id= '" . $messagedata->getGroupchatId());
    }

    function DeleteMsg($conn,$messagedata = new Messagedata)
    {
        pg_query($conn,"delete from tb_messages where groupchat_id = " .$messagedata->getGroupchatId());
    }
?>