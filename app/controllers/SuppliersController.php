<?php

class SuppliersController extends BaseController {


	public function index()
	{
		
		$suppliers = Supplier::paginate(20);
        return View::make('suppliers.index')
        ->with('suppliers', $suppliers);
        //->with('supplierspg',Supplier::supplierstbl());
	}


	public function store()
	{
		//validate

		$new_supplier = Supplier::create(array(
			'firstName'=>Input::get('firstName'),
			'middleName'=>Input::get('middleName'),
			'lastName'=>Input::get('lastName'),
			'company'=>Input::get('company'),
			'email'=>Input::get('email'),
			'phone'=>Input::get('phone'),
			'addressStreet'=>Input::get('addressStreet'),
			'addressCity'=>Input::get('addressCity'),
			'addressProvince'=>Input::get('addressProvince'),
			'addressPostalCode'=>Input::get('addressPostalcode'),
			'notes'=>Input::get('notes')
			));

		if ( $new_supplier ) {
			return Redirect::action('SuppliersController@index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$supplier = Supplier::find($id);
		$purchaseOrders = Supplier::find($id)->purchaseOrders;
		// $purchaseOrders->orderBy("updated_at","desc");
		// echo "<pre>";
		// dd($purchaseOrders);

		return View::make('suppliers.show')
		->with('supplier', $supplier)
		->with('purchaseOrders', $purchaseOrders);

	}


	public function edit($id)
	{

		$supplier = Supplier::find($id);			
		return View::make('suppliers.edit')->with('supplier',$supplier)
			->with('success', 'Purchase Order Created Successfully.');
       
	}


	


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{



		$supplier = Supplier::find($id);
        $supplier->firstName = Input::get('firstName');
        $supplier->middleName = Input::get('middleName');
        $supplier->lastName = Input::get('lastName');
        $supplier->company = Input::get('company');
        $supplier->phone = Input::get('phone');
        $supplier->addressStreet = Input::get('addressStreet');
        $supplier->addressCity = Input::get('addressCity');
        $supplier->addressProvince = Input::get('addressProvince');
        $supplier->addressPostalCode = Input::get('addressPostalCode');
        $supplier->notes = Input::get('notes');
        $supplier->save();
                
	    Session::flash('status', 'success');
		Session::flash('message', Lang::get('alerts.messages.successUpdate'));
		Session::flash('type', Lang::get('alerts.transactions.supplier'));
		
        return Redirect::route('suppliers.show', $supplier->id);
	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$po = DB::table('tblpurchaseorder')->where('supplierId', '=', $id)->get(array('shippingAddress'));
		if($po){
			echo "You cannot Delete this supplier!!!! come back next week! ";
			die();
		}
		else{	 
		$supplier = Supplier::find($id);
		$supplierName = $supplier->id;
		$supplier->delete();
		Session::flash('status', 'danger');
		Session::flash('message', Lang::get('alerts.messages.successDelete'));
		Session::flash('type', Lang::get('alerts.transactions.supplier'));
		Session::flash('id', 'number '.$supplierName);
		return Redirect::action('SuppliersController@index');
		}
	}
}
