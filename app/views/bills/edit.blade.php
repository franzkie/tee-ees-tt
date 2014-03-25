@extends('master')

@section('sidebar_nav')
            <ul class="nav navbar-nav side-nav">
            <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="/suppliers"><i class="fa fa-bar-chart-o"></i> Suppliers</a></li>
            <li><a href="/Customer"><i class="fa fa-table"></i> Customer</a></li>
            <li><a href="/Employees"><i class="fa fa-edit"></i> Employees</a></li>
            <li><a href="/Transactions"><i class="fa fa-font"></i> Transactions</a></li>
            <li><a href="/Reports"><i class="fa fa-desktop"></i> Reports </a></li>
            <li><a href="/inventory"><i class="fa fa-wrench"></i> Inventory</a></li>
@stop

@section('content')
@include('purchase_orders.modalAddItem')
{{ Form::open(array('action' => 'Purchase_ordersController@store', 'class'=>'form-horizontal')) }}
 
<div class="container col-lg-12">
  <div class="row">
  <div class="panel panel-info">
    <div class="panel-heading">Supplier Details</div>
  
    <div class="panel-body"> 
   
      <div class="company">
          <h6>Company Name:</h6>
        {{Form::select(
          'company', $suppliers,
            ($supplier ? $supplier->company = $supplier->id : null), 
            array(
              'class' => 'form-control col-lg-12', 
              'placeholder'=>'Company Name',
              'id'=>'supplierId',
              'required'
              )
            ) }}</div>
      <br>
      <h6>Shipping Address:</h6>
      <div class="editable form-control" id="shippingAddress">
        {{$supplier ? $supplier->addressStreet.", ".$supplier->addressCity.", ".$supplier->addressProvince.", ".$supplier->addressPostalCode : null }}

      </div>

        {{ Form::hidden(
          'shippingAdd',$supplier ? $supplier->addressStreet.', '.$supplier->addressCity.', '.$supplier->addressProvince.', '.$supplier->addressPostalCode : null ,array('id'=>'sa'))
        }}

<br>
     
  
      <div class="form-group fname">
        <div class="col-lg-4">
            <h6>First Name:</h6>
          {{ Form::text('firstname',
            ($supplier ? $supplier->firstName : null)
            , array(
            'class' => 'form-control',
            'autocomplete'=>'on',
            'placeholder'=>'First Name',
            'id'=>'firstnameID'
            )) 
          }}
        </div>

        {{ Form::hidden(
          'supplierId',
          ($supplier ?  $supplier->id : null))
        }}
  
        <div class="col-xs-4">
                <h6>Middle Name:</h6>
          {{ 
            Form::text('middlename', 
            ($supplier ? $supplier->middleName : null), 
              array(
                'class' => 'form-control', 
                'placeholder'=>'Middle Name',
                'id'=>'middleNameID'
              )) }}
         </div>

         <div class="col-xs-4">
            <h6>Last Name:</h6>
              {{ Form::text('lastname',
               ($supplier ? $supplier->lastName : null),
               array(
              'class' => 'form-control', 
              'placeholder'=>'Last Name',
                'id'=>'lastNameID'
              )) }}
         </div></div>

      <div class="form-group email">

        <div class="col-xs-4">
            <h6>Email Address:</h6>
          {{ Form::text('email', 
            ($supplier ? $supplier->email : null),
            array(
            'class' => 'form-control', 
            'placeholder'=>'Email Address',
            'id'=>'emailId'
            )) 
          }}
        </div>

        <div class="col-xs-4">
            <h6>Phone Number:</h6>
        {{ Form::text('phone', 
          ($supplier ? $supplier->phone : null), 
          array(
        'class' => 'form-control', 
        'placeholder'=>'Phone Number',
          'id'=>'phoneNumberId'
        )) }}
        </div></div>

    </div>
  </div>
  </div>
</div>

<div class="container col-lg-12">
  <div class="row">
    <div class="panel panel-success">
      <div class="panel-heading">Items Details</div>
      <div class="panel-body">


        <table id="tblItemList" class="table-responsive table table-striped table-bordered table-hover">            
          <thead>
            <tr>
              <th class="col-lg-3">Product Name</th>
              <th class="col-lg-4">Description</th>
              <th class="col-lg-1">Quantity</th>
              <th class="col-lg-1">Price</th>
              <th class="col-lg-1">Subtotal</th>
              <th class="col-lg-3">Action</th>
            </tr>
          </thead>
          <tbody>
             <script type="text/javascript">
                  var my_var = <?php echo json_encode($itemList); ?>;
                </script>
           

          </tbody>
        </table>
        <div class="input-group pull-left row col-xs-2 ">

      <input type="text" id="toBeAdded" class="form-control">
      <div class="input-group-btn ">
        <button type="button" class="btnAddRow" class="btn btn-primary ">Add Row</button>
      </div>
       
    </div>
</div>
   
    

    <div class="col-xs-4 row pull-right"> <h2>Total: P<span id="total">0.00</span></h2></div>
        </div>
</div>
</div>

      <div class="panel panel-danger">
         <div class="panel-heading">PO Details</div>
         <div class="panel-body">
          <label for="notes">PO Notes</label>
           <textarea name="notes" class="form-control"></textarea>
         </div> 

      </div>
     <button type="submit" id="btnSave" class="btn btn-info" >Save</button>
      <button type="button" id="btnSaveAndSave" class="btn btn-success">Save and Send</button>
</div></form>

@stop




@section('js_script')

<script type="text/javascript">
  $(document).ready(function() {
  $("#supplierId").select2(); 
  $("select#productId.form-control.productDropdown").select2(); 
  $(".qty, .price").bind("keyup change", calculate);
  $('.editable').each(function(){this.contentEditable = true;});   
    addRow();
});

    $(document).ready(function(){ 
    $(document).on("click", ".btnRemoveRow", removeRow); 
    $(document).on("click", ".btnAddRow", addRow); 
    $(document).on("change", ".itemSearch", productDropdown); 
    $(document).on("keyup", ".select2-input", productSearch); 
  });
    $('#shippingAddress').blur(function(){
    var x = $('#shippingAddress').text();
    for(v=0;v<2;v++){
      $('#sa').val(x);
      }
   });

function modal(){
    $('#ModalAdd').modal('show');
    $('#select2-drop').toggle();                  
}

  

</script>


{{ HTML::script('js/original/supplierDropdown.js') }}
{{ HTML::script('js/select2/select2.min.js') }}
{{ HTML::script('js/original/addRemoveRowProducts.js') }}
{{ HTML::script('js/original/productDropdown.js') }}
{{ HTML::script('js/original/calculate.js') }}
{{ HTML::script('js/original/productSearch.js') }}
@stop