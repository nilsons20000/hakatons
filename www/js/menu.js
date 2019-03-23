function openNav() { 
document.getElementById("myNav") 
.style.height="60%"; 
} 

function closeNav() { 
document.getElementById("myNav") 
.style.height = "0%"; 
} 

$(document).ready(function () {
  $("input.toogleSubmenu").click(function () {
$("#Subtable"+$(this).prop("id").substr(5)).parent().fadeToggle();   
  });
});




















