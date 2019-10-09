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
<head>

</head>

<body class="w3-light-grey">

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="scriptload.js"></script>

<?php
include 'head.html';
?>


<div>



  </div>


<br>
<br>
<br>






  <?php
    include("../connessione_db/db_con.php");

  $CF=$_GET['Codice'];
          //  $query = "SELECT *  FROM bhk INNER JOIN paziente ON Paziente = Codice_fiscale  WHERE Paziente = '".$CF."' ORDER BY Cod_Bhk";
          $query = "SELECT *  FROM bhk   WHERE Paziente = '".$CF."' ORDER BY Data DESC";
            $result = mysqli_query($connessione_al_server,$query);




      //VERIFICA CHE LA QUERY ESISTA
      if (mysqli_num_rows($result)==0){
        echo "<center> <b> Nessun Test presente </b></center>";

        echo "</div>";
        return;
      }
      else {
        echo "
         <div class=\"w3-panel\" <h4 align=\"center\" > <strong> Bhk Sostenuti </strong> </h4>

        <br>
        <br>
        <table style=\"width:70%\"class=\"w3-table w3-striped w3-white\">

        <tr class=\"w3-blue\">
          <th></th>
          <th>Codice Bhk</th>
          <th> Data </th>
            <th> </th>

        </tr>";
$i=1;
        while($row = mysqli_fetch_array($result))
        {

        $data=  date('d/m/Y',strtotime($row['Data']));
        $bhk=$row['Cod_Bhk'];
          echo "

            <tr class=\"w3-hover-grey\" onclick=\"location.href='VisualizzaBhk.php?Bhk=$bhk'\">
            <td><i class=\" 	fa fa-list w3-large \"></i>
            </td>
            <td> ".$i."</td>
            <td><i> ".$data."</i></td>
            <td><i> Dettagli </i></td>
          </tr>

          ";

$da[$i]=$data;

$i++;

        }
        echo "</table>
        </div>";


      }


?>


<canvas id="myChart" style="width:150px; height:50px;" ></canvas>
<button onclick=location.href="VisualizzaAnagrafica.php?Codice=<?php echo $CF;?>" style="width:150px; margin-Left:150px; margin-top:20px; margin-bottom:50px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro </button>

</body>

<script>
<?php
$d=array();
$query1 = "SELECT *  FROM bhk   WHERE Paziente = '".$CF."' ORDER BY Data DESC";
  $result1 = mysqli_query($connessione_al_server,$query1);
  $count=0;

  while($rowa = mysqli_fetch_array($result1))
  {

  $d[$count]=  date('d/m/Y',strtotime($rowa['Data']));
$count++;
  $valori[$count]= number_format((float)$rowa['Puntoz'], 2, '.', '');
}

?>
var data = <?php echo json_encode($d); ?>;
var valore = <?php echo json_encode($valori); ?>;
var ctx = document.getElementById('myChart').getContext('2d');

var chart = new Chart(ctx, {

    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {

        labels: [data[1],data[2],data[3],data[4],data[5],data[6],data[7],data[8],data[9],data[10]],
        datasets: [{
            label: 'Risultati Bhk',
          //  backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(0, 0, 255)',
pointBackgroundColor:'rgb(0, 100, 150)' ,
            data: [valore[1], valore[2], valore[3], valore[4], valore[5], valore[6], valore[7],valore[8],valore[9],valore[10]],
        }]
    },

    // Configuration options go here
    options: {
      elements: {
               line: {
                   tension: 0// disables bezier curves
               }
           }
    }
});

</script>


</html>
