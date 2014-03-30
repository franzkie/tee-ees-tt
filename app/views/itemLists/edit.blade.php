@extends('master')



@section('content')<aside class="right-side">
  <section class="content">
    
      <ol class="breadcrumb">
        <li><a href="/inventory">Inventory</a></li>
        <li><a href="/inventory/itemlists/">Item List</a></li>
        <li><a href="/inventory/itemlists/{{$item->id}}">{{$item->itemName}}</a></li>
        <li class="active">Edit</li>
      </ol>
      
                  
      <div class="row">
                <div class="col-lg-12 form-horizontal">
                  <h2>Edit Item Information</h2>
      
           
                {{ Form::model($item, array('route' => array('inventory.itemlists.update', $item->id), 'method' => 'PUT')) }}
      
                  <div class="form-group">
                    <div class="col-xs-4">
                    {{ Form::text('itemName',null, array(
                      'class' => 'form-control',
                      'id'=>'itemName',
                      'placeholder'=>'item Name', 'required'
                      )) }}
                    </div>
                 </div>                   
      
                  <div class="form-group">
                    <div class="col-xs-4">
                    {{ Form::text('unitPrice', null, array(
                    'class' => 'form-control', 
                    'placeholder'=>'Unit Price'
                    )) }}
                    </div>
                  </div>
      
      
      
      
                    <div class="form-group">
                      <div class="col-xs-12">
                        {{Form::textarea('description', null , array(
                        'class'=>'form-control'))}}
                      </div>
                    </div>
      
           
              <button type="submit" class="btn btn-success">Save</button>
              <a class="btn btn-danger " href="{{ URL::previous() }}">Back</a>
              {{ Form::close()}}
      </div>
  </section>
</aside>



@stop

@section('js_script')

	<script type="text/javascript">

	$(document).ready(function() {

		var SearchInput = $('#itemName');
var strLength= SearchInput.val().length;
SearchInput.focus();
SearchInput[0].setSelectionRange(strLength, strLength);
	});

  $("form").submit(function(e){
    var itemId = location.pathname.split("/")[3];
    console.log("submit");

     $.ajax({
      type: 'PUT',
      url: '/inventory/'+itemId,
      dataType: 'json',
      data:$('form').serialize(),
      success: function(data){
      console.log(data);
        if(data.success)
          { 


           var notify = '<div class="message alert alert-success fade in">'+
                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>'+
                '<h5><b>'+data.itemName+'</b> was successfully updated!</h5></div>';


          $("#message-container").append(notify);       
          $(".message").fadeTo(15000,0, function() {$(this).hide()});

            $('.message').hover(function(){
                  $(this).stop().show().fadeTo(100,1);
                  },
                  function() {
                $(this).stop().fadeTo(10000,0, function() {$(this).hide()});
                  });
          }
        else{
          var itemName = $("#itemName").val();
          var notify = '<div class="message alert alert-danger fade in">'+
                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>'+
                '<h5>the Name <b>'+itemName+'</b> is already taken!</h5></div>';


          $("#message-container").append(notify);       
          $(".message").fadeTo(15000,0, function() {$(this).hide()});

            $('.message').hover(function(){
                  $(this).stop().show().fadeTo(100,1);
                  },
                  function() {
                $(this).stop().fadeTo(10000,0, function() {$(this).hide()});
                  });

        }  

        }
  });



    return false;
  });

	</script>

@stop