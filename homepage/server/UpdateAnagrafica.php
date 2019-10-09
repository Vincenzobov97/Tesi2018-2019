<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database

$nome= mysqli_real_escape_string($connessione_al_server,$_POST["Uname"]);
$cognome= mysqli_real_escape_string($connessione_al_server,$_POST["UCognome"]);
$cf= mysqli_real_escape_string($connessione_al_server,$_POST["Ucf"]);
$compleanno= mysqli_real_escape_string($connessione_al_server,$_POST["Udata"]);
$classe= mysqli_real_escape_string($connessione_al_server,$_POST["Uclasse"]);
$sesso= mysqli_real_escape_string($connessione_al_server,$_POST["Usesso"]);
$citta= mysqli_real_escape_string($connessione_al_server,$_POST["Ucitta"]);
$via= mysqli_real_escape_string($connessione_al_server,$_POST["Uvia"]);
$civico= mysqli_real_escape_string($connessione_al_server,$_POST["Ucivico"]);
$phoneNumber= mysqli_real_escape_string($connessione_al_server,$_POST["Utel"]);
$padreN= mysqli_real_escape_string($connessione_al_server,$_POST["UpadreN"]);
$padreC= mysqli_real_escape_string($connessione_al_server,$_POST["UpadreC"]);
$madreN= mysqli_real_escape_string($connessione_al_server,$_POST["UmadreN"]);
$madreC= mysqli_real_escape_string($connessione_al_server,$_POST["UmadreC"]);
$tutoreN= mysqli_real_escape_string($connessione_al_server,$_POST["UtutoreN"]);
$tutoreC= mysqli_real_escape_string($connessione_al_server,$_POST["UtutoreC"]);
$medico= mysqli_real_escape_string($connessione_al_server,$_POST["Umedico"]);
$CFold= mysqli_real_escape_string($connessione_al_server,$_POST["CFold"]);
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

if(strcasecmp($cf, $CFold) == 0){

//$query = mysqli_query($connessione_al_server,"UPDATE paziente
  //   SET Cognome='".$cognome."',Nome='".$nome."',Sesso='".$sesso."',Citta_residenza='".$citta."',Via='".$via."',civico='".$civico."',Cap='".$cap."',Telefono='".$phoneNumber."',DataNascita='".$compleanno."',Nome_Padre='".$padreN."',Cognome_padre='".$padreN."',Nome_Madre='".$madreN."',Cognome_Madre='".$madreC."',Nome_Tutore='".$tutoreN."',Cognome_Tutore='".$tutoreC."',Classe_frequentante='".$classe."',Medico='".$medico."'
  //  WHERE Codice_fiscale='".$CFold."' ") ;
$queryu="UPDATE paziente SET  Cognome='".$cognome."',Nome='".$nome."',Sesso='".$sesso."'
,Citta_residenza='".$citta."',Via='".$via."',civico='".$civico."',Telefono='".$phoneNumber."',Cap='".$cap."',
Data_Nascita='".$compleanno."',Nome_Padre='".$padreN."',Cognome_padre='".$padreN."',Nome_Madre='".$madreN."',Cognome_Madre='".$madreC."',Nome_Tutore='".$tutoreN."',Cognome_Tutore='".$tutoreC."',Classe_frequentante='".$classe."',Medico='".$medico."' where Codice_fiscale ='".$CFold."' ";
$querycf = mysqli_query($connessione_al_server,$queryu);
echo "<script>
      window.location.replace('../VisualizzaAnagrafica.php?Codice=$cf&Confirm=1');
      </script>";
}
else {
  echo $cf;
  $query="SELECT * FROM anamnesi where Paziente ='".$cf."' ";
    $query2="SELECT * FROM bhk where Paziente ='".$cf."' ";
      $query3="SELECT * FROM paziente where Codice_fiscale ='".$cf."' ";
  $querycf = mysqli_query($connessione_al_server,$query);
    $querybhk = mysqli_query($connessione_al_server,$query2);
      $queryp = mysqli_query($connessione_al_server,$query3);
if(mysqli_num_rows($querycf)>0 || mysqli_num_rows($querybhk)>0 || mysqli_num_rows($queryp)>0){

  echo "<script>
        window.location.replace('../ModificaAnagrafica.php?Codice=$CFold&Confirm=2');
        </script>";
}
 else{
   $queryu="UPDATE paziente SET Codice_fiscale='".$cf."', Cognome='".$cognome."',Nome='".$nome."',Sesso='".$sesso."',Citta_residenza='".$citta."',Via='".$via."',civico='".$civico."',Telefono='".$phoneNumber."',Cap='".$cap."',Data_Nascita='".$compleanno."',Nome_Padre='".$padreN."',Cognome_padre='".$padreN."',Nome_Madre='".$madreN."',Cognome_Madre='".$madreC."',Nome_Tutore='".$tutoreN."',Cognome_Tutore='".$tutoreC."',Classe_frequentante='".$classe."',Medico='".$medico."' where Codice_fiscale ='".$CFold."' ";
   $queryUpdateBhk="UPDATE bhk SET Paziente='".$cf."' where  Paziente='".$CFold."' ";
   $queryUpdateAnamnesi="UPDATE anamnesi SET Paziente='".$cf."' where  Paziente='".$CFold."' ";

   $querycascade = mysqli_query($connessione_al_server,$queryu);
   $querycascade1 = mysqli_query($connessione_al_server,$queryUpdateBhk);
   $querycascade1= mysqli_query($connessione_al_server,$queryUpdateAnamnesi);
  echo "<script>
        window.location.replace('../VisualizzaAnagrafica.php?Codice=$cf&Confirm=1');
        </script>";
 }

}

?>
