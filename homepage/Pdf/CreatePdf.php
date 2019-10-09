<?php
// Include il file di connessione al database

session_start();



    // $_GET['Codice'];
require('fpdf.php');
class PDF extends FPDF
{


/* Page header */
function Header()
{
  include("../../connessione_db/db_con.php");
  $CF=$_GET['Codice'];

  $query ="SELECT * FROM paziente WHERE Codice_fiscale = '".$CF."' AND Logopedista ='".$_SESSION['email']."'";
  $result = mysqli_query($connessione_al_server,$query);


  $row = mysqli_fetch_array($result);
  $data=  date('d/m/Y',strtotime($row['Data_nascita']));
    $this->SetFont('Arial','B',15);
    /* Move to the right */
    $this->Cell(60);

    $this->Cell(70,10,'Referto',0,0,'C');
    $this->Ln();
      $this->Cell(10);
        $this->SetFont('Times','',12);
          $this->Cell(15,6,'Nome:',0,0,'L');

          $this->Cell(10);
            $this->Cell(15,6,$row["Nome"],0,0,'R');

            $this->Cell(85);
              $this->SetFont('Times','',12);
                $this->Cell(15,6,'Nato/a:',0,0,'L');

                $this->Cell(5);
                  $this->Cell(30,6,$data,0,0,'L');

          $this->Ln();
            $this->Cell(10);
              $this->SetFont('Times','',12);
                $this->Cell(15,6,'Cognome:',0,0,'L');

                $this->Cell(5);
                  $this->Cell(15,6,$row["Cognome"],0,0,'C');

                  $this->Cell(90);
                    $this->SetFont('Times','',12);
                      $this->Cell(15,6,'Residente a :',0,0,'L');

                      $this->Cell(5);
                        $this->Cell(30,6,$row["Citta_residenza"],0,0,'C');



                  $this->Ln();
                    $this->Cell(10);
                      $this->SetFont('Times','',12);
                        $this->Cell(15,6,'Sesso:',0,0,'L');

                        $this->Cell(5);
                          $this->Cell(15,6,$row["Sesso"],0,0,'C');
                          $this->Cell(90);
                            $this->SetFont('Times','',12);
                              $this->Cell(15,6,'Telefono: ',0,0,'L');

                              $this->Cell(5);
                                $this->Cell(30,6,$row["Telefono"],0,0,'R');


                                $this->Ln();
                                  $this->Cell(10);
                                    $this->SetFont('Times','',12);
                                    $this->Cell(15,6,'CF:',0,0,'L');

                                      $this->Cell(5);
                                      $this->Cell(20,6,$CF,0,0,'C');

                                      $this->Cell(85);
                                        $this->SetFont('Times','',12);
                                          $this->Cell(15,6,'Classe: ',0,0,'L');

                                          $this->Cell(5);
                                            $this->Cell(30,6,$row["Classe_frequentante"],0,0,'C');



$this->Line(20,45,200,45);
$this->Ln();
$this->Ln();
}
/* Page footer */
function Footer()
{
    /* Position at 1.5 cm from bottom */
    $this->SetY(-15);
    /* Arial italic 8 */
    $this->SetFont('Arial','I',8);
    /* Page number */
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

/* Instanciation of inherited class */

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
include("../../connessione_db/db_con.php");
$CF=$_GET["Codice"];
       $queryPregressa= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 1 and 6";
       $queryScrittura= "SELECT testo,Risposta,Codice_fiscale,Note,id_domanda FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 7 and 8 ";
       $queryMotricita= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 9 and 10";
       $queryAutonomia= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 11 and 17";
       $queryTest= "SELECT testo,Risposta,Codice_fiscale,Note FROM ((anamnesi INNER JOIN paziente ON Paziente = Codice_fiscale) INNER JOIN  domanda ON anamnesi.domanda= domanda.id_domanda) WHERE Codice_fiscale = '".$CF."' AND id_domanda between 18 and 20";



          $resultPregressa = mysqli_query($connessione_al_server,$queryPregressa);
          $resultScrittura = mysqli_query($connessione_al_server,$queryScrittura);
          $resultMotricita = mysqli_query($connessione_al_server,$queryMotricita);
          $resultAutonomia = mysqli_query($connessione_al_server,$queryAutonomia);
          $resultTest = mysqli_query($connessione_al_server,$queryTest);


          if(mysqli_num_rows($resultPregressa)>0){
$pdf->Cell(60);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(70,10,'Anamnsesi',0,0,'C');
$pdf->ln();

$pdf->SetFont('Times','',12);


          $pdf->SetFont('Arial','B',12);
          $pdf->Cell(10);
          $pdf->Cell(60,10,'Anamnesi pregressa',0,0,'L');
          $pdf->Ln();
          while($row = mysqli_fetch_array($resultPregressa))
          {
$pdf->Cell(10);
  $pdf->SetFont('Times','',12);
    $pdf->Cell(15,6,$row['testo'],0,0,'L');
    $pdf->Cell(90);
    $pdf->Cell(15,6,$row['Risposta'],0,0,'L');
    $pdf->Cell(100);
    $pdf->Cell(15,6,$row['Note'],0,0,'L');
        $pdf->Ln();
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10);
$pdf->Cell(70,10,'Scrittura',0,0,'L');
$pdf->Ln();
while($row = mysqli_fetch_array($resultScrittura))
{
$pdf->Cell(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,$row['testo'],0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$row['Risposta'],0,0,'L');
$pdf->Cell(100);
$pdf->Cell(15,6,$row['Note'],0,0,'L');
$pdf->Ln();
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10);
$pdf->Cell(70,10,'Motricita\'',0,0,'L');
$pdf->Ln();
while($row = mysqli_fetch_array($resultMotricita))
{
$pdf->Cell(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,$row['testo'],0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$row['Risposta'],0,0,'L');
$pdf->Cell(100);
$pdf->Cell(15,6,$row['Note'],0,0,'L');
$pdf->Ln();
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10);
$pdf->Cell(70,10,'Autonomia',0,0,'L');
$pdf->Ln();
while($row = mysqli_fetch_array($resultAutonomia))
{
$pdf->Cell(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,$row['testo'],0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$row['Risposta'],0,0,'L');
$pdf->Cell(100);
$pdf->Cell(15,6,$row['Note'],0,0,'L');
$pdf->Ln();
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10);
$pdf->Cell(70,10,'Test',0,0,'L');
$pdf->Ln();
while($row = mysqli_fetch_array($resultTest))
{
$pdf->Cell(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,$row['testo'],0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$row['Risposta'],0,0,'L');
$pdf->Cell(100);
$pdf->Cell(15,6,$row['Note'],0,0,'L');
$pdf->Ln();
}

$pdf->AddPage();}

      $Codice = $_GET['Bhk'];

      $query = "SELECT *  FROM bhk   WHERE Cod_Bhk = '".$Codice."'";




      $result = mysqli_query($connessione_al_server,$query);

          $rowb = mysqli_fetch_array($result);
          $data=  date('d/m/Y',strtotime($rowb['Data']));
$pdf->Cell(60);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(70,10,'BHK in data '.$data.'',0,0,'C');
$pdf->ln();
$pdf->Ln();
$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"1.Grandezza scrittura",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica1"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"2.Margine sinistro non allineato",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica2"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"3.Andamento altalenante",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica3"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"4.Spazio insufficiente tra le parole",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica4"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"5.Angoli acuti o collegamneti allungati",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica5"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"6.Collegamenti interrotti",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica6"],0,0,'L');
$pdf->Ln();


