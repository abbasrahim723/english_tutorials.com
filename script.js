//Validating password
function CheckPassword(inputtxt) 
{ 
    $inpt_pass = inputtxt;
// the password must have a small, capital,special character and a digit and more than 6 characters long
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
if(inputtxt.value.match(passw)) 
{ 
   // document.getElementById('new_pass').style.border ='3px';
    document.getElementById('new_pass').style.borderColor ='green';
    //document.getElementById('strength').style.color ='green';
    //document.getElementById('strength').innerHTML = "Criteria Matched";
 return true;
}
else
{ 
   // document.getElementById('new_pass').style.border ='3px';
    document.getElementById('new_pass').style.borderColor ='red';
    //document.getElementById('strength').style.color ='red';
    //document.getElementById('strength').innerHTML = "Criteria doesn't Matched";
//alert('The password should match the criteria...')
return false;
}
}

       //checking to see if both passwards are matching or not
       function check(){
        var $password = document.getElementById('password').value;
        var $confirm_password = document.getElementById('c_password').value;
        //var $message = document.getElementById('message').innerHTML;
        if($password === $confirm_password){
            document.getElementById('password').style.borderColor="green";
            document.getElementById('c_password').style.borderColor="green";

            // document.getElementById('message').style.color = "green";
            // document.getElementById('message').innerHTML = "Passwords Matched";
            //Enable the submit button if passwords match
            document.getElementById('submit').disabled = false;
            console.log("Passwords matched");
        }
        else
        {
            document.getElementById('password').style.borderColor="red";
            document.getElementById('c_password').style.borderColor="red";

            // document.getElementById('message').style.color = "red";
            // document.getElementById('message').innerHTML = "Passwords don't Match";
            //Disable the submit button if passwords don't match
            document.getElementById('submit').disabled = true;
            console.log("Passwords didn't matched");
        }
            
    }

    //displaying image

    var loadFile = function(event) {
        console.log("Image displayed");
        var image = document.getElementById('output_Image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    //changing password
    function confirm(){
        var $password = document.getElementById('new_pass').value;
        var $confirm_password = document.getElementById('confirm_new_pass').value;
        console.log('function called');
        if($password === $confirm_password){
            document.getElementById('new_pass').style.borderColor= 'green';
            document.getElementById('confirm_new_pass').style.borderColor= 'green';
            //document.getElementById('confirm_message').style.color = "green";
            //document.getElementById('confirm_message').innerHTML = "Passwords Matched";
        } 
        else{
            document.getElementById('new_pass').style.borderColor= 'red';
            document.getElementById('confirm_new_pass').style.borderColor= 'red';
            //document.getElementById('confirm_message').style.color = "red";
            //document.getElementById('confirm_message').innerHTML = "Passwords don't Match";
        }
    }
    
    //togging notification

    // function show_notification(){
    //     var notification = document.getElementById('notify');
    //     if( notification.style.display === "none"){
    //         notification.style.display = "block";
    //     }
    //     else{
    //         notification.style.display = "none";
    //     }
       
    // }
// 
    var box = document.getElementById('notification-box');
    var down = false;

        function toggle_notify(){
            if(down){
                box.style.transitionDelay = 2000;
                box.style.height = '0px';
                box.style.opacity = 0;
                down = false;
            }
            else{
                box.style.transitionDelay = 2000;
                box.style.height = '60vh';
                box.style.opacity = 1;
                down = true;
            }
        }
   
