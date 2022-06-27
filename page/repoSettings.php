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
    <link rel="stylesheet" href="../css/repoSettings.css">

    <link rel="icon" href="../Asset/AppIcon.ico">
    <title>Repository Settings</title>
</head>
<script>
   
</script>

<body>
<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';
    session_start();
?>

<!--This is the container of the userid to be able to access in javascript-->
<input type="hidden" id="currentUserId" name="finalMembers" style="display:none" value="<?php echo $_SESSION['id'];?>">
<!--Page Title section-->
    <div class="row fixed-top">

        <div class="col-sm-12 col-xs-12 col-md-12 flex-column" id="headerContainer">
            <header>
                <img src="../Asset/AppIcon.png" class="img-fluid" id="pageIcon" alt="page icon">
                <br>
                <h1 id="pageTitle">ollaboratory</h1>
            </header> 
        </div>
    </div>

<!--Content section-->
    <div class="container">
        <form action="../controller/createRepo.php" method="POST">
        <!--This is the container of all members-->
        <input type="hidden" id="finalMembers" name="finalMembers" style="display:none" >
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-xs-3 col-md-3">
                    <p style="font-size: 18px;">Repository Name:</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4">
                    <input type="text" class="form-control" id="reponameTb" name="reponameTb" placeholder="" maxlength="20" required style="height:25px ;">
                </div>
                <div class="col-xs-1 col-sm-1 col-xs-1 col-md-1">
                    <button type="button" class="btn btn-labeled btn-light" id="searchBtn" style="height: 25px; width: 25px;" onclick="buttonCode()">
                    <span class="btn-label" style="height: 20px; width: 20px;"><i class="bi-search"></i></span></button>
                </div>
                <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4 input-group-addon">
                    <input type="text" class="form-control" id="searchTb" name="searchTb" oninput="searchValue(this)" placeholder="Search" maxlength="20" style="height:25px;">
                </div>
            </div>
            
    <!--List of username section-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-xs-12 col-md-12">
                    <div class="listContainer">
                        <div class="list-group" style=" max-height: 300px;
                                                        margin-bottom: 10px;
                                                        overflow-y:scroll;
                                                        -webkit-overflow-scrolling: touch;
                                                        border-radius: 5px;
                                                        font-size: 22px;">   

                        <?php
                            $userdata = new Userdata();

                            if(!empty($_COOKIE['searchVal']))
                            {
                                $rowCount = pg_num_rows(ReadUser($conn,$userdata));
                                for($count = 0; $count < $rowCount; $count++)
                                {
                                    $dbData = pg_fetch_assoc(ReadUser($conn,$userdata),$count);
                                    //This will prevent from the user to search from him/her self
                                    if($dbData['account_id'] != $_SESSION['id'])
                                    {
                                        //This will search the search value 
                                        if(str_contains($dbData['firstname'],$_COOKIE['searchVal']) || str_contains($dbData['lastname'],$_COOKIE['searchVal']))
                                        {
                                        ?>
                                    
                                            <a id="<?php echo $dbData['account_id'].'+'.$dbData['lastname'];?>" href="#" class="list-group-item list-group-item-action" onclick="addMember(this.id)" style="background-color: #171433; color: #E0EBED;">
                                                <div class="row">
                                                    <div class="col-xs-2 col-sm-2 col-xs-2 col-md-2">
                                                        <?php

                                                        //check if the user has a profile picture
                                                        if(!empty($dbData['profilepicname']))
                                                        {
                                                            ?>
                                                                <img src="http://127.0.0.1/server/Image/<?php echo $dbData['profilepicname'];?>" alt="" id="userDp">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <img src="../Asset/user.png" alt="" id="userDp">
                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-xs-9 col-sm-9 col-xs-9 col-md-9">
                                                        <p id="usernameLb"><?php echo $dbData['firstname']." ".$dbData['lastname'];?></p> 
                                                    </div>
                                                    <div class="col-xs-1 col-sm-1 col-xs-1 col-md-1">
                                                        <img src="../Asset/add.png" alt="" class="addBtn" id="<?php echo $dbData['account_id'];?>">
                                                    </div>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                    }
                                }    
                            }
                        ?>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4"></div>
                <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4">
                    <button type="submit" class="btn btn-primary" id="createtBtn" onclick="getMembers()">Create</button>
                </div>
                <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4"></div>
            </div>
        </div>
    </div>

<!--Footer Section-->
    <div class="row">
        <footer class=" text-center text-lg-end fixed-bottom">
            <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    Download Desktop Version:
                    <a class="" href="https://drive.google.com/u/2/uc?id=1kNO00NIB4ouuuiWlh9S9GOZkii-fa5KU&export=download" target="_blank">Collaboratory.App</a>
                </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

    <!--My Javascript-->
    <script type="text/javascript" src="../script/repoSett.js"></script>
</html>