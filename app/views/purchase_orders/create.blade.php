@extends('master')



@section('content')
@include('templates.modalAddItem')
{{ Form::open(array('action' => 'Purchase_ordersController@store', 'class'=>'form-horizontal')) }}
 <aside class="right-side">
   
   <div class="container col-lg-12">
   
   
       <ul class="breadcrumb row">
         <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <li><a href="/suppliers"><i class="fa fa-dashboard"></i>Suppliers</a></li>
         <li><a href="/suppliers/{{$supplier->id}}"><i class="fa fa-user"></i>{{" ".$supplier->company}}</a></li>
         <li class="active">Create Purchase Order</li>
       </ul>  
         
     <div class="panel panel-info">
       <div class="panel-heading">Supplier Details</div>
     
       <div class="panel-body"> 
         <div class="company col-lg-3 row">
             <h6>Company Name:</h6>
           {{Form::select(
             'company', $suppliers,
               ($supplier ? $supplier->company = $supplier->id : null), 
               array(
                 'class' => 'form-control', 
                 'placeholder'=>'Company Name',
                 'id'=>'supplierId',
                 'required'
                 )
               ) }}
         </div>
   
          <div class="form-group fname row">
           
           <h6>Supplier Name:</h6>
           <div class="col-xs-2">
             
             {{ Form::label('firstname',
               ($supplier ? $supplier->firstName : null)
               , array( 
               'class' => 'form-control',
               'autocomplete'=>'on',
               'id'=>'firstnameID'
               )) 
             }}
           </div>
   
           {{ Form::hidden(
             'supplierId',
             ($supplier ?  $supplier->id : null))
           }}
     
           <div class="col-xs-2">
             {{ 
               Form::label('middlename', 
               ($supplier ? $supplier->middleName : null), 
                 array(
                   'class' => 'form-control',
                   'id'=>'middleNameID'
                 )) }}
            </div>
   
            <div class="col-xs-2">
                 {{ Form::label('lastname',
                  ($supplier ? $supplier->lastName : null),
                  array(
                   'class' => 'form-control',
                   'id'=>'lastNameID'
                 )) }}
            </div>
   
         </div> <!-- end supplier name -->
         
         <br><br>
         <div class="col-lg-10">
         
           {{ Form::hidden(
             'shippingAdd',$supplier ? $supplier->addressStreet.', '.$supplier->addressCity.', '.$supplier->addressProvince.', '.$supplier->addressPostalCode : null ,array('id'=>'sa'))
           }}
   
         <br>
        
   
         <div class="form-group email">
   
           <div class="col-xs-4">
               <h6>Email Address:</h6>
             {{ Form::label('email', 
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
           {{ Form::label('phone', 
             ($supplier ? $supplier->phone : null), 
             array(
           'class' => 'form-control', 
           'placeholder'=>'Phone Number',
             'id'=>'phoneNumberId'
           )) }}
           </div>
           </div>
           <h6>Shipping Address:</h6>
         <div class="editable form-control" id="shippingAddress">
           {{$supplier ? $supplier->addressStreet.", ".$supplier->addressCity.", ".$supplier->addressProvince.", ".$supplier->addressPostalCode : null }}
   
         </div>
   
       </div>
       </div>
     </div>
   
   
       <div class="panel panel-success row">
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
   
                  <script type="text/javascript">
                     var my_var = <?php echo json_encode($itemList); ?>;
                   </script>
   
   
             <tbody id="tbody">
           
              
   
             </tbody>
           </table>
           <div class="input-group pull-left col-xs-2 ">
   
         <input type="text" id="toBeAdded" class="form-control">
         <div class="input-group-btn ">
           <button type="button" id="btnAddRow" class="btn btn-primary ">Add Row</button>
         </div>
          
       </div>
       <div class="pull-right col-xs-3"> <h2>Total: P<span id="total">0.00</span></h2></div>
       </div>
   
   </div>
   
   
   
         <div class="panel panel-danger row">
            <div class="panel-heading">PO Details</div>
            <div class="panel-body">
             <label for="notes">PO Notes</label>
              <textarea name="notes" class="form-control"></textarea>
            </div> 
   
         </div>
         <div class="row">
        <button type="submit" id="btnSave" class="btn btn-info" >Save</button>
         <button type="button" id="btnSaveAndSave" class="btn btn-success">Save and Send</button>
       </div>
       <br>
       <br>
   </div>
 </aside>


{{ Form::close();}}
@stop




@section('js_script')



<script type="text/javascript">

  $(document).ready(function() {
  $("#supplierId").select2(); 
  $("select#productId.form-control.productDropdown").select2(); 
  $(".qty, .price").bind("keyup change", calculate);
  $('.editable').each(function(){this.contentEditable = true;});   
    $(document).on("click", ".btnRemoveRow", removeRow); 
    $(document).on("click", "#btnAddRow", function(event){
      addRow(1);
    }); 
    $(document).on("change", ".itemSearch", productAutoFill); 
    $(document).on("keyup", ".select2-input", productSearch); 
   
  var url = window.location.pathname;
  var storageName = 'dataOn'+url;
     if(localStorage.getItem(storageName))
      {
       loadStorageData();
      }
      else{
        addRow(false);
      }

$(".qty, .price").bind("keyup change", calculate);

  });


    $('#shippingAddress').blur(function(){
    var x = $('#shippingAddress').text();
    for(v=0;v<2;v++){
      $('#sa').val(x);
      }
   });

function modal(){
    $("#modalAdd").modal();
    $('#select2-drop').toggle();                  
}


window.onbeforeunload = function(event)
    {
      storeData();
    };


$("form").submit(function()
{
  var url = window.location.pathname;
  var storageName = 'dataOn'+url;
  localStorage.removeItem(storageName);
  window.onbeforeunload = false;
  

});



</script>
{{ HTML::script('js/original/supplierDropdown.js') }}
{{ HTML::script('js/select2/select2.min.js') }}
{{ HTML::script('js/original/addRemoveRowProducts.js') }}
{{ HTML::script('js/original/productAutoFill.js') }}
{{ HTML::script('js/original/calculate.js') }}
{{ HTML::script('js/original/productSearch.js') }}
{{ HTML::script('js/original/sOptions.js') }}

@stop