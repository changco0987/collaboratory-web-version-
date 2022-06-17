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
        <link rel="stylesheet" href="../css/signup.css">




        <!--My Javascript-->
        <script src="../script/signup.js" type="text/javascript"></script>
        <link rel="icon" href="../Asset/AppIcon.ico">
        <title>Collaboratory - sign up</title>
    <title>Document</title>
</head>
<body>

<!--Page Title section-->
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <form action="../controller/createAccount.php" method="POST">
                        <div class="form-group">
                            <h2>Sign Up</h2>
                        </div>
                        <hr style="height:2px; width: 90%;border-width:0;color:gray;background-color:gray">
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstnameTb" name="firstnameTb" placeholder="First name" required>

                            <input type="text" class="form-control" id="lastnameTb" name="lastnameTb" placeholder="Last name" required>
                            <br>
                            <br>
                        </div>

                        <div class="form-group">
                            <div class="birthdayContainer">
                                <label for="birthday" id="birthdayLb">Birthday</label>
                                <input class="form-control" type="date" id="birthday" name="birthday" required>
                            </div>

                            <br>
                            <div class="genderContainer">
                                <label for="">Gender</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genderRb" id="maleRadio" value="Male" checked>
                                    <label class="form-check-label" for="maleRadio">
                                        male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genderRb" id="femaleRadio" value="Female">
                                    <label class="form-check-label" for="femaleRadio">
                                        female
                                    </label>
                                </div>
                            </div>
                        </div>


                        <hr style="height:2px; width: 90%;border-width:0;color:gray;background-color:gray">
                        <div class="form-group">    
                            <input type="email" class="form-control" id="emailTb" name="emailTb" placeholder="Email" required>
                            <br>                       
                            <input type="text" class="form-control" id="useridTb" name="useridTb" placeholder="UserID" required>
                            <br>
                            <input type="password" class="form-control" id="passwordTb" name="passwordTb" placeholder="Password" minlength="8" maxlength="15" required>
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