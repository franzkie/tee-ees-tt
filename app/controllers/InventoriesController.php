<?php

class InventoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('inventories.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('inventories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 if ( Session::token() !== Input::get( '_token' ) ) 
        {
          return $this->_make_response( json_encode( array( 'msg' => 'Unauthorized attempt to create setting' ) ) );
        }


    $exist = DB::table('tblitemlist')->where('itemName', '=',Input::get('itemName'))->first();  
     
      if($exist)
      {
       return Response::json(['success' => false, 'error'=>'Item already exist']);
      }

      $itemName = Input::get('itemName'); 
      $rowId = Input::get('rowId'); 
      $itemPrice = Input::get('itemPrice');
      $itemDescription = Input::get('itemDescription');

        $itemList = new itemList;
        $itemList->itemName = $itemName;
        $itemList->unitPrice = $itemPrice;
        $itemList->description = $itemDescription;
        $itemList->save();
        $itemId = $itemList->id;

      return Response::json(['success' => true,
        'rowId'=>$rowId, 'itemId'=> $itemId, 
        'itemName' =>$itemName, 
        'itemPrice' => $itemPrice, 
        'itemDescription' =>$itemDescription ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
       $item = itemList::find($id);
       //$inventory = Inventory::find($id);
       $inventories = Inventory::where('status', '=', 'inactive')->get(array('status','itemId'));
 	dd($inventories);
        return View::make('inventories.show')
        ->with('inventories',$inventories)
        ->with('item',$item);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
       $item = itemList::find($id);
        return View::make('inventories.edit')->with('item',$item);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	$exist = DB::table('tblitemlist')->where('itemName', '=',Input::get('itemName'))->first();  

      if($exist&&$exist->id!=$id)
      {
      return Response::json(['success' => false, 'error'=>'Name already exist','exist'=>$exist,'id'=>$id]);
      }

		$item = ItemList::find($id);
        $item->unitPrice = Input::get('unitPrice');
        $item->description = Input::get('description');
        $item->itemName = Input::get('itemName');
        
        $item->save();        
	    Session::flash('status', 'success');
		Session::flash('message', Lang::get('alerts.messages.successUpdate'));
		Session::flash('type', Lang::get('alerts.transactions.supplier'));
		
        return Response::json(['success' => true,
        'itemId'=> $id, 
        'itemName' =>Input::get('itemName'), 
        'itemPrice' => Input::get('unitPrice'), 
        'itemDescription' =>Input::get('description') ]);


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
