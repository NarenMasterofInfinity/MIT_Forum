
//   function active(event) {
//     const links = document.querySelectorAll("nav a");
//     links.forEach(link => link.classList.remove("active"));
//     event.target.classList.add("active");
//   }

//   const anchorLinks = document.querySelectorAll("nav a");
//   anchorLinks.forEach(function(link) {
//     link.addEventListener("click", active);
//   });

// let list = document.getElementById('list');
// let li = list.children;
// let count = li.length;
// let clicked_li = -1;
// for(let i = 0;i<count;i++){
    
//     li[i].onclick = ()=>{
//         console.log('clicked');
//         clicked_li = i;
//         li[i].classList.add('active');
//     }
// }
// for(let i =0;i<count && i!=clicked_li;i++){
//     li[i].classList.remove('active');
// }
let btn = document.getElementById('no');
btn.onclick = ()=>{
    let form = document.getElementById('uform');

    HTMLFormElement.prototype.submit.call(form);
}