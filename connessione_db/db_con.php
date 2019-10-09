<?php     //connessione al nostro database
$connessione_al_server= new mysqli("localhost","bhkreportpatient","","my_bhkreportpatient");  // ip locale, login e password
if($connessione_al_server->connect_error){
die ('Non riesco a connettermi: errore '.$connessione_al_server->connect_error); // questo apparirà solo se ci sarà un errore
}



?>
