<?php
session_start();// come sempre prima cosa, aprire la sessione
include("../../../connessione_db/db_con.php"); // Include il file di connessione al database
$email= mysqli_real_escape_string($connessione_al_server,$_POST["email"]);
$psw = mysqli_real_escape_string($connessione_al_server,$_POST["pass"]);
$_SESSION["email"]=$_POST["email"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
$_SESSION["psw"]=$_POST["pass"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
$query = mysqli_query($connessione_al_server,"SELECT * FROM logopedista WHERE Email='".$email."' AND Password ='".$psw."'") ; //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log

//DIE('query non riuscita'.mysql_error());
// Con il SELECT qua sopra selezione dalla tabella users l utente registrato (se lo è) con i parametri che mi ha passato il form di login, quindi
// Quelli dentro la variabile POST. username e password.

if(mysqli_num_rows($query)>0){        //se c'è una persona con quel nome nel db allora loggati
$row = mysqli_fetch_assoc($query);// metto i risultati dentro una variabile di nome $row

$_SESSION["nomeLogopedista"]=$row["Nome"];
$_SESSION["email"]=$row["Email"];
$_SESSION["sesso"]= $row["Sesso"];

 $_SESSION["login"]="log";
//echo "sei loggato";// Nella variabile SESSION associo false al valore logge

header("location:../../../homepage/home.php"); // e mando per esempio ad una pagina esempio.php// in questo caso rimanderò ad una pagina prova.php
}
else{

session_destroy();
echo "<script> window.alert('Password o Email errati');
   window.location.replace('login.html');</script>
   <?php session_destroy();?>";










}

?>
