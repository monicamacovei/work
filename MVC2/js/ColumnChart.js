
//Export csv
var data = '"Categorie_nationala","Nr_total"\n';
var date_pe_ani = [];//vector in care voi stoca datele corespunzatoare fiecarui fisier csv
var year = 2019;//variabila prin intermediul careia voi pastra anul corespunzator tabului activ
//pregatesc datele ce vor fi stocate in fisiere la comanda de download
function prepareDoc() {
    for (var j = 0; j < 5; j++) {
        var aux = data;
        for (var i = 0; i < nr[j]; i++)
            aux += "\"" + nume[i] + "\",\"" + sume[j][i] + "\"\n";
        date_pe_ani.push(aux);
    }
}
//functia de download
function downloadFile(fileName, text) {
    //creez un element de tip <a> avand ca referinta fisierul creat 
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', year + '.csv');//ii setez atributul download

    element.style.display = 'none';
    document.body.appendChild(element);
    //activez linkul si implicit descarcarea
    element.click();
    document.body.removeChild(element);
}

prepareDoc();
function Download() {
    downloadFile(year + '.csv', date_pe_ani[year - 2015]);
}

//Crearea diagramei
function creareaDiagrama(an) {
    var an2 = an;
    an = an - 2015;
    n = nr[an];
    var ord = sume[an].slice();
    ord.sort(function (a, b) { return a - b });
    var id_chart = "c" + an2;
    var creare = document.getElementById(id_chart);
    var axaX = document.getElementById("Ax" + an2);
    var s3 = " ";
    var y = window.innerHeight;
    creare.style.width = window.innerWidth * 0.55;
    creare.style.height = window.innerHeight + y / 2;
    var max1 = ord[n - 1];

    var max;
    var max2 = ord[n - Math.ceil(n / 3)];
    var lab_he = Math.ceil((max2 / 5000)) * 1000;
    console.log(lab_he);
    var axaY = document.getElementById("Ay" + an2);

    var s2 = "<div class=\"lab\">" + 5 * lab_he + "</div> <div class=\"lab\">" + 4 * lab_he + "</div><div class=\"lab\">" + 3 * lab_he + "</div><div class=\"lab\">" + 2 * lab_he + "</div><div class=\"lab\">" + lab_he + "</div>";
    axaY.innerHTML = s2;
    var s = "";
    for (var i = 0; i < n; i++) {
        var poz = i * 40 + 7;

        if (sume[an][i] <= max2)
            max = max2;
        else
            max = max1;
        var procentaj = (sume[an][i] * 100) / max;
        var r = i * 255 / n;

        var g = 255 - r;


        var b = 255;
        var w;
        if (sume[an][i] == max) { w = 550; }
        else
            w = Math.ceil((procentaj * 550) / 100);
        s = s + "<div class=\"bar\" id=\"" + i + "\" onclick=\"hoverme(this)\" style=\"height:" + w + "px;background-color:rgb(" + r + "," + g + "," + b + ");width:25px\" ></div>";

    }

    creare.innerHTML = s;
    axaX.innerHTML = s3;
}

function hoverme(el) {
    var i = el.id;
    var tooltip = document.getElementById("infobox");
    console.log(tooltip);
    //tooltip.innerHTML = "<h2>"+nume[i] + ":</h2>" + "<h3>"+sume[0][i]+"</h3>";
    tooltip.innerHTML = nume[i] + ":" + sume[0][i];

    tooltip.focus();
    console.log(i);
}
function creare_diagrame() {
    document.getElementById("afisaj").style.width = window.innerWidth * 0.55;
    document.getElementById("afisaj").style.height = window.innerHeight * 2;
    var culori = [{ red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }, { red: 0, green: 53, blue: 148 }];
    for (var an = 2015; an <= 2019; an++) {
        
        creareaDiagrama(an);
    }
}
function openAn(an, elmnt) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    year = an;
    document.getElementById(an).style.display = "flex";
    elmnt.focus();


}
document.getElementById("default").click();
