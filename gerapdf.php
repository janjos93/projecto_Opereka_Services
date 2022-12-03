<?php
//call the FPDF library
require('fpdf/fpdf.php');
include_once'Admin/conexao.php';
 
 $pdf = new FPDF('L','mm','A4');

//add new page
$pdf->AddPage();
$pdf->SetFillColor(123,255,234);

//set font to arial, bold, 16pt
$pdf->SetFont('Arial','B',16);
$pdf->Ln(18); 
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(190,10,'OPEREKA SERVICOS',0,1,'C');


$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,'RELATORIO',0,1,'C');

 
$pdf->Line(5,50,205,50);
$pdf->Line(5,51,205,51);

$pdf->Ln(5); // line break


$pdf->SetFont('Arial','B',10);
    $pdf->SetFillColor(208,208,208);
    $pdf->Cell(77,8,'NOME',1,0,'C',true);   //190
    $pdf->Cell(27,8,'APELIDO',1,0,'C',true);
    $pdf->Cell(27,8,'CONTACTO',1,0,'C',true);
    $pdf->Cell(50,8,'ENDERECO',1,1,'C',true);


  // $select=$pdo->prepare("select nome_cliente,apelido,contacto,endereco from cliente order by nome_cliente");

  // $select->execute();

  //   while($row=$select->fetch(PDO::FETCH_OBJ)){
  //       $pdf->SetFont('Arial','B',10);
  //       $pdf->Cell(77,8,$row->nome_cliente,1,0,'L');   
  //       $pdf->Cell(27,8,$row->apelido,1,0,'C');
  //       $pdf->Cell(27,8,$row->contacto,1,0,'C'); 
  //       $pdf->Cell(50,8,$row->endereco,1,1,'C'); 
  //   }

$pdf->Ln(10); // line break

$pdf->SetFont('Arial','',9);
$pdf->Cell(80,5,'Processado por Computador ',0,1,''); 

//output the result
$pdf->Output();
?>