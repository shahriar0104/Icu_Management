
<?php 
include 'db.php';
if(isset($_POST['pid'])){
  $pid = $_POST['pid'];
}

require('fpdf/fpdf.php');
include "notorm/NotORM.php";
$pdo = new PDO("mysql:host=localhost;dbname=icu_management","root","");
$db = new NotORM($pdo);
$pat_info = $db->old_patient_info()
->select("*")
->where("id = ?", $pid)
;
$pat_report = $db->old_test_report()
->select("*")
->where("pid = ?", $pid)
;
$med_report = $db->old_medicine()
->select("*")
->where("pid = ?", $pid)
;

class PDF extends FPDF {

  function Header(){
    global $title;
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->Image('assets/img/logo.jpg',10,6,30);
    $this->SetFont('Arial','B',15);
    $this->SetLineWidth(1);
    $this->Cell($w,10,'Patient Report',0,0,'C');
    $this->Ln(20);
  }

  function Chapter($num,$label) {
    $this->SetFont('Times','B',12);
    $this->SetFillColor(200,255,255);
    $this->Cell(0,10,"$label",0,1,'L',true);
    $this->Ln(4);
  }

  function Mybody($file,$type,$datas) {
    if ($type == 'pat_info') {
      $this->SetFont('Times','B',7);
      $this->Cell(25,7,'ID',1,0,'C');
      $this->Cell(25,7,'Name',1,0,'C');
      $this->Cell(20,7,'Height',1,0,'C');
      $this->Cell(20,7,'Weight',1,0,'C');
      $this->Cell(20,7,'Gender',1,0,'C');
      $this->Cell(20,7,'Admit Date',1,0,'C');
      $this->Cell(35,7,'Problem',1,0,'C');
      $this->Cell(25,7,'Concern Doctor',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',7);
      foreach ($datas as $row) {
        $this->Cell(25,10,$row['id'],1,0,'C');
        $this->Cell(25,10,$row['name'],1,0,'C');
        $this->Cell(20,10,$row['height'],1,0,'C');
        $this->Cell(20,10,$row['weight'],1,0,'C');
        $this->Cell(20,10,$row['gender'],1,0,'C');
        $this->Cell(20,10,$row['date'],1,0,'C');
        $this->Cell(35,10,$row['problem'],1,0,'C');
        $this->Cell(25,10,$row['doctor'],1,0,'C');
        $this->Ln();
      }
    } 
    if ($type == 'pat_test') {
      $this->SetFont('Times','B',6);
      $this->Cell(20,7,'Date',1,0,'C');
      $this->Cell(20,7,'Spo2',1,0,'C');
      $this->Cell(20,7,'Heart Rate',1,0,'C');
      $this->Cell(20,7,'Temparature',1,0,'C');
      $this->Cell(20,7,'Urine',1,0,'C');
      $this->Cell(15,7,'PH',1,0,'C');
      $this->Cell(15,7,'PCO2',1,0,'C');
      $this->Cell(15,7,'HCO3',1,0,'C');
      $this->Cell(15,7,'Na',1,0,'C');
      $this->Cell(15,7,'K',1,0,'C');
      $this->Cell(15,7,'Cl',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',6);
      foreach ($datas as $row) {
        $this->Cell(20,7,$row['date'],1,0,'C');
        $this->Cell(20,7,$row['spo2'],1,0,'C');
        $this->Cell(20,7,$row['hr'],1,0,'C');
        $this->Cell(20,7,$row['temp'],1,0,'C');
        $this->Cell(20,7,$row['urine'],1,0,'C');
        $this->Cell(15,7,$row['ph'],1,0,'C');
        $this->Cell(15,7,$row['pco2'],1,0,'C');
        $this->Cell(15,7,$row['hco3'],1,0,'C');
        $this->Cell(15,7,$row['na'],1,0,'C');
        $this->Cell(15,7,$row['k'],1,0,'C');
        $this->Cell(15,7,$row['cl'],1,0,'C');
        $this->Ln();
      }
    }
    if ($type == 'med') {
      $this->SetFont('Times','B',6);
      $this->Cell(20,7,'Serial',1,0,'C');
      $this->Cell(80,7,'Medicine',1,0,'C');
      $this->Cell(40,7,'Dosase',1,0,'C');
      $this->Cell(40,7,'Duration',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',6);
      $c=1;
      foreach ($datas as $row) {
        $this->Cell(20,7,$c,1,0,'C');
        $this->Cell(80,7,$row['medicine'],1,0,'C');
        $this->Cell(40,7,$row['dosase'],1,0,'C');
        $this->Cell(40,7,$row['duration'],1,0,'C');
        $this->Ln();
        $c++;
      }
    }
  }

  function Layout ($num,$label,$file,$type,$datas) {
        //$this->AddPage();
    $this->Chapter($num,$label);
    $this->Mybody($file,$type,$datas);
  }

  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Times','',12);
    $this->Cell(0,10,$this->PageNo(),0,0,'R');
  }
}

// Instanciation of inherited class
$pdf = new PDF();
$title = 'Pdf Report';
//$pdf->AliasNbPages();
$pdf->SetTitle($title);
$pdf->SetAuthor('Anik');
//$pdf->SetFont('Times','',12);
$pdf->AddPage();
$pdf->Layout(1,'Patient Info','','pat_info',$pat_info);
$pdf->Ln(12);
$pdf->Layout(2,'Test Report','','pat_test',$pat_report);
$pdf->Ln(12);
$pdf->Layout(3,'Medicine Report','','med',$med_report);
$pdf->Output();

?>