$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"7.Collisioni tra lettere",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica7"],0,0,'L');
$pdf->Ln();


$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"8.Grandezza irregolare delle lettere",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica8"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"9.Misura incoerente tra lettere con e senza estensione",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica9"],0,0,'L');
$pdf->Ln();


$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"10.Lettere atipiche",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica10"],0,0,'L');
$pdf->Ln();


$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"11.Forme ambigue delle lettere",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica11"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"12.Lettere ritoccate o ricalcate",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica12"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"13.Tanccia instabile scrittura incerta e tremolante",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica13"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"Somma",0,0,'L');
$pdf->Cell(90);
$pdf->Cell(15,6,$rowb["Metrica1"]+$rowb["Metrica2"]+$rowb["Metrica3"]+$rowb["Metrica4"]+$rowb["Metrica5"]+$rowb["Metrica6"]+$rowb["Metrica7"]+$rowb["Metrica8"]+$rowb["Metrica9"]+$rowb["Metrica10"]+$rowb["Metrica11"]+$rowb["Metrica12"]+$rowb["Metrica13"],0,0,'L');
$pdf->Ln();

$pdf->Cell(30);
$pdf->SetFont('Times','B',12);
$pdf->Cell(15,6,"Punti z",0,0,'L');
$pdf->Cell(90);
$z=$rowb["Puntoz"];
$risult= number_format((float)$z, 2, '.', '');
$pdf->Cell(15,6,$risult,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"Note",0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"___________________________________________________________________________  ",0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"___________________________________________________________________________  ",0,0,'L');
$pdf->Ln();
$pdf->Ln();



$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"___________________________________________________________________________  ",0,0,'L');
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"___________________________________________________________________________  ",0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,10,"Data ",0,0,'L');


$pdf->Cell(110);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"Firma ",0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Ln();


$pdf->Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,10,"________   ___/___/_____ ",0,0,'L');




$pdf->Cell(90);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,6,"________________________ ",0,0,'L');
$pdf->Ln();
$pdf->Output();


?>
