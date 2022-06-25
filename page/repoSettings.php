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
<body>


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
            <div class="col-xs-5 col-sm-5 col-xs-5 col-md-5">
                <input type="text" class="form-control" id="reponameTb" name="reponameTb" placeholder="" maxlength="20" required style="height:25px ;">
            </div>
            <div class="col-xs-4 col-sm-4 col-xs-4 col-md-4 input-group-addon">
                <input type="text" class="form-control" id="searchTb" name="searchTb" placeholder="Search" maxlength="20" required style="height:25px;">
            </div>
        </div>
<!--List of username section-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-xs-12 col-md-12">
                <div class="listContainer">
                    <div class="list-group">   
                        <a id="" href="#" class="list-group-item list-group-item-action"> 
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-xs-2 col-md-2">
                                    <img src="../Asset/Mandap.png" alt="" id="userDp">
                                </div>
                                <div class="col-xs-9 col-sm-9 col-xs-9 col-md-9">
                                    <p id="usernameLb">mandap</p> 
                                </div>
                                <div class="col-xs-1 col-sm-1 col-xs-1 col-md-1">
                                    <img src="../Asset/add.png" alt="" id="addBtn">
                                </div>                   
                            </div>
                        </a>
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

    <!--alert message script-->
    <script>
        document.getElementById('errorCode').style.display = 'none';
        document.getElementById('errorMsg').style.display = 'none';
        var successSignal = localStorage.getItem('state');

        if(successSignal==1)
        {
            //if userid or password was incorrect
            document.getElementById('errorCode').style.display = 'block';
            document.getElementById('errorMsg').style.display = 'block';
            console.log("okay");

        }
        else if(successSignal==2)
        {
            //if userid or password was
            document.getElementById('errorCode').style.display = 'block';
            document.getElementById('errorMsg').style.display = 'block';
            document.getElementById('errorMsg').innerHTML = 'Please check your password carefully';
            console.log("okay");
        }
        else if(successSignal==3)
        {
            //if password doesn't matched
            document.getElementById('errorCode').style.display = 'block';
            document.getElementById('errorMsg').style.display = 'block';
            document.getElementById('errorMsg').innerHTML = "Password doesn't match!";
            console.log("okay");
        }

        //To make signl back to normmal and to prevent for the success page to appear every time the page was reload or refresh
        localStorage.setItem('state',0);
    </script>

</html>