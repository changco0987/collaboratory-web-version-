<!--Email API-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
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
    $userdata->setEmail($_POST['emailTb']);
    
    $rowCount = pg_num_rows(ReadUser($conn,$userdata));

    #it means is fetch the data in database
    if($rowCount>0)
    {
        $dbData = pg_fetch_assoc(ReadUser($conn,$userdata));
        
        #this will generate a random key that the user can use to reset their password
        $uak = rand(11111111, 99999999);

        #this will save important data to session to re-use
        session_start();
        $_SESSION['account_id'] = $dbData['account_id'];
        $_SESSION['userid'] = $dbData['userid'];
        $_SESSION['uak'] = $uak;

        #this will set all the default details of the user
        $userdata->setId($dbData['account_id']);
        $userdata->setFirstName($dbData['firstname']);
        $userdata->setLastName($dbData['lastname']);
        $userdata->setUserId($dbData['userid']);
        $userdata->setPassword($dbData['password']);
        $userdata->setBirthday($dbData['birthday']);
        $userdata->setGender($dbData['gender']);
        $userdata->setProfilePicName($dbData['profilepicname']);
        $userdata->setUak($uak);
        $userdata->setEmail($dbData['email']);

        UpdateUser($conn,$userdata);


        #this will send an email to the user
        ?>
            <script>
                //resetCodeMsg(<?php echo "'" .$userdata->getUak(). "'";?> ,<?php echo "'" .$userdata->getEmail(). "'";?>);
                setTimeout(gotoResetPass,1000);//To make sure that the accountCreateMsg() function will execute before going to the next page
            </script>
        <?php   
    }
    else
    {
        //error notification incase that the inputted email address doesn't have a linked to the database
        echo '<script> localStorage.setItem("state",1); window.location = "../page/authentication.php";</script>';
    }
?>