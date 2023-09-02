
function game(mode){
    let chances = 9;
    if(mode == 2){
        chances = 7;
    }
    else if(mode == 3){
        chances = 5;
    }
    
    let num = Math.floor(Math.random()*49 + 1);
    let flag = false;
    let val = chances;
    for(let i = 0;i < val;i++){
        let res = prompt("your guess?");
        if(res == num){
            alert("your guess is right");
            flag = true;
            break;
        }
        else{
            chances--;
            alert("you have "+chances+" left");
        }
    }
    if(!flag){
        alert(" game is over "+" The actual guess is "+num);
    }

}
