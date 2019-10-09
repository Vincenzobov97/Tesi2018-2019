<!DOCTYPE html>
<?php

session_start();
//include 'sicurezza_ingresso.php';

?>
<html>

<title>bhk report patient</title>






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


          $query ="SELECT * FROM logopedista WHERE  Email ='".$_SESSION['email']."'";
          $result = mysqli_query($connessione_al_server,$query);


          $row = mysqli_fetch_array($result);

$data=  date('d/m/Y',strtotime($row['DataNascita']));
          ?>

          <div align="center">
            <form method="POST" action="server/UpdateSetting.php">
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
                    <td>  <input type="text" name="Uname" value="<?php echo $row['Nome'];?>"  placeholder="Nome" required> </input></td></td>
                  </tr>
                  <tr>
                    <th scope="row">Cognome</th>
                    <td>
                    <input type="text" name="UCognome" value="<?php echo $row['Cognome'];?>"  placeholder="Cognome" required></input></td>
                  </tr>
                  <tr>
                    <th scope="row">Sesso</th>
                    <?php   $confronto=strcmp($_SESSION["sesso"],"F");
                      if ($confronto==0){
                        echo "
                        <td><label class='radio-container m-r-45'>Maschio
                        <input type='radio' id='sesso'  name='gender' required
                     value='M'>
                    	<span class='checkmark'></span>

                    	</label>
                  		<label class='radio-container'>Femmina
                        <input type='radio'  id='sesso' name='gender' checked='checked' required value='F'>
                        <span class='checkmark'></span>
                    	</label></td>
                        ";
                      }
                      else{
                           echo "
                          <td><label class='radio-container m-r-45'>Maschio
                          <input type='radio' id='sesso'  name='gender'  checked='checked' required
                       value='M'>
                      	<span class='checkmark'></span>

                      	</label>
                    		<label class='radio-container'>Femmina
                          <input type='radio'  id='sesso' name='gender'  required value='F'>
                          <span class='checkmark'></span>
                      	</label></td>
                          ";
                      }  ?>


                  </tr>
                  <tr>
                    <th scope="row">Data di nascita</th>
                    <td><input type="text" name="Ucompleanno" value="<?php echo $data ;?>"  placeholder="dd/mm/aaaa"  required></input></td>
                  </tr>
                  <tr>
                    <th scope="row">Cellulare</th>
                    <td>  <input type="text" name="Utel" value="<?php echo $row['Cellulare'];?>"  placeholder="Phone Number" ></input>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Telefono fisso</th>
                    <td>  <input type="text" name="Ufisso" value="<?php echo $row['Tel_fisso'];?>"  placeholder="Landline number" ></input>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Numero albo</th>
                    <td>
                      <input type="text" name="URegister" value="<?php echo $row['Num_albo'];?>"  placeholder="Number of register" required></input>
                      </td>
                  </tr>
                  <tr>
                    <th scope="row">Nome ordine</th>
                    <td>

                    <input type="text" name="Uordine" value="<?php echo $row['ordine'];?>"  placeholder="Order name" required ></input></td></td>

                  </tr>

                </tbody>
              </table>
              <br/>
          </div>




          <br/>

        </div>

<div   style="width:500px;padding:10px; margin-left:375px;"align="center">

        <button  style="width:150px;" class="w3-button w3-round-large w3-blue w3-center" type="submit" >Salva</button>
</form>
<button onclick=location.href="VisualizzaSetting.php" style="width:150px;"   class=" w3-left w3-button   w3-round-large w3-blue">Indietro</a>



</div>







</body>




</html>
