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
        <script src="../script/" type="text/javascript"></script>
        <link rel="icon" href="../Asset/AppIcon.ico">
        <title>Collaboratory</title>
</head>
<body>

    <div class="container-fluid mt-3 flex-fill" id="sectionContainer">

      <div class="row ps-3 pe-3 ms-2 me-2">
        <div class="text-center col-md-4" id="profileContainer" >
            <img class="rounded-circle mx-auto" id="profilepic" alt="80x80" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"
            data-holder-rendered="true">
            <h3 class="text-center" id="username">user name</h3>
            <p class="text-center" id="userid">user id</p>
            <!--Buttons-->
            <div valign="btnContainer">
              <button type="button" class="btn btn-primary" id="createRepoBtn">
                <span class="btn-label"><i class="bi-folder"></i></span>Create Repository</button>
              <button type="button" class="btn btn-primary" id="accSettBtn">
                <span class="btn-label"><i class="bi-gear"></i></span>Account Settings</button>
              <button type="button" class="btn btn-primary" id="signoutBtn">
                <span class="btn-label"><i class="bi-back"></i></span>Sign-out</button>
            </div>
            
        </div>
        <div class="col-md-8" id="repoContainer">
          <!--Table title-->
          <i class="bi-folder-fill"></i><h4 id="tableTitle">My Repository</h4>
          <table class="table" style="background-color: #171433; color: #E0EBED; border-radius: 10px;">
            <thead>

            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
              </tr>      
              <tr>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
</body>
</html>