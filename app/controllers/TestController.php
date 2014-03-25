<?php

class TestController extends BaseController {

  function pdf(){
  return View::make('pdf.test'); 
  }


  function jspdf($pid){
	//$suppliers = Supplier::all();
	
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
  return View::make('pdf.jspdf')->with('items',$items); 
  }


}
}
