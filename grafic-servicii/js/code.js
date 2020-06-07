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
console.log(listaValoriCatCom);
chart.createChart('.chart-catcom',listaValoriCatCom);  