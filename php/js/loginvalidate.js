let uname = document.getElementById('uname');
let upass = document.getElementById('pass');

//error 
let unerror = document.getElementById('une');
let uperror = document.getElementById('uee');
let flag = true;

let login = document.getElementById('login');
let show = document.getElementById('showpass');
let eye = document.getElementById('eye');
show.onclick = () => {
    if(upass.type == "password" && (show.checked)){
        upass.type = "text";
        eye.className = "fas fa-eye";
    }
    else{
        upass.type = "password";
        eye.className = "fa-solid fa-eye-slash";
    }
}
login.onclick = ()=>{
    if(uname.value.length == 1){
        unerror.innerHTML = "Enter the username";
        flag = false;
    }
    if(upass.value.length == 1){
        uperror.innerHTML = "Enter the password";
        flag = false;
    }
    if(flag){
        let form = document.getElementById('fs');
        HTMLFormElement.prototype.submit.call(form);
    
    }
}
