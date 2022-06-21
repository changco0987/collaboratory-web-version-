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

    
    <!--Email API-->
    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
    (function(){
        emailjs.init("dobrxlK8yXAf4Owqb");
    })();
    </script>
    <script type="text/javascript" src="../script/email.js"></script>

    <!--My Javascript-->
    <link rel="icon" href="../Asset/AppIcon.ico">

    <title>Collaboratory - reset password</title>
</head>
<body>
<?php 
    unset($_SESSION['userid']);
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
                    <form action="../controller/userAuthentication.php" method="POST">
                        <div class="form-group">
                            <center>
                                <h2>Find your account</h2>
                            </center>
                            
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="form-group">
                            <input type="email" class="form-control" id="emailTb" name="emailTb" placeholder="Enter Email Address" maxlength="100" required>
                            <br>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="loginBtn">Request Code</button>
                        </div>
                        <br>
                        <div id="errorCode" style="background-color: #FF6D6A; padding: 15px 5px 1px 5px; border-radius: 4px;">
                            <p id="errorMsg" style="font-size: 13px;">Your email address doesn't have a linked account</p>
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
            document.getElementById('errorCode').style.display = 'block';
            document.getElementById('errorMsg').style.display = 'block';
            console.log("okay");

        }

        //To make signl back to normmal and to prevent for the success page to appear every time the page was reload or refresh
        localStorage.setItem('state',0);
    </script>
</html>