function closeMenu() {
  let menuItems = document.getElementsByClassName("drpodown");
  let leftSide = document.getElementsByClassName("left-side")[0];

  document.getElementsByClassName("menuLines")[0].style.animation = "rotateMenuLines 2s";
  leftSide.style.animation = "translateLeftSide 2s";
  document.getElementById("ppp90Lg").style.animation = "smallestImg 2s";
  document.getElementsByClassName("logo")[0].style.animation = "smallestLogo 2s";
  for (let index = 0; index < menuItems.length; index++) {
    let menuItem = menuItems[index];
    menuItem.style.visibility = "hidden";
  }

  document.getElementById("ppp90Lg").style.width = "25px";
  leftSide.style.width = "10%";
  var users = document.getElementsByClassName("user");
  for (let index = 0; index < users.length; index++) {
    users[index].style.paddingLeft = "2%";
    users[index].style.paddingRight = "2%";
  }
  document.getElementsByClassName("right-side")[0].style.flexGrow = "9"
  document.getElementsByClassName("logo")[0].style.flexGrow = "0";
  document.getElementsByClassName("menuLines")[0].style.flexGrow = "3";
  document.getElementById("bars").style.visibility = "hidden";
  document.getElementById("anti-bars").style.visibility = "visible";
}
/************************************************************************************** */
/************************************************************************************** */
function openMenu() {
  let menuItems = document.getElementsByClassName("drpodown");
  let leftSide = document.getElementsByClassName("left-side")[0];

  document.getElementsByClassName("menuLines")[0].style.animation = "_rotateMenuLines 2s";
  leftSide.style.animation = "_translateLeftSide 2s";
  document.getElementById("ppp90Lg").style.animation = "_smallestImg 2s";
  document.getElementsByClassName("logo")[0].style.animation = "_smallestLogo 2s";
  for (let index = 0; index < menuItems.length; index++) {
    let menuItem = menuItems[index];
    menuItem.style.visibility = "visible";
  }

  document.getElementById("ppp90Lg").style.width = "auto";
  leftSide.style.width = "30%";
  var users = document.getElementsByClassName("user");
  for (let index = 0; index < users.length; index++) {
    users[index].style.paddingLeft = "0";
    users[index].style.paddingRight = "0";
  }
  document.getElementsByClassName("logo")[0].style.flexGrow = "3";
  document.getElementsByClassName("menuLines")[0].style.flexGrow = "1";
  document.getElementById("bars").style.visibility = "visible";
  document.getElementById("anti-bars").style.visibility = "hidden";
}

/************************************************************************************** */
/************************************************************************************** */
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function toggleFunction(strIndex) {
  closeDropFn();
  let index = parseInt(strIndex);
  document.getElementById(strIndex).classList.toggle("show");
  document.getElementsByClassName("dropbtn")[index].classList.toggle("fa-sort-down");
}
/************************************************************************************** */
/************************************************************************************** */
function closeDropFn() {
  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
      document.getElementsByClassName("dropbtn")[i].style.animation = "dropUp 2s";
      document.getElementsByClassName("dropbtn")[i].classList.remove('fa-sort-down');
      openDropdown.classList.remove('show');
    }
  }
}
/************************************************************************************** */
/************************************************************************************** */
// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    closeDropFn();
  }
}

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos < currentScrollPos) {
    document.getElementById("rs-des").style.visibility = "hidden";
    document.getElementById("rs-des").style.borderBottom = "none";
  } else {
    document.getElementById("rs-des").style.visibility = "visible";
    document.getElementById("rs-des").style.borderBottom = "#FCB918 2px solid";
  }
  prevScrollpos = currentScrollPos;
}
/*********************************************************************************** */
/*********************************************************************************** */

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("user");
  //   var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (let index = slideIndex - 1; index < slideIndex + 4; index++) {
    slides[index].style.display = "block";
  }
  //   for (i = 0; i < dots.length; i++) {
  //       dots[i].className = dots[i].className.replace(" active", "");
  //   } 
  //   dots[slideIndex-1].className += " active";
}
/*********************************************************************************** */
/*********************************************************************************** */