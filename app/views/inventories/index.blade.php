@extends('master')

@section('content')
@include('templates.modalAddItem')


 <aside class="right-side"><section class="content">
 	
 	<div id="message-container">
	
</div>
 	

<ol class="breadcrumb">
  <li  class="active">Inventory</li>
 </ol>
 	
	<h1>Item List Page</h1>
<!-- <button class='btn btn-success pull-right btn-xs' onClick='modalReceiveItem()'>Receive Item</button>	 -->
<button class='btn btn-success pull-right btn-xs' onClick='modalAdd()'>Add New Item</button>	
  
    {{ HTML::script('js/dataTable/jquery.datatable.js') }}
    <?php echo HTML::flash(); ?>
    <form id="form">
    {{ Datatable::table()
    ->addColumn('check','id','itemList','Unit Price','Description')
    ->setClass('itemListClass')
    ->setUrl('/api/items')   // this is the route where data will be retrieved
    ->render();


  }}

  
    </form>
    </section>
    </aside>
        <div id="message-container">
    
</div>


 	
 </section>
</aside>


@stop


@section('js_script')

	<script type="text/javascript">

	function modalAdd()
	{
    	$("#modalAdd").modal();           
	}
    
    </script

@stop