<?php

session_start();
//include 'sicurezza_ingresso.php';

?>

<html>
<head>
    <title></title>


</head>


 <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>


    <body class="w3-light-grey">

    <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
    <!--jquery-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="scriptload.js"></script>

-
      <?php
      include 'head.html';
      ?>
    <div>
    <br/>
     <br/>

    <?php
    include("../connessione_db/db_con.php");
        $Codice = $_GET['Bhk'];
        //VERIFICA CHE LA VARIABILE PASSATA NON SIA VUOTA




        $query = "SELECT *  FROM bhk INNER JOIN paziente ON Paziente = Codice_fiscale  WHERE Cod_Bhk = '".$Codice."'";
      $querysucc = "SELECT *  FROM bhk   WHERE Cod_Bhk = '".$Codice."'";
        $queryi = "SELECT Foto  FROM bhk   WHERE Cod_Bhk = '".$Codice."'";



        $result = mysqli_query($connessione_al_server,$query);
        $resulti = mysqli_query($connessione_al_server,$queryi);
          $resultNonREgistrato = mysqli_query($connessione_al_server,$querysucc);

        //VERIFICA CHE LA QUERY ESISTA

      $row = mysqli_fetch_array($result);
      $rowa = mysqli_fetch_array($resultNonREgistrato);
      $foto = mysqli_fetch_array($resulti);
      $data=  date('d/m/Y',strtotime($rowa['Data']));
      $cf=$rowa['Paziente'];
if (mysqli_num_rows($result)>0){


        ?>
      <div style="margin-left:20px" class="col-sm-12 col-md-6" ><center>  <h1><?php echo  $row['Cognome']." ".$row['Nome']; ?></h1> </center></div>
    <?php } ?>
        <div class="col-sm-12 col-md-6" align="center">
        <br/>

            <br/>
            <table class="table" style="width:650px;padding:10px;" align="center">
              <tbody>
                <tr>
                  <th scope="row">Data Test</th>
                  <td><?php echo $data; ?></td>
                </tr>
                <tr>
                  <th scope="row">Grandezza scrittura</th>
                  <td><?php echo $rowa['Metrica1']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Margine sinistro non allineato</th>
                  <td><?php echo $rowa['Metrica2']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Andamento altalenante</th>
                  <td><?php echo $rowa['Metrica3']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Spazio insufficiente tra le parole</th>
                  <td><?php echo $rowa['Metrica4']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Angoli acuti o collegamenti allungati</th>
                  <td> <?php echo $rowa['Metrica5']; ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Collegamenti interrotti</th>
                  <td><?php echo $rowa['Metrica6']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Collisioni tra lettere</th>
                  <td><?php echo $rowa['Metrica7']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Grandezza irregolare delle lettere</th>
                  <td><?php echo $rowa['Metrica8']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Misura incoerente tra lettere con e senza estensione</th>
                  <td><?php echo $rowa['Metrica9']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Lettere atipiche</th>
                  <td><?php echo $rowa['Metrica10']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Forme ambigue delle lettere</th>
                  <td><?php echo $rowa['Metrica11']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Lettere ritoccate o ricalcate</th>
                  <td><?php echo $rowa['Metrica12']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Tanccia instabile scrittura incerta e tremolante</th>
                  <td><?php echo $rowa['Metrica13']; ?></td>
                </tr>
                <tr>
                <th scope="row" style="color:red;">Somma </th>
                <td style="color:red;"><?php echo $row['Metrica1']+$row['Metrica2']+$row['Metrica3']+$row['Metrica4']+$row['Metrica5']+$row['Metrica6']+$row['Metrica7']+$row['Metrica8']+$row['Metrica9']+$row['Metrica10']+$row['Metrica11']+$row['Metrica12']+$row['Metrica13']; ?></td>
              </tr>
              <tr>
              <th scope="row" style="color:red;">Punto z </th>
              <?php $z=$rowa['Puntoz']; ?>
              <td style="color:red;"><?php echo number_format((float)$z, 2, '.', ''); ?></td></tr>
              <tr>
              <th><button onclick=location.href="Pdf/CreatePdf.php?Codice=<?php echo $cf;?>&Bhk=<?php echo $Codice;?>" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Stampa PDF </button>
 </th>
              <td >  <button onclick=location.href="bhkElenco.php?Codice=<?php echo $cf;?>" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro </button></td></tr>




              </tbody>

            </table>
            <br/>
        </div>


        <div class="col-sm-12 col-md-6" style='height: :500px;'>
            <br/>

        <div id='segn' style='height: 700px;'>
          <div class='w3-content w3-display-containe' id='dispcont'>

              <center>
                <?php
        /*      echo '<img id="imgcaricata" class="mySlides" src="data:image/jpeg;base64,'.base64_encode( $foto["Foto"] ).'"
style="height:auto; width:auto;max-width:500px; margin-top:55px;" />';*/
echo '<img id="imgcaricata" class="mySlides" src="'.( $foto["Foto"] ).'" style="height:auto; width:auto;max-width:500px; margin-top:55px;"/>';

                 ?>

                     </center>

          </div>
        </div>


        </div> <!-- fine prima colonna -->

        <br>


      </div>




</body>
<html>
