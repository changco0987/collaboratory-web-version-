var storeId = [];
//This will check if the localstorage is empty
/*if(sessionStorage["memberList"].length != 0)
{
    //Then restore the localstorage value to array
    storeId.push(JSON.parse(sessionStorage.getItem("memberList")));
    storeId = storeId.map(Number);
    console.log(storeId);
}
*/

if(sessionStorage.getItem("memberList") !== null)
{

    storeId = JSON.parse(sessionStorage.getItem("memberList"));
}

var searchValue = function(inputValue)
                {
                    var storeVal = inputValue.value;
                    document.cookie = "searchVal = " + storeVal;
                    //window.location = '../page/repoSettings.php';
                    return;
                }

var addMember = function(userId)
                {
          
                    //this will prepair the add and already added button/indicator
                    var index = userId.indexOf('+');
                    var btnId = userId.replace('+','');

                    //this will check first if the memberlist has no value
                    if(storeId === undefined || storeId.length == 0)
                    {
                        storeId.push(userId.slice(0,userId.indexOf('+')));

                        //This will change the btn image
                        document.getElementById(btnId).src = "../Asset/checkIcon.png";
                    }
                    else
                    {
                        if(!storeId.includes(userId.slice(0,userId.indexOf('+'))))
                        {
                            //this will add the member
                            storeId.push(userId.slice(0,userId.indexOf('+')));


                            //This will change the btn image
                            document.getElementById(btnId).src = "../Asset/checkIcon.png";

    
                        }
                        else 
                        {
                            //This is to remove the member 
                            const index = storeId.indexOf(userId.slice(0,userId.indexOf('+')));//This will get the exact index of the element that need to remove
                            if(index > -1)
                            {
                                storeId.splice(index,1);
                                //This will change the btn image
                                document.getElementById(btnId).src = "../Asset/add.png";
                            }
                        }
                    }
                    
                    console.log(storeId);
                    sessionStorage.setItem("memberList", JSON.stringify(storeId));
                    return;
                }

                const textbox = document.getElementById("searchTb");
                if(textbox)
                {
                    textbox.addEventListener("keypress", function onEvent(event) {
                    if (event.key === "Enter") {
                        document.getElementById("searchBtn").click();
                    }
                    });
                }
      

                function buttonCode()
                {
                    var storeVal = document.getElementById("searchTb").value;
                    document.cookie = "searchVal = " + storeVal;
                    window.location = '../page/repoSettings.php';
                    return;
                }