<?php

class ApiController extends BaseController {

 public function getProducts()
    {
	   $input = Input::get('q');
	   return ItemList::where('itemName', 'like', '%'.$input.'%')->get(array('itemName','id'));
    }

 public function getPoContent()
    {
     $input = Input::get('poId');

     $items = DB::table('tblPoContent')
        ->join('tblItemList', 'tblPoContent.itemId', '=', 'tblItemList.id')
        ->where('tblPoContent.PoNumber',$input)
        ->orderBy('tblPoContent.poNumber', 'asc')
        ->get(array('tblpocontent.itemId',
          'tblItemList.itemName',
          'tblPoContent.quantity',
          'tblItemList.description',
          'tblPoContent.itemPrice',
          'tblPoContent.id as poContentId',
          'tblPoContent.poNumber'));
        
     return Response::json($items);
    }

    
  public function getSuppliers()
    {
    	$suppliers = DB::table('tblSupplier');
    	return Datatable::query($suppliers)
    	->addColumn('Name',function($model)
        {
          $html = '<a href="/suppliers/'.$model->id.'"/>'.$model->company.'</a>';
        	return $html;
        })

        ->addColumn('actions',function($model)
        {
          $html = '	<div class="btn-group">
  					<button type="button" class="btn btn-success">Select Action</button>
  					<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
    				<span class="caret"></span>
    				<span class="sr-only">Toggle Dropdown</span>
  					</button>
  					<ul class="dropdown-menu" role="menu">
					  <li><a href="/bills/create/'.$model->id.'">Create Bill</a></li>
					  <li><a href="/purchase_orders/create/'.$model->id.'">Create Purchase Order</a></li>
					  <li class="divider"></li>
					  <li><a href="/suppliers/'.$model->id.'/edit">Edit Details</a></li>
					  <li><a href="/suppliers/delete/'.$model->id.'">Delete</a></li>
  					</ul></div>';
        	return $html;
        })
        ->searchColumns(array('company','firstName'))
        ->orderColumns('id','firstName')
        ->make();
    }
    

  public function postAddToItemList()
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



    public function sendUpdates(){
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache'); // recommended to prevent caching of event data.

    /**
    * Constructs the SSE data format and flushes that data to the client.
    *
    * @param string $id Timestamp/id of this connection.
    * @param string $msg Line of text that should be transmitted.
    */
    function sendMsg($id, $msg) {
    echo "id: $id" . PHP_EOL;
    echo "data: $msg" . PHP_EOL;
    echo PHP_EOL;
    ob_flush();
    flush();    }
    $serverTime = time();
    sendMsg($serverTime, 'server time: ' . date("h:i:s", time()));

    }

    public function getItemList()
    {
      $itemList = DB::table('tblItemList');
      return Datatable::query($itemList)
        ->addColumn('check',function($model){
          $html  = "<input type='checkbox' value='".$model->id."'>";

            return $html;
        })

         ->addColumn('id',function($model){
            return $model->id;
        })
        ->addColumn('itemName',function($model){

            $html = '<a href="/inventory/'.$model->id.'">'.$model->itemName.'</a>';
            return $html;
        })
        ->addColumn('unitPrice',function($model){
            return $model->unitPrice;
        })
        ->addColumn('description',function($model){
            return $model->description;
        })


        ->searchColumns(array('itemName'))
        ->orderColumns('id','itemName')
        ->make();

    }



     public function getUsers()
    {
      $users = DB::table('users')->where('deleted_at', '=', null);
      return Datatable::query($users)
      ->addColumn('username',function($model)
        {
          $html = '<a href="manageusers/'.$model->id.'"/>'.$model->username.'</a>';
          return $html;

          //return $model->username;
        })

      ->addColumn('email',function($model)
        {
          
          return $model->email;
        })

      ->addColumn('userType',function($model)
        {
          
          return $model->userType;
        })


     

        ->addColumn('actions',function($model)
        {
          $html = ' <div class="btn-group">
            <button type="button" class="btn btn-success">Select Action</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="/bills/create/'.$model->id.'">Create Bill</a></li>
            <li><a href="/purchase_orders/create/'.$model->id.'">Create Purchase Order</a></li>
            <li class="divider"></li>
            <li><a href="/suppliers/'.$model->id.'/edit">Edit Details</a></li>
            <li><a href="/suppliers/delete/'.$model->id.'">Delete</a></li>
            </ul></div>';
          return $html;
        })

        ->searchColumns(array('username','firstName'))
        ->orderColumns('username','email')
        ->make();
    }


    public function getUserOption($field)
    {
      if($field == 'usertype'){
      return Response::json(
        ['success' => true,
        'option'=>['superAdmin','cashier']
        ]); }

      if($field == 'gender'){
        return Response::json(
        ['success' => true,
        'option'=>['male','female']
        ]); 
      }

      
    }
    

}
