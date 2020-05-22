function loadDoc(nume_fisier) {
  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
        if(xhttp.readyState === 4)
        {
            if(xhttp.status === 200 || xhttp.status == 0)
            {
               var lines=xhttp.responseText;
               lines=lines.split("\n");
               var resul = [];
               var count = [];
               for (var i = 1; i < lines.length; i++) {                 
                  var currentline = lines[i].split("\";\"");
                  var j=resul.indexOf(currentline[3]);
                  if(j==-1)
                    {
                      resul.push( currentline[3]);
                      count.push(parseInt(currentline[5]));
                    }
                  else
                        count[j]=count[j]+parseInt(currentline[5]);
                    }
                    var type =count.slice();
                    type.sort(function(a, b){return a - b});
                    var max2=type[type.length-2];
                    var max1=type[type.length/2];
                    var ci=255/(type.length-1);
                    var creare=document.getElementById("main");
                    var s="<svg width=\"1200\" height=\"3000\" aria-labelledby=\"title\"><title id=\"title\">A bart chart showing information</title>";
                    var s2="<svg width=\"1200\" height=\"3000\" aria-labelledby=\"title\"><title id=\"title\">A bart chart showing information</title>";
                    for (var i =0; i <resul.length-1; i++) {
                       // type.push([resul[i],count[i]]);
                        var poz=i*60+10;
                        var r = 0;

    var g =255-ci*type.indexOf(count[i]);
    var g2=255-g;

    var b = 255;var w;var max;
                       
                         max=max2;
                        w=count[i]*100/max;
                        var x=100+w;
                        var y=poz+30;
                        if(w>90)
                            x=x/5;
                          if(max==max2)
                        s=s+"<g class=\"bar\"><rect x=\"50\" y=\""+poz+"\" width=\""+w+"%\" height=\"50\" style=\"fill:rgb("+r+","+g+","+b+")\" /><text color=rgb("+r+","+g2+","+b+") x=\""+x+"\" y=\""+y+"\" dy=\".35em\">"+resul[i]+" ( "+count[i]+" )</text></g>";
                          }
                    s=s+"</svg>";
                    
                    
                    creare.innerHTML =s;
                     }
        }

          
  };
  xhttp.open("GET", nume_fisier, true);
  xhttp.send(null);                  
}
function buton1()
{
  var text="parcauto2018.csv";
loadDoc3(text,"right");
}
function buton2()
{
  var text="parcauto2019.csv";
 
  loadDoc3(text,"top");
}
function buton3()
{
  var text="https://data.gov.ro/dataset/b93e0946-2592-4ed7-a520-e07cba6acd07/resource/c66e2f22-7c16-4dd4-919d-f592b3e09af6/download/parcauto2018.csv";
  loadDoc(text);
}
function loadDoc2(nume_fisier) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
        {
          var lines=xhttp.responseText;
          lines=lines.split("\n");
          var resul = [];
          var count = [];
          for (var i = 1; i < lines.length; i++) {                 
            var currentline = lines[i].split("\";\"");
            var j=resul.indexOf(currentline[3]);
            if(j==-1)
              {
                resul.push( currentline[3]);
                count.push(parseInt(currentline[5]));
              }
            else
                count[j]=count[j]+parseInt(currentline[5]);
          }
          var type =count.slice();
          type.sort(function(a, b){return a - b});
          var max=type[type.length-2];
          var ci=255/(type.length-1);
          
          var creare=document.getElementById("main");
          var s="";
          
          for (var i =0; i <resul.length-2; i++) {
                       // type.push([resul[i],count[i]]);
            var poz=i*60+10;
            var r = Math.floor(Math.random() * 255);
            var g =255-ci*type.indexOf(count[i]);
            var g2=255-g;
            var b = 255;
            var width=10+20*count[i]/max;
            var sizeFont=100+count[i]*500/max;
            var orientation="";
            var fg=Math.floor(sizeFont/100);
            //if(Math.random()<0.5)
              //orientation="writing-mode: vertical-rl;text-orientation: upright;display: inline-block;";
            s=s+"<g class=\"Marca\" style=\"flex-basis: 0;flex-grow:"+ fg+";font-size:"+sizeFont+"%;"+orientation+"color:rgb("+r+","+g+","+b+");\"> "+resul[i]+" </g>";
          }
          //s=s+"</svg>";
          creare.innerHTML =s;
          }        
  };
  xhttp.open("GET", nume_fisier, true);
  xhttp.send(null);           
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

