<!DOCTYPE html>
<?php

session_start();
//include 'sicurezza_ingresso.php';

?>
<html>

<title>bhk report patient</title>


<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>





<body class="w3-light-grey">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
<!--jquery-->



<?php
include 'head.html';
?>








  <?php
    include("../connessione_db/db_con.php");


      //VERIFICA CHE LA VARIABILE PASSATA NON SIA VUOTO?>


      </head>

      <div>

       <br/>
      <?php
      if(empty($_GET['Confirm'])){
        $Conferma=1;
      }
      else {
          $Conferma=$_GET['Confirm'];
        }
          $CF= $_GET['Codice'];
          //VERIFICA CHE LA VARIABILE PASSATA NON SIA VUOTO



          $query ="SELECT * FROM paziente WHERE Codice_fiscale = '".$CF."' AND Logopedista ='".$_SESSION['email']."'";
          $result = mysqli_query($connessione_al_server,$query);


          $row = mysqli_fetch_array($result);

$data=  date('d/m/Y',strtotime($row['Data_nascita']));
          ?>

          <div align="center">
            <form method="POST" action="server/UpdateAnagrafica.php">
          <br/>
              <h1><?php echo  $row['Cognome']." ".$row['Nome']; ?></h1>
              <br/>
              <table class="w3-table w3-bordered" style="width:400px;padding:10px;" align="center">
                <tbody>
                  <tr>
                    <th scope="row">Nome</th>
                    <td>  <input type="text" name="Uname" value="<?php echo $row['Nome'];?>"  placeholder="Nome Paziente" required> </input></td></td>
                  </tr>
                  <tr>
                    <th scope="row">Cognome</th>
                    <td>
                    <input type="text" name="UCognome" value="<?php echo $row['Cognome'];?>"  placeholder="Cognome Paziente" required></input></td>
                  </tr>
                  <tr>
                    <th scope="row">Codice fiscale</th>
                    <td><input id="focus" type="text" name="Ucf" value="<?php echo $CF;?>"  placeholder="codice fiscale" required></input></td>
                  </tr>
                  <tr>
                    <th scope="row">Sesso (M/F)</th>
                    <td><input type="text" name="Usesso" value="<?php echo $row['Sesso']; ;?>"  placeholder="Sesso" pattern="[M/F]{1}" required></input></td>
                  </tr>
                  <tr>
                    <th scope="row">Data di nascita</th>
                    <td>  <input type="text" name="Udata" value="<?php echo $data;?>"  placeholder="Data di nascita" required></input>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Classe frequentante</th>
                    <td>  <input type="text" name="Uclasse" value="<?php echo $row['Classe_frequentante'];?>"  placeholder="Data di nascita" required></input>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Città residenza</th>
                    <td>
                      <input type="text" name="Ucitta" value="<?php echo $row['Citta_residenza'];?>"  placeholder="Città Residenza" required></input>
                      </td>
                  </tr>
                  <tr>
                    <th scope="row">Via</th>
                    <td>
                    <input type="text" name="Uvia" value="<?php echo $row['Via'];?>"  placeholder="Via"></input>
                    <input type="text" name="Ucivico" value="<?php echo $row['civico'];?>"  placeholder="Civico"></input></td></td>

                  </tr>
                  <th scope="row">CAP</th>
                  <td>
                  <input type="text" name="Ucap" value="<?php echo $row['Cap'];?>"  placeholder="Via"></input>

                </tr>
                  <tr>
                    <th scope="row">Telefono</th>
                    <td><input type="text" name="Utel" value="<?php echo $row['Telefono'];?>"  placeholder="Nome Padre" pattern="[0-9]{10}" required></input>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Padre</th>
                    <td>
                      <input type="text" name="UpadreN" value="<?php echo $row['Nome_Padre'];?>"  placeholder="Nome Padre"></input>
                      <input type="text" name="UpadreC" value="<?php echo $row['Cognome_padre'];?>"  placeholder="Cognome Padre"></input></td>

                  </tr>
                  <tr>
                    <th scope="row">Madre</th>
                    <td>
                      <input type="text" name="UmadreN" value="<?php echo $row['Nome_Madre'];?>"  placeholder="Nome Madre"></input>
                      <input type="text" name="UmadreC" value="<?php echo $row['Cognome_Madre'];?>"  placeholder="Cognome Madre"></input></td>

                  </tr>
                  <tr>
                    <th scope="row">Tutore</th>
                    <td>
                    <input type="text" name="UtutoreN" value="<?php echo $row['Nome_Tutore'];?>"  placeholder="Nome Tutore"></input>
                    <input type="text" name="UtutoreC" value="<?php echo $row['Cognome_Tutore'];?>"  placeholder="Cognome Tutore"></input>
                  </td>
                  <tr>
                    <th scope="row">Medico</th>
                    <td><input type="text" name="Umedico" value="<?php echo $row['Medico'];?>"  placeholder="Medico"></input></td>
                  </tr>
                  <input type="hidden" name="CFold" value="<?php echo $CF;?>"></input>

                </tbody>
              </table>
              <br/>
          </div>




          <br/>

        </div>

<div   style="width:500px;padding:10px; margin-left:375px;"align="center">

        <button  style="width:150px;" class="w3-button w3-round-large w3-blue w3-center" type="submit" >Salva</button>
</form>
<button onclick=location.href="VisualizzaAnagrafica.php?Codice=<?php echo $CF; ?>" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro</a>



</div>

<div id="snackbar">Il codice fiscale che si vuole inserire appartiene ad un altro paziente</div>



<script type="text/javascript">

function message(){
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
document.getElementById("focus").focus();
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
 </script>
<?php

if ($Conferma==2) {

  echo  '<script type="text/javascript">',
     'message();',
     '</script>';
}
 ?>


</body>




</html>
