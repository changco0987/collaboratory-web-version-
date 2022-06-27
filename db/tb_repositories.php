<?php

    include_once 'connection.php';#connection to database
    include_once '../Model/Repodata.php';#User Model



    function CreateRepo($conn,$repodata = new Repodata)
    {
        pg_query($conn,"insert into tb_repositories(repositoryname,members,account_id)".
        "values('".$repodata->getRepositoryName(). "',ARRAY[" .$repodata->getMembers()[0].
        "],'".$repodata->getAccountId()."')");
    }

    function ReadRepo($conn,$id,$used)
    {
        if($used == "user")
        {
            //search by all members
            $dbData = pg_query($conn,"select * from tb_repositories where " .$id. " = any(members)");
        }
        else if($used == "repo")
        {
            //search by repository creator
            $dbData = pg_query($conn, "select * from tb_repositories where repository_id = " .$id);
        }

        return $dbData;
        exit();
    }

    function UpdateRepo($conn,$repodata = new Repodata)
    {
        pg_query($conn,"update tb_repositories set repositoryname = '".$repodata->getRepositoryName()."', members='{".memberList($repodata->getMembers())."}'".
        " where repository_id =".$repodata->getId());
    }

    function DeleteRepo($conn,$repodata = new Repodata)
    {
        pg_query($conn,"delete from tb_useraccounts where account_id = "+$repodata->getId());
    }

    function memberList($members = array())
    {
        $allMembers = "";
        
        if(isset($members))
        {
            $allMembers = json_encode($members);
            echo $allMembers;
            
        }
        else
        {
            return "";
        }
        echo str_replace('"/', '', $allMembers);
        return $allMembers;
    }
?>