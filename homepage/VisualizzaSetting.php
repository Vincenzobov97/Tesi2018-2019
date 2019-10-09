<!DOCTYPE html>
<?php

session_start()


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
<link href="stile.css" rel="stylesheet" media="screen" type="text/css" />
<link href="styleload.css" rel="stylesheet" media="screen" type="text/css" />
<!--jquery-->



<?php

include 'head.html';
?>








  <?php
    include("../connessione_db/db_con.php");


      ?>


      </head>

      <div>

       <br/>
      <?php
        //$Conferma=2;
if(empty($_GET['Confirm']) ){
  $Conferma=3;
}
  else {
    $Conferma=$_GET['Confirm'];
  }



          $query ="SELECT * FROM logopedista WHERE Email ='".$_SESSION['email']."'";
          $result = mysqli_query($connessione_al_server,$query);


          $row = mysqli_fetch_array($result);

$data=  date('d/m/Y',strtotime($row['DataNascita']));
          ?>

          <div align="center">
          <br/>
          <?php
          $confronto=strcmp($_SESSION["sesso"],"F");
          if ($confronto==0){
            echo "<img src='./immagini/avatar.png' class='w3-circle w3-margin-right' style='width:100px'>";
          }
          else{
              echo "<img src='./immagini/avatarM.png' class='w3-circle w3-margin-right' style='width:100px'>";
          }

          ?>
          <br>
              <br/>
              <table class="w3-table w3-bordered" style="width:400px;padding:10px;" align="center">
                <tbody>
                  <tr>
                    <th scope="row">Nome</th>
                    <td><?php echo $row['Nome']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cognome</th>
                    <td><?php echo $row['Cognome']; ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Sesso</th>
                    <td><?php echo $row['Sesso']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Data di nascita</th>
                    <td><?php echo $data; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cellulare</th>
                    <td><?php echo $row['Cellulare']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Telefono fisso</th>
                    <td><?php echo $row['Tel_fisso']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Numero albo</th>
                    <td><?php echo  $row['Num_albo'];?></td>
                  </tr>
                  <tr>
                    <th scope="row">Nome ordine</th>
                    <td><?php echo $row['ordine']; ?></td>
                  </tr>


                </tbody>
              </table>
              <br/>
          </div>




          <br/>

        </div>

<div   style="width:500px;padding:10px; margin-left:375px;"align="center">

        <button onclick=location.href="CercaPazienti.php" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro</a>
        <button  onclick=location.href="ModificaSetting.php" style="width:150px;" class="w3-button w3-round-large w3-blue w3-center" >Modifica</button>
        <button  onclick=location.href="ModificaPassword.php" style="width:auto;" class="w3-button w3-round-large w3-blue w3-center" >Modifica Password</button>
</div>
<div id="snackbar"></div>




<script type="text/javascript">
function message(){
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
x.innerHTML="Modifica effettuata con successo";
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function messagePassword(){
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
x.innerHTML=" Password modificata con successo";
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
 </script>
<?php

if ($Conferma==1) {

  echo  '<script type="text/javascript">',
     'message();',
     '</script>';
}
     if($Conferma==2){

       echo  '<script type="text/javascript">',
          'messagePassword();',
          '</script>';
     }

 ?>






 </body>
</html>
