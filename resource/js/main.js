var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var arrayDia = new Array(7);
arrayDia[0] = "DOMINO";
arrayDia[1] = "SEGUNDA";
arrayDia[2] = "TERÇA";
arrayDia[3] = "QUARTA";
arrayDia[4] = "QUINTA";
arrayDia[5] = "SEXTA";
arrayDia[6] = "SÁBADO";

function getDateWrite(dia){
    return this.arrayDia[dia];
}

function timeNow() {
    var time = new Date();
    return time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
}

function dateNow() {
    var now = new Date();
    var date = getDateWrite(now.getDay());

    return date + " - " + now.getDate() + "/" + now.getMonth() + "/" + now.getFullYear();
}


function getDate() {   
    document.getElementById("date").innerHTML =  dateNow();
}


getDate();