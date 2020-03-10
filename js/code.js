 var parent_menu = document.querySelector(".dropdown");
 var mobile_hamburger = document.querySelector(".mobile_menu");

 window.onload = function(){ 
    parent_menu.onclick = function(e){
        e.preventDefault();
        var menu = document.querySelector('.dropdown ul');
        menu.classList.toggle('hide-submenu');
    };
    mobile_hamburger.onclick = function(e) {
        e.preventDefault();
        var menu = document.querySelector('aside nav');
        menu.classList.toggle('show-menu');
    }
 };