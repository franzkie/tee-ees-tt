@extends('master')

@section('content')
<aside class="right-side">

<div class="col-lg-12 row">
  <div id="supplierTable" class="col-lg-12">
 

    {{ HTML::script('js/dataTable/jquery.datatable.js') }}
    <?php echo HTML::flash(); ?>

    {{ Datatable::table()
    ->addColumn('Username','email','User Type','actions')       // these are the column headings to be shown  
    ->setUrl('api/getusers')   // this is the route where data will be retrieved
    ->render();
  }}

  
   

    </div>
  </div>

</aside>
@stop