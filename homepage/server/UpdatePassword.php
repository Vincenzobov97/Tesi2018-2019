<?php
include("../../connessione_db/db_con.php"); // Include il file di connessione al database
session_start();
$new= mysqli_real_escape_string($connessione_al_server,$_POST["newPassword"]);
$old= mysqli_real_escape_string($connessione_al_server,$_POST["currentPassword"]);



$query="SELECT * FROM logopedista WHERE Email ='".$_SESSION['email']."' and Password='".$old."'  ";
$result=mysqli_query($connessione_al_server,$query);
if(mysqli_num_rows($result)>0){
$queryu="UPDATE logopedista SET  Password='".$new."' where Email ='".$_SESSION['email']."' ";
$querycf = mysqli_query($connessione_al_server,$queryu);
echo "<script>
    window.location.replace('../ModificaPassword.php?Confirm=1');
    </script>";
}

else {
  echo "<script>
      window.location.replace('../ModificaPassword.php?Confirm=2');
      </script>";
}


?>
