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






<?php
include 'head.html';
?>








  <?php
    include("../connessione_db/db_con.php");


      //VERIFICA CHE LA VARIABILE PASSATA NON SIA VUOTO?>


      </head>

    <?php
        //$Conferma=2;
      if(empty($_GET['Confirm']) ){
      $Conferma=3;
      }
      else {
      $Conferma=$_GET['Confirm'];
      }
      ?>

      <div>
  <div align="center">
       <br/>

       <form  action="server/UpdatePassword.php" name="frmChange" method="post"  onSubmit="return validatePassword()">
       <br/>

      <img src='./immagini/lucchetto.png' class='w3-circle w3-margin-right' style='width:100px'>

         <br>
         <br/>

       <table class="w3-table w3-bordered" style="width:600px;padding:10px;" align="center">
         <tbody>
           <tr>
             <th scope="row">Password attuale</th>
             <td>  <input type="password" name="currentPassword"   required> </input> <span id="currentPassword"  class="required"></span></td>
           </tr>
           <tr>
             <th scope="row">Nuova Password</th>
             <td>
             <input type="password" name="newPassword"    required></input> <span id="newPassword" class="required"></span></td>
           </tr>

           <tr>
             <th scope="row">Conferma password</th>
             <td>
             <input type="password" name="confirmPassword"    required></input> <span id="confirmPassword" class="required"></span></td>
           </tr>

         </tbody>
       </table>
       <br/>
       </div>

       <div   style="width:500px;padding:10px; margin-left:400px;"align="center">

               <button  style="width:150px;" class="w3-button w3-round-large w3-blue w3-center" type="submit" >Salva</button>
       </form>
       <button onclick=location.href="VisualizzaSetting.php" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro</a>


</div>
<div id="snackbar"></div>
</div>



<script type="text/javascript">
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
}
return output;
}


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
x.innerHTML=" La password attuale non corrisponde";

x.style.backgroundColor="red";
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 7000);
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
