

function scrollFunction() {
  if (document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}
let btn = document.getElementById('no');
btn.onclick = ()=>{
    //console.log('sdf');
    let form = document.getElementById('uform');
    HTMLFormElement.prototype.submit.call(form);
}
window.onscroll = function() {scrollFunction()};
