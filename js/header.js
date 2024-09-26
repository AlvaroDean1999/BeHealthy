let verticalMenu = document.getElementById("vertical__menu");
let closeButton = document.getElementById("close__button");
let menuButton = document.getElementById("menu__button");

closeButton.addEventListener("click", function(){
    verticalMenu.style.left = "-300px"; 
})

menuButton.addEventListener("click", function(){
    verticalMenu.style.left = "0"; 
})
