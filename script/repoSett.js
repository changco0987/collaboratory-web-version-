
var userlist = "<?php echo search();?>";
console.log(userlist);
function searchUser()
{

    var input = document.getElementById("searchTb").value;    

    userlist.forEach(element => {
        console.log(element+" ");
    });
}
