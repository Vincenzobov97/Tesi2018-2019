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
-
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="jquery/JAnamnesi.js" ></script>



<?php
include 'head.html';
?>








  <?php
    include("../connessione_db/db_con.php");


      ?>

      <?php


          $CF= $_GET['Codice'];
          //$CF="BVNVCN97L18C983O";

  $n="n";


        $first ="SELECT * FROM paziente WHERE Codice_fiscale = '".$CF."' AND Logopedista ='".$_SESSION['email']."'";
        $queryPregressa= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 1 and 6";
        $queryScrittura= "SELECT testo,Risposta,Codice_fiscale,Note,id_domanda FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 7 and 8 ";
        $queryMotricita= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 9 and 10";
        $queryAutonomia= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 11 and 17";
        $queryTest= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 18 and 20";



          $resultfirst = mysqli_query($connessione_al_server,$first);
          $resultPregressa = mysqli_query($connessione_al_server,$queryPregressa);
          $resultScrittura = mysqli_query($connessione_al_server,$queryScrittura);
          $resultMotricita = mysqli_query($connessione_al_server,$queryMotricita);
          $resultAutonomia = mysqli_query($connessione_al_server,$queryAutonomia);
          $resultTest = mysqli_query($connessione_al_server,$queryTest);






        $rowfirst = mysqli_fetch_array($resultfirst);


//     $data=  date('d/m/Y',strtotime($row['Data_nascita']));


          ?>




      <div align=Center>
        <br/>
            <h1><?php echo  $rowfirst['Cognome']." ".$rowfirst['Nome']; ?></h1>
            <br/>

        <div class="nivo-slider">
        	<div class="navigation"> </div>
        	<div id="nivo">
            <form class="" action="server/UpdateAnamnesi.php" method="post">


                <div class="element" align=Center><h3>Anamnesi pregressa</h3>
                  <table style="width:90%"class="w3-table w3-bordered w3-white">

                  <tr class="w3-blue">

                    <th>Domanda</th>
                    <th> Risposta</th>
                    <th><i> Note</i></th>
                  </tr>

                  <br>
                  <?php
                  $i=1;
                  while($row = mysqli_fetch_array($resultPregressa) )
                  {

        ?>



                      <tr>

                        <th scope="row"><?php echo  $row['testo'];?></th>
                        <td> <input type="text" name="<?php echo $i?>" value="<?php echo $row['Risposta'];?>" > </input></td>
                  <td><input type="text" name="<?php echo $i.$n?>" value="<?php echo $row['Note'];?>" ></td>

                </tr>



<?php
$i++;}?>
</table>
                </div>

        		<div class="element" align=Center><h3>Scrittura</h3>
              <table style="width:90%"class="w3-table w3-bordered w3-white">

              <tr class="w3-blue">

                <th>Domanda</th>
                <th> Risposta</th>
                <th><i> Note</i></th>
              </tr>

              <br>
              <?php
              while($row = mysqli_fetch_array($resultScrittura))
              {
    ?>


    <tr>
      <th scope="row"><?php echo  $row['testo'];?></th>
      <td> <input type="text" name="<?php echo $i?>" value="<?php echo $row['Risposta'];?>" > </input></td>
<td><input type="text" name="<?php echo $i.$n?>" value="<?php echo $row['Note'];?>" ></td>

</tr>

          <?php
        $i=$i+1;
        echo $i;
      } ?>
        </table>
                </div>
        		<div class="element"><h3>Motricità</h3>

              <table style="width:90%"class="w3-table w3-bordered w3-white">

                <tr class="w3-blue">

                  <th>Domanda</th>
                  <th> Risposta</th>
                  <th><i> Note</i></th>
                </tr>
              <br>
              <?php
              while($row = mysqli_fetch_array($resultMotricita))
              {

    ?>

    <tr>
      <th scope="row"><?php echo  $row['testo'];?></th>
      <td> <input type="text" name="<?php echo $i?>" value="<?php echo $row['Risposta'];?>" > </input></td>
<td><input type="text" name="<?php echo $i.$n?>" value="<?php echo $row['Note'];?>" ></td>

</tr>


            <?php
              $i=$i+1;
            }
              ?>
            </table>
          </div>
          <div class="element"><h3>Autonomia</h3>
            <table style="width:90%"class="w3-table w3-bordered w3-white">

            <tr class="w3-blue">

              <th>Domanda</th>
              <th> Risposta</th>
              <th><i> Note</i></th>
            </tr>

            <?php


            while($row = mysqli_fetch_array($resultAutonomia))
            {
  ?>
  <tr>
    <th scope="row"><?php echo  $row['testo'];?></th>
  <?php if (strcasecmp($row['Risposta'],"si")==0) { ?>


  <td>  <input type="radio" name="<?php echo $i?>" value="Si" checked> Si </input>
        <input type="radio" name="<?php echo $i?>" value="No"> No</input>

     </td>  <?php  }
else if (strcasecmp($row['Risposta'],"no")==0) {?>
  <td>  <input type="radio" name="<?php echo $i?>" value="Si" > Si </input>
        <input type="radio" name="<?php echo $i?>" value="No" checked> No</input>
        <
     </td>
   <?php  }
   else { ?>

     <td>  <input type="radio" name="<?php echo $i?>" value="Si" > Si </input>
           <input type="radio" name="<?php echo $i?>" value="No" > No</input>

        </td>

   <?php } ?>


<td><input type="text" name="<?php echo $i.$n?>" value="<?php echo $row['Note'];?>" ></td>

</tr>
          </tbody>

          <?php

            $i=$i+1;}
            ?>
            </table>
        </div>
        <div class="element"><h3>Test</h3>

          <table style="width:90%"class="w3-table w3-bordered w3-white">

          <tr class="w3-blue">

            <th>Domanda</th>
            <th> Risposta</th>
            <th><i> Note</i></th>
          </tr>
          <?php
          while($row = mysqli_fetch_array($resultTest))
          {
?>


<tr>
  <th scope="row"><?php echo  $row['testo'];?></th>
  <td> <input type="text" name="<?php echo $i?>" value="<?php echo $row['Risposta'];?>" > </input></td>
<td><input type="text" name="<?php echo $i.$n?>" value="<?php echo $row['Note'];?>" ></td>

              </tr>


        <?php
          $i=$i+1;}  ?>
</table>
      </div>

        	</div>

      <br/>
        </div>
      </div>


    <div   style="width:500px;padding:10px; margin-left:375px;"align="center">

            <button  style="width:150px;" class="w3-button w3-round-large w3-blue w3-center" type="submit" >Save</button>
            <input type="hidden" name="cf" value=<?php echo $CF; ?> />
    </form>
<button onclick=location.href="CercaPazienti.php" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro</a>


    </div>
      </form>




 </body>
</html>
