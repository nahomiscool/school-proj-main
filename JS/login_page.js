let username = document.getElementById('username-js');
let password = document.getElementById('password-js');
let form = document.querySelector('.login-form');
let p = document.createElement("p");
p.style.color = "red";
p.style.position = "absolute";
p.style.bottom = "20px"

userKey = "admin";
passKey = "admin";

function validateUserInfo(){
    if(username.value === userKey && password.value === passKey){
        window.location.href = "Home.html";
    }else if(username.value === "" || password.value === ""){
        p.textContent = "Please enter username and password to login.";
        p.style.left = "70px";
        form.appendChild(p);
    }else{
        p.textContent = "The username or password you entered is incorrect. Please try again.";
        p.style.left = "20px";
        form.appendChild(p);
    }
    
}
