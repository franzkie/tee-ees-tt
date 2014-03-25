@extends('master')



@section('content')
@include('templates.modalAddItem')
<aside class="right-side">
<section class="content">
<ol class="breadcrumb">
  <li><a href="/inventory">Inventory</a></li>
  <li class="active">Item List</li>
</ol>

<h1>Item List Page</h1>

<button class='btn btn-success pull-right btn-xs' onClick='modal()'>Add New Item</button>	
  
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
@stop


@section('js_script')

	<script type="text/javascript">

	function modal(){
    $("#modalAdd").modal();


$(document).ready(function() {

 $('#form').submit( function() {
        var sData = $('input', oTable.fnGetNodes()).serialize();
        alert( "The following data would have been submitted to the server: \n\n"+sData );
        return false;
    } );
    
  
    
 
} );

                
}


	</script>

@stop