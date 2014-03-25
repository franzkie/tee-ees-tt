<?php

class Purchase_ordersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('purchase_orders.index');
	}



	public function create($id = null)
	{
     	$suppliers = array('' => 'Please select') + Supplier::lists('company','id');		
     	$itemList = ItemList::lists('itemName','id');

		if ($id) {
			$supplier = Supplier::find($id);
     		return View::make('purchase_orders.create')
     		->with('itemList',$itemList)
     		->with('supplier',$supplier)
     		->with('suppliers',$suppliers);
		}
		
     	return View::make('purchase_orders.create')
     	->with('supplier',null)
     	->with('itemList',$itemList)
     	->with('suppliers', $suppliers);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//


		$supplierId = Input::get('company');

		$purchase_order = new Purchase_order;

			$purchase_order->supplierId = $supplierId;
			$purchase_order->shippingAddress = Input::get('shippingAdd');
			$purchase_order->message="Default Message";


		$purchase_order->save();

		//$supplierId = $purchase_order->supplierId;
		$insertedId = $purchase_order->id;

		$input = Input::get('product');
		$inserts = array();


		
		foreach ( $input as $v ) {
			if(!$v['delete']){
		    $inserts[] = array(
		    	'quantity' => $v['quantity'],
		    	'itemPrice'=>$v['price'],
		    	'itemId'=>$v['itemId'],
		    	'poNumber'=>$insertedId
		    	);
			}
		}

		if(empty($inserts)){	
			return Redirect::action('SuppliersController@show',$supplierId);
		}
		DB::table('tblPoContent')->insert($inserts);
		if ( $purchase_order && $inserts) {
			Session::flash('status', 'success');
			Session::flash('message', Lang::get('alerts.messages.successCreate'));
			Session::flash('type', Lang::get('alerts.transactions.po'));
		return Redirect::action('SuppliersController@show',$supplierId);
			
		}
		

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sid, $pid )
	{

		$suppliers = array('' => 'Please select') + Supplier::lists('firstName','id');
		$itemList = ItemList::lists('itemName','id');
		$supplier = Supplier::find($sid);
		$shippingAddress = Purchase_order::find($pid)->shippingAddress;
		//$items = Purchase_order::find($pid)->items;
		

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

 
        return View::make('purchase_orders.show')
        ->with('poNumber',$pid)
        ->with('supplier', $supplier)
        ->with('shippingAddress',$shippingAddress)
        ->with('itemList',$itemList)
        ->with('suppliers',$suppliers)
        ->with('items',$items);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('purchase_orders.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	$action = Input::get('submit');
	if($action == 'Print')
	{
	$input = Input::get('product');
	$supplierId = Input::get('company');
	
	$poSupplierId = Purchase_order::find($id)->supplierId;

		if($supplierId)
		{
			
			$shippingAddress = Input::get('shippingAdd');

			$purchaseOrder = Purchase_order::find($id);
			$purchaseOrder->supplierId = $supplierId;
			$purchaseOrder->shippingAddress = $shippingAddress;
			$purchaseOrder->save();
		}
		
		$input = Input::get('product');
		
		foreach ($input as $v) 
		{

		  if($v['poContentId']!=null&&!$v['delete'])
		  {
			$poContent = PoContent::find($v['poContentId']);
	        $poContent->itemId = $v['itemId'];
	        $poContent->quantity = $v['quantity'];
	        $poContent->itemPrice = $v['price'];
	        $poContent->poNumber = $id;
	        $poContent->save();
	        $purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();
		  }

		  

		  if($v['poContentId']==null&&!$v['delete'])
		  {
		  	$poContent = new PoContent;
	        $poContent->itemId = $v['itemId'];
	        $poContent->quantity = $v['quantity'];
	        $poContent->itemPrice = $v['price'];
	        $poContent->poNumber = $id;
	        $poContent->save();
	        $purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();

		  }
		  if($v['delete']&&$v['poContentId'])
		  {
		  	$poContent = PoContent::find($v['poContentId']);
			$poContent->delete();
			$purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();
		  }



	}

	return Redirect::to('test/jspdf/'. $id);
	//return Redirect::action('TestController@jspdf');


	}

	else
	{
	$input = Input::get('product');
	$products ="";		
	$supplierId = Input::get('company');
	$poSupplierId = Purchase_order::find($id)->supplierId;
		if($supplierId)
		{
			
			$shippingAddress = Input::get('shippingAdd');
			//dd($shippingAddress);
			$purchaseOrder = Purchase_order::find($id);
			$purchaseOrder->supplierId = $supplierId;
			$purchaseOrder->shippingAddress = $shippingAddress;
			$purchaseOrder->save();
		}
		
		$input = Input::get('product');
		
		foreach ($input as $v) 
		{

		  if($v['poContentId']!=null&&!$v['delete'])
		  {
			$poContent = PoContent::find($v['poContentId']);
	        $poContent->itemId = $v['itemId'];
	        $poContent->quantity = $v['quantity'];
	        $poContent->itemPrice = $v['price'];
	        $poContent->poNumber = $id;
	        $poContent->save();
	        $purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();
		  }

		  if($v['poContentId']==null&&!$v['delete'])
		  {
		  	$poContent = new PoContent;
	        $poContent->itemId = $v['itemId'];
	        $poContent->quantity = $v['quantity'];
	        $poContent->itemPrice = $v['price'];
	        $poContent->poNumber = $id;
	        $poContent->save();
	        $purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();

		  }
		  if($v['delete']&&$v['poContentId'])
		  {
		  	$poContent = PoContent::find($v['poContentId']);
			$poContent->delete();
			$purchaseOrder = Purchase_order::find($id);
	        $purchaseOrder->touch();
		  }



	}

	
	Session::flash('status', 'success');
	Session::flash('message', Lang::get('alerts.messages.successUpdate'));
	Session::flash('type', Lang::get('alerts.transactions.po'));
	Session::flash('id', 'number '.$id);
	return Redirect::action('SuppliersController@show',$supplierId);

	}
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}

