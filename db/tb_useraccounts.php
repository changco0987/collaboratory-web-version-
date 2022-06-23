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
        

        if(!empty($userdata->getId()))
        {
            $dbData = pg_query($conn,"select * from tb_useraccounts where account_id = " .$userdata->getId());
        }
        else if(!empty($userdata->getEmail()))
        {
            $dbData = pg_query($conn, "select * from tb_useraccounts where email = '" .$userdata->getEmail(). "'");
        }
        else if(!empty($userdata->getUserId()))
        {
            $dbData = pg_query($conn, "select * from tb_useraccounts where userid = '" .$userdata->getUserId(). "'");
        }
        else
        {
            $dbData = pg_query($conn,"select * from tb_useraccounts");
        }

        return $dbData;

    }

    function UpdateUser($conn,$userdata = new Userdata)
    {
        pg_query($conn,"update tb_useraccounts set firstname = '".$userdata->getFirstName()."', lastname='".$userdata->getLastName()."', userid='".$userdata->getUserId()."',".
        " password='".$userdata->getPassword()."', birthday='".$userdata->getBirthday()."', gender = '".$userdata->getGender()."', profilepicname = '".$userdata->getProfilePicName().
        "',uak = '".$userdata->getUak()."', email = '".$userdata->getEmail()."' where account_id =".$userdata->getId());
    }

    function DeleteUser($conn,$userdata = new Userdata)
    {
        pg_query($conn,"delete from tb_useraccounts where account_id = "+$userdata->getId());
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