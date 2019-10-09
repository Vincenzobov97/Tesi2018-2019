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
<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="scriptload.js"></script>

<?php
include 'head.html';
?>


<div>
    <br/>
     <br/>
    <div align="center" style="text-align:center;">
    		<form method="get" action="<?php echo $_SERVER['REQUEST_URI']; ?> #cerca_segnalazioni" class="form-inline" style="display: contents;">
                  <label for="name">Nome</label>
                  <input name="Name" class="form-control mr-sm-2" type="text" placeholder="Nome" aria-label="Cerca" value="" >
                  <label for="Surname">Cognome</label>
                  <input name="Cognome" class="form-control mr-sm-2" type="text" placeholder="Cognome" aria-label="Cerca">
                  <button class="btn btn-unique btn-rounded btn-sm my-0" type="submit">Cerca</button>
            </form>

     <br/>
     <br/>

</div>

  </div>


<br>
<br>
<br>





  <?php
    include("../connessione_db/db_con.php");
      if (isset($_GET['Name'])&& isset($_GET['Cognome'])){
      $Name =$_GET['Name'];
      $Surname=$_GET['Cognome'];
      //VERIFICA CHE LA VARIABILE PASSATA NON SIA VUOTO
      if ($Name == null and $Surname== null){
          echo "</div>";
          return;
          }
          else if($Name==null){

            $query = "SELECT * FROM paziente WHERE Cognome = '".$Surname."' AND Logopedista ='".$_SESSION['email']."' ORDER BY Cognome";
            $result = mysqli_query($connessione_al_server,$query);
          }

  else if ($Surname == null) {
    $query = "SELECT * FROM paziente WHERE Nome = '".$Name."'AND Logopedista ='".$_SESSION['email']."' ORDER BY Cognome";
    $result = mysqli_query($connessione_al_server,$query);
  }

else{
  $query = "SELECT * FROM paziente WHERE Nome = '".$Name."' AND Cognome = '".$Surname."' AND Logopedista ='".$_SESSION['email']."' ORDER BY Cognome";
  $result = mysqli_query($connessione_al_server,$query);
}

      //VERIFICA CHE LA QUERY ESISTA
      if (mysqli_num_rows($result)==0){
        echo "<center> <b> Paziente non presente!</b></center>";

        echo "</div>";
        return;
      }
      else {
        echo "  <div class=\"w3-panel\" <h4 align=\"center\" > <strong> Pazienti </strong> </h4>
        <br>
        <table style=\"width:70%\"class=\"w3-table w3-striped w3-white\">

        <tr class=\"w3-blue\">
          <th></th>
          <th>Nome</th>
          <th> Cognome </th>
          <th><i> Data di Nascita</i></th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {

        $data=  date('d/m/Y',strtotime($row['Data_nascita']));
        $codice_fiscale=$row['Codice_fiscale'];
          echo "

            <tr class=\"w3-hover-grey\" onclick=\"location.href='VisualizzaAnagrafica.php?Codice=$codice_fiscale'\">
            <td><i class=\"fa fa-user w3-text-blue w3-large \" ></i></td>
            <td> ".$row['Nome']."</td>
            <td> ".$row['Cognome']." </td>
            <td><i> ".$data."</i></td>
          </tr>

          ";


        }
        echo "</table>
        </div>";

      }
}

?>

</body>




</html>
