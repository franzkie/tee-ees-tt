<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ModalLabel">Add Supplier</h4>
      </div>
      <div class="modal-body">
         {{ Form::open(array('url' => '/suppliers', 'class'=>'form-horizontal', 'autocomplete'=>'on')) }}
        
            <div class="form-group">
              <div class="col-xs-4">
              {{ Form::text('firstName', null, array(
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
              {{ Form::text('company', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Company Name', 'required'
              )) }}
              </div>

            </div>

            <div class="form-group">
              <div class="col-xs-4">
              {{ Form::email('email', null, array(
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
              {{ Form::text('addressPostalcode', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Postal Code'
              )) }}
              </div>
            </div>

              <div class="form-group">
                <div class="col-xs-12">
                  {{Form::textarea('notes', null, array(
                  'class'=>'form-control'))}}
                </div>
              </div>

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Add Supplier</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

