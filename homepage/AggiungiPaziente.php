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
<link href="stile.css" rel="stylesheet" media="all" type="text/css" />
<link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="scriptload.js"></script>



<?php
include 'head.html';
?>


<?php

if(empty($_GET['Confirm']) ){
  $Conferma=2;
}
  else {
    $Conferma=$_GET['Confirm'];
  }


 ?>


  <div  style="width:500px; margin-left:420px">  <h1> Nuovo paziente </h1></div>
<br>
<br>
    <form method="POST" action="server/NuovoPaziente.php">


      <table class="w3-table w3-bordered" style="width:1000px;padding:5px; height:500px; margin-left:180px" align="center" id="tab">

          <tr>
            <th scope="row " > <label for="Uname">Nome</label></th>
            <td>  <input type="text" name="Uname" id="Uname"   placeholder="Nome paziente" required> </input></td></td>

<th scope="row"></th>

            <th scope="row"><label for="Ucognome">Cognome</label></th>
            <td>
            <input type="text" name="UCognome"  id="Ucognome" placeholder="Cognome paziente" required></input></td>
          </tr>

        <tr>
            <th scope="row">Sesso </th>
            <td><label class="radio-container m-r-45">Maschio
            <input type="radio" id="sesso" checked="checked" name="gender" required
         value="M">
        	<span class="checkmark"></span>

        	</label>
      		<label class="radio-container">Femmina
            <input type="radio"  id="sesso" name="gender" required value="F">
            <span class="checkmark"></span>
        	</label></td>

<th scope="row"></th>
            <th scope="row"><label for="Udata">Data di nascita</label></th>
            <td>  <input type="text" name="Udata" id="Udata"  placeholder="gg/mm/aaaa" required></input>
            </td>
          </tr>

          <tr>
            <th scope="row"><label for="Ucitta">Città Residenza</label></th>
            <td>
              <input type="text" name="Ucitta" id="Ucitta" placeholder="Città Residenza" required></input>
              </td>
              <th scope="row"></th>
              <th scope="row"><label for="Ucap">CAP</label></th>
              <td>
              <input type="text" name="Ucap" id="Ucap"  placeholder="CAP"></input>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="Uvia">Via</label></th>
            <td>
            <input type="text" name="Uvia"  id="Uvia" placeholder="Via"></input></td>
            <th scope="row"></th>
            <th scope="row" ><label for="Ucivico">Civico</th>
            <td>
            <input type="text" name="Ucivico" id="Ucivico"   placeholder="Civico"></input></td>

          </tr>


          <tr>
            <th scope="row" ><label for="class">Classe</label></th>
            <td>
              <select id="class" style="width:100px" name="class" >
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
        <option value="5">5</option>
    </select>
            </td>
<th scope="row"></th>
            <th scope="row"><label for="Utel">Recapito telefonico</label></th>
            <td><input type="text" name="Utel" id="Utel"  placeholder="Telefono" pattern="[0-9]{10}" required></input>
            </td>
          </tr>
          <tr>
            <th scope="row" > <label for="UpadreN">Nome padre</label></th>
            <td>
              <input type="text" name="UpadreN" id="UpadreN"  placeholder="Nome Padre"></input></td>
              <th scope="row"></th>
              <th scope="row"><label for="UpadreC">Cognome padre</label></th>
              <td>
              <input type="text" name="UpadreC"  id="UpadreC" placeholder="Cognome Padre"></input></td>

          </tr>
          <tr>
            <th scope="row"><label for="UmadreN">Nome madre</label></th>
            <td>
              <input type="text" name="UmadreN" id="UmadreN"   placeholder="Nome Madre"></input> </td>
              <th scope="row"></th>
              <th scope="row"><label for="UmadreC">Cognome madre</label></th>
              <td>
              <input type="text" name="UmadreC" id="UmadreC" placeholder="Cognome Madre"></input></td>

          </tr>
          <tr>
            <th scope="row"><label for="UtutoreN">Nome tutore</label></th>
            <td>
            <input type="text" name="UtutoreN"  id="UtutoreN" placeholder="Nome Tutore"></input> </td>
            <th scope="row"></th>
              <th scope="row"><label for="UtutoreC">Cognome tutore</label></th>

            <td>
            <input type="text" name="UtutoreC" id="UtutoreC"  placeholder="Cognome Tutore"></input></td>

          <tr>
            <th scope="row"><label for="Umedico">Dottore</label></th>
            <td><input type="text" name="Umedico" id="Umedico"   placeholder="Dottore"></input></td>
            <th scope="row"></th>

              <th scope="row"><label for="cf" id="cfl">Codice fiscale</label></th>
              <td>
              <input type="text" name="cf"  id="cf" placeholder="Codice fiscale"></input>

              <input type="button"  class="w3-button w3-round-large w3-blue w3-center" style=" margin-left:20px"value="Verifica" onClick="ControllaCF(document.getElementById('cf').value)"></input>
            </td>




          </tr>



      </table>
      <br/>





  <br/>
