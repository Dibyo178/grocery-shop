<?php
//call the FPDF library
require('fpdf/fpdf.php');
include_once 'connectdb.php';

$id = $_GET['id'];
$select = $pdo->prepare("select * from orders where id =$id");
$select->execute();     //where invoice_no=$id                
//$row = $select->fetch(PDO::FETCH_ASSOC) ;
$row = $select->fetch(PDO::FETCH_OBJ);
$pdf = new FPDF('P', 'mm', array(80, 200));
//add new page
$pdf->AddPage();

$pdf->Image('sip_logo.jpg', 32, 3, 10);

//set font to arial, bold, 14pt
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(60 ,8,'Invoice.',1,1,"C");
//Cell(width , height , text , border , end line , [align] )


$pdf->Ln(7); //Line break

$pdf->SetFont('Arial', 'B', 7);

$pdf->Cell(51, 5, 'Address: ' . $row->to_id . ' ,Sylhet', 0, 1, "C");
// $pdf->Cell(80,-2, 'Sylhet', 0, 1, "C");
// $pdf->Ln(2);//Line break
$pdf->Cell(59, 5, 'Hotline Number: +88 01764-561996', 0, 1, "C");
$pdf->Cell(67, 5, 'EMAIL ADDRESS : Info@Sipcoffees.Com ', 0, 1, "C");
$pdf->Cell(50, 5, 'WEBSITE : sipcoffees.com', 0, 1, "C");
$pdf->Line(7, 40, 72, 40);
$pdf->Ln(5); //Line break
$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(20, 4, 'Bill To :', 0, 0, "");
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, $row->name, 0, 1, "");
$pdf->SetFont('Arial', 'BI', 8);
//$pdf->Cell(190,5,'Invoice Id: SITB-'.$row->invoice_id,0,1,'C');
$pdf->Cell(20, 4, 'Invoice Id:', 0, 0, "");
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, $row->id, 0, 1, "");
$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(20, 4, 'Date :', 0, 0, "");
$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, $row->date, 0, 1, "");
//$pdf->Line(5,53,70,53);
// $pdf->Ln(10);//Line break

$y_axis_initial = 56;
$pdf->SetY($y_axis_initial);
$pdf->SetX(7);
$row_height = 5;
$y_axis = $y_axis_initial + $row_height;



//initialize counter
$i = 0;


$select = $pdo->prepare("select * from orders where id=$id ");
//select * from invoice_details inner join invoice using(invoice_no) where invoice_no=$id       
$select->execute();


$pdf->SetFont('Helvetica', 'B', 8);
//$pdf->SetFillColor(208,208,208);
$pdf->Cell(32, 5, 'Item With Quantity:', 0, 0, "L");
// $pdf->Cell(11,5,'PRICE',1,0,"C");
// // $pdf->Cell(8,5,'QTY',1,0,"C");
// $pdf->Cell(12,5,'Payment',1,1,"C");



while ($item = $select->fetch(PDO::FETCH_OBJ)) {

      // $pdf->SetY($y_axis);
      //   $pdf->SetX(7);

      $pdf->SetFont('Helvetica', '', 8);
      $pdf->MultiCell(32, 5, $item->products, 0, 'L');
      // $pdf->MultiCell(11,5,$item->amount_paid,1,"C");
      // // $pdf->Cell(8,5,$item->qty,1,0,"C");
      // $pdf->MultiCell(12,5,$item->pmode,1,"R");
      //Go to next row

      //   $y_axis = $y_axis + $row_height;
      //   $i = $i + 1;

}


// item1


$pdf->Ln(5); //Line break

$pdf->SetFont('Helvetica', 'B', 10);
//$pdf->SetFillColor(208,208,208);

$pdf->Cell(18, 5, 'Total Price : ', 0, 0, "C");
// // $pdf->Cell(8,5,'QTY',1,0,"C");




$select1 = $pdo->prepare("select * from orders");
$select1->execute();     //where invoice_no=$id                
//$row = $select->fetch(PDO::FETCH_ASSOC) ;
$row1 = $select1->fetch(PDO::FETCH_OBJ);

// $pdf->SetY($y_axis);
//   $pdf->SetX(7);

$pdf->SetFont('Helvetica', 'B', 12);
// $pdf->MultiCell(34, 5, $item->products, 0, 'L');
$pdf->Cell(11, 5, 'BDT/=' . $row1->amount_paid, 0, "C");


$pdf->Ln(2); //Line break

$pdf->SetFont('Helvetica', 'B', 10);
//$pdf->SetFillColor(208,208,208);

$pdf->Cell(25, 5, 'Payment Type : ', 0, 0, "C");
// // $pdf->Cell(8,5,'QTY',1,0,"C");




$select1 = $pdo->prepare("select * from orders");
$select1->execute();     //where invoice_no=$id                
//$row = $select->fetch(PDO::FETCH_ASSOC) ;
$row1 = $select1->fetch(PDO::FETCH_OBJ);

// $pdf->SetY($y_axis);
//   $pdf->SetX(7);

$pdf->SetFont('Helvetica', 'B', 8);
// $pdf->MultiCell(34, 5, $item->products, 0, 'L');
$pdf->Cell(11, 5, $row1->pmode, 0, "C");



// $pdf->Cell(8,5,$item->qty,1,0,"C");
// $pdf->MultiCell(12,5,$item->pmode,0,"C");
//Go to next row

//   $y_axis = $y_axis + $row_height;
//   $i = $i + 1;





//        $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
//$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'SUBTOTAL',1,0,"L");
// $pdf->Cell(20,5,$row->subtotal,1,1,"C");

// $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
//$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'TAX(5%)',1,0,"L");
// $pdf->Cell(20,5,$row->tax,1,1,"C");

// $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
//$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'DISCOUNT',1,0,"L");
// $pdf->Cell(20,5,$row->discount,1,1,"C");



// $pdf->SetX(7);
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(20,5,'',0,0,"");
// //$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'GRAND TOTAL',1,0,"L");
// $pdf->Cell(20,5,'$'.$row->total,1,1,"C");


// $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
// //$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'PAID',1,0,"L");
// $pdf->Cell(20,5,$row->paid,1,1,"C");


// $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
// //$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'DUE',1,0,"L");
// $pdf->Cell(20,5,$row->due,1,1,"C");


// $pdf->SetX(7);
// $pdf->SetFont('Courier','B',8);
// $pdf->Cell(20,5,'',0,0,"");
// //$pdf->Cell(11,5,'',0,0,"");
// $pdf->Cell(25,5,'PAYMENT TYPE',1,0,"L");
// $pdf->Cell(20,5,$row->pmode,1,1,"C");


$pdf->SetX(7);
$pdf->Cell(20, 5, '', 0, 1, "");

$pdf->SetX(5);
$pdf->SetFont('Courier', 'B', 8);
$pdf->Cell(25, 5, 'Important Notice :', 0, 1, "");
$pdf->SetX(5);
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(75, 5, 'No item will be replaced or refunded .
', 0, 2, "");
$pdf->SetX(22);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(79, 30, 'Developed By SMITH IT.', 0, 1, "");

$pdf->Ln(.5);//Line break

$pdf->Cell(81, 30, 'www.smithitbd.com.', 0, 1, "");
// $pdf->Cell(79,30,'www.smithitbd.com.',0,1,"C");


$pdf->Output();


?>



/////////////