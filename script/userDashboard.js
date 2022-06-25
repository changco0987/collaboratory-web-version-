
function logout()
{

    
    //This will clear all $_session 
    var destroySession = '<?php session_start();'+
    '$helper = array_keys($_SESSION);'+
    'foreach ($helper as $key){'+
    'unset($_SESSION[$key]);}?>';

    window.location = "../page/login.php";
}

function repoSett()
{
    window.location = "../page/repoSettings.php";
}