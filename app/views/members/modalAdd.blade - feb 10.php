<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ModalLabel">Add Member</h4>
      </div>
      <div class="modal-body">    
      <div class="modal-msg"></div>
         {{ Form::open(array('url' => '/members/create', 'class'=>'member-create-submit form-horizontal', 'autocomplete'=>'on')) }}
      
            <div class="form-group">
              <div class="col-xs-4">
                {{Form::label('members-id','Members ID',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">{{ Form::text('membersID', null, array(
                  'id' => 'members-id', 
                  'class' => 'form-control', 
                  'placeholder'=>'Member\'s ID', 'required'
                  )) }}
                </div>
              </div>
              <div class="col-xs-8">
                {{Form::label('none','Member Type',array('class'=>'col-sm-2 control-label'))}}
                {{Form::label('mtregular','Regular',array('class'=>'radio inline col-sm-2 control-label'))}}
                <div class="col-sm-1 radio">{{ Form::radio('memberType', 'regular', true, array(
                  'id'=>'mtregular'
                  )) }}
                </div>
                {{Form::label('mtassociate','Associate',array('class'=>'radio inline col-sm-2 control-label'))}}
                <div class="col-sm-1 radio">{{ Form::radio('memberType', 'associate', false, array(
                  'id'=>'mtassociate'
                  )) }}
                </div>
              </div>
            </div>
            <!--<div class="form-group">
              <div class="col-xs-4">
              <label for="mtindividual">Individual</label>{{ Form::radio('ij', 'individual', true, array('id'=>'mtindividual')) }}
              <label for="mtjoint">Joint</label>{{ Form::radio('ij', 'joint', false, array('id'=>'mtjoint')) }}
              </div>
              <div class="col-xs-8">
              {{ Form::text('memberID2', null, array(
                'id' => 'member-id2', 
                'readonly'=>'readonly',
                'class' => 'form-control', 
                'placeholder'=>'Member\'s ID', 'required'
                )) }}
              </div>
            </div>-->
            <div class="form-group">
              <div class="col-xs-4">
              {{Form::label('firstName','First Name',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('firstName', null, array(
                  'class' => 'form-control',  
                  'id' => 'firstName',  
                  'placeholder'=>'First Name', 'required'
                  )) }}
                </div>
              </div>

              <div class="col-xs-4">
              {{Form::label('middleName','Middle Name',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('middleName', null, array(
                  'class' => 'form-control',
                  'id' => 'middleName', 
                  'placeholder'=>'Middle Name', 'required'
                  )) }}
                </div>
              </div>

              <div class="col-xs-4">
              {{Form::label('lastName','Last Name',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('lastName', null, array(
                  'class' => 'form-control',
                  'id' => 'lastName', 
                  'placeholder'=>'Last Name', 'required'
                  )) }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-3">
              {{Form::label('street','Street',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                {{ Form::text('street', null, array(
                  'class' => 'form-control', 
                  'id' => 'street', 
                  'placeholder'=>'Street'
                  )) }}
                </div>
              </div>

              <div class="col-xs-3">
              {{Form::label('BrgyDistrict','Barangay',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('BrgyDistrict', null, array(
                  'class' => 'form-control', 
                  'id' =>'BrgyDistrict',
                  'placeholder'=>'Barangay/District'
                  )) }}
                </div>
              </div>

              <div class="col-xs-3">
              {{Form::label('city','City',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('city', null, array(
                  'class' => 'form-control', 
                  'id' =>'city',
                  'placeholder'=>'City/Municipality'
                  )) }}
                </div>
              </div>

              <div class="col-xs-3">
              {{Form::label('province','Province',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                  {{ Form::text('province', null, array(
                  'class' => 'form-control', 
                  'id' => 'province', 
                  'placeholder'=>'Province'
                  )) }}
                </div>
              </div>
            </div>

            
            <div class="form-group">
              <div class="col-xs-4">
              {{Form::label('dateOfBirth','Date of Birth',array('class'=>'col-sm-4 control-label'))}}
              <div class='input-group date col-sm-8' id='datetimepicker1'>
                    <input id="dateOfBirth" name="dateOfBirth" type='text' class="form-control" data-format="YYYY/MM/DD"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>

              <div class="col-xs-4">
              {{Form::label('placeOfBirth','Place of Birth',array('class'=>'col-sm-6 control-label'))}}
              <div class='input-group date col-sm-6' id='datetimepicker2'>
                    <input id="placeOfBirth" name="placeOfBirth" type='text' class="form-control" data-format="YYYY/MM/DD"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>


              <div class="col-xs-4">
                {{Form::label('civilStatus','Civil Status',array('class'=>'col-sm-4 control-label'))}}
                <div class="col-sm-8">
                {{ Form::text('civilStatus', null, array(
                'class' => 'form-control', 
                'id' => 'civilStatus', 
                'placeholder'=>'Civil Status'
                )) }}
                </div>
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-3">
                {{Form::label('sex','Sex',array('class'=>'col-sm-6 control-label'))}}
                <div clas="con-sm-6">
                  {{ Form::text('sex', null, array(
                  'class' => 'form-control', 
                  'placeholder'=>'Sex'
                  )) }}
                </div>
              </div>

              <div class="col-xs-3">
              {{ Form::text('nationality', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Nationality'
              )) }}
              </div>

              <div class="col-xs-3">
              {{ Form::text('religion', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Religion'
              )) }}
              </div>
              <div class="col-xs-3">
              {{ Form::text('tin', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Tin Number'
              )) }}
              </div>
            </div>

              <div class="col-xs-3">
              {{ Form::text('ctc', null, array(
              'class' => 'form-control', 
              'placeholder'=>'CTC Number'
              )) }}
              </div>

            <div class="form-group">

              <div class="col-xs-4">
              {{ Form::text('religion', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Religion'
              )) }}
              </div>
            </div>


      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Add Member</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

