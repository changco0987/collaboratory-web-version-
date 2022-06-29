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
    <link rel="stylesheet" href="../css/repoDashboard.css">
    <link rel="icon" href="../Asset/AppIcon.ico">
    <title>Collaboratory</title>
</head>
<body>
<?php
    session_start();
?>
    <div class="form-popup" id="myForm" style="border-radius:20px;">
        <form action="controller.php" method="post" enctype="multipart/form-data" class="form-container" style="background-color: #3070b1; border-radius:12px; color:white;">
            <h1></h1>
            
            <button type="button" class="btn-close" onclick="closeForm()" style="position:relative; float:right;"></button>
            <br>
            <label id="Title">Title: </label>
            <input class="form-control" type="text" name="titleTb" id="titleTb" maxlength="30" style="color: black;" required><br>

            <label id="TaskFile"></label>
            <input class="form-control" type="File" name="fileTb" id="fileTb"><br>

            <label id="Note">Note: </label>
            <textarea class="form-control" type="text" name="noteTb" id="noteTb" maxlength="280" style="color: black;" required></textarea><br>



            <input type="submit" class="btn" name="submitBtn" value="Upload" id="submitBtn">
        </form>
    </div>

    <div class="row fixed-top">
        <div class="col-sm-12 col-xs-12 col-md-12 flex-column" id="headerContainer">
            <header>
                <img src="../Asset/AppIcon.png" class="img-fluid" id="pageIcon" alt="page icon">
                <br>
                <h1 id="pageTitle">ollaboratory</h1>
            </header> 
        </div>
    </div>
    <div class="container-fluid mt-3 flex-fill" id="sectionContainer">
        
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 70px;">
                <div id="containerTop">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                            <img class="img-fluid" id="profilepic" alt="50x50" src="../Asset/user.png" style="border-radius: 50%;
                                                                                                              height: 185px; 
                                                                                                              width: 185px; 
                                                                                                              margin: 35px;">

                            <script>
                                    function openForm() 
                                    {
                                        document.getElementById("myForm").style.display = "block";
                                    }

                                    function closeForm() 
                                    {
                                        document.getElementById("myForm").style.display = "none";
                                    }
                            //this will check if the user has profile picture
                            var image ='<?php echo $_SESSION["profilepicname"]?>';
                            console.log(image);
                            if(image!='')
                            {
                                document.getElementById('profilepic').src ="http://localhost/server/Image/"+image;
                            }

                            </script>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <h3 class="" id="username"><?php echo $_SESSION['username'];?></h3>
                            <p class="" id="userid"><?php echo $_SESSION['userid'];?></p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">            
                            <button class="btn btn-primary" id="backBtn" onclick="back()"><i class="bi-arrow-return-right"></i></button>
                            <button class="btn btn-primary" id="userSettBtn" ><i class="bi-gear"></i></button>
                            <form action="../controller/getRepoInfo.php" method="POST">
                                <input type="hidden" id="currentRepoId" name="currentRepoId" style="display:none">
                                <button type="submit" class="btn btn-primary" id="editrepoBtn">Edit Repository</button>
                            </form>
                            <script>
                                var repoid = sessionStorage.getItem('repositoryid');
                                document.getElementById("currentRepoId").value = repoid;
                            </script>
                            <button class="btn btn-primary" id="chatBtn" >chat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div id="containerMid">
                    <div class="row">
                        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                            <I class="bi-folder" id="folderIcon" style="margin: 10px;
                                                                        font-size: 35px;
                                                                        position:relative;
                                                                        float:left;"></I>

                            <h3 id="reponameLb" style=" margin: 10px; margin-top:17px; position:relative; float:left;"><script>document.write(sessionStorage.getItem('repositoryName'));</script></h3>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                            <button class="btn btn-primary" id="contributionBtn" >Contribution</button>
                            <button class="btn btn-primary" id="threadBtn" >Thread</button>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                            <button class="btn btn-primary" id="uploadBtn" onclick="openForm()"><i class="bi-upload"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div id="containerBottom">
                    <div class="list-group">
                    <a id="" href="#" class="list-group-item list-group-item-action" onclick="">
                        <div class="row">
                            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                <h4 id="postName" style="margin: 20px;">post name</h4>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                <h5 id="creatorName" style="margin: 20px;">creator name</h5>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                <h5 id="postDate" style="margin: 20px;">post date</h5>
                            </div>

                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                               <div class="btnContainer">
                                    <button class="btn btn-primary" id="editBtn" ><i class="bi-download"></i></button>
                                    <button class="btn btn-primary" id="noteBtn" ><i class="bi-journal-text"></i></button>
                                    <button class="btn btn-primary" id="downloadBtn" ><i class="bi-pencil-square"></i></button>
                               </div>
                                
                            </div>

                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <!--My Javascript-->
    <script type="text/javascript" src="../script/repoDashboard.js"></script>
</html>