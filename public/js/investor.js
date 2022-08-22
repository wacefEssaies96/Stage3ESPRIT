var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos < currentScrollPos) {
    document.getElementById("rs-des").style.visibility = "hidden";
    document.getElementById("rs-des").style.borderBottom = "none";
    document.getElementsByClassName("right-side-id")[0].style.visibility = "hidden";
  } else {
    document.getElementById("rs-des").style.visibility = "visible";
    document.getElementById("rs-des").style.borderBottom = "#FCB918 2px solid";
    document.getElementsByClassName("right-side-id")[0].style.visibility = "visible";
  }
  prevScrollpos = currentScrollPos;
}