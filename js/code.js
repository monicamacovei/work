 var btn = document.querySelector(".dropdown");

 window.onload = function(){ 
    btn.onclick = function(e){
        e.preventDefault();
        var menu = document.querySelector('.dropdown ul');
        menu.classList.toggle('hide-submenu');
    };
 };