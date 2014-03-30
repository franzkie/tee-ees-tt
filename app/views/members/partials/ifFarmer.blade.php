<div class="container_FI col-xs-6">
	{{Form::label('nameOfCompany_FI','IF BUSINESS:',array('class'=>'control-label btn-lg'))}}<br>
	{{Form::label('nameOfCompany_FI','Name of Company',array('class'=>'control-label'))}}
	{{Form::text('nameOfCompany_FI', null, array(
	'class' => 'form-control', 
	'id'=>'nameOfCompany_FI',
	'placeholder'=>'Name of Company'
	)) }}

	{{Form::label('officeAddress_FI','Office Address',array('class'=>'control-label'))}}
	{{Form::text('officeAddress_FI', null, array(
	'class' => 'form-control', 
	'id'=>'officeAddress_FI',
	'placeholder'=>'Office Address'
	)) }}

	{{Form::label('sssgsis_FI','SSS/GSIS #',array('class'=>'control-label'))}}
	{{Form::text('sssgsis_FI', null, array(
	'class' => 'form-control', 
	'id'=>'sssgsis_FI',
	'placeholder'=>'SSS/GSIS #'
	)) }}

	{{Form::label('jobTitle_FI','Job Title',array('class'=>'control-label'))}}
	{{Form::text('jobTitle_FI', null, array(
	'class' => 'form-control', 
	'id'=>'jobTitle_FI',
	'placeholder'=>'Job Title'
	)) }}

	{{Form::label('employmentStatus_FI','Employment Status',array('class'=>'control-label'))}}
	{{Form::text('employmentStatus_FI', null, array(
	'class' => 'form-control', 
	'id'=>'employmentStatus_FI',
	'placeholder'=>'Employment Status'
	)) }}

	{{Form::label('contactNumber_FI','Contact Number',array('class'=>'control-label'))}}
	{{Form::text('contactNumber_FI', null, array(
	'class' => 'form-control', 
	'id'=>'contactNumber_FI',
	'placeholder'=>'Contact Number'
	)) }}

	{{Form::label('grossIncomePerMonth_FI','Gross Income Per Month',array('class'=>'control-label'))}}
	{{Form::text('grossIncomePerMonth_FI', null, array(
	'class' => 'form-control', 
	'id'=>'grossIncomePerMonth_FI',
	'placeholder'=>'Gross Income Per Month'
	)) }}
</div>