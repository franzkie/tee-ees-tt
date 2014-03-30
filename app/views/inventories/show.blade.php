@extends('master')



@section('content')

<aside class="right-side">
<section class="content">
  
  <ol class="breadcrumb">
    <li><a href="/inventory">Inventory</a></li>
    <li class="active">{{$item->itemName}}</li>
  </ol>
  
  
  <div class="panel panel-info">
    <div class="panel-heading">Item Details</div>
    <div class="panel-body">  
        <address>
          <h1 class="cn">
            <strong>{{$item->itemName}}</strong>
            <a class="btn btn-small btn-info pull-right" href="{{ URL::to('inventory/'.$item->id .'/edit') }}">Edit Details</a>
          </h1>
          
          <abbr title="Phone">ID:</abbr> {{$item->id}}
          <br>
          <abbr title="unitPrice">Unit Price:</abbr> {{$item->unitPrice}}
          <br>
          <b><label>Description: </label></b>
          <label id="description">{{$item->description}}</label>
        </address>
      </div>
  </div>

     <div class="box box-danger">
      <div class="box-header"><h1 class='box-title'>Item Inventory Information</h1></div>
      <div class="box-body">
       <div class="row">      
           <div class="col-sm-12">
              <table style="clear: both" class="table table-bordered table-striped" id="user">
                        <tbody> 
                          
                            <tr>         
                                <td>Item Status</td>
                                <td class="col-sm-12">
                                 @foreach ($inventories as $inventory) 
                                 {{$inventory->id}} 
                                 {{$inventory->itemId}}
                                 {{$inventory->status}}

                                 @endforeach
                               
                                  <div class="col-xs-1"></div>  
                                  
                            </tr> 


                            

                        </tbody>
                    </table>

           </div>
       </div>

          
        </div>

      </div>
  </div>
</section>
</aside>



@stop


