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
         <legend>Member's Information Sheet</legend>
         <ul class="nav nav-tabs" id="member-nav-tabs">
          <li></li>
          <li class="active"><a class="member-nav-tabs-items" href="#personalInformation" data-toggle="tab">Personal Information</a></li>
          <li><a class="member-nav-tabs-items" href="#financialInformation" data-toggle="tab">Financial Information</a></li>
          <li><a class="member-nav-tabs-items" href="#otherInformation" data-toggle="tab">Other Information</a></li>
        </ul>

        <div class="tab-content">
        <div class="tab-pane active" id="personalInformation">
            <div class="form-group">
              <div class="col-xs-2">
                {{Form::label('membersID','Members ID',array('class'=>'control-label'))}}
                {{ Form::text('membersID', null, array(
                  'id' => 'membersID', 
                  'class' => 'form-control', 
                  'placeholder'=>'Member\'s ID'
                  )) }}
              </div>
              <div class="col-xs-2">
                {{Form::label('none','Member Type',array('class'=>'control-label'))}}
                <div class="radio col-sm-6">
                  <label>
                    <input type="radio" name="memberType" id="mtregular" value="regular" checked>
                    Regular
                  </label>
                </div>
                <div class="radio col-sm-6">
                  <label>
                    <input type="radio" name="memberType" id="mtassociate" value="associate">
                    Associate
                  </label>
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
                {{Form::label('firstName','First Name',array('class'=>'control-label'))}}
                {{ Form::text('firstName', null, array(
                'class' => 'form-control',  
                'id' => 'firstName',
                'minlength'=>'2',
                'data-rule-required'=>"true",
                'placeholder'=>'First Name'
                )) }}
              </div>

              <div class="col-xs-2">
                {{Form::label('middleName','Middle Name',array('class'=>'control-label'))}}
                {{ Form::text('middleName', null, array(
                'class' => 'form-control',
                'id' => 'middleName', 
                'placeholder'=>'Middle Name'
                )) }}
              </div>

              <div class="col-xs-4">
                {{Form::label('lastName','Last Name',array('class'=>'control-label'))}}
                {{ Form::text('lastName', null, array(
                'class' => 'form-control',
                'id' => 'lastName', 
                'placeholder'=>'Last Name'
                )) }}
              </div>
              <div class="col-xs-2">
                {{Form::label('suffixName','Suffix',array('class'=>'control-label'))}}
                {{ Form::text('suffixName', null, array(
                'class' => 'form-control',
                'id' => 'suffixName', 
                'placeholder'=>'jr, sr, III, IV etc.'
                )) }}
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-3">
                {{Form::label('street','Street',array('class'=>'control-label'))}}
                {{ Form::text('street', null, array(
                'class' => 'form-control', 
                'id' => 'street', 
                'placeholder'=>'Street'
                )) }} 
              </div>

              <div class="col-xs-3">
                {{Form::label('brgyDistrict','Barangay/District',array('class'=>'control-label'))}}
                {{ Form::text('brgyDistrict', null, array(
                'class' => 'form-control', 
                'id' =>'brgyDistrict',
                'placeholder'=>'Barangay/District'
                )) }}
              </div>

              <div class="col-xs-3">
                {{Form::label('city','City/Municipality',array('class'=>'control-label'))}}
                {{ Form::text('city', null, array(
                'class' => 'form-control', 
                'id' =>'city',
                'placeholder'=>'City/Municipality'
                )) }}
              </div>

              <div class="col-xs-3">
                {{Form::label('province','Province',array('class'=>'control-label'))}}
                {{ Form::text('province', null, array(
                'class' => 'form-control', 
                'id' => 'province', 
                'placeholder'=>'Province'
                )) }}
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-3">
              {{Form::label('dateOfBirth','Date of Birth',array('class'=>'control-label'))}}
              <fieldset class="birthday-picker"><select id="birth1month" name="birth1[month]" class="birth-month form-control"><option value="0">MM</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="7">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select id="birth1day" name="birth1[day]" class="birth-day form-control"><option value="0" selected="selected">DD</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select id="birth1year" name="birth1[year]" class="birth-year form-control"><option value="0">YY</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option><option value="1895">1895</option><option value="1894">1894</option></select><input type="hidden" name="birthdate2" id="birthdate2" value=""></fieldset>
                    <!--<input id="dateOfBirth" name="dateOfBirth" type='text' class="form-control" data-format="YYYY/MM/DD"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>-->
              </div>

              <div class="col-xs-2">
                {{Form::label('placeOfBirth','Place of Birth',array('class'=>'control-label'))}}
                {{ Form::textarea('placeOfBirth', null, array(
                'class' => 'form-control', 
                'id' => 'placeOfBirth', 
                'placeholder'=>'Place of Birth'
                )) }}
              </div>


              <div class="col-xs-2">
                {{Form::label('civilStatus','Civil Status',array('class'=>'control-label'))}}
                <select id="civilStatus" name="civilStatus" class="form-control">
                  <option>Single</option>
                  <option>Married</option>
                  <option>Widowed</option>
                  <option>Annulled</option>
                  <option>Divorced</option>
                  <option>Separated</option>
                </select>
                <input id="idSingle" type="hidden" value="0"/>
              </div>

              <div class="col-xs-1">
                {{Form::label('sex','Sex',array('class'=>'control-label'))}}
                <select id="sex" name="sex" class="form-control">
                  <option>M</option>
                  <option>F</option>
                </select>
              </div>
              <div class="col-xs-2">
                {{Form::label('nationality','Nationality',array('class'=>'control-label'))}}
                {{ Form::text('nationality', null, array(
                'class' => 'form-control', 
                'id' => 'nationality', 
                'placeholder'=>'Nationality'
                )) }}
              </div>
              <div class="col-xs-2">
                {{Form::label('religion','Religion',array('class'=>'control-label'))}}
                {{ Form::text('religion', null, array(
                'class' => 'form-control', 
                'id' => 'religion', 
                'placeholder'=>'Religion'
                )) }}
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-2">
                {{Form::label('tin','Tin Number',array('class'=>'control-label'))}}
                {{ Form::text('tin', null, array(
                'class' => 'form-control', 
                'id' => 'tin', 
                'placeholder'=>'Tin Number'
                )) }}
              </div>

              <div class="col-xs-2">
                {{Form::label('ctc','CTC Number',array('class'=>'control-label'))}}
                {{ Form::text('ctc', null, array(
                'class' => 'form-control col-sm-2', 
                'id' => 'ctc', 
                'placeholder'=>'CTC Number'
                )) }}

              </div>
              <div class="col-xs-2">
                {{Form::label('ctcOn','CTC issued on',array('class'=>'control-label'))}}
                {{ Form::text('ctcOn', null, array(
                'class' => 'form-control col-sm-2', 
                'id' => 'ctcOn', 
                'placeholder'=>'Issued on'
                )) }}
              </div>
              <div class="col-xs-2">
                {{Form::label('ctcAt','CTC issued at',array('class'=>'control-label'))}}
                {{ Form::text('ctcAt', null, array(
                'class' => 'form-control col-sm-2', 
                'id' => 'ctcAt', 
                'placeholder'=>'Issued at'
                )) }}
              </div>
              <div class="col-xs-4">
              {{Form::label('contact','Contact',array('class'=>'control-label'))}}
              {{ Form::text('contact', null, array(
              'class' => 'form-control', 
              'id'=>'contact',
              'placeholder'=>'813-1234, 09061234567, etc..'
              )) }}
              </div>
            </div>
            <div class="spouse-info" style="display:none">
              <div class="form-group">
                <div class="col-xs-3">
                {{Form::label('spouseFirstName','Spouse Name',array('class'=>'control-label'))}}
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-3">
                {{Form::label('spouseFirstName','First Name',array('class'=>'control-label'))}}
                {{ Form::text('spouseFirstName', null, array(
                'class' => 'form-control', 
                'id'=>'spouseFirstName',
                'placeholder'=>'First Name'
                )) }}
                </div>
                <div class="col-xs-3">
                {{Form::label('spouseMiddleName','Middle Name',array('class'=>'control-label'))}}
                {{ Form::text('spouseMiddleName', null, array(
                'class' => 'form-control', 
                'id'=>'spouseMiddleName',
                'placeholder'=>'Middle Name'
                )) }}
                </div>
                <div class="col-xs-3">
                {{Form::label('spouseLastName','Last Name',array('class'=>'control-label'))}}
                {{ Form::text('spouseLastName', null, array(
                'class' => 'form-control', 
                'id'=>'spouseLastName',
                'placeholder'=>'Last Name'
                )) }}
                </div>
                <div class="col-xs-3">
                {{Form::label('spouseDateOfBirth','Date of Birth',array('class'=>'control-label'))}}
                    <fieldset class="birthday-picker"><select id="birth2month" data-label="Month of Birth" name="birth2[month]" class="birth-month form-control"><option value="0">MM</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="7">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select id="birth2day" data-label="Day of Birth" name="birth2[day]" class="birth-day form-control"><option value="0" selected="selected">DD</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select id="birth2year" data-label="Year of Birth" name="birth2[year]" class="birth-year form-control"><option value="0">YY</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option><option value="1895">1895</option><option value="1894">1894</option></select><input type="hidden" name="birthdate1" id="birthdate1" value=""></fieldset>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-3">
                {{Form::label('spouseOccupation','Spouse\' Occupation', array('class'=>'control-label'))}}
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-5">
                {{Form::checkbox('o[homeMaker]', 'Home Maker', '', array('id' => 'o[homeMaker]'))}} 
                {{Form::label('o[homeMaker]','Home Maker', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp; 
                {{Form::checkbox('o[governmentEmployed]', 'Government Employed', '', array('id' => 'o[governmentEmployed]'))}}
                {{Form::label('o[governmentEmployed]','Government Employed', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;
                {{Form::checkbox('o[selfEmployed]', 'Self-employed', '', array('id' => 'o[selfEmployed]'))}}
                {{Form::label('o[selfEmployed]','Self-employed', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{Form::checkbox('o[farmer]', 'Farmer', '', array('id' => 'o[farmer]'))}}
                {{Form::label('o[farmer]','Farmer', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;
                {{Form::checkbox('o[privateEmployed]', 'Private-employed', '', array('id' => 'o[privateEmployed]'))}}
                {{Form::label('o[privateEmployed]','Private Employed', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;
                {{Form::checkbox('others', 'trueString', '', array('id' => 'others'))}} 
                {{Form::label('others','Others', array('class'=>'control-label','id'=>'labelOthers'))}}
                {{Form::text('o[othersSpecified]', '',array('id'=>'othersSpecified',
                  'class' => 'form-control',
                  'style' => 'display:none;',
                  'placeholder'=>'Specify'
                  ))}}
                
                </div>
                <div class="col-xs-2">
                {{Form::label('noOfChildren','Number of Children',array('class'=>'control-label'))}}
                <select id="noOfChildren" name="noOfChildren" class="form-control">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9 & above">9 & above</option>
                </select>
                </div>
              </div>
            </div><!-- end spouse-info hidden-->
            <div class="form-group">
              <div class="col-xs-3">
                <div id="ed"></div>
              </div>
              <div class="col-xs-9">
                <div id="benefeciaries"></div>
              </div>
           </div>
      </div><!--#personalInformation-->
      <div class="tab-pane memberFormContent" id="financialInformation">
        <div class="form-group si-income-container">
          <div class="col-xs-4">
          {{Form::label('t1','Source of Income: (Please select atleast 1)', array('class'=>'control-label si', 'id' => 'siLabel'))}}</br>
          {{Form::checkbox('siChecker', 'si', '', array('id' => 'siChecker','style'=>'display:none'))}} 
          {{Form::checkbox('si[salary]', 'Salary / Honoraria', '', array('id' => 'si[salary]'))}} 
          {{Form::label('si[salary]','Salary / Honoraria', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp; 
          {{Form::checkbox('si[interest]', 'Interest / Commission', '', array('id' => 'si[interest]'))}}
          {{Form::label('si[interest]','Interest / Commission', array('class'=>'control-label'))}}</br>
          {{Form::checkbox('si[business]', 'Business', '', array('id' => 'si[business]'))}}
          {{Form::label('si[business]','Business', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          {{Form::checkbox('si[ofwRemittance]', 'OFW remittance', '', array('id' => 'si[ofwRemittance]'))}}
          {{Form::label('si[ofwRemittance]','OFW remittance', array('class'=>'control-label'))}}</br>
          {{Form::checkbox('si[otherRemittances]', 'Other Remittances', '', array('id' => 'si[otherRemittances]'))}}
          {{Form::label('si[otherRemittances]','Other Remittances', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;
          {{Form::checkbox('si[pension]', 'Pension', '', array('id' => 'si[pension]'))}} 
          {{Form::label('si[pension]','Pension', array('class'=>'control-label'))}}&nbsp;&nbsp;&nbsp;
          {{Form::checkbox('si[farmer]', 'Farmer', '', array('id' => 'si[farmer]'))}}
          {{Form::label('si[farmer]','Farmer', array('class'=>'control-label'))}}</br>
          {{Form::checkbox('siOthers', 'Others', '', array('id' => 'si[siOthers]'))}}
          {{Form::label('si[siOthers]', 'Others', array('class'=>'control-label', 'id' => 'labelSiOthers'))}}&nbsp;&nbsp;&nbsp;
          {{Form::text('si[othersSpecified]', '',array('id'=>'siOthersSpecified',
            'class' => 'form-control',
            'style' => 'display:none;',
            'placeholder'=>'Specify'
            ))}} &nbsp;&nbsp;&nbsp;
          </div>   
        </div>
        <div class="form ifEmployedBusinessFarmer">
          <div class="form-group">
            <div class="col-xs-3 ebfChkBox">
              {{Form::checkbox('ebf[employed]', 'If Employed', '', array('id' => 'ebf[employed]'))}}
              {{Form::label('ebf[employed]','If Employed', array('class'=>'control-label'))}}</br>
              {{Form::checkbox('ebf[business]', 'If Business', '', array('id' => 'ebf[business]'))}}
              {{Form::label('ebf[business]','If Business', array('class'=>'control-label'))}}</br>
              {{Form::checkbox('ebf[farmer]', 'If Farmer', '', array('id' => 'ebf[farmer]'))}}
              {{Form::label('ebf[farmer]','If Farmer', array('class'=>'control-label'))}}</br>
            </div>   
            </br>
            </br>
          </div> 
          <div class="form-group">
            <div class="ifEmployed">
              <!--jquery loaded content /members/partials/ifEmployed.blade.php-->
            </div>
            <div class="ifBusiness">
              <!--jquery loaded content /members/partials/ifEmployed.blade.php-->
            </div>
            <div class="ifFarmer">
              <!--jquery loaded content /members/partials/ifEmployed.blade.php-->
            </div>
          </div>
        </div><!--ifEmployedBusinessFarmer-->
      </div><!--#financialInformation-->
      <div class="tab-pane memberFormContent" id="otherInformation">
      </div><!--#otherInformation-->
      </div><!--tab-content-->
      </div><!--modal-body-->
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Add Member</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

