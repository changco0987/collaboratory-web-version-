<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only Bootsrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper (bootstrap)-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
       <!--Bootstrap icon--> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        
        <!--My CSS-->
        <link rel="stylesheet" href="../css/userDashboard.css">



        <!--My Javascript-->
        <script type="text/javascript" src="../script/userDashboard.js"></script>
  
        <link rel="icon" href="../Asset/AppIcon.ico">
        <title>Collaboratory</title>
</head>
<body>
<?php
    include_once '../db/connection.php';
    require_once '../Model/Repodata.php';
    require_once '../db/tb_repositories.php';

    session_start();
    
    if(isset($_SESSION['reponame']) || isset($_SESSION['repoid']))
    {
      unset($_SESSION['reponame']);
      unset($_SESSION['members']);

      unset($_SESSION['repoid']);
    }
?>
    <div class="container-fluid mt-3 flex-fill" id="sectionContainer">

      <div class="row ps-3 pe-3 ms-2 me-2">
        <div class="text-center col-sm-4 col-md-5 col-lg-4 col-xl-3 col-xxl-3" id="profileContainer" >
          <div id="spacer"></div>  
          <img class="img-fluid h-25 w-50" id="profilepic" alt="50x50" src="../Asset/user.png" style="border-radius: 50%;">
            <script>
              //this will check if the user has profile picture
              var image ='<?php echo $_SESSION["profilepicname"]?>';
              console.log(image);
              if(image!='')
              {
                document.getElementById('profilepic').src ="http://localhost/server/Image/"+image;
              }

            </script>
            <h3 class="text-center" id="username"><?php echo $_SESSION['username'];?></h3>
            <p class="text-center" id="userid"><?php echo $_SESSION['userid'];?></p>
            <!--Buttons-->
            <div class="btnContainer">
              <button type="button" class="btn btn-primary" id="createRepoBtn" onclick="repoSett()">
                <span class="btn-label"><i class="bi-folder"></i></span>Create Repository</button>
            <!--  <button type="button" class="btn btn-primary" id="accSettBtn" onclick="repoSett()">
                <span class="btn-label"><i class="bi-gear"></i></span>Account Settings</button> -->
              <button type="button" class="btn btn-primary" id="signoutBtn" onclick="logout()">
                <span class="btn-label"><i class="bi-back"></i></span>Sign-out</button>
            </div>
        </div>
        

        <div class="col-sm-8 col-md-7 col-lg-8 col-xl-9 col-xxl-9" id="repoContainer">
          <!--Table title-->
          <i class="bi-folder-fill"></i><h4 id="tableTitle">My Repository</h4>
          <div class="list-group">
              <?php 
                    //$dbData = pg_fetch_assoc(ReadRepo($conn,$_SESSION['id'],"user"));
                    $row = pg_num_rows(ReadRepo($conn,$_SESSION['id'],"user"));

                    for($count = 0; $count < $row; $count++)
                    {
                      $dbData = pg_fetch_assoc(ReadRepo($conn,$_SESSION['id'],"user"),$count);
                      ?>
                        <a id="<?php echo $dbData['repository_id'];?>" href="#" class="list-group-item list-group-item-action" onclick="repoClick(this.id,this.name)" name="<?php echo $dbData['repositoryname'];?>"><?php echo $dbData['repositoryname'];?></a>
                        
                      <?php
                    }
              ?>
              
          </div>
        </div>
      </div>
    </div>
    <script>
      function repoClick(repoId,repoName)
      {
          sessionStorage.setItem('repositoryName',repoName);
          sessionStorage.setItem('repositoryid',repoId);

          document.cookie = "repositoryName="+repoName;
          document.cookie = "repositoryid="+repoId;
          window.location = "../page/repoDashboard.php";
      }   
    </script>
</body>

</html>