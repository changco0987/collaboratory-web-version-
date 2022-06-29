<?php
    include_once '../db/connection.php';
    require_once '../Model/Repodata.php';
    require_once '../db/tb_repositories.php';

    echo $_POST['currentRepoId'];
    $dbData = pg_fetch_assoc(ReadRepo($conn,$_POST['currentRepoId'],"repo"));
    //$repodata = new Repodata();
    session_start();
    $_SESSION['repoid'] = $dbData['repository_id'];
    $_SESSION['reponame'] = $dbData['repositoryname'];
    $_SESSION['members'] = json_encode($dbData['members']);

   /* $repoadata = array();
    $repoadata = $dbData['members'];

    foreach($dbData['members'][0] as $data)
    {
        echo $data."<br>";
    }
*/

    header("Location: ../page/repoSettings.php");

?>