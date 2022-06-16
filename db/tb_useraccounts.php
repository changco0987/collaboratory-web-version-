<?php

    include_once 'connection.php';#connection to database
    include_once '../Model/Userdata.php';#User Model



    function CreateUser($conn,$userdata = new Userdata)
    {
        pg_query($conn,"insert into tb_useraccounts(firstname,lastname,userid,password,birthday,gender,profilepicname,uak,email)".
        "values('".$userdata->getFirstName(). "','" .$userdata->getLastName(). "','" .$userdata->getUserId(). "','" .$userdata->getPassword(). "','"
        .$userdata->getBirthday(). "','" .$userdata->getGender(). "','" .$userdata->getProfilePicName(). "','" .$userdata->getUak(). "','" .$userdata->getEmail(). "')");
    }

    function ReadUser($conn,$userdata = new Userdata)
    {
        
    }

    function UpdateUser($conn,$userdata = new Userdata)
    {

    }

    function DeleteUser($conn,$userdata = new Userdata)
    {

    }
 
    #if($conn)
    #{
    #    $query = pg_query($conn,"select * from tb_repositories");
    #    while($row = pg_fetch_object($query))
    #   {
    #   echo $row->repositoryname."<br/>";
    #    }
    #}
    #else
    #{
    #echo "Connection Error!";
    #}
    
?>