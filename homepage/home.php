<!DOCTYPE html>
<?php

session_start();
//include 'sicurezza_ingresso.php';

?>
<html>

<title>bhk report patient</title>


<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>


<body class="w3-light-grey">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
<link href="stile.css" rel="stylesheet" media="screen" type="text/css" />
<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="scriptload.js"></script>
<script src="https://cjrtnc.leaningtech.com/1.4/loader.js"></script>
<?php
include 'head.html';
?>

 <img id="imgcaricamento" src="./immagini/loading.gif" style="  width:800px; height:65px;">
  <div class="w3-panel">


<div class="w3-card-4" align="center"  id="avviadiv" style="margin-top: 30px; width:800px; margin-left:200px;">

<header class="w3-container " id="valutazioneScritta">
ESEGUI VALUTAZIONE
</header>

<div class="w3-container w3-blue">
  <br>

    <label for="">Codice fiscale:</label>
    <input type="Text"  id="cf"  onkeyup="this.value = this.value.toUpperCase();">
    <br>
    <br>
  <label for="" style="margin-left: 150px;" >Immagine:</label>
  <input type="file"  id="immagine" style="margin-left: 50px; margin-bottom:10px" required>
</div>

<footer class="w3-container " >
<b><p align="left" style="font-family:'Times'; font-size:'8px';">
Se non viene fornito il codice fiscale la correzione del test avverrà in maniera anonima senza alcun salvataggio di dati.<br>
Se il paziente è già presente il risultato sarà disposnibile nella cartella clinica<br>
Se il pazinete non è presente i dati saranno salvati e all'aggiunta del paziente inseriti nella cartella clinica<br></p></b>
  <button  class=" w3-left w3-button   w3-round-large w3-blue" style="margin-left: 590px; margin-top:10px;margin-bottom:10px;"  onclick="avvia()"> AVVIA </button>

</footer>

</div>


<div id="prova"> aaa
</div>

<br>






<br>

</body>

<script>

cheerpjInit();
var pro;
var a;
function avvia(){
   const fr = new FileReader();
   fr.onload = () => {
       // It worked
        pro = new Uint8Array(fr.result);
       cheerpjAddStringFile("/str/upload.jpg", pro);

        cheerpjAddStringFile("/str/output.jpg", pro);
        cheerpjAddStringFile("/str/output.txt", pro);
        cheerpjAddStringFile("/str/info-parameters.dat", pro);

     //   cheerpjAddStringFile("/str/demo-output.txt", a);

       // ...use the array here...

//   document.getElementById("a").innerHTML= pro;
   };
   fr.onerror = () => {
       // The read failed, handle/report it

   };

   fr.readAsArrayBuffer(document.getElementById('immagine').files[0]);

//   document.getElementById("a").innerHTML= pro;
document.getElementById("avviadiv").style.display = "none";

var elmnt = document.getElementById("prova");
 elmnt.scrollIntoView();
     cheerpjCreateDisplay(700,500);

        cheerpjRunJar("/app/tesi/homepage/disgrafia47.jar");
        values("1");
        loading("1");
       //reload("1");
        caricaStandard();
        caricaDictionary();
        caricaModel();
     //   cheerpjAddStringFile("/file/upload.jpg", array);
}
function caricaStandard(){


var s;
var req = new XMLHttpRequest();
req.onload = function(){
//   var a =this.responseText;
// document.getElementById("a").innerHTML= a;

var enc = new TextEncoder();
s=   enc.encode(this.responseText);

cheerpjAddStringFile("/str/standard.TXT", s);
};
req.open('GET', './Files/standard.TXT');
req.send();}

function caricaStandard(){


var s;
var req = new XMLHttpRequest();
req.onload = function(){
//   var a =this.responseText;
// document.getElementById("a").innerHTML= a;

var enc = new TextEncoder();
s=   enc.encode(this.responseText);

cheerpjAddStringFile("/str/standard.TXT", s);
};
req.open('GET', './Files/standard.TXT');
req.send();}


function caricaDictionary(){
var d;
var req = new XMLHttpRequest();
req.onload = function(){
//   var a =this.responseText;
// document.getElementById("a").innerHTML= a;

var enc = new TextEncoder();
d=   enc.encode(this.responseText);

cheerpjAddStringFile("/str/Dictionary", d);
};
req.open('GET', './Files/Dictionary');
req.send();}

function caricaModel(){

var m;
var req = new XMLHttpRequest();
req.onload = function(){
//   var a =this.responseText;
// document.getElementById("a").innerHTML= a;

var enc = new TextEncoder();
m=   enc.encode(this.responseText);

cheerpjAddStringFile("/str/MLP-1024-100-46", m);
};
req.open('GET', './Files/MLP-1024-100-46');
req.send();}



</script>
<script>
function values(a){


var cf= document.getElementById("cf").value;

if (a.length>1 ){
if(cf !== ""){

var imgdata;
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("immagine").files[0]);
oFReader.onload = function (oFREvent) {
imgdata = oFREvent.target.result;
var img=encodeURIComponent(imgdata);
var params= "V1="+a[2]+"& V2="+a[3]+"& V3="+a[4]+"& V4="+a[5]+"& V5="+a[6]+"& V6="+a[7]+"& V7="+a[8]+"& V8="+a[9]+"& V9="+a[10]+"& V10="+a[11]+"& V11="+a[12]+"& V12="+a[13]+"& V13="+a[14]+"& V14="+a[15]+"& img="+img+"& cf="+cf;
//document.getElementById("a").innerHTML = img ;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {

window.location.href = "bhkElenco.php?Codice="+cf;//ricorda di cambiare
//   document.getElementById("demo").innerHTML = this.responseText;
}
};
xhttp.open("POST", "./server/AggiuntaBhk.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhttp.send( params);
};;
}
else {
reload("3");
}
}






// ...use the array here...

//     document.getElementById("a").innerHTML= model;





}







function reload (r){
if (r==3){
location.reload();
}


}
function loading(ok){
  if(ok==2){

    document.getElementById("imgcaricamento").style.display="block";
    window.setTimeout("redirect()", 10000);
  }
}
function redirect(){

  document.getElementById("imgcaricamento").style.display="none";
}



// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";

}

function mouseOver() {
  document.getElementById("tab").style.color = "red";
}

function mouseOut() {
  document.getElementById("tab").style.color = "black";
}
</script>

<div id="loader-wrapper">
 <div id="loader"></div>

 <div class="loader-section section-left"></div>
 <div class="loader-section section-right"></div>





</html>
