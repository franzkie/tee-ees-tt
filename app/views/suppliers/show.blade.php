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

<?php if (Session::has('pdf'))
{
   echo Session::get('pdf');
}

?>
<aside class="right-side">


<section class="content-header">
       <h1>
           Supplier 
           <small>Details</small>
       </h1>
      <ol class="breadcrumb">
                <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="/suppliers"><i class="ion-android-social"></i>Suppliers</a></li>
                <li class="active"><i class="fa fa-user"></i>{{" ".$supplier->company}}</li>
    </ol>
</section>
<div class="container col-lg-12">
<?php echo HTML::flash(); ?>


<div class="box box-info">
  <!-- <div class="box-header"><h3 class="box-title"> Supplier Details</h3></div> -->
  <div class="box-body">  
      <address>
        <h1 class="cn">
          <strong>{{$supplier->company}}</strong>
          <a class="btn btn-small btn-info pull-right" href="{{ URL::to('suppliers/'.$supplier->id .'/edit') }}">Edit Details</a>
        </h1>
        {{$supplier->addressStreet}}, {{$supplier->addressCity}}<br>
        {{$supplier->addressProvince}}, {{$supplier->addressPostalCode}}<br>
        <abbr title="Phone">P:</abbr> {{$supplier->phone}}
        <br>
        <a href="mailto:#">{{$supplier->email}}</a>
        <br>
        {{$supplier->notes}}
      </address>
    </div>
</div>
<br> 


<div class="box box-success">
  <div class="box-header"><h3 class="box-title"> Purchase Orders</h3></div>

  <div class="box-body">  
    @if ($purchaseOrders)

    <table class="table-responsive table table-striped table-bordered tablesorter table-hover col-lg-12">
      <thead>
        <tr>
          <td class="col-lg-2">Date created</td>
          <td>No.</td>
          <td>Status</td>
          <td>Message</td>
        </tr>
      </thead>
      <tbody>
      @foreach ($purchaseOrders as $p)
      <a href="/purchase_order/">
        <tr id='link1' onclick="document.location='{{ URL::to('suppliers/'.$supplier->id.'/purchase_orders/'.$p->id)}}'"  style="cursor:pointer;">
          <td>{{ $p->created_at }}</td>
          <td>{{ $p->id }}</td>
          <td>{{ $p->status }}</td>
          <td>{{ $p->message }}</td>
        </tr>
      </a>   
      @endforeach
      </tbody>
    </table>
    @endif
  
  <!-- <div class="box-footer clearfix"> -->
    <a class="btn btn-small btn-success" href="{{ URL::to('purchase_orders/create/' . $supplier->id ) }}">Create Purchase order</a>
  <!-- </div> -->
  </div>
</div>
</div>
</aside>
@stop


