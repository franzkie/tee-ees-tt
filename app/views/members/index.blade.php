@extends('master')
@section('content')

@include('members.modalAdd')
<aside class="right-side">
 <div class="content"> 
<div class="col-lg-12 row">
 
  <h1>Members <small>Table</small><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalAdd">New Member</button></h1>
     

  <div>
 
      <ul class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fa fa-user"></i>Suppliers</li>
        <li class="active"><i class="fa fa-user"></i>Members</li>
      </ul>  
  </div>

  <div class="alert-success"><?php echo Session::get('msg');?></div>

  <div class="mainContent">
      	<div class="col-lg-12 row">
      <div id="memberTable">
        {{ HTML::script('js/dataTable/jquery.datatable.js') }}
        <?php echo HTML::flash(); ?>

        {{ Datatable::table()
        ->addColumn('<center><input type="checkbox" id="memberCheckALl" checked="false"/></center>','Member','Member\'s ID','Type','Actions')       // these are the column headings to be shown  
        ->setUrl('api/getMembers')   // this is the route where data will be retrieved
        ->render();
      }}
       
        </div>
      </div>
  </div>
</div>
<div id="context-menu">
    <ul class="dropdown-menu" role="menu">
    <li><a tabindex="0" href="#">Delete All Checked</a></li>
    <li><a tabindex="1" href="#">Some Other Option</a></li>
    </ul>
</div>  
</div>
</aside>

{{ HTML::style('css/members/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('css/members/style.css') }}
{{ HTML::script('js/members/moment.min.js') }}
{{ HTML::script('js/members/bday-picker.js') }}
{{ HTML::script('js/members/bootstrap-contextmenu.js') }}
{{ HTML::script('js/lib/jquery.validate.min.js') }}
{{ HTML::script('js/lib/additional-methods.min.js') }}
{{ HTML::script('js/members/custom-plugins.js') }}
{{ HTML::script('js/members/js.js') }}

@stop


