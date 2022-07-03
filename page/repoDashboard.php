<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
    include '../db/connection.php';#connection to database
    require_once '../Model/Updatedata.php';#update Model
    require_once '../db/tb_updates.php';

    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    require_once '../db/tb_repositories.php';


    require_once '../Model/Messagedata.php';
    require_once '../db/tb_messages.php';
    
    session_start();
    $_SESSION['repositoryid'] = $_COOKIE['repositoryid'];
    require_once '../controller/checkGC.php';
    //this will identify the repository creator

    $repoinfo = pg_fetch_assoc(ReadRepo($conn,$_SESSION['repositoryid'],"repo"));
?>
    <!--Upload Page-->
    <div class="form-popup" id="myForm" style="border-radius:20px;">
        <form action="../controller/uploadPost.php" method="post" enctype="multipart/form-data" class="form-container" style="background-color: #3070b1; border-radius:12px; color:white;">
            <h1></h1>
            
            <button type="button" class="btn-close" onclick="closeForm()" style="position:relative; float:right;"></button>
            <br>
            <label id="Title">Title: </label>
            <input class="form-control" type="text" name="titleTb" id="titleTb" maxlength="30" style="color: black;" required><br>

            <label id="TaskFile"></label>
            <input class="form-control" type="File" name="fileTb" id="fileTb"><br>

            <label id="Note">Note: </label>
            <textarea class="form-control" type="text" name="noteTb" id="noteTb" maxlength="280" style="color: black;"></textarea><br>

            <input type="submit" class="btn" name="submitBtn" value="Upload" id="submitBtn">
        </form>
    </div>

    <!--Note Page-->
    <div class="form-popup" id="myNote" style="border-radius:20px; position: absolute; top:50%; left:50%; transform: translateX(-50%) translateY(-50%);">
        <form action="../controller/uploadPost.php" method="post" enctype="multipart/form-data" class="form-container" style="background-color: #3070b1; border-radius:12px; color:white;">
            <h1></h1>
            
            <button type="button" class="btn-close" onclick="closeNote()" style="position:relative; float:right;"></button>
            <br>

            <label id="Note">Note: </label>
            <textarea class="form-control" type="text" name="postNoteTb" id="postNoteTb" maxlength="280" style="color: black; height: 250px;" disabled></textarea><br>

        </form>
    </div>

    <!--Edit Page-->
    <div class="form-popup" id="myEdit" style="border-radius:20px; position: absolute; top:50%; left:50%; transform: translateX(-50%) translateY(-50%);">
        <form action="../controller/updateUpload.php" method="post" enctype="multipart/form-data" class="form-container" style="background-color: #3070b1; border-radius:12px; color:white;">
            <h1></h1>
            <input type="hidden" id="updateid" name="updateid"/>
            <button type="button" class="btn-close" onclick="closeEdit()" style="position:relative; float:right;"></button>
            <br>
            <label id="Title">Title: </label>
            <input class="form-control" type="text" name="editTitleTb" id="editTitleTb" maxlength="30" style="color: black; height: 30px;" required><br>

            <label id="Note">Note: </label>
            <textarea class="form-control" type="text" name="editNoteTb" id="editNoteTb" maxlength="280" style="color: black; height: 250px;"></textarea><br>
            <input type="submit" class="btn" name="submitBtn" value="Upload" id="submitBtn">
        </form>
    </div>

    <!--Chat Box-->
    <div class="form-popup" id="myChat" style="border-radius:20px; width: 400px; bottom:0;">

        <form id="chatForm" action="../controller/sendMsg.php" method="post" enctype="multipart/form-data" class="form-container" style="background-color: #3070b1; border-radius:12px; color:white; height:550px;">
            <h1></h1>
            <button type="button" class="btn-close" onclick="closeChat()" style="position:relative; float:right; top: -13px; left: 3px;"></button>
            <br>
            
            <div id="chatBox" class="chatContainer list-group" style="max-height:430px; height: 430px; background-color: white; border-radius: 5px; font-size: 15px; font-family: arial;">
                
            <?php 
                $messagedata = new Messagedata();

                $messagedata->setGroupchatId($_SESSION['gcId']);

                $row = pg_num_rows(ReadMsg($conn,$messagedata));

                for($count = 0; $count < $row; $count++)
                {
                    $dbData = pg_fetch_assoc(ReadMsg($conn,$messagedata),$count);
                    $userdata = new Userdata();
                    $userdata->setId($dbData['account_id']);
                    $userinfo = pg_fetch_assoc(ReadUser($conn,$userdata));
                    //This will check if the message belong to the user
                    if($dbData['account_id']!=$_SESSION['id'])
                    {


                        ?>
                            <div id="chatmate"style="position: relative; float:left; padding:5px; margin:15px; background-color: #2a76c2; align-self:flex-start; border-radius:5px; max-width: 200px; min-width:100px; word-wrap: break-word;">
                                <p style="font-style: italic;">(<?php echo $userinfo['firstname']." ".$userinfo['lastname'];?>)</p><p><?php echo $dbData['message'];?></p>
                            </div>
                        <?php

                    }
                    else
                    {
                        ?>
                            <div id="mychat" style="position: relative; float:right; padding:5px; margin:15px; background-color: #2a76c2;  align-self:flex-end; border-radius:5px; max-width: 200px;  min-width:100px; word-wrap: break-word; background-color: #52D452; color: black;">
                                <p style="font-style: italic;">(Me)</p><p><?php echo $dbData['message'];?></p>
                            </div>
                        <?php
                    }
                }
            ?>
            </div>
            <div class="row" style="  padding: 10px;">
                <label id="Note"> </label>
                <textarea class="form-control" type="text" name="chatTb" id="chatTb" maxlength="380" style="color: black; height: 40px; width: 343px;" placeholder="New message.." required></textarea><br>
                <button type="submit" class="btn" name="sendBtn" value="" id="sendBtn" style=" position: relative; float: right; width: 40px; height: 40px;"><i class="bi-send"></i></button>                  
            </div>
            
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
                            <button class="btn " id="userSettBtn" ><i class=""></i></button>
                            <form action="../controller/getRepoInfo.php" method="POST">
                                <input type="hidden" id="currentRepoId" name="currentRepoId" style="display:none">

                                <?php
                                    if($repoinfo['account_id']==$_SESSION['id'])
                                    {
                                        ?>
                                            <button type="submit" class="btn btn-primary" id="editrepoBtn">Edit Repository</button>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <button type="submit" class="btn btn-primary" id="editrepoBtn" disabled style="background-color: gray;">Edit Repository</button>
                                        <?php
                                    }
                                ?>
                                
                            </form>

                            <button class="btn btn-primary" id="chatBtn" onclick="openChat()" >chat</button>
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
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" id="threadBtn" href="#">Thread</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../page/contribution.php" id="contributionBtn"></a>
                                </li>
                            </ul>
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
                    <div id="thread" class="list-group" style=" max-height: 520px;
                                                    margin-bottom: 10px;
                                                    overflow-y:scroll;
                                                    -webkit-overflow-scrolling: touch;
                                                    border-radius: 5px;
                                                    font-size: 22px;">

                        <?php
                        getdata($conn);
                        function getdata($conn)
                        {

                            if(isset($_COOKIE['repositoryid']))
                            {   
                                $updatedata = new Updatedata();

                                $updatedata->setRepositoryId($_COOKIE['repositoryid']);

                                $row = pg_num_rows(ReadPost($conn,$updatedata));
                                $_SESSION['currentRow'] = $row;
                                for($count = 0; $count < $row; $count++)
                                {
                                    $dbData = pg_fetch_assoc(ReadPost($conn,$updatedata),$count);
                                    ?>
                                        <a id="" href="#" class="list-group-item list-group-item-action" onclick="">
                                            <div class="row">
                                                <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                                    <h4 id="<?php echo $dbData['update_id'];?>" style="margin: 20px; font-size: 19px;"><?php echo $dbData['title'];?></h4>
                                                </div>
                                                <?php
                                                    $userdata = new Userdata();
                                                    $userdata->setId($dbData['account_id']);
                                                    $userinfo = pg_fetch_assoc(ReadUser($conn,$userdata));
                                                ?>
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                    <h5 id="creatorName" style="margin: 20px; font-size: 15px;"><?php echo $userinfo['firstname']." ".$userinfo['lastname'];?></h5>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                    <h5 id="postDate" style="margin: 20px; font-size: 14px"><?php echo date("d/m/Y g:i:s A", strtotime($dbData['post_datetime']));?></h5>
                                                </div>

                                                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                                <div class="btnContainer">
                                                    <?php
                                                        if($dbData['filename']!="")
                                                        {      //downloadBtn
                                                            ?>
                                                            <form action="<?php echo 'http://localhost/server/repoFile_id'.$_SESSION["repositoryid"].'/'.$dbData['filename'];?>" target="_blank" style="display:inline;">
                                                                <button type="submit" class="btn btn-primary" id="downloadBtn" onclick="" style="margin: 10px; position:relative; float:right;"><i class="bi-download" ></i></button>
                                                            </form>
                                                                
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <button class="btn btn-primary" id="downloadBtn" disabled style="background-color: #FF6961; margin: 10px; position:relative; float:right;"><i class="bi-download"></i></button>
                                                            <?php
                                                        }
                                                    ?>
                                                    <!--noteBtn-->
                                                    <button class="btn btn-primary" id="<?php echo $dbData['update_id'].'+';?>" onclick="openNote(this.value)" value="<?php echo $dbData['note'];?>" style="margin: 10px; position:relative; float:right;"><i class="bi-journal-text"></i></button>
                                                    <?php
                                                        if($dbData['account_id']==$_SESSION['id'])
                                                        {   //editBtn
                                                            ?>
                                                                <button class="btn btn-primary" id="<?php echo $dbData['update_id'].'++';?>" onclick="openEdit(this.id)" style="margin: 10px; position:relative; float:right;"><i class="bi-pencil-square"></i></button>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <button class="btn btn-primary" id="<?php echo $dbData['update_id'].'++';?>" disabled style="background-color: #FF6961; margin: 10px; position:relative; float:right;"><i class="bi-pencil-square"></i></button>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </div>
                                                    
                                                </div>

                                            </div>
                                        </a>
                                    <?php
                                }
                            }
                        }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>


        var repoid = sessionStorage.getItem('repositoryid');
        document.getElementById("currentRepoId").value = repoid;
        
        document.getElementById('threadBtn').style.backgroundColor = "#2e68a1";
        document.getElementById('threadBtn').style.color = "gold";


        //Upload
        function openForm() 
        {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() 
        {
            document.getElementById("myForm").style.display = "none";
        }


        //Edit
        function openEdit(uploadId) 
        {
            var noteId = uploadId.slice(0,-1);
            var titleId = noteId.slice(0,-1);
            var title = document.getElementById(titleId).textContent;
            var note = document.getElementById(noteId).value;

            document.getElementById('updateid').value = titleId;
            document.getElementById('editTitleTb').value = title;
            document.getElementById('editNoteTb').value = note;
            document.getElementById("myEdit").style.display = "block";
        }

        function closeEdit() 
        {
            document.getElementById("myEdit").style.display = "none";
        }

        //Note
        function openNote(note) 
        {
            document.getElementById('postNoteTb').value = note;
            document.getElementById("myNote").style.display = "block";
        }

        function closeNote() 
        {
            document.getElementById("myNote").style.display = "none";
        }

        //download
        function downloadFile(filename)
        {
            sessionStorage.setItem('filename',filename);
            window.location = '../controller/downloadFile.php';
        }


        //Chat
        function openChat() 
        {
            //document.getElementById('postNoteTb').value = note;
            document.getElementById("myChat").style.display = "block";
        }

        function closeChat() 
        {
            document.getElementById("myChat").style.display = "none";
        }


    </script>

    <!--My Javascript-->
    <script type="text/javascript" src="../script/repoDashboard.js"></script>
</html>