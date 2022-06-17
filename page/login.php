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
    <!--My CSS-->
    <link rel="stylesheet" href="../css/login.css">

    <link rel="icon" href="../Asset/AppIcon.ico">
    <title>Collaboratory - log in or sign up</title>
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

<!--Log in Form section-->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-xs-12 col-md-12">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="checkCredentials.php" method="POST">
                        <div class="form-group">
                            <center>
                                <h2>Welcome</h2>
                            </center>
                            
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="form-group">
                            <input type="text" class="form-control" id="useridTb" name="useridTb" placeholder="Enter UserID" maxlength="20" required>
                            <br>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordTb" name="passwordTb" placeholder="Enter Password" minlength="8" maxlength="15" required>

                            <a href="../page/resetpass.php" style="font-size: 13px; font-style:normal;">Forgot password?</a>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary" id="loginBtn">Log In</button>
                            <br>
                            <small>Don't have any account? <a href="../page/signup.php">Just Click here</a></small>
                        </div>
        
                    </form>
                </div>
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
</html>