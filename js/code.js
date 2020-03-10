/* codul pentru pie dashboard */
/*invatat de pe https://css-tricks.com/how-to-make-charts-with-svg/ */
function dashboard_pie(masini, an) {
    var pie = document.querySelector('.pie-' + an);
    var buttons = document.querySelector('.masini-menu-' + an);
    var circumferinta = 628;

    for(masina in masini){ //adaugam pentru fiecare element un buton in meniu
    var buton_masina = document.createElement('div');
    buton_masina.setAttribute('data', masina);
    buton_masina.innerText = masina;
    buttons.appendChild(buton_masina);
    }

    buttons.addEventListener('click', function(e){
        if(e.target != e.currentTarget){
            var el = e.target;
            var masina = el.getAttribute('data');
            setPieChart(masina);
            setActiveClass(el);
        }
        e.stopPropagation();
    });

    var setPieChart = function(nume_masina){
        var number = masini[nume_masina];
        var fixedNumber = (number*circumferinta)/100;
        var result = fixedNumber + ' ' + circumferinta;
        pie.style.strokeDasharray = result;
    }

    var setActiveClass = function(el) {
    for(var i = 0; i < buttons.children.length; i++) {
        buttons.children[i].classList.remove("active");
        el.classList.add("active");
    }
    }

    //setarile default
    setPieChart('Dacia');
    setActiveClass(buttons.children[0]);
}

 /* end --- codul pentru pie 2018*/

 window.onload = function(){ 
    var parent_menu = document.querySelector(".dropdown>a");
    parent_menu.onclick = function(e){
        e.preventDefault();
        var menu = document.querySelector('.dropdown ul');
        menu.classList.toggle('hide-submenu');
    };

    var mobile_hamburger = document.querySelector(".mobile_menu");
    mobile_hamburger.onclick = function(e) {
        e.preventDefault();
        var menu = document.querySelector('aside nav');
        menu.classList.toggle('show-menu');
    }
    var masini = {
        Dacia: 60,
        Mercedes : 5,
        Volvo: 9,
        Tesla: 1,
        Seat: 15,
        Fiat: 12
        };
    dashboard_pie(masini, 2019);

    masini = {
        Dacia: 19,
        Mercedes : 2,
        Volvo: 7,
        Tesla: 1,
        Seat: 11,
        Fiat: 7
        };
    dashboard_pie(masini, 2018);
 };