var username = "";
window.addEventListener('load', function() {
    var user = '';
});    
function show_login(){
    
    document.getElementById('features').style.opacity = 0.2;
    document.getElementById('login-form').style.display='block';
    document.getElementById('login-form').style.opacity = 1;
    for (i in document.getElementsByTagName('HEADER')){
        document.getElementsByTagName('HEADER').item(i).style.opacity= 0.2;
    }
    document.getElementsByTagName('H2').item(i).style.opacity= 0.2;
    // for (i in document.getElementsByTagName('HEADER')){
    //     //console.log(document.getElementsByTagName('HEADER').item(i));
    //     document.getElementsByTagName('HEADER').item(i).style.opacity= 0.2;
    // }
    document.getElementsByName('user')[0].focus();
}

function show_reg(){
    
    document.getElementById('features').style.opacity = 0.2;
    document.getElementById('register-form').style.display='block';
    document.getElementById('register-form').style.opacity = 1;
    for (i in document.getElementsByTagName('HEADER')){
        document.getElementsByTagName('HEADER').item(i).style.opacity= 0.2;
    }
    document.getElementsByTagName('H2').item(i).style.opacity= 0.2;
    // for (i in document.getElementsByTagName('HEADER')){
    //     //console.log(document.getElementsByTagName('HEADER').item(i));
    //     document.getElementsByTagName('HEADER').item(i).style.opacity= 0.2;
    // }
    document.getElementsByName('fname')[0].focus();
}

function user_login(){
    var user = document.getElementsByName("user");;
    
    var pwd = document.getElementsByName("pwd");
    window.top.username = user;
    window.top.uname = user;
    if ( user != undefined && pwd != undefined){
        window.location = "home.html"; // Redirecting to other page.
        alert ("Login was successful");
    
        return false;
    }
    else{
        alert("Incorrect username or password");
    }
}

function user_register(){
    var fname = document.getElementsByName("fname");
    var lname = document.getElementsByName("lname");
    var mail = document.getElementsByName("mail");
    var user = document.getElementsByName("user");
    var pwd = document.getElementsByName("pwd")[0];
    var pwd2 = document.getElementsByName("pwd")[1];
    if ( user != undefined && pwd != undefined && pwd==pwd2){
        window.un = user;
        window.location = "home.html"; // Redirecting to other page.
        alert ("Registration was successful. You are now logged in as " + user);
        
        return false;
    }
    else{
        alert("Registration was not successful. Try again");
    }
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var form = document.getElementById('login-form');
    var form2 = document.getElementById('register-form');
    if (event.target == form || event.target == form2) {
        document.getElementById('features').style.opacity = 1;
        for (i in document.getElementsByTagName('HEADER')){
            document.getElementsByTagName('HEADER').item(i).style.opacity= 1;
        }
        document.getElementsByTagName('H2').item(i).style.opacity= 1;
        form.style.display = "none";
    }
    if (event.target == form || event.target == form2) {
        document.getElementById('features').style.opacity = 1;
        for (i in document.getElementsByTagName('HEADER')){
            document.getElementsByTagName('HEADER').item(i).style.opacity= 1;
        }
        document.getElementsByTagName('H2').item(i).style.opacity= 1;
        form2.style.display = "none";
    }
}