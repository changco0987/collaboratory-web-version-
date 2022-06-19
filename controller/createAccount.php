<!--Email API-->
<script type="text/javascript"
src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
(function(){
    emailjs.init("xtR1f_gCXopVKsFwG");
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


    $rowCount = pg_num_rows(ReadUser($conn,$userdata));
    #this function will check if the userid is already taken by another user, if the rowCount is > 0 it means it retrieve same userid in database
    if($rowCount==0)
    {

        $userdata->setPassword(strtoupper(hash('sha256',$_POST['passwordTb'])));
        $userdata->setBirthday($_POST['birthday']);
        $userdata->setGender($_POST['genderRb']);
        $userdata->setEmail($_POST['emailTb']);
        
        $rowCount = pg_num_rows(ReadUser($conn,$userdata));

         #this function will check if the email is already taken by another user, if the rowCount is > 0 it means it retrieve same email in database
        if($rowCount==0)
        {
            echo 'Fetching data';
            CreateUser($conn,$userdata);#This will call the funtion to create data in the database

            #this will send an email to the user
            ?>
            <script>
                //accountCreateMsg(<?php echo "'" .$userdata->getUserId(). "'";?> ,<?php echo "'" .$userdata->getEmail(). "'";?>);
                setTimeout(gotoLogin,1000);//To make sure that the accountCreateMsg() function will execute before going to the next page
            </script>
            <?php

            exit();
        }

    }

    #this will be trigger if the userid or email has already taken in database
    header('Location: ../page/signup.php');
    exit();
    

        



?>