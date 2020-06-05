function loadDoc(nume_fisier,an) {
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
