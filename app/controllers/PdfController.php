<?php 
   
ini_set('max_execution_time', 300); //5minutes


class PdfController extends BaseController
{




    public function poPdf($pid=null)
    {



   $poDetails = Purchase_order::find($pid);
   if($poDetails == null)
   {

    return Response::view('errors.404', array(), 404);
   }

   else{
   $supDetails = Supplier::find($poDetails->supplierId);
   $poText = $supDetails->lastName.', '.$supDetails->firstName.' '.$supDetails->middleName;

   // echo "<pre>";
   // dd($supDetails);


    $items = DB::table('tblPoContent')
            ->join('tblItemList', 'tblPoContent.itemId', '=', 'tblItemList.id')
            ->where('tblPoContent.PoNumber',$pid)
            ->orderBy('tblPoContent.poNumber', 'asc')
            ->get(array('tblpocontent.itemId',
                'tblItemList.itemName',
                'tblPoContent.quantity',
                'tblItemList.description',
                'tblPoContent.itemPrice',
                'tblPoContent.id as poContentId'));

$sum = 0;
$tblContent = '';

foreach ($items as $item) {
   $subtotal = $item->itemPrice*$item->quantity; 
   $tblContent .= "<tr class='xxx'>
   <td>".$item->itemId."</td>
   <td>".$item->itemName."</td>
   <td>".$item->description."</td>
   <td>".$item->quantity."</td> 
   <td>".number_format($item->itemPrice, 2, '.', ',')."</td>
   <td align='right'>".number_format($subtotal, 2, '.', ',')."</td>
   </tr>";
 
   $sum += $subtotal ;
}

$sum = number_format($sum, 2, '.', ',');
// $tblContent = $tblContent."<tr><td rowspan='3'></td><td rowspan='3'>".$sum."</td></tr>";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Purchase order No.'.$pid);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(false, false, "Bupharco","Malaybalay Branch");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 22, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'M', 12);

// add a page
$pdf->AddPage();


// $pdf->Write(0, 'Supplier: '.$poText, '', 0, 'S', true, 0, false, false, 0);
// $pdf->Write(0, 'Purchase Order No: '.$pid, '', 0, 'B', true, 0, false, false, 0);
// $pdf->Write(0, 'date Created: '.$poDetails->created_at, '', 0, 'B', true, 0, false, false, 0);


$pdf->SetFont('helvetica', '', 8);
$pdf->SetDrawColor(255,255,255);
$pdf->SetXY(15, 25);
$pdf->Cell(80, 0, 'Supplier: '.$poText, 1, 1, 'l', 0, '', 0);
$pdf->Cell(80, 0, 'Purchase Order No: '.$pid, 1, 1, 'l', 0, '', 0);
$pdf->Cell(80, 0, 'Date Created: '.$poDetails->created_at, 1, 1, 'l', 0, '', 0);


$pdf->SetXY(100, 25);
$pdf->Cell(100, 0, 'Shipping Address: '.$poDetails->shippingAddress, 1, 1, 'l', 0, '', 0);
$pdf->Ln(10);


$tbl = <<<EOF
<style>

</style>
<table cellpadding="2" cellspacing="2" border="1" >
<thead>
<tr >
    <td align="center" width="5%;">Item Id</td>
    <td align="center" width="30%;">Name</td>
    <td align="center" width="35%;">Description</td>
    <td align="center" width="10%;">Quantity</td>
    <td align="center" width="10%;">Price</td>
    <td align="center" width="10%;">Subtotal</td>
</tr>
<thead>
<tbody>
    $tblContent
    <tr><td colspan="3"></td><td class="total" colspan="3" align="right"><h3>Total: P <u>$sum</u></h3></td></tr>
</tbody>
</table>

EOF;

$pdf->SetLineWidth(0.3);
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('PurchaseOrderNo.'.$pid, 'I');

}
    }
}