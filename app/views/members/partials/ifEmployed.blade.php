<div class="container_FI col-xs-6">
	{{Form::label('nameOfCompany','IF EMPLOYED:',array('class'=>'control-label btn-lg'))}}<br>
	{{Form::label('nameOfCompany','Name of Company',array('class'=>'control-label'))}}
	{{Form::text('nameOfCompany', '', array(
	'class' => 'form-control', 
	'id'=>'nameOfCompany',
	'placeholder'=>'Name of Company'
	)) }}

	{{Form::label('officeAddress','Office Address',array('class'=>'control-label'))}}
	{{Form::text('officeAddress', null, array(
	'class' => 'form-control', 
	'id'=>'officeAddress',
	'placeholder'=>'Office Address'
	)) }}

	{{Form::label('sssgsis','SSS/GSIS #',array('class'=>'control-label'))}}
	{{Form::text('sssgsis', null, array(
	'class' => 'form-control', 
	'id'=>'sSSGSISNo',
	'placeholder'=>'SSS/GSIS #'
	)) }}

	{{Form::label('jobTitle','Job Title',array('class'=>'control-label'))}}
	{{Form::text('jobTitle', null, array(
	'class' => 'form-control', 
	'id'=>'jobTitle',
	'placeholder'=>'Job Title'
	)) }}

	{{Form::label('employmentStatus','Employment Status',array('class'=>'control-label'))}}
	{{Form::text('employmentStatus', null, array(
	'class' => 'form-control', 
	'id'=>'employmentStatus',
	'placeholder'=>'Employment Status'
	)) }}

	{{Form::label('contactNumber','Contact Number',array('class'=>'control-label'))}}
	{{Form::text('contactNumber', null, array(
	'class' => 'form-control', 
	'id'=>'contactNumber',
	'placeholder'=>'Contact Number'
	)) }}

	{{Form::label('grossIncomePerMonth','Gross Income Per Month',array('class'=>'control-label'))}}
	{{Form::text('grossIncomePerMonth', null, array(
	'class' => 'form-control', 
	'id'=>'grossIncomePerMonth',
	'placeholder'=>'Gross Income Per Month'
	)) }}
</div>