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
    if(buttons){
        buttons.appendChild(buton_masina);
    }
    }
    if(buttons){
        buttons.addEventListener('click', function(e){
            if(e.target != e.currentTarget){
                var el = e.target;
                var masina = el.getAttribute('data');
                setPieChart(masina);
                setActiveClass(el);
            }
            e.stopPropagation();
        });
    }

    var setPieChart = function(nume_masina){
        var number = masini[nume_masina];
        var fixedNumber = (number*circumferinta)/100;
        var result = fixedNumber + ' ' + circumferinta;
        if(pie) {
            pie.style.strokeDasharray = result;
        }
        if(number){
            number = number.toFixed(2);
        }
        if(an===2019){
            var procentaj = document.getElementById("procentaj2019");
            if(procentaj && number) {
                procentaj.innerHTML = number;
            }
        }
        if(an===2018){
            var procentaj = document.getElementById("procentaj2018");
            if(procentaj && number) {
                procentaj.innerHTML = number;
            }
        }
    }

    var setActiveClass = function(el) {
    for(var i = 0; i < buttons.children.length; i++) {
        buttons.children[i].classList.remove("active");
        el.classList.add("active");
    }
    }

    //setarile default
    setPieChart('DACIA');
    if(buttons) {
        setActiveClass(buttons.children[0]);
    }
}

 /* end --- codul pentru pie 2018*/

 window.onload = function(){ 
     /*cod meniu*/
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

    /*end - cod meniu*/
    /*cod tabs - an 
    var parent_tabs = document.querySelectorAll("ul.tabs>li");
    for(var j = 0; j< parent_tabs.length; j++) {
        parent_tabs[j].onclick = function(e) {
            console.log("aaa");
            for(var i = 0; i< parent_tabs.length; i++) {
                parent_tabs[i].classList.remove("active");
            }
            this.classList.add("active");
            var active_tab = this.getAttribute('data-tab');

            var tabs_content = document.querySelectorAll(".content");
            for(var i = 0; i< tabs_content.length; i++) {
                tabs_content[i].classList.remove("active");
            }
            console.log(".content." + active_tab);

            var act_tab = document.querySelectorAll(".content."+active_tab);
            for(var i = 0; i< act_tab.length; i++) {
                act_tab[i].classList.add("active");
            }
        }
    }
    /* end - cod tabs pentru an*/

    var listaValori2019 = [];
    var valoareTitlu2019 = document.querySelectorAll('.titlu_masina_pie_2019 span');
    var valoareNumar2019 = document.querySelectorAll('.numar_masina_pie_2019 span');
    var suma2019 = 0;
    for (var a = 0; a < valoareTitlu2019.length; a++) {
        var numar_pie = parseInt(valoareNumar2019[a].innerHTML);
        suma2019 = suma2019 + numar_pie;
    }
    for (var a = 0; a < valoareTitlu2019.length; a++) {
        var listaInterioara2019 = [];
        var numar_pie = parseInt(valoareNumar2019[a].innerHTML);
        numar_pie = (100*numar_pie)/suma2019;
        listaInterioara2019.push(valoareTitlu2019[a].innerHTML);
        listaInterioara2019.push(numar_pie);
        listaValori2019.push(listaInterioara2019);
    }
    const dictionarValori2019 = Object.fromEntries(listaValori2019);
    dashboard_pie(dictionarValori2019, 2019);

    var listaValori2018 = [];
    var valoareTitlu2018 = document.querySelectorAll('.titlu_masina_pie_2018 span');
    var valoareNumar2018 = document.querySelectorAll('.numar_masina_pie_2018 span');
    var suma2018 = 0;
    for (var a = 0; a < valoareTitlu2018.length; a++) {
        var numar_pie = parseInt(valoareNumar2018[a].innerHTML);
        suma2018 = suma2018 + numar_pie;
    }
    for (var a = 0; a < valoareTitlu2018.length; a++) {
        var listaInterioara2018 = [];
        var numar_pie = parseInt(valoareNumar2018[a].innerHTML);
        numar_pie = (100*numar_pie)/suma2018;
        listaInterioara2018.push(valoareTitlu2018[a].innerHTML);
        listaInterioara2018.push(numar_pie);
        listaValori2018.push(listaInterioara2018);
    }
    const dictionarValori2018 = Object.fromEntries(listaValori2018);
    dashboard_pie(dictionarValori2018, 2018);
 };



 /*cod pentru pagina cu an*/

 /***** invtat de pe https://codepen.io/alanmenhennet/pen/WxrXww ******/

 console.clear();
