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
          </ul>
@stop



@section('content')
@include('templates.modalAddItem')

  {{ Form::open(array(
    'action' => array('Purchase_ordersController@update', $poNumber),
    'method'=>'put',
    'class'=>'form-horizontal')
     )
  }}
  

 <aside class="right-side">
    <section class="content">
       
               <div class="box box-info">
               <div class="box-header"><h3 class="box-title">Supplier Details</h3></div>
               <div class="box-body"> 
         <div class="form-group">
           <div class="col-xs-3">
           {{Form::select('company', $suppliers ,($supplier ? $supplier->company = $supplier->id : null),array('class' => 'form-control','placeholder'=>'Company Name','id'=>'supplierId', 'required'=>'true')) }}
           </div>
         </div> 
         
         
                     <div class="form-group">
                       <div class="col-xs-4">
                       {{ Form::label('firstname',
                         ( $supplier ? $supplier->firstName : null)
                         , array(
                         'class' => 'form-control',
                         'autocomplete'=>'on',
                         'placeholder'=>'First Name',
                         'id'=>'firstnameID'
                         )) }}
                       </div>
         
                       {{
                         Form::hidden('supplierId',
                         ($supplier ?  $supplier->id : null))
                       }}
         
                       <div class="col-xs-4">
                       {{ Form::label('middlename', 
                         ($supplier ? $supplier->middleName : null), 
                       array(
                         'class' => 'form-control', 
                         'placeholder'=>'Middle Name',
                         'id'=>'middleNameID'
                       )) }}
                       </div>
         
                       <div class="col-xs-4">
                       {{ Form::label('lastname',
                        ($supplier ? $supplier->lastName : null),
                        array(
                       'class' => 'form-control', 
                       'placeholder'=>'Last Name',
                         'id'=>'lastNameID'
                       )) }}
                       </div>
                     </div>
         
                 
         
                     <div class="form-group">
                       <div class="col-xs-4">
                       {{ Form::label('email', 
                         ($supplier ? $supplier->email : null),
                         array(
                         'class' => 'form-control', 
                         'placeholder'=>'Email Address',
                         'id'=>'emailId'
                         )) }}
                       </div>
         
                       <div class="col-xs-4">
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
                {{$supplier ? $shippingAddress : null}}
               </div>
         
                {{ Form::hidden(
                   'shippingAdd',$shippingAddress ? $shippingAddress : null ,array('id'=>'sa'))
                 }}
         
               </div>
           </div>
         
         
         <div class="box box-success col-lg-12">
         
           <div class="box-header"><h3 class="box-title">Items Details</h3></div>
             <div class="box-body">
                 <table id="tblItemList" class="table-responsive table table-striped table-bordered table-hover col-lg-12">            
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
         <?php $count = 0; ?>
         
          <script type="text/javascript">
                     var my_var = <?php  $total =0; echo json_encode($itemList); ?>;
                     </script>
         
                       @foreach ($items as $item) 
                     <tr>
                       <td>
                      <input id='itemName{{$count}}' name='product[{{$count}}][name]' class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' value="{{$item->itemName}}" /> 
                       <input class="rowId" type="hidden" value="{{$count}}">
                       <input type="hidden" name="product[{{$count}}][itemId]" value="{{$item->itemId}}" id="itemId">
                                   </td>
         
                       <td>
                       <textarea name='product[{{$count}}][description]' class="form-control description" rows="1" readonly>{{$item->description}}
                       </textarea>
                       
         
                       </td>
                       <td>
         <input type='number' step="any"  min="1" max="9999" name='product[{{$count}}][quantity]' class="form-control qty" value="{{$item->quantity}}" required>
         
         <input type="hidden" name='product[{{$count}}][poContentId]' value="{{$item->poContentId}}" id="poItemId">
            </td>
         <td><input type='number' step="any"  min="0.5" max="9999"   name='product[{{$count}}][price]' class="form-control price" value="{{$item->itemPrice}}" required/></td>
         <td class="subtotal">
                             <center><h3><?php
                              $st = $item->itemPrice*$item->quantity; 
                                  $total += $st;
         
                              echo number_format($st, 2, '.', ',');     ?></h3></center>
                             </td>
                              <td class='actions'>
                             <a href="#" class="btnRemoveRow btn btn-danger">x</a>
         <input type="hidden" name='product[{{$count}}][delete]' class="hidden-deleted-id">
                             </td>
         
                         </tr>
                         <?php $count += 1; ?>
                       @endforeach
                     </tbody>
                 </table>
                 <div class="input-group pull-left col-xs-2 ">
         
               <input type="text" id="toBeAdded" class="form-control">
               <div class="input-group-btn ">
                 <button type="button" id="btnAddRow" class="btn btn-primary ">Add Row</button>
               </div>
                
             </div>
         
             <div class="col-xs-4 row pull-right"> <h2>Total: P<span id="total"><?php 
             $total = number_format($total, 2, '.', ',');
             echo $total; ?></span></h2></div>
         
             </div>
         
           
               <br>
          
         
         
               </div>
         
         
              <div class="box box-danger col-lg-12 ">
                  <div class="box-header">PO Details</div>
                  <div class="box-body notes">
                   <label for="notes">PO Notes</label>
                    <textarea name="notes" class="form-control"></textarea>
         
                    <ul id="edit" contenteditable="true">
                      <li>Edit here</li>
                      <li>New Item</li>
                    </ul>
         
         
               <div class="notes-time"></div>
                  </div> 
               </div>
                 <button type="submit" id="btnUpdate" class="btn btn-info" name ="submit" value="update" >Update</button>
         
                 <button type="submit" id="btnPrint" class="btn btn-success" name="submit" value="Print">Update and Print</button>
                 <br>
             <br>
             </div>
         
         </form>
    </section>
 </aside>


