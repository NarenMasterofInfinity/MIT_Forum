let otp1 = document.getElementById('otp1');
let otp2 = document.getElementById('otp2');
let otp3 = document.getElementById('otp3');
let otp4 = document.getElementById('otp4');
let otp5 = document.getElementById('otp5');
let otp6 = document.getElementById('otp6');
function moveTonext(from,to){
    if(from.value.length){
        to.focus();
    }
}
otp1.onkeyup = ()=>{
    moveTonext(otp1,otp2);
}
otp2.onkeyup = ()=>{
    moveTonext(otp2,otp3);
}

otp3.onkeyup = ()=>{
    moveTonext(otp3,otp4);
}

otp4.onkeyup = ()=>{
    moveTonext(otp4,otp5);
}

otp5.onkeyup = ()=>{
    moveTonext(otp5,otp6);
}