<div align="Center" id="global">
  <div id="divAlert" >
      <img  id="alert" src="immagini/alert.png"/>
  </div>
<div align="Center" id="divmsg">

</div>
</div>
<br>


<div align="center" style="width:500px; margin-left:350px">
  <input type="button" style="width:150px "  value="Indietro" class=" w3-left w3-button   w3-round-large w3-blue" onClick="javascript:history.back()"></input>


<button  style="width:150px " class=" w3-right w3-button w3-round-large w3-blue w3-center" type="submit" onclick="saveState()" >Salva</button>

</div>

</form>





<br>
<br>
<br>




<script type="text/javascript">


function ControllaCF(cf)
{
  var x = document.getElementById("divmsg");
  var global=document.getElementById("global");
  var div = document.getElementById("cfl");
  var input=document.getElementById("cf");
  var immagine=document.getElementById("divAlert");
  var img=document.getElementById("alert");

	cf = cf.toUpperCase();
	if( cf == '' ){
global.style.display="block";

     x.innerHTML = "Codice fiscale vuoto!";
  div.style.color= "red";
x.style.display="block";
input.style.borderColor="red";
input.style.borderStyle="solid";
immagine.style.display="block";
  x.style.color="red";

img.src="immagini/alert.png";}
	else if( ! /^[0-9A-Z]{16}$/.test(cf) ){

      global.style.display="block";
      x.innerHTML ="Il codice fiscale deve contenere 16 lettere e numeri";
        div.style.color= "red";
      x.style.display="block";
        x.style.color="red";
      input.style.borderColor="red";
      input.style.borderStyle="solid";
      immagine.style.display="block";
    img.src="immagini/alert.png";}
 else{
	var map = [1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 1, 0, 5, 7, 9, 13, 15, 17,
		19, 21, 2, 4, 18, 20, 11, 3, 6, 8, 12, 14, 16, 10, 22, 25, 24, 23];
	var s = 0;
	for(var i = 0; i < 15; i++){
		var c = cf.charCodeAt(i);
		if( c < 65 )
			c = c - 48;
		else
			c = c - 55;
		if( i % 2 == 0 )
			s += map[c];
		else
			s += c < 10? c : c - 10;
	}

	var atteso = String.fromCharCode(65 + s % 26);
	   if( atteso != cf.charAt(15) ){


    global.style.display="block";
    x.innerHTML ="Codice non valido";
      div.style.color= "red";
    x.style.display="block";
    x.style.color="red";
    input.style.borderColor="red";
    input.style.borderStyle="solid";
    immagine.style.display="block";
    img.src="immagini/alert.png";
  }
  else{
    global.style.display="block";
    x.innerHTML ="Codice corretto";
    x.style.color="green";
      div.style.color= "green";
    x.style.display="block";
    input.style.borderColor="green";
    input.style.borderStyle="solid";
    immagine.style.display="block";
    img.src="immagini/check1.png";
	}
}
}

