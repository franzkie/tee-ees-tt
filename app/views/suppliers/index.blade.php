@extends('master')
@section('content')
@include('suppliers.modalAdd')
<aside class="right-side">
                <!-- Content Header (Page header) -->

<!-- <div class="col-lg-12 row"> -->
     <section class="content-header">
      <h1>
          Suppliers
        <small>Table</small>
      </h1>
         <ol class="breadcrumb">
          <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li class="active"><i class="fa fa-user"></i>Suppliers</li>
        </ol>
     </section>
  
  <div class="col-lg-12">
    <div class="btn-group btn-group-justified">
      <div class="btn-group btn-group-lg">
        <button type="button" class="btn btn-info">Purchase Orders <span class="badge pull-right">1 Open</span></button>
      </div>
      <div class="btn-group btn-group-lg">
        <button type="button" class="btn btn-warning">Bills <span class="badge pull-right">3 Open</span></button>
      </div>
      <div class="btn-group btn-group-lg">
        <button type="button" class="btn btn-success">Paid Bills <span class="badge pull-right">14 paid last 30 days</span> </button>
      </div>
    </div>
    <hr>
  </div>  


<div class="col-lg-12 row">
  <div id="supplierTable" class="col-lg-12">
  <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalAdd">New Supplier</button>
    {{ HTML::script('js/dataTable/jquery.datatable.js') }}
    <?php echo HTML::flash(); ?>

    {{ Datatable::table()
    ->addColumn('Company','Actions')       // these are the column headings to be shown  
    ->setUrl('api/searchSupplier')   // this is the route where data will be retrieved
    ->render();
  }}
   
    </div>
  </div>
</aside><!-- /.right-side -->       
          

@section('js_script')


<script type="text/javascript">
  $(document).ready(function() {
  $("#supplierTable table").addClass("table-striped table-hover table-responsive");
  $("input#searchSupplier").bind("keyup change", search);
  
});

</script>


{{ HTML::script('js/original/supplierSearch.js') }}

@stop

@stop