function desenare_cerc(dim, ord, i, raze, cerc_x, cerc_y,name,red,green,blue) {
    var ci = 255 / (ord.length - 2);
   
    var cr = 50 / (ord.length - 2);
    var R = window.innerHeight * 0.4;
    var X = window.innerWidth / 2 + 100;
    var Y = window.innerHeight / 2 + 55;

    var g = green;//-  ord.indexOf(dim[i]);
    var r =  255- ci *ord.indexOf(dim[i]);
    var b = blue; var w;
    var max = ord[ord.length - 2];
    var Ind_max = dim.indexOf(max);
    //var ra=20+cr*type.indexOf(count[i])/3;
    var ra = 25 + dim[i] * 100 / max;
    var x;
    var y;
    if (i == Ind_max)
        ra = ra - 25;
    if (i != Ind_max)
        do {
            x = Math.floor(Math.random() * 2 * R) + X - R;
            y = Math.floor(Math.random() * 2 * R) + Y - R;
        } while (!verificare2(X, Y, R, x, y, ra) || !verificare(cerc_x, cerc_y, raze, x, y, ra));
    // ra += +cr * ord.indexOf(dim[i]);
    else {
        x = X;
        y = Y;
    }
    raze.push(ra);
    cerc_x.push(x);
    cerc_y.push(y);
    w = 2 * ra;
    var left = x - ra;
    var top = y - ra;
    var font = 20 + dim[i] * 100 / max;
    var pad =  ra -font/2;
    return "<div class=\"cerc\"  style=\" width:" + w + "px; height:" + w + "px; top:" + top + "px; left:" + left + "px; background:radial-gradient(circle, rgba("+r+"," + g + "," + b + ",1) 39%, rgba(51,56,57,1) 96%)\"><div style=\" float: left;height:" + pad +"px;\"></div> <div class=\"txt\" style=\"font-size:" + font + "px;color:rgb(255,0," + r + ")\">" + name[i] + "</div><span class=\"title\" style=\"font-size:200%\"></span></div>";

}
function loadDoc3(nume_fisier,an,r,g,b) {
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
        var creare=document.getElementById(an);
          var R = window.innerHeight *0.4;
          var c1 = creare.clientHeight;
          var c2 = creare.clientWidth;
        var X=window.innerWidth/2+100;
        var Y=window.innerHeight/2+55;
          creare.style.backgroundColor = "grey";
        
          var s = "";
          s = s + desenare_cerc(count, type, Ind_max, raze, cerc_x, cerc_y, resul,r,g,b);
          for (var i = 0; i < resul.length - 2; i++) {
              if (i != Ind_max)
              s = s + desenare_cerc(count, type, i, raze, cerc_x, cerc_y,resul,r,g,b);
          }
       
        creare.innerHTML =s;
        }
      }

          
  };
  xhttp.open("GET", nume_fisier, true);
  xhttp.send(null);
                      
}

/*function loadDoc4(nume_fisier) 
{
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
        if(categorii.has(currentline[1]))
        {
          var val_init=categorii.get(currentline[1])+parseInt(currentline[5]);

          categorii.set(currentline[1],val_init);
        }
        else
           categorii.set(currentline[1],parseInt(currentline[5]))
       
        }
        categorii[Symbol.iterator] = function* () {
    yield* [...this.entries()].sort((a, b) => a[1] - b[1]);
}
       for (let [key, value] of map) 
        {     // get data sorted
          console.log(key + ' ' + value);
        }
        var max=type[type.length-2];
        
        var ci=255/(type.length-2);
        var cr=90/(type.length-2);
        var creare=document.getElementById("afisaj");
        creare.style.backgroundColor = "grey";
        var s="";
        for (var i =0; i <resul.length-2; i++) {
                       // type.push([resul[i],count[i]]);
        var poz=i*60+10;
        
        var r=Math.floor(Math.random() * 255);
        var g =255-ci*type.indexOf(count[i]);
        var g2=255-g;
        var b = 255;var w;var max;
        var ra=15+cr*type.indexOf(count[i]);
        
        var x;
        var y;
        do
        {
          x=Math.floor(Math.random()*1000)+300+ra;
          y=Math.floor(Math.random()*800)+130+ra;
        }while(!verificare(cerc_x,cerc_y,raze,x,y,ra));
        raze.push(ra);
        cerc_x.push(x);
        cerc_y.push(y);
        w=2*ra;
        var left=x-ra;
        var top=y-ra;
        s=s+"<div class=\"cerc\"  style=\" width:"+w+"px; height:"+w+"px; top:"+top+"px; left:"+left+"px; background:radial-gradient(circle, rgba("+r+","+g+","+b+",1) 39%, rgba(51,56,57,1) 96%)\"><p class=\"txt\">"+resul[i]+"</p><span class=\"title\" style=\"font-size:200%\">"+resul[i]+"\n("+count[i]+")"+"</span></div>";
        }
        
        creare.innerHTML =s;
        }
      }

          
  };
  xhttp.open("GET", nume_fisier, true);
  xhttp.send(null);
                      
}*/

function creare_diagrame()
{
    var culori = [{ red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }];
  for(var an=2017;an<=2019;an++)
  {
      var nume_fisier = "parcauto" + an + ".csv";
      var a = "" + an;
      loadDoc3(nume_fisier, a, culori[an - 2017].red, culori[an - 2017].green, culori[an - 2017].blue);
  }
}
function openAn(an, elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(an).style.display = "block";
    elmnt.style.backgroundColor = color;

}
document.getElementById("defaultOpen").click();



////