function saveState(){


  var medicoI= document.getElementById("Umedico");
  localStorage.setItem("medico", medicoI.value);

  var inputname= document.getElementById("Uname");
 localStorage.setItem("name", inputname.value);

 var inputcognome= document.getElementById("Ucognome");
localStorage.setItem("cognome", inputcognome.value);



var inputsesso= document.getElementsByName("sesso");
localStorage.setItem("sesso", inputsesso.value);

var inputcitta= document.getElementById("Ucitta");
localStorage.setItem("citta", inputcitta.value);

var inputvia= document.getElementById("Uvia");
localStorage.setItem("via", inputvia.value);

var inputcivico= document.getElementById("Ucivico");
localStorage.setItem("civico", inputcivico.value);

var inputcap= document.getElementById("Ucap");
localStorage.setItem("cap", inputcap.value);

var inputtel= document.getElementById("Utel");
localStorage.setItem("tel", inputtel.value);

var inputdata= document.getElementById("Udata");
localStorage.setItem("data", inputdata.value);

var inputpadreN= document.getElementById("UpadreN");
localStorage.setItem("padreN", inputpadreN.value);

var inputpadreC= document.getElementById("UpadreC");
localStorage.setItem("padreC", inputpadreC.value);



var inputmadreN= document.getElementById("UmadreN");
localStorage.setItem("madreN", inputmadreN.value);

var inputmadreC= document.getElementById("UmadreC");
localStorage.setItem("madreC", inputmadreC.value);

var inputtutoreC= document.getElementById("UtutoreC");
localStorage.setItem("tutorC", inputtutoreC.value);

var inputtutoreN= document.getElementById("UtutoreN");
localStorage.setItem("tutorN", inputtutoreN.value);

var inputcf= document.getElementById("cf");
localStorage.setItem("cf", inputcf.value);

var inputclasse= document.getElementById("class");
localStorage.setItem("classe", inputclasse.value);




}

function insertValue(){

var nome = localStorage.getItem("name");


var cognome = localStorage.getItem("cognome");

var sesso = localStorage.getItem("sesso");

var citta = localStorage.getItem("citta");

var via = localStorage.getItem("via");
var civico = localStorage.getItem("civico");
var cap = localStorage.getItem("cap");
var  telefono = localStorage.getItem("tel");
var data = localStorage.getItem("data");
var padreN = localStorage.getItem("padreN");
var padreC = localStorage.getItem("padreC");
var madreN = localStorage.getItem("madreN");
var madreC = localStorage.getItem("madreC");
var tutorN = localStorage.getItem("tutorN");
var tutorC = localStorage.getItem("tutorC");
var classe = localStorage.getItem("classe");
var medico = localStorage.getItem("medico");
var cf = localStorage.getItem("cf");

document.getElementById("Umedico").value=medico;
 document.getElementById("cf").value=cf;
 document.getElementById("Uname").value=nome;
 document.getElementById("Ucognome").value=cognome;

 document.getElementById("Ucitta").value=citta;
 document.getElementById("Uvia").value=via;
 document.getElementById("Ucivico").value=civico;
 document.getElementById("Ucap").value=cap;
 document.getElementById("Utel").value=telefono;
 document.getElementById("Udata").value=data;
 document.getElementById("UpadreN").value=padreN;
document.getElementById("UpadreC").value=padreC;
 document.getElementById("UmadreN").value=madreN;
 document.getElementById("UmadreC").value=madreC;
document.getElementById("UtutoreC").value=tutorC;
 document.getElementById("UtutoreN").value=tutorN;
document.getElementById("class").value=classe;

 document.getElementsByName("sesso").value=sesso;



}

function Error(){
  var x = document.getElementById("divmsg");
  var global=document.getElementById("global");
  var div = document.getElementById("cfl");
  var input=document.getElementById("cf");
  var immagine=document.getElementById("divAlert");
  var img=document.getElementById("alert");
    var tab=document.getElementById("tab");

  global.style.display="block";
       x.innerHTML = "Patient already present";
    div.style.color= "red";
  x.style.display="block";
  input.style.borderColor="red";
  input.style.borderStyle="solid";
  immagine.style.display="block";
    x.style.color="red";
      tab.style.border="2px solid red"
  img.src="immagini/alert.png";
  global.scrollIntoView();

insertValue();
}


</script>

<?php

if ($Conferma==1) {

  echo  '<script type="text/javascript">',
     'Error();',
     '</script>';
}
 ?>
</body>




</html>
