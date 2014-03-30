<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(["before" => "guest"], function()
{
	Route::any("/", [
        "as"   => "user/login",
        "uses" => "UserController@login"
    ]);
	Route::get( 'login','UserController@login');

	Route::get('/about', function()
	{
		return View::make('home/about');
	});

	Route::get('/services', function()
	{
		return View::make('home/services');
	});
	Route::get('/contact', function()
	{
		return View::make('home/contact');
	});


});



Route::group(["before" => "auth"], function()
{
	
	Route::get('api/supplierDropdown', function(){
    $input = Input::get('option');
	$supllier = Supplier::find($input);
	return Response::json($supllier->select(array('id',
		'firstName',
		'lastName',
		'middleName',
		'phone',
		'email',
		'addressStreet',
		'addressCity',
		'addressProvince',
		'addressPostalCode'
		))->find($input));
	});

	Route::get('api/productSearch',array('as' => 'api.productSearch', 'uses' => 'ApiController@getProducts'));
	Route::get('api/getPoContent',array('as' => 'api.getPoContent', 'uses' => 'ApiController@getPoContent'));
	Route::get('api/searchSupplier',array('as' => 'api.searchSupplier', 'uses' => 'ApiController@getSuppliers'));
	Route::get('/api/items',array('as' => 'api.items', 'uses' => 'ApiController@getItemList'));
	Route::get('humanresource/api/getusers',array('as' => 'api.getusers', 'uses' => 'ApiController@getUsers'));
	Route::get('/api/getUserOption/{field}',array('as' => 'api.getUserOption', 'uses' => 'ApiController@getUserOption'));
			



	Route::post('itemlist/create', array('as' => 'itemlist.create','before' => 'csrf', 'uses' => 'ApiController@postAddToItemList'));



	Route::get('api/productAutoFill', function(){
	    $input = Input::get('option');
		$item = ItemList::find($input);
		return Response::json($item->select(array('id',
			'itemName',
			'description',
			'unitPrice'
			))->find($input));
	});


	Route::get('/dashboard', function()
	{
		return View::make('user/dashboard');
	});

	

	Route::resource('suppliers', 'SuppliersController');
	Route::get('suppliers/delete/{id}', array('as' => 'suppliers.delete', 'uses' => 'SuppliersController@destroy'));
	Route::resource('customers', 'CustomersController');

	Route::resource('employees', 'EmployeesController');

	Route::resource('purchase_orders', 'Purchase_ordersController');


	Route::get('purchase_orders/create/{id}', 'Purchase_ordersController@create');
	Route::get('suppliers/{sid}/purchase_orders/{pid}', 'Purchase_ordersController@show');

	Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
	Route::post('user/reset_password',         'UserController@do_reset_password');
	Route::get( 'user/logout',                 'UserController@logout');
	//PDF Routes
	// Route::resource('pdf', 'PdfController@poPdf');

	Route::get('purchase_order/{id}/pdf', 'PdfController@poPdf');

	Route::resource('bills', 'BillsController');
	Route::get('bills/create/{id}', 'BillsController@create');
	Route::resource('inventory/itemlists', 'ItemlistsController');
	Route::resource('inventory', 'InventoriesController');
	Route::get('humanresource','HumanResource@dashboard');

Route::get('humanresource/manageusers','UserController@index');
Route::get('humanresource/manageusers/{id}','UserController@show');

Route::post('humanresource/manageusers/{id}','UserController@update');
Route::post('humanresource/manageusers/{id}/delete','UserController@delete');

	

	//Route::resource('suppliers/print', 'SuppliersController@suppliersPdf');

/*member routes*/
Route::resource('members', 'MembersController');
Route::post('members/create', 'MembersController@create');
Route::post('members/update/{id}', 'MembersController@update');
Route::get('members/delete/{id}', 'MembersController@destroy');
Route::get('api/loadData/{num}/{any}', 'ApiController@loadData');
Route::get('api/toPdf', 'ApiController@toPdf');
Route::post('members/membersPrintList', 'ApiController@getMembersForPrint');
Route::post('api/membersPrintList', 'ApiController@getMembers');
Route::get('members/activity/{id}', 'MembersController@changeActivity');
Route::post('members/deleteChecked', 'MembersController@deleteAllChecked');



Route::get('api/getMembers',array('as' => 'api.getMembers', 'uses' => 'ApiController@getMembers'));

//test dummy
Route::get('api/sampleJoin', 'ApiController@sampleJoin');
Route::get('members/failIt', 'MembersController@failing');
Route::get('pos', 'PosController@index');
Route::get('posApi', 'PosApiController@get_items');


Route::get('pos/posData2', function() {
	//echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));die();
	//echo mktime(9, 7, 5, 3, 22, 2014);die();
       $arr = PosDummy::all()->toArray();

return Response::json($arr);
});


}); //before auth routs end

//march 2 14
Route::get('api/getIfEmployed', 'ApiController@getIfEmployed');
Route::get('api/getIfBusiness', 'ApiController@getIfBusiness');

//,arch 20 14
/*Route::group(["before" => "auth"], function()
{

})*/



// Confide routes
Route::get( 'user/create',                 'UserController@create');
Route::post('user/create',                        'UserController@store');
//Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/confirm/{code}',         'UserController@confirm');



Route::get( 'api/getUpdates',                 'ApiController@sendUpdates');

// Route::get( 'pdf', 'PdfController@getSample' );

Route::get( 'test/pdf',                 'TestController@pdf');


Route::get('test/jspdf/{num}','TestController@jspdf');


