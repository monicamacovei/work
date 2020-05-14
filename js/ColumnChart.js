function loadDoc(nume_fisier,an) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status === 200 || xhttp.status == 0) {
                var lines = xhttp.responseText;

                lines = lines.split("\n");
                var resul = [];
                var count = [];
                for (var i = 1; i < lines.length; i++)
                {
                    var currentline = lines[i].split("\";\"");
                    var j = resul.indexOf(currentline[1]);
                    if (j == -1)
                    {
                        resul.push(currentline[1]);
                        count.push(parseInt(currentline[5]));
                    }
                    else
                        count[j] = count[j] + parseInt(currentline[5]);
                }


                var type = count.slice();
                type.sort(function (a, b) { return a - b });
                var ci = 255 / type.length;
                var a = "c" + an;
                var creare = document.getElementById(a);
                var axaX = document.getElementById("Ax" + an);
                var axaY = document.getElementById("Ay" + an);

                var s2 = "<div class=\"lab\">300</div><div class=\"lab\">200</div><div class=\"lab\">100</div>";
                axaY.innerHTML = s2;
                var s3 = " ";
                 var y = window.innerHeight;
                creare.style.width = window.innerWidth * 0.55;
                creare.style.height = window.innerHeight+y/2;
               
                var s = "";
                for (var i = 0; i < resul.length-2; i++) {
                    var poz = i * 40 + 7;
                    var r = 0;

                    var g = 255 - ci * type.indexOf(count[i]);
                    var g2 = 255 - g;
                   
                    var b = 255;
                    var w = count[i] / 20;
                    var x = poz + 30;
                    if (w < 1000)
                    {
                        s3 = s3 + "<div class=\"labelX\"><div class=\"rotation-inner\"><div class=\"tx\">" + resul[i] + "</div></div></div>";
                        s = s + "<div class=\"bar\" style=\"height:" + w + "px;background-color:rgb(" + r + "," + g + "," + b + ");width:20px\" ></div>";
                    }
                }
           
                creare.innerHTML = s;
                
            }
        }
    };
    xhttp.open("GET", nume_fisier, true);
    xhttp.send(null);

}


function creare_diagrame() {
    document.getElementById("afisaj").style.width = window.innerWidth * 0.55;
    document.getElementById("afisaj").style.height = window.innerHeight*2;
    var culori = [{ red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }];
    for (var an = 2015; an <= 2019; an++) {
        var nume_fisier = "parcauto" + an + ".csv";
        var a = "" + an;
        loadDoc(nume_fisier, a);
    }
}
function openAn(an, elmnt) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    
    document.getElementById(an).style.display = "flex";
    elmnt.focus();
    

}
document.getElementById("default").click();
