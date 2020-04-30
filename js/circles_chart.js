function buton1()
{
  var text="parcauto2018.txt";
  loadDoc3(text);
}
function buton2()
{
  var text="parcauto2019.csv";
  loadDoc3(text);
}
function buton3()
{
  var text="https://data.gov.ro/dataset/b93e0946-2592-4ed7-a520-e07cba6acd07/resource/c66e2f22-7c16-4dd4-919d-f592b3e09af6/download/parcauto2018.csv";
  loadDoc(text);
}

function verificare(cerc_x,cerc_y,raze,x,y,r)
{
  for(var i=0;i<raze.length;i++)
  {

     var d=Math.sqrt((x-cerc_x[i])*(x-cerc_x[i])+(y-cerc_y[i])*(y-cerc_y[i]));
     if(r+raze[i]>d)
      return false;
  }
  return true;
}
function verificare2(X,Y,R,x,y,r)
{
   var d=Math.sqrt((x-X)*(x-X)+(y-Y)*(y-Y));
     if(r+d<R)
      return true;
    return false;
}

function desenare_cerc(dim, ord, i, raze, cerc_x, cerc_y,name) {
    var ci = 255 / (ord.length - 2);
   
    var cr = 50 / (ord.length - 2);
    var R = window.innerHeight * 0.4;
    var X = window.innerWidth / 2 + 100;
    var Y = window.innerHeight / 2 + 55;
    var r = 0;
    var g = 255 - ci * ord.indexOf(dim[i]);
    var g2 = 255 - g;
    var b = 255; var w;
    var max = ord[ord.length - 2];
    var Ind_max = dim.indexOf(max);
    //var ra=20+cr*type.indexOf(count[i])/3;
    var ra = 25 + dim[i] * 100 / max;
    var x;
    var y;
    if (i != Ind_max) {
        do {
            x = Math.floor(Math.random() * 2 * R) + X - R;
            y = Math.floor(Math.random() * 2 * R) + Y - R;
        } while (!verificare2(X, Y, R, x, y, ra) || !verificare(cerc_x, cerc_y, raze, x, y, ra));
       // ra += +cr * ord.indexOf(dim[i]);
    }
    else {
        x = X; y = Y;
         }
    raze.push(ra);
    cerc_x.push(x);
    cerc_y.push(y);
    w = 2 * ra;
    var left = x - ra;
    var top = y - ra;
    return "<div class=\"cerc\"  style=\" width:" + w + "px; height:" + w + "px; top:" + top + "px; left:" + left + "px; background:radial-gradient(circle, rgba(" + r + "," + g + "," + b + ",1) 39%, rgba(51,56,57,1) 96%)\"><p class=\"txt\">" + name[i]+"</p><span class=\"title\" style=\"font-size:200%\"></span></div>";

}
function loadDoc3(nume_fisier,id) {
  var xhttp = new XMLHttpRequest();
  var cerc_x=[];
  var cerc_y=[];
  var raze=[];
  

  xhttp.onreadystatechange = function() {
    if(xhttp.readyState === 4)
    {
      if(xhttp.status === 200 || xhttp.status == 0)
      {
        var lines=xhttp.responseText;
        lines=lines.split("\n");
        var resul = [];
        var count = [];
        var categorii=new Map();
        for (var i = 1; i < lines.length; i++) {                 
        var currentline = lines[i].split("\";\"");
        if(categorii.has(currentline[2]))
        {
          var val_init=categorii.get(currentline[2])+parseInt(currentline[5]);

          categorii.set(currentline[2],val_init);
        }
        else
           categorii.set(currentline[2],parseInt(currentline[5]))
        var j=resul.indexOf(currentline[2]);
        if(j==-1)
        {
          resul.push( currentline[2]);
          count.push(parseInt(currentline[5]));
        }
        else
          count[j]=count[j]+parseInt(currentline[5]);
        }
        var type =count.slice();
        type.sort(function(a, b){return a - b});
          var max = type[type.length - 2];
          var Ind_max = count.indexOf(max);
        var ci=255/(type.length-2);
        var cr=50/(type.length-2);
        var creare=document.getElementById("afisaj");
          var R = window.innerHeight *0.4;
          var c1 = creare.clientHeight;
          var c2 = creare.clientWidth;
        var X=window.innerWidth/2+100;
        var Y=window.innerHeight/2+55;
          creare.style.backgroundColor = "grey";
        
          var s = "";
          s = s + desenare_cerc(count, type, Ind_max, raze, cerc_x, cerc_y, resul);
          for (var i = 0; i < resul.length - 2; i++) {
              if (i != Ind_max)
              s = s + desenare_cerc(count, type, i, raze, cerc_x, cerc_y,resul);
          }
        
        creare.innerHTML =s;
        }
      }

          
  };
  xhttp.open("GET", nume_fisier, true);
  xhttp.send(null);
                      
}
