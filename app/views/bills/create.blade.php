@extends('master')


@section('content')
<div class="container col-lg-12">
	<div class="row">
		<div class="panel panel-success">
		<div class="panel-heading">Supplier Detail</div>
		 <div class="panel-body"> {{$supplier->firstName}}</div>
		</div>	
	</div>
	
	<div class="row">
		<div class="panel panel-success">
		<div class="panel-heading">Purchase Order list</div>
		 <div class="panel-body"> 
			<ul>
			@foreach ($purchaseOrders as $purchaseOrder) 
	
			<li>{{$purchaseOrder->id}} <button class="addPoButton" value="{{$purchaseOrder->id}}"> add PO</button></li>
			@endforeach
			</ul>
		 </div>
		</div>	
	</div>

  <div class="row">
    <div class="panel panel-success">
      <div class="panel-heading">Items Details</div>
      <div class="panel-body">
<div class="container bg-danger">        
<p class="bs-callout bs-callout-danger">hello</p>
</div>
        <table id="tblItemList" class="table-responsive table table-striped table-bordered table-hover">            
          <thead>
            <tr>
              <th class="col-lg-3">Product Name</th>
              
              <th class="col-lg-2">Received Quantity</th>
              <th class="col-lg-2">Expected Quantity</th>
              <th class="col-lg-1">Price</th>
              <th class="col-lg-1">Subtotal</th>
              <th class="col-lg-1">PO No.</th>
              <th class="col-lg-3">Action</th>
            </tr>
          </thead>
          <tbody>
          
          </tbody>
        </table>
        <div class="input-group pull-left row col-xs-2 ">

      <input type="text" id="toBeAdded" class="form-control">
      <div class="input-group-btn ">
        <button type="button" id="btnAddRow" class="btn btn-primary ">Add Row</button>
      </div>
       
    </div>
</div>
   
    

    <div class="col-xs-4 row pull-right"> <h2>Total: P<span id="total">0.00</span></h2></div>
        </div>
</div>
</div>


@stop



@section('js_script')
<script>
	$(document).ready(function(){ 
    $(".rQty, .price").bind("keyup change", calculate);
	addRow();
	$(document).on("click", ".btnRemoveRow", removeRow);
	$(document).on("click", ".addPoButton", addPoToBill);  
  $(document).on("click", ".removePoButton", removePoToBill);  
  $(document).on("change", ".itemSearch", productAutoFill); 
  $(document).on("click", "#btnAddRow", addRow); 
  $(document).on("keyup change", ".rQty, .price", calculate);
  $("#suppliers").addClass("active");

  });

</script>
{{ HTML::script('js/select2/select2.min.js') }}
{{ HTML::script('js/original/productAutoFill.js') }}
{{ HTML::script('js/original/bills/addRemoveRowBills.js') }}
{{ HTML::script('js/original/bills/addPoToBill.js') }}
{{ HTML::script('js/original/bills/calculateBills.js') }}
@stop