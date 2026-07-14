/* ==============================
Sticky Navbar
==============================*/

window.addEventListener("scroll",function(){

let nav=document.querySelector(".custom-navbar");

if(window.scrollY>80){

nav.classList.add("navbar-scrolled");

}else{

nav.classList.remove("navbar-scrolled");

}

});

/* ==============================
Scroll To Top
==============================*/

const topBtn=document.createElement("button");

topBtn.innerHTML='<i class="fa-solid fa-arrow-up"></i>';

topBtn.className="scroll-top";

document.body.appendChild(topBtn);

window.addEventListener("scroll",()=>{

if(window.scrollY>350){

topBtn.classList.add("show");

}else{

topBtn.classList.remove("show");

}

});

topBtn.onclick=()=>{

window.scrollTo({

top:0,

behavior:"smooth"

});

};

/* ==============================
Smooth Anchor Scroll
==============================*/

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

anchor.addEventListener("click",function(e){

const target=document.querySelector(this.getAttribute("href"));

if(target){

e.preventDefault();

target.scrollIntoView({

behavior:"smooth"

});

}

});

});

/* ==============================
Fade Body
==============================*/

window.addEventListener("load",()=>{

document.body.classList.add("loaded");

});