<?php

include("../../connessione_db/db_con.php"); // Include il file di connessione al database
session_start();
$data=date ("Y-m-d");
$v1=$_REQUEST["V1"];
$v2=$_REQUEST["V2"];
$v3=$_REQUEST["V3"];
$v4=$_REQUEST["V4"];
$v5=$_REQUEST["V5"];
$v6=$_REQUEST["V6"];
$v7=$_REQUEST["V7"];
$v8=$_REQUEST["V8"];
$v9=$_REQUEST["V9"];
$v10=$_REQUEST["V10"];
$v11=$_REQUEST["V11"];
$v12=$_REQUEST["V12"];
$v13=$_REQUEST["V13"];
$v14=$_REQUEST["V14"];
$foto=$_REQUEST["img"];
$cf=$_REQUEST["cf"];
$queryInput="INSERT INTO bhk (Metrica1,Metrica2,Metrica3,Metrica4,Metrica5,Metrica6,Metrica7,Metrica8,Metrica9,Metrica10,Metrica11,Metrica12,Metrica13,Data,Puntoz,Paziente,Foto) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9','$v10','$v11','$v12','$v13','$data','$v14','$cf','$foto')";

$queryI = mysqli_query($connessione_al_server,$queryInput);

 ?>
