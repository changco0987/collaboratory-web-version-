<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    #This will find the specific account userid
    function FindUserid($conn,$userdata = new Userdata)
    {
        if(ReadUser($conn,$userdata))
        {
            
        }
    }

?>