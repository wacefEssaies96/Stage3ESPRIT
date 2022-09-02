// Get the modal
var modalsuccess = document.getElementById("success");

// Get the button that opens the modal
var btnsuccess = document.getElementById("successBtn");

// Get the <span> element that closes the modal
var spansuccess = document.getElementsByClassName("closeSucess")[0];

// When the user clicks the button, open the modal 
btnsuccess.onclick = function() {
  modalsuccess.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spansuccess.onclick = function() {
  modalsuccess.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalsuccess) {
    modalsuccess.style.display = "none";
  }
}

function clickBtnSuccess(){
  btnsuccess.click();
}