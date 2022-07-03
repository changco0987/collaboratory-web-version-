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

<?php
    include_once '../db/connection.php';
    require_once '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    $userdata = new Userdata();
    $userdata->setFirstName($_POST['firstnameTb']);
    $userdata->setLastName($_POST['lastnameTb']);
    $userdata->setUserId($_POST['useridTb']);

    #this function will check if the userid is already taken by another user, if the rowCount is > 0 it means it retrieve same userid in database
    $rowCount = pg_num_rows(ReadUser($conn,$userdata));
    if($rowCount==0)
    {
       
        $userdata->setBirthday($_POST['birthday']);
        $userdata->setGender($_POST['genderRb']);
        $userdata->setEmail($_POST['emailTb']);

         #this function will check if the email is already taken by another user, if the rowCount is > 0 it means it retrieve same email in database
        $rowCount = pg_num_rows(ReadUser($conn,$userdata));
        if($rowCount==0)
        {
            //This will check if the password inputted correctly
            if($_POST['passwordTb'] == $_POST['confirmpassTb'])
            {
                $userdata->setPassword($_POST['passwordTb']);
                echo 'Fetching data';
                CreateUser($conn,$userdata);#This will call the funtion to create data in the database
    
                #this will send an email to the user
                ?>
                <script>
                    accountCreateMsg(<?php echo "'" .$userdata->getUserId(). "'";?> ,<?php echo "'" .$userdata->getEmail(). "'";?>);
                    setTimeout(gotoLogin,2000);//To make sure that the accountCreateMsg() function will execute before going to the next page
                </script>
                <?php
    
                exit();
            }
            else
            {
                //error notification incase that the inputted email address doesn't have a linked to the database
                echo '<script> localStorage.setItem("state",3); window.location = "../page/signup.php";</script>';
            }

        }
        else
        {
            //error notification incase that the inputted email address doesn't have a linked to the database
            echo '<script> localStorage.setItem("state",2); window.location = "../page/signup.php";</script>';
        }

    }
    else
    {
        //error notification incase that the inputted email address doesn't have a linked to the database
        echo '<script> localStorage.setItem("state",1); window.location = "../page/signup.php";</script>';
    }


    

        



?>