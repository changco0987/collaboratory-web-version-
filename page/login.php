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
<?php 
    session_start();
    //This will check if the user is still login
    //This will make the user remain login as long as the user don't click the logout button
        if(isset($_SESSION['id']) &&
           isset($_SESSION['userid']) &&
           isset($_SESSION['username']) &&
           isset($_SESSION['profilepicname']))
        {
            header('Location: ../page/userDashboard.php');
        }
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

<!--Log in Form section-->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-xs-12 col-md-12">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="../controller/retrieveAccount.php" method="POST">
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

                            <a class="text-dark" href="../page/authentication.php" style="font-size: 13px; font-style:normal;">Forgot password?</a>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary" id="loginBtn">Log In</button>
                            <br>
                            <small>Don't have any account? <a class="text-dark" href="../page/signup.php">Just Click here</a></small>
                        </div>
                        <br>
                        <div id="errorCode" style="background-color: #FF6D6A; padding: 15px 5px 1px 5px; border-radius: 4px;">
                            <p class="text-center" id="errorMsg" style="font-size: 12px;">This userid doens't exist!</p>
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