@extends('master')



@section('content')

<aside class="right-side">
      
<!-- <div class="row"> -->
        
            <section class="content-header">
            <h1>
                Supplier Information
              <small>Edit</small>
            </h1>
               <ol class="breadcrumb">
                <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="/suppliers"><i class="ion-android-social"></i>Suppliers</a></li>
                <li class="active">Edit</li>
              </ol>
            </section>
            <div class="col-lg-12 form-horizontal ">
          <div class="box box-info">    
          <div class="box-body">

     
         {{ Form::model($supplier, array('method' => 'put','route' => array('suppliers.update', $supplier->id))) }}

            <div class="form-group">
              <div class="col-xs-4">
              {{ Form::text('firstName',null, array(
                'class' => 'form-control', 
                'placeholder'=>'First Name', 'required'
                )) }}
              </div>

              <div class="col-xs-4">
              {{ Form::text('middleName', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Middle Name', 'required'
              )) }}
              </div>

              <div class="col-xs-4">
              {{ Form::text('lastName', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Last Name', 'required'
              )) }}
              </div>
            </div>

            <div class="form-group">
              
              <div class="col-xs-12">
              {{ Form::text('company',null, array(
              'class' => 'form-control', 
              'placeholder'=>'Company Name', 'required'
              )) }}
              </div>

            </div>

            <div class="form-group">
              <div class="col-xs-4">
              {{ Form::email('email',null, array(
                'class' => 'form-control', 
                'placeholder'=>'Email Address', 'required'
                )) }}
              </div>

              <div class="col-xs-4">
              {{ Form::text('phone', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Phone Number'
              )) }}
              </div>

            </div>


            <div class="form-group">
              <div class="col-xs-3">
              {{ Form::text('addressStreet', null, array(
                'class' => 'form-control', 
                'placeholder'=>'Street'
                )) }}
              </div>

              <div class="col-xs-4">
              {{ Form::text('addressCity', null, array(
              'class' => 'form-control', 
              'placeholder'=>'City/Municipality'
              )) }}
              </div>

            <div class="col-xs-3">
              {{ Form::text('addressProvince', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Province'
              )) }}
              </div>
            
               <div class="col-xs-2">
              {{ Form::text('addressPostalCode', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Postal Code'
              )) }}
              </div>
            </div>

              <div class="form-group">
                <div class="col-xs-12">
                  {{Form::textarea('notes', null , array(
                  'class'=>'form-control'))}}
                </div>
              </div>

     
        <button type="submit" class="btn btn-success">Save</button>
         <a href="{{ URL::route('suppliers.index') }}" class="btn btn-danger">Cancel</a>
        {{ Form::close() }}
        </div>  
</div>
</div>
<!-- </div>   -->
</aside>

@stop

@section('scripts')

@stop