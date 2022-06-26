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
   
    <!--My Javascript-->
    <script type="text/javascript" src=""></script>
    <!--My CSS-->
    <link rel="stylesheet" href="../css/repoSettings.css">

    <link rel="icon" href="../Asset/AppIcon.ico">
    <title>Repository Settings</title>
</head>
<script>
        var storeId = [];
        //This will check if the localstorage is empty
        if(localStorage.getItem(""))
        {
            //Then restore the localstorage value to array
            storeId = JSON.parse(localStorage.getItem("memberList"));
        }

        var searchValue = function(inputValue)
                        {
                            var storeVal = inputValue.value;
                            document.cookie = "searchVal = " + storeVal;
                            //window.location = '../page/repoSettings.php';
                            return;
                        }

        var addMember = function(userId)
                        {
                            if(!storeId.includes(userId))
                            {
                                storeId.push(userId);
 
                            }
                            else 
                            {
                                const index = storeId.indexOf(userId);//This will get the exact index of the element that need to remove
                                if(index > -1)
                                {
                                    storeId.splice(index,1);
                                }
                            }
                            console.log(storeId);
                            localStorage.setItem("memberList", storeId);
                            return;
                        }
    
</script>
<body>
<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

?>



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
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-xs-3 col-md-3">
                <p style="font-size: 18px;">Repository Name:</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4">
                <input type="text" class="form-control" id="reponameTb" name="reponameTb" placeholder="" maxlength="20" required style="height:25px ;">
            </div>
            <div class="col-xs-1 col-sm-1 col-xs-1 col-md-1">
                <button type="button" class="btn btn-labeled btn-light" id="searchBtn" style="height: 25px; width: 25px;">
                <span class="btn-label" style="height: 20px; width: 20px;"><i class="bi-search"></i></span></button>
            </div>
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4 input-group-addon">
                <input type="text" class="form-control" id="searchTb" name="searchTb" oninput="searchValue(this)" placeholder="Search" maxlength="20" required style="height:25px;">
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
                                if(str_contains($dbData['firstname'],$_COOKIE['searchVal']))
                                {
                                ?>
                            
                                    <a id="<?php echo $dbData['account_id'];?>" href="#" class="list-group-item list-group-item-action" onclick="addMember(this.id)" style="background-color: #171433; color: #E0EBED;">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-xs-2 col-md-2">
                                                <?php
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
                                                <img src="../Asset/add.png" alt="" id="addBtn">
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

        <div class="row text-center">
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4"></div>
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4">
                <button type="button" class="btn btn-primary" id="createtBtn" onclick="logout()">Create</button>
            </div>
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4"></div>
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

</html>