
//This will clear the sessioStorage used from other pages and also the cookie used in search
sessionStorage.clear();

document.cookie = "searchVal = " + "";

function logout()
{

    
    //This will clear all $_session 

    window.location = "../controller/cleanUserdata.php";
}

function repoSett()
{
    window.location = "../page/repoSettings.php";
}