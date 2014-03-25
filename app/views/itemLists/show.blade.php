@extends('master')



@section('content')

<aside class="right-side">
<section class="content">
  
  <ol class="breadcrumb">
    <li><a href="/inventory">Inventory</a></li>
    <li><a href="/inventory/itemlists/">Item List</a></li>
    <li class="active">{{$item->itemName}}</li>
  </ol>
  
  
  <div class="panel panel-info">
    <div class="panel-heading">Item Details</div>
    <div class="panel-body">  
        <address>
          <h1 class="cn">
            <strong>{{$item->itemName}}</strong>
            <a class="btn btn-small btn-info pull-right" href="{{ URL::to('inventory/itemlists/'.$item->id .'/edit') }}">Edit Details</a>
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
</section>
</aside>



@stop


