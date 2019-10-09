<?php

include("../connessione_db/db_con.php");
?>
<div class="w3-twothird">
  <h5>Pazienti</h5>
  <table class="w3-table w3-striped w3-white">

<?php
$query = "SELECT Nome,Cognome,Data_nascita FROM paziente where Logopedista ='".$_SESSION['email']."' ORDER BY Cognome LIMIT 10";
$result = mysqli_query($connessione_al_server,$query);
if (mysqli_num_rows($result)==0){


  echo "<tr>
    <td> NON CI SONO PAZIENTI</i></td>
  <td>  <button> aggiungi paziente </button> </td>";
}
else{
while($row = mysqli_fetch_array($result))
{

$data=  date('d/m/Y',strtotime($row['Data_nascita']));
  echo "<tr class=\"w3-hover-grey\">
    <td ><i class=\"fa fa-user w3-text-blue w3-large\" ></i></td>
    <td> ".$row['Nome']."</td>
    <td> ".$row['Cognome']." </td>
    <td><i> ".$data."</i></td>
  </tr>";


}
}

?>
</table>
</div>
