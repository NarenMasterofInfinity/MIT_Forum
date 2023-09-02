let error_msg = {uname:'',uemail:'',dept:'',pass:'',cpass:''};
let valid = true;
let form = document.getElementById('fs');
//functions
function uncheck(uname){
    if(uname.length ==  0){
        return false;
    }
    return true;
}
function has_symbols(field){
    let invalid = "!@#$%^&*(){}[]:;'\",./?+=-\\|~`"
    for(let char of field){
        if(invalid.indexOf(char) !== -1){
            return false;
        }
    }
    return true;
}
function uecheck(uemail){
    let pattern = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
    if(uemail.length == 0){
        return false;
    }
    else if(!pattern.test(uemail)){
        return false;
    }
    return true;
}
function depcheck(dept){
    if(dept.length === 0){
        return false;
    }
    return true;
}
function pcheck(pass){
    if(pass.length === 0){
        return false;
    }
    return true;
}

//if this function returns false then the password is fine
function proper_pass(pass){
    let msg = [];
    if(pass.length < 8){
        msg.push("Password should at least be eight characters")
        valid = false;
        return msg;
    }

    //flags
    let upper = false;
    let lower = false;
    let digit = false;
    let symbol = false;

    //check against
    let digits = "1234567890";
    let symbols = "!@#$%^&*()_+-=[]{};':\"><.,/\\|~`?"

    
    for(let char of pass){
        if(char === char.toUpperCase()){
            upper = true;
        }
        if(char === char.toLowerCase()){
            lower = true;
        }
        if(symbols.indexOf(char) !== -1){
            symbol = true;
        }
        if(digits.indexOf(char) !== -1){
            digit = true;
        }
        if(upper && lower && digit && symbol){
            break;
        }
    }
    if(!(upper && lower && digit && symbol)){
        msg.pop();
        msg.push('Password should have a upper case letter');
        msg.push('Password should have a lower case letter');
        msg.push('Password should have a digit');
        msg.push('Password should have a symbol');
        valid = false;
       
        
        return msg;
        
    }
    return false;
}

function cpscheck(pass,cpass){
    if(cpass.length == 0){
        return false;
    }
    if(pass !== cpass){
        return false;
    }
  return true;
}

//main
//upon clicking the button, all fields are checked. if amy of them sets the response to be false then the button
//stays as button and error messages are shown

// fields
let uname = document.getElementById('user');
let uemail = document.getElementById('email');
let udept = document.getElementById('dept');
let upass = document.getElementById('pass');
let ucpass = document.getElementById('cpass');

//error p's
let unerror = document.getElementById('unr');
let ueerror = document.getElementById('uer');
let uderror = document.getElementById('udr');
let uperror = document.getElementById('upr');
let upcerror = document.getElementById('ucpr');



let error = document.getElementById('error')
error.value = "false";

let submit = document.getElementById('submit');
submit.type = "button";
let flag = true;

submit.addEventListener('click',()=>{
    let trues = 0;
    console.log(trues);
    if(!uncheck(uname.value)){
        unerror.innerHTML = "Username is empty!";
        const namerr=document.getElementsByClassName('uerror')[0];
        namerr.style.display='block';
        flag = false;
    }

    else if(!has_symbols(uname.value)){
        unerror.innerHTML = "Username can't have any symbols except underscore('_')";
        const namerr=document.getElementsByClassName('uerror')[0];
        namerr.style.display='block';
        flag = false;
    }
    else{
        //flag = true;
        trues+=1;
        const namerr=document.getElementsByClassName('uerror')[0];
        namerr.style.display='none';
        unerror.innerHTML = "";
    }

    if(!uecheck(uemail.value)){
        ueerror.innerHTML = "Invalid Email address";
        const emailerr=document.getElementsByClassName('uerror')[1];
        emailerr.style.display='block';
        flag = false;
    }
    else{
        trues+=1;
        const emailerr=document.getElementsByClassName('uerror')[1];
        emailerr.style.display='none';
        ueerror.innerHTML = "";
    }
    if(!depcheck(udept.value)){
        uderror.innerHTML = "select a department";
        const depterr=document.getElementsByClassName('uerror')[2];
        depterr.style.display='block';
        flag = false;
    }
    else{
        trues+=1;
        const depterr=document.getElementsByClassName('uerror')[2];
        depterr.style.display='none';
        //flag = true;
        uderror.innerHTML = "";
    }

    if(!pcheck(upass.value)){
        uperror.innerHTML = "Enter a password";
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='block';
        flag = false;
    }
    else{
        trues+=1;
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='none';
        uperror.innerHTML = "";
    }

    if(ucpass.value.length !== 0 && !pcheck(upass.value)){
        upcerror.innerHTML = "Fill the password first!";
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='block';
        flag = false;
    }
    else{
        //flag=true;
        trues+=1;
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='none';
        upcerror.innerHTML = "";
    }

    let msg = proper_pass(upass.value);
    // console.log(msg);
    if((upass.value.length) < 8){
        uperror.innerHTML = "Password should atleast be 8 characters";
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='block';
        flag = false;
    }
    else{
    if(pcheck(upass.value) && msg){
        //console.log('reached');
        uperror.innerHTML += "<ul>"
        for(let m of msg){
            uperror.innerHTML += ("<li>"+m+"</li>");
        }
        uperror.innerHTML += "</ul>";
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='block';
        flag = false;
    }
    else{
        trues+=1;
      //  flag = true;
        const passerr=document.getElementsByClassName('uerror')[3];
        passerr.style.display='none';
        uperror.innerHTML = "";
    }
}
//if msg is returned then the password is invalid
    if(valid && (upass.value != ucpass.value)){
        upcerror.innerHTML = "Password and confirm password doesn't match";
        const passerr=document.getElementsByClassName('uerror')[4];
        passerr.style.display='block';
        flag = false;
    }
    else{
   //     flag= true;
        trues+=1;
        const passerr=document.getElementsByClassName('uerror')[4];
        passerr.style.display='none';
        upcerror.innerHTML = "";
    }
    console.log(trues);
    if(flag && (trues >= 7)){
       // error.value = "true";
       submit.type = "submit";
    }
    else{
        trues = 0;
        flag = true;
        submit.type = "button";
    }

})