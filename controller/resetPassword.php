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
    require '../Model/Userdata.php';
    require_once '../db/tb_useraccounts.php';

    $userdata = new Userdata();
    $userdata->setEmail($_POST['emailTb']);
    
    $rowCount = pg_num_rows(ReadUser($conn,$userdata));

    #it means is fetch the data in database
    if($rowCount>0)
    {
       $dbData = pg_fetch_assoc(ReadUser($conn,$userdata));
        
        print_r($dbData);
        #this will generate a random key that the user can use to reset their password
        $uak = rand(11111111, 99999999);

        session_start();

        $_SESSION['account_id'] = $dbData['account_id'];
        #UserLoginData::setId($dbData['account_id']);
        UserLoginData::setuserId($dbData['userid']);
        UserLoginData::$uak = $uak;

        echo UserLoginData::$userId;
        $userdata->setUak($uak);

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

    }

?>