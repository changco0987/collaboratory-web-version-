
//Function to open login page
function gotoLogin()
{
    window.location = "../page/login.php";
}

//Function to open resetPass page
function gotoResetPass()
{
    window.location = "../page/resetpass.php";
}

//Email notification after creating account
function accountCreateMsg(userId,reciever)
{
    var sub = "Your Collaboratory Account has been created";
    var msg = "Welcome "+userId+" to Collaboratory, Your Collaboratory ID will be used by other users to find you through the collaboratory user finder"+
              "this will also be used to add you as a participant to repositories.";


    emailjs.send("service_xesip3f","template_a3tsbpa",{
        subject: sub,
        message: msg,
        email_to: reciever,
        }).then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
}

//Email notification to request a reset password, this will also send a UAK
function resetCodeMsg(uak,reciever)
{
    var sub = "";
    emailjs.send("service_ztr1jtm","template_ja8yxqn",{
        uak: uak,
        email_to: reciever,
        });
}

//Email notification after user successfully reset password
function passwordUpdateNotif(userId,reciever)
{
    var sub = "Your password has been updated!";
    var msg = "Hi, "+userId+" You have successfully reset your collaboratory account password. Thank you for using Collaboratory";

    emailjs.send("service_xesip3f","template_a3tsbpa",{
        subject: sub,
        message: msg,
        email_to: reciever,
        }).then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
}

//Email notification after deleting user account
function accountDeleteNotif(userId,reciever)
{
    var sub = "Your account has been deleted!";
    var msg = "Hi, " + userId + " You have successfully deleted your account in our server. Thank you for using Collaboratory hoping to see you soon";

    emailjs.send("service_xesip3f","template_a3tsbpa",{
        subject: sub,
        message: msg,
        email_to: reciever,
        }).then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
}

//Email notification after updating user information
function accountUpdateMsg(userId,reciever)
{
    var sub = "Your account information has been updated!";
    var msg = "Hi, " + userId + " You have successfully updated your account information in our server. Thank you for using Collaboratory";

    emailjs.send("service_xesip3f","template_a3tsbpa",{
        subject: sub,
        message: msg,
        email_to: reciever,
        }).then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
            console.log('FAILED...', error);
        });
}


