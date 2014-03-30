<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = Member::all();
		return View::make('members.index')->with('members',$members);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$i = Input::all();
		//print_r($i['si']);dd();
		array_walk($i, function(&$element) {
		  if(is_string($element)) {
		  	$element = trim($element);
		  }
		}); 

        $messages = array();
        $spouseOccupation = '';
        $noOfChildren = '';

        //source of income 
   		if(!isset($i['siOthers'])) {
   			array_pop($i['si']);
   		}
   		$sourceOfIncome = implode(", ",$i['si']);

        $arr_fields = array(
	                'First Name' => $i['firstName'],
	                'Middle Name' => $i['middleName'],
	                'Last Name' => $i['lastName'],
	                'Members ID' => $i['membersID'],
	                'birth1day' => $i['birth1']['day'],
	                'birth1month' => $i['birth1']['month'],
	                'birth1year' => $i['birth1']['year'],
	                'City' => $i['city'],
	                'Member Type' => $i['memberType'],
	                'Source of Income' => $sourceOfIncome,
	                );
    	$arr_rules = array(
                'First Name' => 'required|regex:/^[a-zA-Z ]+$/',
                'Middle Name' => array('required','regex:/^[a-zA-Z ]+$/'),
                'Last Name' => 'required|regex:/^[a-zA-Z ]+$/',
                'Members ID' => 'required|alpha_dash|unique:tblmember,membersID',
                'birth1day' => 'not_in:0|between:1,31',
                'birth1month' => 'not_in:0|between:1,12',
                'birth1year' => 'not_in:0',
                'City' => 'required|regex:/^[a-zA-Z ]+$/',
                'Member Type' => array('required','regex:/^(regular|associate)$/'),
	            'Source of Income' => array('required','regex:/^[a-zA-Z,\/ ]+$/'),
            );
    	$arr_msgs = array(
	            	'birth1day.not_in' => 'Please select a Day of Birth.',
	            	'birth1month.not_in' => 'Please select a Month of Birth.',
	            	'birth1year.not_in' => 'Please select a year of Birth.',
	            	);

    	if(isset($i['ebf']['employed'])) {
    		$arr_fields2 = array(
	                'Name of Company' => $i['nameOfCompany'],
	                'Office Address' => $i['officeAddress'],
	                'SSS/GSIS No.' => $i['sssgsis'],
	                'Job Title' => $i['jobTitle'],
	                'Employment Status' => $i['employmentStatus'],
	                'Contact Number' => $i['contactNumber'],
	                'Gross Income Per Month' => $i['grossIncomePerMonth'],
	            );

       		$arr_rules2 = array(
	                'Name of Company' => 'required|regex:/^[a-zA-Z0-9-_ ]+$/',
	                'Office Address' => 'required|regex:/^[a-zA-Z0-9-_, ]+$/',
	                'SSS/GSIS No.' => 'required|regex:/^[0-9- ]+$/',
	                'Job Title' => 'required|regex:/^[a-zA-Z ]+$/',
	                'Employment Status' => 'required|regex:/^[a-zA-Z ]+$/',
	                'Contact Number' => 'required|regex:/^[0-9,.\\- ]+$/',
	                'Gross Income Per Month' => 'required|numeric'
	            );
       		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
       		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
       		//$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);
    	}

    	if(isset($i['ebf']['business'])) {
    		$arr_fields2 = array(
	                'Type of Business' => $i['typeOfBusiness'],
	                'Trade Name' => $i['tradeName'],
	                'Business Address' => $i['businessAddress'],
	                'SSS No.' => $i['sSSNo'],
	                'capital' => $i['capital'],
	                'birth3month' => $i['birth3']['month'],
	                'birth3day' => $i['birth3']['day'],
	                'birth3year' => $i['birth3']['year'],
	                'Contact Number2' => $i['contactNumber2'],
	                'Gross Income Per Month2' => $i['grossIncomePerMonth2']	
	            );

       		$arr_rules2 = array(
	                'Type of Business' => 'required|regex:/^[a-zA-Z0-9\\-, ]+$/',
	                'Trade Name' => 'required|regex:/^[a-zA-Z0-9\\-_, ]+$/',
	                'Business Address' => 'required|regex:/^[a-zA-Z0-9\\-_, ]+$/',
	                'SSS No.' => 'required|regex:/^[0-9\\- ]+$/',
	                'capital' => 'required|numeric',
	                'birth3month' => 'not_in:0|between:1,12',
	                'birth3day' => 'not_in:0|between:1,31',
	                'birth3year' => 'not_in:0',
	                'Contact Number2' => 'required|regex:/^[0-9\\-, ]+$/',
	                'Gross Income Per Month2' => 'required|numeric'
	            );
       		$arr_msgs2 = array(
	            	'Month of Start.not_in' => 'Please select a Month of Start.',
	            	'Day of Start.not_in' => 'Please select a Day of Start.',
	            	'Year of Start.not_in' => 'Please select a Year of Start.',
	            	);
       		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
       		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
       		$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);
    	}

        if($i['isMarried'] == 'truestring') {
        	//make spouse occu str and noOfChildren
       		if(!(isset($i['others']))) {
       			$i['o']['othersSpecified'] = '';
       		}
       		$spouseOccupation = implode(", ",$i['o']);
       		$noOfChildren = $i['noOfChildren'];

       		$arr_fields2 = array(
	                'Spouse First Name' => $i['spouseFirstName'],
	                'Spouse Middle Name' => $i['spouseMiddleName'],
	                'Spouse Last Name' => $i['spouseLastName'],
	                'birth2day' => $i['birth2']['day'],
	                'birth2month' => $i['birth2']['month'],
	                'birth2year' => $i['birth2']['year'],
	            );

       		$arr_rules2 = array(
	                'Spouse First Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Spouse Middle Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Spouse Last Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'birth2day' => 'not_in:0|between:1,31',
	                'birth2month' => 'not_in:0|between:1,12',
	                'birth2year' => 'not_in:0',
	                'City' => 'required|regex:/^[a-zA-Z]+$/'
	            );

       		$arr_msgs2 = array(
	            	'birth2day.not_in' => 'Please select the Spouse\'s Day of Birth.',
	            	'birth2month.not_in' => 'Please select the Spouse\'s Month of Birth.',
	            	'birth2year.not_in' => 'Please select the Spouse\'s Year of Birth.'
	            	);
       		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
       		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
       		$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);
		}

		if( (isset($i['ea1'])) &&$i['ea1'] == '2') { //Tertiary
   			$arr_fields['Degree'] = $i['ea2degree'];
   			$arr_fields['Course'] = $i['ea2course'];
   			$arr_rules['Degree'] = 'required|regex:/^[a-zA-Z]+$/';
   			$arr_rules['Course'] = 'required|regex:/^[a-zA-Z]+$/';
   		} 



		$validator = Validator::make($arr_fields, $arr_rules, $arr_msgs);

        $arr = array('success'=>false,'data'=>array(''));

        if ($validator->fails())
        {
            $messages = $validator->messages();
	        $msgs = $messages->toArray();

	        foreach($msgs as $key => $val) {
	        	//array_push($arr['data'],$val);
	        	$arr['data'][preg_replace('/[\.#\\\\\/]/','',camel_case($key))] = $val;
	        }
	        //echo ($messages->first('Last Name'))?$messages->first('Last Name'):"Empty";dd();
	        $arr['data'] = array_filter($arr['data']);
	        //print_r($arr['data']);dd();
        } else {
			$benefeciary = json_encode($this->getBenefeciary($i));//to json
        	$arr['success']	= true;
        	$user = Member::create(array('firstName' => $i['firstName'],
        							   'middleName' => $i['middleName'],
        							   'lastName' => $i['lastName'],
        							   'membersID' => $i['membersID'],
        							   'memberType' => $i['memberType'],
        							   'street' => $i['street'],
        							   'brgyDistrict' => $i['brgyDistrict'],
        							   'city' => $i['city'],
        							   'province' => $i['province'],
        							   'dateOfBirth' => $i['birth1']['month'].'-'.$i['birth1']['day'].'-'.$i['birth1']['year'],
        							   'placeOfBirth' => $i['placeOfBirth'],
        							   'civilStatus' => $i['civilStatus'],
        							   'sex' => $i['sex'],
        							   'nationality' => $i['nationality'],
        							   'religion' => $i['religion'],
        							   'tin' => $i['tin'],
        							   'ctc' => $i['ctc'],
        							   'ctcOn' => $i['ctcOn'],
        							   'ctcAt' => $i['ctcAt'],
        							   'contact' => $i['contact'],
        							   'ctcAt' => $i['ctcAt'],
        							   'spouseFirstName' => $i['spouseFirstName'],
        							   'spouseMiddleName' => $i['spouseMiddleName'],
        							   'spouseLastName' => $i['spouseLastName'],        							   
        							   'spouseDateOfBirth' => $i['birth2']['month'].'-'.$i['birth2']['day'].'-'.$i['birth2']['year'],
        							   'spouseOccupation' => $spouseOccupation,
        							   'noOfChildren' => $noOfChildren,
        							   'EAelementary' => (isset($i['ea1']) && $i['ea1']=='0')?$i['ea2']:0,
        							   'EAsecondary' => (isset($i['ea1']) && $i['ea1']=='1')?$i['ea2']:0,
        							   'EAtertiary' => (isset($i['ea2degree']))?'1':'',
        							   'EAdegree' => (isset($i['ea2degree']))?$i['ea2degree']:'',
        							   'EAcourse' => (isset($i['ea2course']))?$i['ea2degree']:'',
        							   'EAothers' => (isset($i['eao']))?$i['eao']:'',
        							   'beneficiaries' => $benefeciary,
        							   'sourceOfIncome' => $sourceOfIncome,
						               'nameOfCompany_FI' => (isset($i['nameOfCompany']))?$i['nameOfCompany']:"",
						               'officeAddress_FI' => (isset($i['officeAddress']))?$i['officeAddress']:"",
						               'sSSGSISNo_FI' => (isset($i['sssgsis']))?$i['sssgsis']:"",
						               'jobTitle_FI' => (isset($i['jobTitle']))?$i['sssgsis']:"",
						               'employmentStatus_FI' => (isset($i['employmentStatus']))?$i['sssgsis']:"",
						               'contactNumber_FI' => (isset($i['contactNumber']))?$i['sssgsis']:"",
						               'grossIncomePerMonth_FI' => (isset($i['grossIncomePerMonth']))?$i['sssgsis']:"",
        							)
        						   );
        	$user->save();

        	Session::flash('msg','successfully added new Member');
        }
            return Response::json($arr);
        //return Response::
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::find($id);
		if(empty($member->beneficiaries)) {
			$member->beneficiaries = '{}';
			$member->save();
		}
		return Response::json($member);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$i = Input::all();
		//$this->isBshareValid($i);

		array_walk($i, function(&$element) {
		  if(is_string($element)) {
		  	$element = trim($element);
		  }
		}); 
		//print_r($i['membersID']);dd();

        $messages=array();
        $spouseOccupation = '';
        $noOfChildren = '';

        //source of income 
   		if(!isset($i['siOthers'])) {
   			array_pop($i['si']);
   		}
   		$sourceOfIncome = implode(", ",$i['si']);

		$arr_fields = array(
	                'First Name' => $i['firstName'],
	                'Middle Name' => $i['middleName'],
	                'Last Name' => $i['lastName'],
	                'Members ID' => $i['membersID'],
	                'birth1day' => $i['birth1']['day'],
	                'birth1month' => $i['birth1']['month'],
	                'birth1year' => $i['birth1']['year'],
	                'City' => $i['city'],
	                'Member Type' => $i['memberType'],
	            	'Source of Income' => $sourceOfIncome
	            );
			$arr_rules = array(
	                'First Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Middle Name' => array('required','regex:/^[a-zA-Z]+$/'),
	                'Last Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Members ID' => 'required|alpha_dash',
	                'birth1day' => 'not_in:0|between:1,31',
	                'birth1month' => 'not_in:0|between:1,12',
	                'birth1year' => 'not_in:0',
	                'City' => 'required|regex:/^[a-zA-Z]+$/',
	                'Member Type' => array('required','regex:/^(regular|associate)$/'),
	            	'Source of Income' => array('required','regex:/^[a-zA-Z,\/ ]+$/'),
	            );
			$arr_msgs = array(
	            	'birth1day.not_in' => 'Please select a Day of Birth.',
	            	'birth1month.not_in' => 'Please select a Month of Birth.',
	            	'birth1year.not_in' => 'Please select a year of Birth.',
	            	'birth2day.not_in' => 'Please select the Spouse\'s Day of Birth.',
	            	'birth2month.not_in' => 'Please select the Spouse\'s Month of Birth.',
	            	'birth2year.not_in' => 'Please select the Spouse\'s Year of Birth.',
	            	);

			if(isset($i['ebf']['employed'])) { // FI if employed
    		$arr_fields2 = array(
	                'Name of Company' => $i['nameOfCompany'],
	                'Office Address' => $i['officeAddress'],
	                'SSS/GSIS No.' => $i['sssgsis'],
	                'Job Title' => $i['jobTitle'],
	                'Employment Status' => $i['employmentStatus'],
	                'Contact Number' => $i['contactNumber'],
	                'Gross Income Per Month' => $i['grossIncomePerMonth'],
	            );

       		$arr_rules2 = array(
	                'Name of Company' => 'required|regex:/^[a-zA-Z0-9-_ ]+$/',
	                'Office Address' => 'required|regex:/^[a-zA-Z0-9-_, ]+$/',
	                'SSS/GSIS No.' => 'required|regex:/^[0-9- ]+$/',
	                'Job Title' => 'required|regex:/^[a-zA-Z ]+$/',
	                'Employment Status' => 'required|regex:/^[a-zA-Z ]+$/',
	                'Contact Number' => 'required|regex:/^[0-9,.\\- ]+$/',
	                'Gross Income Per Month' => 'required|numeric'
	            );
       		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
       		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
       		//$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);
    	}

    	if(isset($i['ebf']['business'])) {
    		$arr_fields2 = array(
	                'Type of Business' => $i['typeOfBusiness'],
	                'Trade Name' => $i['tradeName'],
	                'Business Address' => $i['businessAddress'],
	                'SSS No.' => $i['sSSNo'],
	                'capital' => $i['capital'],
	                'birth3month' => $i['birth3']['month'],
	                'birth3day' => $i['birth3']['day'],
	                'birth3year' => $i['birth3']['year'],
	                'Contact Number2' => $i['contactNumber2'],
	                'Gross Income Per Month2' => $i['grossIncomePerMonth2']	
	            );

       		$arr_rules2 = array(
	                'Type of Business' => 'required|regex:/^[a-zA-Z0-9\\-, ]+$/',
	                'Trade Name' => 'required|regex:/^[a-zA-Z0-9\\-_, ]+$/',
	                'Business Address' => 'required|regex:/^[a-zA-Z0-9\\-_, ]+$/',
	                'SSS No.' => 'required|regex:/^[0-9\\- ]+$/',
	                'capital' => 'required|numeric',
	                'birth3month' => 'not_in:0|between:1,12',
	                'birth3day' => 'not_in:0|between:1,31',
	                'birth3year' => 'not_in:0',
	                'Contact Number2' => 'required|regex:/^[0-9\\-, ]+$/',
	                'Gross Income Per Month2' => 'required|numeric'
	            );
       		$arr_msgs2 = array(
	            	'Month of Start.not_in' => 'Please select a Month of Start.',
	            	'Day of Start.not_in' => 'Please select a Day of Start.',
	            	'Year of Start.not_in' => 'Please select a Year of Start.',
	            	);
       		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
       		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
       		$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);
    	}

       if($i['isMarried'] == 'truestring') {
       		if(!(isset($i['others']))) {
       			$i['o']['othersSpecified'] = '';
       		}
       		$spouseOccupation = implode(", ",$i['o']);
       		$noOfChildren = $i['noOfChildren'];

       		$arr_fields2 = array(
	                'Spouse First Name' => $i['spouseFirstName'],
	                'Spouse Middle Name' => $i['spouseMiddleName'],
	                'Spouse Last Name' => $i['spouseLastName'],
	                'birth2day' => $i['birth2']['day'],
	                'birth2month' => $i['birth2']['month'],
	                'birth2year' => $i['birth2']['year'],
	                'City' => $i['city']
	            );

       		$arr_rules2 = array(
	                'Spouse First Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Spouse Middle Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'Spouse Last Name' => 'required|regex:/^[a-zA-Z]+$/',
	                'birth2day' => 'not_in:0|between:1,31',
	                'birth2month' => 'not_in:0|between:1,12',
	                'birth2year' => 'not_in:0',
	                'City' => 'required|regex:/^[a-zA-Z]+$/'
	            );

       		$arr_msgs2 = array(
	            	'birth2day.not_in' => 'Please select the Spouse\'s Day of Birth.',
	            	'birth2month.not_in' => 'Please select the Spouse\'s Month of Birth.',
	            	'birth2year.not_in' => 'Please select the Spouse\'s Year of Birth.',
	            	);
		} else {
			$i['spouseFirstName'] ='';
			$i['spouseMiddleName'] ='';
			$i['spouseLastName'] ='';
			$i['birth2']['month']='';
		}

		if( (isset($i['ea1'])) &&$i['ea1'] == '2') { //Tertiary
   			$arr_fields['Degree'] = $i['ea2degree'];
   			$arr_fields['Course'] = $i['ea2course'];
   			$arr_rules['Degree'] = 'required|regex:/^[a-zA-Z]+$/';
   			$arr_rules['Course'] = 'required|regex:/^[a-zA-Z]+$/';
   		} 

		$arr_fields = $this->array_safe_combine($arr_fields, $arr_fields2);
		$arr_rules = $this->array_safe_combine($arr_rules, $arr_rules2);
		$arr_msgs = $this->array_safe_combine($arr_msgs, $arr_msgs2);

		$validator = Validator::make($arr_fields, $arr_rules, $arr_msgs);
        $arr = array('success'=>false,'data'=>array(''));

        $error = 0;
        if(Member::where('membersID',$i['membersID'])->where('id','!=',$i['id'])->get()->count()) {
        	$error = 1;
        }

        if ($validator->fails() || $error)
        {
            $messages = $validator->messages();
	        $msgs = $messages->toArray();
	        if($error)
	        	$msgs['Members ID'] = array('The Members ID field is already taken.');

	        foreach($msgs as $key => $val) {
	        	//array_push($arr['data'],$val);
	        	$arr['data'][preg_replace('/[\.#\\\\\/]/','',camel_case($key))] = $val;
	        }
	        //echo ($messages->first('Last Name'))?$messages->first('Last Name'):"Empty";dd();
	        $arr['data'] = array_filter($arr['data']);
	        //print_r($arr['data']);dd();
        } else {
			$benefeciary = json_encode($this->getBenefeciary($i));//to json
        	$arr['success']	= true;
			$member = Member::find($id);
			$member->firstName = $i['firstName'];
			$member->middleName = $i['middleName'];
			$member->lastName = $i['lastName'];
			$member->membersID = $i['membersID'];
			$member->memberType = $i['memberType'];
			$member->street = $i['street'];
			$member->brgyDistrict = $i['brgyDistrict'];
			$member->city = $i['city'];
			$member->province = $i['province'];
			$member->dateOfBirth = $i['birth1']['month'].'-'.$i['birth1']['day'].'-'.$i['birth1']['year'];
			$member->placeOfBirth = $i['placeOfBirth'];
			$member->civilStatus = $i['civilStatus'];
			$member->sex = $i['sex'];
			$member->nationality = $i['nationality'];
			$member->religion = $i['religion'];
			$member->tin = $i['tin'];
			$member->ctc = $i['ctc'];
			$member->ctcOn = $i['ctcOn'];
			$member->ctcAt = $i['ctcAt'];
			$member->contact = $i['contact'];
			$member->ctcAt = $i['ctcAt'];
			$member->spouseFirstName = $i['spouseFirstName'];
			$member->spouseMiddleName = $i['spouseMiddleName'];
			$member->spouseLastName = $i['spouseLastName'];        						
			$member->spouseDateOfBirth = ($i['birth2']['month']!='')?($i['birth2']['month'].'-'.$i['birth2']['day'].'-'.$i['birth2']['year']):'';
			$member->spouseOccupation = $spouseOccupation;
			$member->noOfChildren = $noOfChildren;
			$member->EAelementary = (isset($i['ea1']) && $i['ea1']==0)?$i['ea2']:'';
			$member->EAsecondary = (isset($i['ea1']) && $i['ea1']==1)?$i['ea2']:'';
			$member->EAtertiary = (isset($i['ea2degree']))?'1':'';
			$member->EAdegree = (isset($i['ea2degree']))?$i['ea2degree']:'';
			$member->EAcourse = (isset($i['ea2course']))?$i['ea2course']:'';
			$member->EAothers = (isset($i['eao']))?$i['eao']:'';
			$member->beneficiaries = $benefeciary;
			$member->sourceOfIncome = $sourceOfIncome;
            $member->nameOfCompany_FI = $i['nameOfCompany'];
            $member->officeAddress_FI = $i['officeAddress'];
            $member->sSSGSISNo_FI = $i['sssgsis'];
            $member->jobTitle_FI = $i['jobTitle'];
            $member->employmentStatus_FI = $i['employmentStatus'];
            $member->contactNumber_FI = $i['contactNumber'];
            $member->grossIncomePerMonth_FI = $i['grossIncomePerMonth'];
			$member->save();
        	Session::flash('msg','successfully updated member '.$i['firstName'].' '.$i['lastName']);
		}

		return Response::json($arr);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$members = Member::all();
		$member = Member::find($id);
		$member->delete();
		Session::flash('msg','successfully deleted member '.$member['firstName'].' '.$member['lastName']);
		return Redirect::to('members');
	}
	public function changeActivity($id)
	{
		$member = Member::findOrfail($id);
		$member->activity = ($member->activity == 0)?1:0;
		$member->save();
		Session::flash('msg','successfully '.(($member->activity)?"activated":"deactivated").' member '.$member['firstName'].' '.$member['lastName']);
		return Redirect::to('members');
	}
	public function deleteAllChecked() {
		$arr_of_ids = json_decode($_POST['deleteIDS'], true);
		if(!(empty($arr_of_ids))) {
			DB::table('tblmember')->whereIn('id', $arr_of_ids)->delete();
			Session::flash('msg','Successfully deleted '.count($arr_of_ids).' checked entries');
		} else {
			Session::flash('msg','<div class="alert-danger">something went wrong (empty ID)</div>');
		}
		return Redirect::to('members');	
	}
	
	function getBenefeciary($input) {
		$res = array();
		$arr1 = array_flatten($input['b1']);
		$arrCheck = array_filter($arr1, function($item) {
			return $item == '';
		});
		if(count($arrCheck)) 
			return $res;
		$xx = 0;
		$field_list = array('name', 'relation', 'Bmonth', 'Bday', 'Byear', 'share');
		function my_array_filter($inputb1) {
			return array_values($inputb1);
		}
		$input['b1'] = array_map('my_array_filter', $input['b1']);

		foreach($input['b1']['name'] as $dummy) {
			$l = 0;
			foreach($input['b1'] as $field) {
				$arrT[$field_list[$l]] = $field[$xx];
				$l++;
			}
			array_push($res,$arrT);
			$xx++;
		}
		return $res;
	}

	function isBshareValid($input) {
		print_r(array_dot($input['b1']));dd();
	}

	function failing() {
		Session::flash('msg','<div class="alert-danger">There was a server connection problem.</div>');
		return Redirect::to('members');	
	}

	function array_safe_combine($arr, $arr2) {
		foreach($arr2 as $a2k => $a2v) {
			if(!array_key_exists($a2k,$arr)) 
				$arr[$a2k] = $a2v;
		}
		return $arr;
	}

}
