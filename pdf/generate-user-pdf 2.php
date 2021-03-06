<?php
//include connection file 
include "dbconfig.php";
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('C:\xampp\htdocs\bhar_interv\cert_ver\images\logo.png',5,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(70);
    // Title
    $this->Cell(120,10,'Bharathiar University Affillited College Verification List',1,0,'C');
    // Line break
    $this->Ln(18);
	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('user_id'=>'ID', 'name'=> 'Name', 'email'=> 'Email','department'=> 'Department','role'=> 'Role');

$result = mysqli_query($conn, "SELECT user_id, name, email, department, role FROM users") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM users WHERE field != 'created_on'");

$pdf = new PDF();

//header
$pdf->AddPage();
//footer page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
foreach($header as $heading) {
$pdf->Cell(35,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(35,10,$column,1);
}
$pdf->Output();
?>