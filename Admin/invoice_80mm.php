<?php
// Call the FPDF library
require('fpdf/fpdf.php');
include_once 'connectdb.php';

$id = $_GET['id'];
$select = $pdo->prepare("SELECT * FROM orders WHERE id = :id");
$select->bindParam(':id', $id);
$select->execute();                
$row = $select->fetch(PDO::FETCH_OBJ);

$pdf = new FPDF('P', 'mm', array(80, 200)); // 80mm wide, dynamic height
$pdf->AddPage();

$pdf->Image('Logo-Black.png', 26, 3, 25); // Adjusted logo position

$pdf->Ln(14); // Adjusted line break for better spacing

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 5, 'Address: ' . $row->to_id . ', Sylhet', 0, 1, "C");
$pdf->Cell(0, 5, 'Hotline: +88 01764-561996', 0, 1, "C");

// Calculate width of email text
$email = 'Email: Info@Sipcoffees.Com';
$emailWidth = $pdf->GetStringWidth($email) + 6; // Adding a bit of padding

// Center the email address
$pdf->SetX((80 - $emailWidth) / 2); // 80 is the page width
$pdf->Cell($emailWidth, 5, $email, 0, 1, 'C');

$pdf->Cell(0, 5, 'Website: sipcoffees.com', 0, 1, "C");

$pdf->Ln(5); // Adjusted line break

$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(25, 5, 'Bill To:', 0, 0);
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(0, 5, $row->name, 0, 1);

$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(25, 5, 'Invoice Id:', 0, 0);
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(0, 5, $row->id, 0, 1);

$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(25, 5, 'Date:', 0, 0);
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(0, 5, $row->order_date, 0, 1);

$pdf->Ln(5); // Adjusted line break

$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(0, 5, 'Item With Quantity:', 0, 1, "L");

$selectItems = $pdo->prepare("SELECT * FROM orders WHERE id = :id");
$selectItems->bindParam(':id', $id);
$selectItems->execute();

$pdf->SetFont('Helvetica', '', 8);
while ($item = $selectItems->fetch(PDO::FETCH_OBJ)) {
    $pdf->MultiCell(0, 5, $item->products, 0, 'L');
}

$pdf->Ln(5); // Adjusted line break

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(30, 5, 'Delivery Charge:', 0, 0, "L");

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, 'BDT/=' . $row->delivery, 0, 1, "L");

$pdf->Ln(2); // Adjusted line break

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(30, 5, 'Total Price:', 0, 0, "L");

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, 'BDT/=' . $row->amount_paid, 0, 1, "L");

$pdf->Ln(2); // Adjusted line break

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(30, 5, 'Payment Type:', 0, 0, "L");

$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, $row->pmode, 0, 1, "L");

$pdf->Ln(10); // Added space before footer

$pdf->SetFont('Courier', 'B', 8);
$pdf->Cell(0, 5, 'Important Notice:', 0, 1, "L");

$pdf->SetFont('Arial', '', 6);
$pdf->MultiCell(0, 4, 'No item will be replaced or refunded.', 0, 'L');

$pdf->Ln(3); // Added space

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(0, 5, 'Developed By SMITH IT.', 0, 1, "C");

$pdf->Ln(0.5); // Line break
$pdf->Cell(0, 5, 'www.smithitbd.com', 0, 1, "C");

$pdf->Output();
?>
