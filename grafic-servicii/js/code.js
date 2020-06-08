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
  minValue   : 9999999,
  values       : [],
  points       : [],
  vSteps       : 5,
  measurements : [],
  
  calcMeasure : function(){
      this.measurements = new Set();
      this.measurements.add(this.minValue);
      for(x=0; x < this.vSteps-1; x++){
          var measurement = Math.ceil(((this.maxValue-this.minValue) / this.vSteps) * (x +1));
          console.log(measurement+this.minValue);
          this.measurements.add(measurement+this.minValue);
      }

      this.measurements.add(this.maxValue);
      this.measurements = Array.from(this.measurements);
    this.measurements.reverse();
  },
  createChart : function(element, values){
    element = element.split('.').join(""); //sterg punctul de la clasa
    this.element = document.getElementsByClassName(element)[0];
    if(this.element) {
        this.values = values;

        // Calcule initiale
        this.calcMaxAndMinValue();
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
            console.log(measurements);
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
        // Seteaza link pentru butonul de salvare
            document.getElementsByTagName("a")[0].href='data:image/svg+xml;charset=utf-8,'+document.getElementsByTagName("svg")[0].outerHTML
        }
    }
  },
    
    calcPoints : function(){
        this.points = [];
        if(this.values.length > 1){
        var points = "0," + chart.height + " ";
        for(x=0; x < this.values.length; x++){
            // procentajul e valoarea / valoarea maxima
            var perc  = (this.values[x]-this.minValue) / (this.maxValue-this.minValue);
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
    calcMaxAndMinValue : function(){
        this.maxValue = 0;
        this.minValue = 999999999999;
        for(x=0; x < this.values.length; x++){
            if(this.values[x] > this.maxValue){
                this.maxValue = this.values[x];
            }
            if(this.values[x] < this.minValue){
                this.minValue = this.values[x];
            }
        }
        // Round up to next integer
        this.minValue = Math.floor(this.minValue);
        this.maxValue = Math.ceil(this.maxValue);
        if(this.minValue >= 1)
            {
              //  this.minValue -= 1;
            }
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

const svg = document.getElementsByTagName('svg')[0].outerHTML;
console.log(svg);
svgToPng(svg,(imgData)=>{
    const pngImage = document.createElement('img');
    document.body.appendChild(pngImage);
    pngImage.src=imgData;
});
 function svgToPng(svg, callback) {
    const url = getSvgUrl(svg);
    svgUrlToPng(url, (imgData) => {
        callback(imgData);
        URL.revokeObjectURL(url);
    });
}
function getSvgUrl(svg) {
    return  URL.createObjectURL(new Blob([svg], { type: 'image/svg+xml' }));
}
function svgUrlToPng(svgUrl, callback) {
    const svgImage = document.createElement('img');
  console.log(svgImage);
     svgImage.style.position = 'absolute';
     svgImage.style.top = '-9999px';
    document.body.appendChild(svgImage);
    svgImage.onload = function () {
        const canvas = document.createElement('canvas');
        canvas.width = svgImage.clientWidth;
        canvas.height = svgImage.clientHeight;
        const canvasCtx = canvas.getContext('2d');
        canvasCtx.drawImage(svgImage, 0, 0);
        const imgData = canvas.toDataURL('image/webp');
        document.getElementsByTagName("a")[1].href=imgData;
    };
    svgImage.src = svgUrl;
 }