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
<link rel="stylesheet" type="text/css" href="stile.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="jquery/JAnamnesi.js" ></script>



<?php
include 'head.html';
?>
<div id="title"><h1> Software </h1></div>
<div id="sofware">
<p>

TestGraphia, è un sistema software utile a supportare i medici nella formulazione di una diagnosi di disgrafia.<br>
In questo modo permette anche attività di screening di grandi dimensioni riducendo ogni sforzo. Grazie alla sua facilità d'uso non è escluso che questo software possa essere utilizzato a casa, rivelando eventualmente i primi sintomi.<br>
Lo scopo di questo sistema è quello di calcolare automaticamente alcuni parametri e di consentire la facile impostazione di quelli rimanenti.<br>
Grazie a questo, la parte più difficile della diagnosi può essere facilmente raggiunta lasciando all'esperto il compito di impostare solo parametri che richiedono interpretazione e/o una visione del movimento del bambino<br>
Il software è stato progettato per la diagnosi della disgrafia dei bambini che frequentano le classi 2 3 4 5 della scuola elementare.

<br>

</p>

Il software implementato può calcolare i seguenti parametri:

<ol>
<li> dimensioni della scrittura (parametro 1);</li>
<li> margine sinistro non allineato (parametro 2);</li>

<li> andamento altalenante della linea di scrittura: le lettere o le parole sono disallineate, i grafemi di una parola non sono allineati su una linea orizzontale, ma sopra o sotto di essa (parametro 3); </li>
<li> spazio insufficiente tra le parole: lo spazio tra i grafemi è così piccolo che il grafema terminale e il grafema iniziale di una parola sono adiacenti o quasi uniti(parametro 4);</li>
<li> angoli acuti(parametro 5);</li>
<li>collegamenti interrotti fra le lettere (parametro 6);</li>
<li>grandezza irregolare delle lettere (parametro 8): I grafemi sono troppo alti o troppo bassi rispetto alla dimensione di riferimento (0,5 cm per i grafemi senza estensione e 1 cm per i grafemi con estensione);</li>
<li>misura incoerente tra lettere con e senza estensione;(parametro 9)</li>
<li>Lettere ritoccate(parametro 12)</li>


</ol>


<br>
</div>

<div id='title'><h1> BHK </h1> </div>
<div id="sofware">
  La diasognosi della disgrafia viene effettuata utilizzando il bhk.
  La bhk è una scala utilizzata come strumento per valutare la qualità della scrittura creata dagli studiosi olandesi Hamstra-Bletz e Blöte (1993).
</div>
<div id="bhk">

Hamstra-Bletz e Blöte ritengono che il normale percorso evolutivo della scrittura subisca dei cambiamenti nel corso del periodo scolastico. Una normale evoluzione non sembra essere presente in bambini timidi che, pur avendo un adeguato livello di istruzione ed esercizio pratico, invece di produrre una scrittura accettabile, hanno una traccia incerta, inadeguata in relazione alla forma e alle dimensioni dei caratteri grafici.
Hamstra-Bletz, Blöte ha elaborato una griglia di valutazione della morfologia grafica dei bambini prendendo come riferimenti principali la qualità morfologica dei segni e la spaziatura dei grafemi. Questa scala, denominata BHK, analizza 13 parametri che permettono di identificare le caratteristiche dell'atto grafico identificando la possibile presenza di disgrafia.
Questi parametri sono:
<ol>
<li> dimensione della scrittura;</li>
<li> margine sinistro non allineato;</li>
<li> andamento altalenante: lettere o parole disallineate, i grafemi di una parola non sono allineati su una linea orizzontale, ma sopra o sotto di essa; </li>
<li> spazio insufficiente tra le parole: lo spazio tra i grafemi è così piccolo che il grafema terminale e il grafema iniziale di una parola sono adiacenti o quasi uniti;</li>
<li> angoli acuti o collegamenti allungati tra lettere;</li>
<li> Collegamenti interrotti: non ci sono collegamenti tra le lettere;</li>
<li> collisione tra le lettere a causa della breve distanza: i due grafemi sono quindi tangenti o sovrapposti;</li>
<li> irregolarità nella dimensione delle lettere: i grafemi sono troppo alti o troppo bassi rispetto alla dimensione di riferimento (0,5 cm per i grafemi senza estensione e 1 cm per i grafemi con estensione);</li>
<li> misura incoerente tra lettere con e senza estensione in altezza;</li>
<li> lettere atipiche: deformazione delle lettere rispetto alla loro forma convenzionale;</li>
<li> forme di lettere ambigue dal punto di vista morfologico in modo da poterle confondere con altre;</li>
<li>  le lettere ritoccate o tracciate non per la correzione ortografica, ma per migliorarne la forma;</li>
<li>  traccia instabile, scrittura incerta o tremolante.</li>


</ol>


<img src="immagini/bhk.PNG" id="imgBhk" ></img>

</div>
<div>
<u><a onclick="toggleText()" id="b" ><font color="#0000FF">Leggi</font></a></u>
<br>
<br>
<br>
<p id="scarica">
SCARICA IL TESTO DA SOTTOPORRE PER LA VALUTAZIONE</p>
 <br>


<a href="../download\traccia.pdf" download="test.pdf" id="dowload">
    <button class="w3-button w3-round-large w3-blue " style="width:200px" >Download File</button>
</a>
</div>
<br>
<br>
<br>

</body>
<script type="text/javascript">




var status = "less";

function toggleText()
{


    if (status == "less") {
        document.getElementById("bhk").style.display="none";

      //  document.getElementById("b").innerHTML = "L ";
        status = "more";
    } else if (status == "more") {
        document.getElementById("bhk").style.display="block";
        document.getElementById("b").innerHTML = "Leggi meno";
        status = "less"
    }
}

</script>

</html>