var chart = {
  element      : "",
  chart        : "",
  polygon      : "",
  width        : 100,
  height       : 50,
  maxValue     : 0,
  values       : [],
  points       : [],
  vSteps       : 5,
  measurements : [],
  
  calcMeasure : function(){
    this.measurements = [];
      for(x=0; x < this.vSteps; x++){
        var measurement = Math.ceil((this.maxValue / this.vSteps) * (x +1));
        this.measurements.push(measurement);
      }
    
    this.measurements.reverse();
  },
  createChart : function(element, values){
    element = element.split('.').join(""); //sterg punctul de la clasa
    this.element = document.getElementsByClassName(element)[0];
    if(this.element) {
        this.values = values;

        // Calcule initiale
        this.calcMaxValue();
        this.calcPoints();
        this.calcMeasure();
        
        // Reseteaza
        this.element.innerHTML = "";
        
        // Creeaza SVG-ul
        this.chart = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        this.chart.setAttribute("width", "100%");
        this.chart.setAttribute("height", "100%");
        this.chart.setAttribute("viewBox", "0 0 " + chart.width + " " + chart.height);

        //Creeaza <polygon>
        this.polygon = document.createElementNS('http://www.w3.org/2000/svg','polygon');
        this.polygon.setAttribute("points", this.points);
        this.polygon.setAttribute("class", "line");
    
        if(this.values.length > 1){
        var measurements = document.createElement("div");
        measurements.setAttribute("class", "chartMeasurements");
        for(x=0; x < this.measurements.length; x++){
            var measurement = document.createElement("div");
            measurement.setAttribute("class", "chartMeasurement");
            measurement.innerHTML = this.measurements[x];
            measurements.appendChild(measurement);
        }


        this.element.appendChild(measurements);
        // Adauga svg la div
        this.element.appendChild(this.chart);
        // Adauga polygon la <svg>
        this.chart.appendChild(this.polygon);
        }
    }
  },
    
    calcPoints : function(){
        this.points = [];
        if(this.values.length > 1){
        var points = "0," + chart.height + " ";
        for(x=0; x < this.values.length; x++){
            // procentajul e valoarea / valoarea maxima
            var perc  = this.values[x] / this.maxValue;
            // procentajul 100 / numarul de valori
            var steps = 100 / ( this.values.length - 1 );
            var point = (steps * (x )).toFixed(2) + "," + (this.height - (this.height * perc)).toFixed(2) + " ";
            // adauga punctul
            points += point;
        }
        points += "100," + this.height;
        this.points = points;
        console.log(points);
        
        }
        // output the values for display
    },
    /**
     * Calculate Max Value
     * Find the highest value in the array, and then
     * add 10% to it so the graph doesn't touch the top of the chart
     */
    calcMaxValue : function(){
        this.maxValue = 0;
        for(x=0; x < this.values.length; x++){
            if(this.values[x] > this.maxValue){
                this.maxValue = this.values[x];
            }
        }
        // Round up to next integer
        this.maxValue = Math.ceil(this.maxValue);
    }
}

var values = [];


var listaValori = [];
var valoare = document.querySelectorAll('.values span');

for (var a = 0; a < valoare.length; a++) {
    listaValori.push(parseInt(valoare[a].innerHTML));
}
chart.createChart('.chart-marca',listaValori);  

var listaValoriAn = [];
var valoareAn = document.querySelectorAll('.active .an-valori span');

for (var a = 0; a < valoareAn.length; a++) {
    listaValoriAn.push(parseInt(valoareAn[a].innerHTML));
}
chart.createChart('.chart-an',listaValoriAn);  


var listaValoriCatCom = [];
var categorieComunitara = document.querySelectorAll('.active .catcom-valori span');

for (var a = 0; a < categorieComunitara.length; a++) {
    listaValoriCatCom.push(parseInt(categorieComunitara[a].innerHTML));
}
chart.createChart('.chart-catcom',listaValoriCatCom);  