var navbardrop = document.getElementById("navbarSupportedContent");
var toggler =document.getElementById("navbarContent");
navbardrop.onclick = function() {
    toggler.classList.toggle("active");
};

function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
  }
  function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
  }