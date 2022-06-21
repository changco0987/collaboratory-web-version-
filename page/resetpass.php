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
    <link rel="stylesheet" href="../css/resetpass.css">
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
        <script src="../script/" type="text/javascript"></script>
        <link rel="icon" href="../Asset/AppIcon.ico">
    <title>Collaboratory - reset password</title>
</head>
<body>
    
<div class="alert alert-danger alert-dismissible fade show" id="errorCode" role="alert">
  <div id="errorMsg">
    Password doesn't match!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>

    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="../controller/resetPassword.php" method="POST">
                        <div class="form-group">
                            <center>
                                <h2>Reset your password</h2>
                            </center>
                        </div>
                        <?php
                            session_start();
                        ?>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="form-group">                         
                            <input type="text" class="form-control" id="useridTb" name="useridTb" placeholder="UserID"  value="<?php echo $_SESSION['userid']; ?>" readonly required>
                            <br>
                            <input type="text" class="form-control" id="uakTb" name="uakTb" placeholder="Unique Account Key" required>
                            <br>  
                            <input type="password" class="form-control" id="passwordTb" name="passwordTb" placeholder="New password" minlength="8" maxlength="15" required>
                            <br>                            
                            <input type="password" class="form-control" id="confirmpassTb" name="confirmpassTb" placeholder="Confirm password" minlength="8" maxlength="15" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Use at least 8 or up to 15 characters for your password <br>
                                <small>Tip: Use a mix of letters and numbers for more secure password</small> 
                            </div>
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                            </center>
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
        else if(successSignal==2)
        {
            document.getElementById('errorCode').style.display = 'block';
            document.getElementById('errorMsg').style.display = 'block';
            document.getElementById('errorMsg').innerHTML = 'Error! Unique Account Key incorrect';
            console.log("okay");
        }

        //To make signl back to normmal and to prevent for the success page to appear every time the page was reload or refresh
        localStorage.setItem('state',0);
    </script>
</body>
</html>