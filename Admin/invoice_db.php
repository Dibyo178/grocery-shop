<?php
//call the FPDF library
require('fpdf/fpdf.php');
include_once'connectdb.php';
$id=$_GET['id'];
$select=$pdo->prepare("select * from tbl_invoice where invoice_id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_OBJ);



//create pdf object
$pdf = new FPDF('P','mm','A4');


//add new page
$pdf->AddPage();
//$pdf->SetFillColor(123,255,234);

//set font to arial, bold, 16pt
$pdf->SetFont('Arial','B',16);

//Cell(width , height , text , border , end line , [align] )
$pdf->Image('logo.png',10,6,35);
//$pdf->Cell(80,10,'Smith IT',0,0,'');

$pdf->SetFont('Arial','B',13);
$pdf->Cell(190,15,'INVOICE',0,1,'R');

//$pdf->SetFont('Arial','B',13);
//$pdf->Cell(112,10,'INVOICE',0,1,'C');




$pdf->SetFont('Arial','',10);
$pdf->Cell(190,5,'Invoice Id: SITB-'.$row->invoice_id,0,1,'R');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Hotline Number: +88 01614-317001',0,0,'');


$pdf->SetFont('Arial','',10);
$pdf->Cell(190,5,'Date : '.$row->order_date,0,1,'C');


$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'E-mail Address : info@smithitbd.com',0,1,'');
$pdf->Cell(80,5,'Website : www.smithitbd.com',0,1,'');

//Line(x1,y1,x2,y2);

$pdf->Line(5,50,205,50);
$pdf->Line(5,51,205,51);

$pdf->Ln(10); // line break



$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'Bill To :',0,0,'');




$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,$row->customer_name,0,1,'');
$pdf->SetFont('Arial','',10);
$pdf->Cell(80,5,'Phone Number:'. $row->mobile,0,1,'');
$pdf->Cell(80,5,'Address:'.$row->address,0,1,'');
$pdf->Cell(50,5,'',0,1,'');



$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'DESCRIPTION',1,0,'C',true);   //190
$pdf->Cell(20,8,'QTY',1,0,'C',true);
$pdf->Cell(30,8,'PRICE',1,0,'C',true);
$pdf->Cell(40,8,'TOTAL',1,1,'C',true);


$select=$pdo->prepare("select * from tbl_invoice where invoice_id=$id");
$select->execute();

while($item=$select->fetch(PDO::FETCH_OBJ)){
  $pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,$item->pname,1,0,'L');   
$pdf->Cell(20,8,$item->qty,1,0,'C');
$pdf->Cell(30,8,$item->price,1,0,'C');
$pdf->Cell(40,8,$item->price*$item->qty,1,1,'C');  
    
}







$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'SubTotal',1,0,'C',true);
$pdf->Cell(40,8,$row->subtotal,1,1,'C');


//$pdf->SetFont('Arial','B',12);
//$pdf->Cell(100,8,'',0,0,'L');   //190
//$pdf->Cell(20,8,'',0,0,'C');
//$pdf->Cell(30,8,'Tax',1,0,'C',true);
//$pdf->Cell(40,8,$row->tax,1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Discount',1,0,'C',true);
$pdf->Cell(40,8,$row->discount,1,1,'C');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'GrandTotal',1,0,'C',true);
$pdf->Cell(40,8,''.$row->total,1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Paid',1,0,'C',true);
$pdf->Cell(40,8,$row->paid,1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Due',1,0,'C',true);
$pdf->Cell(40,8,$row->due,1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'',0,0,'L');   //190
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Payment Type',1,0,'C',true);
$pdf->Cell(40,8,$row->payment_type,1,1,'C');


$pdf->Ln(70); // line break


$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80,5,'Payment Method:',0,0,'');

$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'01.Cash',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'02.Cheque in favour of Smith IT',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'03.Bank Transfer:',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80,5,'Bank Name: City Bank',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Branch Name: Zindabazer,Sylhet.',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80,5,'Account Name: Smith IT',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Account Number: 1503034803001',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'4. Bkash Merchant Payment',0,0,'');


$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80,5,'Account Name: Smith IT',0,0,'');

$pdf->Ln(3); // line break

//$pdf->Cell(50,10,'',0,1,'R');
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Account Number: 01614-317001',0,0,'');



$pdf->Ln(10); // line break


$pdf->SetFont('Arial','B',10);
$pdf->Cell(32,10,'Important Notice :',0,0,'',true);


$pdf->SetFont('Arial','',8);
$pdf->Cell(148,10,'This is a computer invoice statement and requires no signature.',0,0,'',);








//output the result
$pdf->Output();






?>