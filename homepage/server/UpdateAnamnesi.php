<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database
$CF= mysqli_real_escape_string($connessione_al_server,$_POST["cf"]);
$Risposta1= mysqli_real_escape_string($connessione_al_server,$_POST["1"]);
$Risposta2= mysqli_real_escape_string($connessione_al_server,$_POST["2"]);
$Risposta3= mysqli_real_escape_string($connessione_al_server,$_POST["3"]);
$Risposta4= mysqli_real_escape_string($connessione_al_server,$_POST["4"]);
$Risposta5= mysqli_real_escape_string($connessione_al_server,$_POST["5"]);
$Risposta6= mysqli_real_escape_string($connessione_al_server,$_POST["6"]);
$Risposta7= mysqli_real_escape_string($connessione_al_server,$_POST["7"]);
$Risposta8= mysqli_real_escape_string($connessione_al_server,$_POST["8"]);
$Risposta9= mysqli_real_escape_string($connessione_al_server,$_POST["9"]);
$Risposta10= mysqli_real_escape_string($connessione_al_server,$_POST["10"]);
$Risposta11= mysqli_real_escape_string($connessione_al_server,$_POST["11"]);
$Risposta12= mysqli_real_escape_string($connessione_al_server,$_POST["12"]);
$Risposta13= mysqli_real_escape_string($connessione_al_server,$_POST["13"]);
$Risposta14= mysqli_real_escape_string($connessione_al_server,$_POST["14"]);
$Risposta15= mysqli_real_escape_string($connessione_al_server,$_POST["15"]);
$Risposta16= mysqli_real_escape_string($connessione_al_server,$_POST["16"]);
$Risposta17= mysqli_real_escape_string($connessione_al_server,$_POST["17"]);
$Risposta18= mysqli_real_escape_string($connessione_al_server,$_POST["18"]);
$Risposta19= mysqli_real_escape_string($connessione_al_server,$_POST["19"]);
$Risposta20= mysqli_real_escape_string($connessione_al_server,$_POST["20"]);
$nota1= mysqli_real_escape_string($connessione_al_server,$_POST["1n"]);
$nota2= mysqli_real_escape_string($connessione_al_server,$_POST["2n"]);
$nota3= mysqli_real_escape_string($connessione_al_server,$_POST["3n"]);
$nota4= mysqli_real_escape_string($connessione_al_server,$_POST["4n"]);
$nota5= mysqli_real_escape_string($connessione_al_server,$_POST["5n"]);
$nota6= mysqli_real_escape_string($connessione_al_server,$_POST["6n"]);
$nota7= mysqli_real_escape_string($connessione_al_server,$_POST["7n"]);
$nota8= mysqli_real_escape_string($connessione_al_server,$_POST["8n"]);
$nota9= mysqli_real_escape_string($connessione_al_server,$_POST["9n"]);
$nota10= mysqli_real_escape_string($connessione_al_server,$_POST["10n"]);
$nota11= mysqli_real_escape_string($connessione_al_server,$_POST["11n"]);
$nota12= mysqli_real_escape_string($connessione_al_server,$_POST["12n"]);
$nota13= mysqli_real_escape_string($connessione_al_server,$_POST["13n"]);
$nota14= mysqli_real_escape_string($connessione_al_server,$_POST["14n"]);
$nota15= mysqli_real_escape_string($connessione_al_server,$_POST["15n"]);
$nota16= mysqli_real_escape_string($connessione_al_server,$_POST["16n"]);
$nota17= mysqli_real_escape_string($connessione_al_server,$_POST["17n"]);
$nota18= mysqli_real_escape_string($connessione_al_server,$_POST["18n"]);
$nota19= mysqli_real_escape_string($connessione_al_server,$_POST["19n"]);
$nota20= mysqli_real_escape_string($connessione_al_server,$_POST["20n"]);

if (empty($Risposta1)) {
  $Risposta1=NULL;
}
if (empty($Risposta2)) {
  $Risposta2=NULL;
}
if (empty($Risposta3)) {
  $Risposta3=NULL;
}
if (empty($Risposta4)) {
  $Risposta5=NULL;
}
if (empty($Risposta5)) {
  $Risposta5=NULL;
}
if (empty($Risposta6)) {
  $Risposta6=NULL;
}
if (empty($Risposta7)) {
  $Risposta7=NULL;
}
if (empty($Risposta8)) {
  $Risposta8=NULL;
}
if (empty($Risposta9)) {
  $Risposta9=NULL;
}
if (empty($Risposta10)) {
  $Risposta10=NULL;
}
if (empty($Risposta11)) {
  $Risposta16=NULL;
}
if (empty($Risposta12)) {
  $Risposta16=NULL;
}
if (empty($Risposta13)) {
  $Risposta16=NULL;
}
if (empty($Risposta14)) {
  $Risposta16=NULL;
}
if (empty($Risposta15)) {
  $Risposta16=NULL;
}
if (empty($Risposta16)) {
  $Risposta16=NULL;
}

if (empty($Risposta17)) {
  $Risposta17=NULL;
}

if (empty($Risposta18)) {
  $Risposta18=NULL;
}
if (empty($Risposta19)) {
  $Risposta19=NULL;
}
if (empty($Risposta20)) {
  $Risposta20=NULL;
}


if (empty($nota1)) {
  $nota1=NULL;
}
if (empty($nota2)) {
  $nota2=NULL;
}
if (empty($nota3)) {
  $nota3=NULL;
}
if (empty($nota4)) {
  $nota5=NULL;
}
if (empty($nota5)) {
  $nota5=NULL;
}
if (empty($nota6)) {
  $nota6=NULL;
}
if (empty($nota7)) {
  $nota7=NULL;
}
if (empty($nota8)) {
  $nota8=NULL;
}
if (empty($nota9)) {
  $nota9=NULL;
}
if (empty($nota10)) {
  $nota10=NULL;
}
if (empty($nota11)) {
  $nota11=NULL;
}
if (empty($nota12)) {
  $nota12=NULL;
}
if (empty($nota13)) {
  $nota13=NULL;
}
if (empty($nota14)) {
  $nota14=NULL;
}
if (empty($nota15)) {
  $nota15=NULL;
}
if (empty($nota16)) {
  $nota16=NULL;
}
if (empty($nota17)) {
  $nota17=NULL;
}
if (empty($nota18)) {
  $nota18=NULL;
}
if (empty($nota19)) {
  $nota19=NULL;
}
if (empty($nota20)) {
  $nota20=NULL;
}


$risposte=array ("risp",$Risposta1,$Risposta2,$Risposta3,$Risposta4,$Risposta5,$Risposta6,$Risposta7,$Risposta8,$Risposta9,$Risposta10,$Risposta11,$Risposta12,$Risposta13,$Risposta14,$Risposta15,$Risposta16,$Risposta17,$Risposta18,$Risposta19,$Risposta20);
$note=array("risp",$nota1,$nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15,$nota16,$nota17,$nota18,$nota19,$nota20);
for ($i = 0; $i <= 20; $i++) {
  $query="UPDATE anamnesi SET Risposta='".$risposte[$i]."',Note='".$note[$i]."' where Paziente ='".$CF."' and Domanda='".$i."' ";
  $queryupdate = mysqli_query($connessione_al_server,$query);
}
 echo "<script>
       window.location.replace('../Anamnesi.php?Codice=$CF');
       </script>";


?>
