let buttonContact = document.getElementById("button__contact"); 
let contactForm = document.getElementById("contact__form"); 
let closeForm = document.getElementById("button__closeForm"); 

buttonContact.addEventListener("click", function(){
    contactForm.style.display = "flex"; 
});

closeForm.addEventListener("click", function(){
    contactForm.style.display = "none"; 
});