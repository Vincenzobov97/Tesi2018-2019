<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database
session_start();
$nome= mysqli_real_escape_string($connessione_al_server,$_POST["Uname"]);
$cognome= mysqli_real_escape_string($connessione_al_server,$_POST["UCognome"]);
$sesso= mysqli_real_escape_string($connessione_al_server,$_POST["gender"]);
$compleanno= mysqli_real_escape_string($connessione_al_server,$_POST["Ucompleanno"]);
$telefono= mysqli_real_escape_string($connessione_al_server,$_POST["Utel"]);
$fisso= mysqli_real_escape_string($connessione_al_server,$_POST["Ufisso"]);
$Registro= mysqli_real_escape_string($connessione_al_server,$_POST["URegister"]);
$ordine= mysqli_real_escape_string($connessione_al_server,$_POST["Uordine"]);


if (empty($nome)) {
  $nome=NULL;
}
if (empty($cognome)) {
  $cognome=NULL;
}
if (empty($sesso)) {
  $sesso=NULL;
}
if (empty($compleanno)) {
  $compleanno=NULL;
}
if (empty($telefono)) {
  $telefono=NULL;
}
if (empty($fisso)) {
  $fisso=NULL;
}
if (empty($Registro)) {
  $Registro=NULL;
}
if (empty($ordine)) {
  $ordine=NULL;
}

$data=str_replace('/', '-', $compleanno);// sostituisce / con -

$compleanno= date('Y-m-d',strtotime($data));


//$query = mysqli_query($connessione_al_server,"UPDATE paziente
  //   SET Cognome='".$cognome."',Nome='".$nome."',Sesso='".$sesso."',Citta_residenza='".$citta."',Via='".$via."',civico='".$civico."',Cap='".$cap."',Telefono='".$phoneNumber."',DataNascita='".$compleanno."',Nome_Padre='".$padreN."',Cognome_padre='".$padreN."',Nome_Madre='".$madreN."',Cognome_Madre='".$madreC."',Nome_Tutore='".$tutoreN."',Cognome_Tutore='".$tutoreC."',Classe_frequentante='".$classe."',Medico='".$medico."'
  //  WHERE Codice_fiscale='".$CFold."' ") ;
$queryu="UPDATE logopedista SET  Cognome='".$cognome."',Nome='".$nome."',Sesso='".$sesso."'
,DataNascita='".$compleanno."',Cellulare='".$telefono."',Tel_fisso='".$fisso."',Num_albo='".$Registro."',
ordine='".$ordine."' where Email ='".$_SESSION['email']."' ";
$querycf = mysqli_query($connessione_al_server,$queryu);
echo "<script>
    window.location.replace('../VisualizzaSetting.php?Confirm=1');
    </script>";



?>
