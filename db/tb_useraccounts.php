<?php

    include_once 'connection.php';#connection to database
    include_once '../Model/Userdata.php';#User Model



    function CreateUser($userdata = new Userdata())
    {

    }
    if($conn)
    {
        $query = pg_query($conn,"select * from tb_repositories");
        while($row = pg_fetch_object($query))
        {
        echo $row->repositoryname."<br/>";
        }
    }
    else
    {
    echo "Connection Error!";
    }
?>