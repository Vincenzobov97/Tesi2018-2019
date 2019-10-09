<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database
session_start();
$nome= mysqli_real_escape_string($connessione_al_server,$_POST["Uname"]);
$cognome= mysqli_real_escape_string($connessione_al_server,$_POST["UCognome"]);
$cf= mysqli_real_escape_string($connessione_al_server,$_POST["cf"]);
$compleanno= mysqli_real_escape_string($connessione_al_server,$_POST["Udata"]);
$classe= mysqli_real_escape_string($connessione_al_server,$_POST["class"]);
$sesso= mysqli_real_escape_string($connessione_al_server,$_POST["gender"]);
$citta= mysqli_real_escape_string($connessione_al_server,$_POST["Ucitta"]);
$via= mysqli_real_escape_string($connessione_al_server,$_POST["Uvia"]);
$civico= mysqli_real_escape_string($connessione_al_server,$_POST["Ucivico"]);
$phoneNumber= mysqli_real_escape_string($connessione_al_server,$_POST["Utel"]);
$padreN= mysqli_real_escape_string($connessione_al_server,$_POST["UpadreN"]);
$padreC= mysqli_real_escape_string($connessione_al_server,$_POST["UpadreC"]);
$madreN= mysqli_real_escape_string($connessione_al_server,$_POST["UmadreN"]);
$madreC= mysqli_real_escape_string($connessione_al_server,$_POST["UmadreN"]);
$tutoreN= mysqli_real_escape_string($connessione_al_server,$_POST["UtutoreN"]);
$tutoreC= mysqli_real_escape_string($connessione_al_server,$_POST["UtutoreC"]);
$medico= mysqli_real_escape_string($connessione_al_server,$_POST["Umedico"]);
$cap= mysqli_real_escape_string($connessione_al_server,$_POST["Ucap"]);

if (empty($tutoreN)) {
  $tutoreN=NULL;
}
if (empty($tutoreC)) {
  $tutoreC=NULL;
}
if (empty($via)) {
  $via=NULL;
}
if (empty($civico)) {
  $civico=NULL;
}
if (empty($cap)) {
  $cap=NULL;
}
if (empty($padreN)) {
  $padreN=NULL;
}
if (empty($padreC)) {
  $padreC=NULL;
}
if (empty($madreN)) {
  $madreN=NULL;
}
if (empty($madreC)) {
  $madreC=NULL;
}
if (empty($medico)) {
  $medico=NULL;
}
$data=str_replace('/', '-', $compleanno);// sostituisce / con -

$compleanno= date('Y-m-d',strtotime($data));
$logopedista=$_SESSION['email'];

$query="SELECT * FROM paziente WHERE Codice_fiscale = '".$cf."' AND Logopedista ='".$_SESSION['email']."'";

$querycf = mysqli_query($connessione_al_server,$query);
if(mysqli_num_rows($querycf)>0){


echo
 "<script>

window.location.replace('../AggiungiPaziente.php?Confirm=1');
     </script>";

}
else {

  $queryInput="INSERT INTO paziente (Codice_fiscale,Cognome, Nome,Sesso,Citta_residenza,Via,civico,Cap,Telefono,Data_nascita,Nome_padre,Cognome_padre,Nome_Madre,Cognome_Madre,Nome_Tutore,Cognome_Tutore,Classe_frequentante,Medico,Logopedista) VALUES ('$cf','$cognome','$nome','$sesso','$citta','$via','$civico','$cap','$phoneNumber','$compleanno','$padreN','$padreC','$madreN','$madreC','$tutoreN','$tutoreN','$classe','$medico','$logopedista')";


    $queryI = mysqli_query($connessione_al_server,$queryInput);

    for ($i = 1; $i <= 20; $i++) {
      $query="INSERT INTO anamnesi (Paziente,Domanda) VALUES('$cf','$i')";
      $queryupdate = mysqli_query($connessione_al_server,$query);


    }
    echo
     "<script>

    window.location.replace('../VisualizzaAnagrafica.php?Codice=$cf');
         </script>";

 }