@stop




@section('js_script')

<script type="text/javascript">

        $('a#add.btn').click(function() {
          console.log("asd");
           $('#ModalAdd').modal('show');
           $('#select2-drop').toggle();
  }); 

        $("#toBeAdded").bind("keydown",function(e){
  var code = e.keyCode || e.which;
  if(code == 13) { 
      addRow();
      e.preventDefault();
      return false;
  }
});

  $(document).ready(function() { 
 

    $("#supplierId").select2(); 
    $("select#productId.form-control.productDropdown").select2(); 
    $(".qty, .price").bind("keyup change", calculate);
    $('.editable').each(function(){
    this.contentEditable = true;
    });
 
   var url = window.location.pathname;
  var storageName = 'dataOn'+url;
     if(localStorage.getItem(storageName))
      {
       loadStorageData();
      }
    else{    
      var x = <?php echo $count; ?>-1;
      for(z=0;z<=x; x--){
        var rowId = "#itemName"+x; 
        console.log(x);
        $(rowId).select2(sOptions);
      }
    }


 
    $(".qty, .price").bind("keyup change", calculate);


    $(document).on("click", ".btnRemoveRow", removeRow); 
    $(document).on("click", "#btnAddRow", addRow); 
    $(document).on("change", ".itemSearch", productAutoFill);
    });




  $('#shippingAddress').blur(function()
    {
      var x = $('#shippingAddress').text();
      $('#sa').val(x);
    });

function modal(){

    $("#modalAdd").modal();
              
}

  window.onbeforeunload = function(event)
    {
    storeData();
    console.log("cookie saved!");
    };




$("form").submit(function()
{
  var url = window.location.pathname;
  var storageName = 'dataOn'+url;
  // alert(storageName);
 // localStorage.clear();
  localStorage.removeItem(storageName);
  //localStorage.removeItem(storageName);
  window.onbeforeunload = false;
  

});



if(typeof(EventSource)!=="undefined")
  {
  var source=new EventSource("/api/getUpdates");
  source.onmessage=function(event)
    {
    $(".notes-time").html(event.data);
    };
  }
else
  {
  $(".notes-time").html="Sorry, your browser does not support server-sent events...";
  }



</script>

{{ HTML::script('js/original/supplierDropdown.js') }}
{{ HTML::script('js/select2/select2.min.js') }}
{{ HTML::script('js/original/calculate.js') }}
{{ HTML::script('js/original/addRemoveRowProducts.js') }}
{{ HTML::script('js/original/productAutoFill.js') }}
{{ HTML::script('js/original/POprint.js') }}
{{ HTML::script('js/original/sOptions.js') }}


@stop
