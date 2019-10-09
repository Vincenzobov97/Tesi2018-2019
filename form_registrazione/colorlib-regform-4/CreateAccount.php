<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database

$nome= mysqli_real_escape_string($connessione_al_server,$_POST["first_name"]);
$cognome= mysqli_real_escape_string($connessione_al_server,$_POST["last_name"]);
$compleanno= mysqli_real_escape_string($connessione_al_server,$_POST["birthday"]);
$sesso= mysqli_real_escape_string($connessione_al_server,$_POST["gender"]);
$email= mysqli_real_escape_string($connessione_al_server,$_POST["email"]);
$password= mysqli_real_escape_string($connessione_al_server,$_POST["psw"]);
$phoneNumber= mysqli_real_escape_string($connessione_al_server,$_POST["phone"]);
$LandLine= mysqli_real_escape_string($connessione_al_server,$_POST["landLine"]);
$NumeberRegister= mysqli_real_escape_string($connessione_al_server,$_POST["registerN"]);
$Order= mysqli_real_escape_string($connessione_al_server,$_POST["orderName"]);

if (empty($phoneNumber)) {
  $phoneNumber="NULL";
}

if (empty($LandLine)) {
  $LandLine="NULL";
}
$data=str_replace('/', '-', $compleanno);// sostituisce / con -

$compleanno= date('Y-m-d',strtotime($data));

$query = mysqli_query($connessione_al_server,"SELECT * FROM logopedista WHERE Email='".$email."'") ;

if(mysqli_num_rows($query)>0){
  header("location:index.html");
  echo " <script> window.alert('UTENTE PRESENTE NEL SISTEMA') </script>";
  echo " <script>javascript:history.go(-1); </script>";

  //    echo "string";


}

else
 {
  $queryInsert = mysqli_query($connessione_al_server,"INSERT INTO Logopedista(Nome,Cognome,Email,Password,DataNascita,Sesso,Cellulare,Tel_Fisso,Num_albo,ordine) VALUES ('".$nome."','".$cognome."','".$email."','".$password."','".$compleanno."','".$sesso."','".$phoneNumber."','".$LandLine."','".$NumeberRegister."','".$Order."')");
echo "<script>  window.alert('Registrazione completata con successo');
     window.location.replace('../../login/Login_v1/Login_v1/login.html');
     </script>";
}
?>
