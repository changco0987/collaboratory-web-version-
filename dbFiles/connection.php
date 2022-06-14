<?php
    $server = "localhost";
    $port = "5432";
    $dbname = "collaboratorydb";
    $dbusername = "postgres";
    $dbpassword = "123";

    $conn = pg_connect("host=".$server. " port=".$port. " dbname=".$dbname. " user=".$dbusername. " password=".$dbpassword);


    if($conn)
    {
        $query = pg_query($conn,"select * from tb_useraccounts");
        while($row = pg_fetch_object($query))
        {
            echo $row->firstname."<br/>";
        }
    }
    else
    {
        echo "Connection Error!";
    }
?>