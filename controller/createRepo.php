<?php 
    include_once '../db/connection.php';
    require_once '../Model/Repodata.php';
    require_once '../db/tb_repositories.php';


    session_start();
    $repodata = new Repodata();

    //if this iteration is true, then it means it just update the current repository, else, it will create a new repository
    if(isset($_SESSION['repoid']))
    {
        $repodata->setId($_POST['repoid']);
        $repodata->setRepositoryName($_SESSION['reponame']);
    }
    else
    {
        $repodata->setRepositoryName($_POST['reponameTb']);
        $repodata->setAccountId($_SESSION['id']);
        if(isset($_POST['finalMembers']))
        {
            $repodata->setMembers($_POST['finalMembers']);
        }
    
        CreateRepo($conn,$repodata);
    }

    header('Location: ../page/userDashboard.php');
    
?>