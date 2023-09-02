// var header = document.getElementsByClassName('container')[0];

// function fadeOutOnScroll(element) {
// 	if (!element) {
// 		return;
// 	}
	
// 	var distanceToTop = window.pageYOffset + element.getBoundingClientRect().top;
// 	var elementHeight = element.offsetHeight;
// 	var scrollTop = document.documentElement.scrollTop;
	
// 	var opacity = 1;
	
// 	if (scrollTop > distanceToTop) {
// 		opacity = 1 - (scrollTop - distanceToTop) / elementHeight;
// 	}
	
// 	if (opacity >= 0) {
// 		element.style.opacity = opacity;
// 	}
// }

// function scrollHandler() {
// 	fadeOutOnScroll(header);
// }

// window.addEventListener('scroll', scrollHandler);
let light_text = document.getElementById('turnon');
let light = document.getElementsByClassName('light')[0];
let lamp = document.getElementsByClassName('lamp')[0];
let lamp_content = document.getElementsByClassName('content2')[0];
let faq = document.getElementsByClassName('three')[0];
light_text.onhover = () => {
	light_text.style.color = 'yellow';
	light_text.style.cursor = 'pointer';
}
lamp.onhover = () => {
	light_text.style.color = 'yellow';
	light_text.style.cursor = 'pointer';
}
light_text.onclick = ()=>{
	light_text.style.display = 'none';
	light.style.opacity = 1;
	faq.style.marginTop = '40%';
	lamp_content.style.display = 'block';
}