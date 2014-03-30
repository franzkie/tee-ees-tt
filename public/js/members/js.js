(function() {

//custom plugins above + $.validations (call custom-plugins.js)

//global vars
 $modal = $('#ModalAdd');
 $fi = $('#financialInformation');
 var ts = $('#othersSpecified');
 var siOtherts = $('#siOthersSpecified');
 var civilStatus = $('#civilStatus option:selected').text();
 var siOtherPV = $(siOtherts).val();
 var tsPrevVal = $(ts).val();
 var sBtn, ben_; //ben_ = benefeciaries plugin
 $ebf = $fi.find('.ifEmployedBusinessFarmer');
 var ebfE, ebfB, ebfF;
 var ifEmployedArr = [], ifBusinessArr = [];
 var $spouseSelect = $('.spouse-info').find('select[id^="birth2"]');
 var totalShares2 = 0, numShares2 = 0, numEmptyShares2 = 0;
 var errorTabsReady = 0;
 $ben_g = $modal.find('#benefeciaries');

 var bObj = [
          { "set" : [
            {
              "mainEl" : '<div class="col-xs-4">' + 
              '<div class="col-xs-12 col-xs-offset-2"><label for="b1[name]['+'0'+']">Name</label></div>' +
              '<div class="col-xs-2"><i class="btrash fa fa-times btn btn-danger" data-value="'+'0'+'"></i></div><div class="col-xs-10"><input type="text" value="'+""+'" class="form-control b-input" id="b1[name]['+'0'+']" name="b1[name]['+'0'+']"/></div></div>'
            },
            {
              "mainEl" : '<div class="col-xs-2">' + 
              '<label for="b1[relation]['+'0'+']">Relation</label>' +
              '<input type="text" value="'+""+'" class="form-control b-input" id="b1[relation]['+'0'+']" name="b1[relation]['+'0'+']"/></div>'
            },
            {
              "mainEl" : '<div class="col-xs-4">' + 
              '<label for="b1m['+'0'+']">Date of Birth</label>' +
              '<fieldset class="birthday-picker"><select id="b1m['+'0'+']" data-label="Month of Birth" name="b1[month]['+'0'+']" class="birth-month form-control"><option value="0">MM</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="7">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select id="b1d['+'0'+']" data-label="Day of Birth" name="b1[day]['+'0'+']" class="birth-day form-control"><option value="0" selected="selected">DD</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select id="b1y['+'0'+']" data-label="Year of Birth" name="b1[year]['+'0'+']" class="birth-year form-control"><option value="0">YY</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option><option value="1895">1895</option><option value="1894">1894</option></select></fieldset></div>'
            },
            {
              "mainEl" : '<div class="col-xs-2">' + 
              '<label for="b1[share]['+'0'+']">% Share</label>' +
              '<input type="text" value="'+""+'" class="form-control b-input" id="b1[share]['+'0'+']" name="b1[share]['+'0'+']"/></div>'
            }
          ]
        }
      ];

var isEditMode = function() {
  return ($modal.find('button[type="submit"].member-edit').length !== 0)?true:false;
} 

var contactfn = function(c) {
      if(contact != c && typeof c !== 'undefined') {//main statemeny
        //console.log('input is '+c+' versus #contact'+$('#contact').val());
        str = c.replace(new RegExp('[^0-9,\\- ]','gim'),'');
        $('#contact').val(str);
      }
    }

var getMemberByMode = function(userID, mode) {
      $.ajax({
        type:"GET",
        url:"members/"+userID,
        success:function(data) {
          //console.log(data);
          buttonLabel = '';
          if(mode === 'edit') {
            buttonLabel = 'Edit Member';
            ele = $modal.find('button[type="submit"]');
            $(ele).html('Save Edit');
            $(ele).addClass('member-edit');
            $.data(document, "hiddenmember", userID);
            //reset checkboxes (such as spouse occupation etc)
          } else if (mode ==='show') {
            buttonLabel = "Member Details";
            $modal.find('button[type="submit"]').next().text('Close').end().hide();
            $modal.find('input, textarea, select').prop('disabled',true);
          }

            //reset checkboxes (such as spouse occupation etc)
          $modal.find('.spouse-info input[type="checkbox"]').prop('checked',false);
          $modal.find('#othersSpecified').val("").hide();
          //reset checkboxes (source of income)
          $modal.find('.si-income-container input[type="checkbox"]').prop('checked',false);
          $modal.find('#siOthersSpecified').val("").hide();

          $('#ModalLabel').html(buttonLabel);
          //$('button[data-target="#ModalAdd"]').trigger('click');
          $modal.modal('show');
          $('#noOfChildren option[value="0"]').attr('selected','selected');
          $('#noOfChildren').val('0');
          var op = {};

          op = {
          mainItems : [{"name" : "Elementary", 
                    "mainDom" : "<option value='0'>Elementary</option>",
                    "hiddenDom" : '<div id="ea2Container"><select id="ea2" name="ea2" class="form-control">' +
                                  '<option value="1">Grade 1</option>' +
                                  '<option value="2">Grade 2</option>' +
                                  '<option value="3">Grade 3</option>' +
                                  '<option value="4">Grade 4</option>' +
                                  '<option value="5">Grade 5</option>' +
                                  '<option value="6">Grade 6</option>' +
                                  '</select>' +
                                  '<input value="'+data.EAothers+'" id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                       "values":{"eao":data.EAothers}
                   },
                   {"name" : "Secondary", 
                    "mainDom" : "<option value='1'>Secondary</option>",
                    "hiddenDom" : '<div id="ea2Container"><select id="ea2" name="ea2" class="form-control">' +
                                  '<option value="1">1st Year</option>' +
                                  '<option value="2">2nd Year</option>' +
                                  '<option value="3">3rd Year</option>' +
                                  '<option value="4">4th Year</option>' +
                                  '</select>' + 
                                  '<input value="'+data.EAothers+'" id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                    "values":{"eao":data.EAothers}
                   },
                   {"name" : "Tertiary", 
                    "mainDom" : "<option value='2'>Tertiary</option>",
                    "hiddenDom" : '<div id="ea2Container"><input value="'+data.EAdegree+'" id="degree" type="text" class="form-control" name="ea2degree" placeholder="Specify Degree Here"/>' +
                                  '<input value="'+data.EAcourse+'" id="course" type="text" class="form-control" name="ea2course" placeholder="Specify Course Here"/>' +
                                  '<input value="'+data.EAothers+'" id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                    "values": {"ea2degree":data.EAdegree, 
                             "ea2course":data.EAcourse,
                             "eao":data.EAothers
                             }
                   }/*,
                   {"name" : "Others", 
                    "mainDom" : "<option value='3'>Others</option>",
                    "hiddenDom" : '<div id="ea2Container"><input id="specifyOthers" type="text" class="form-control" name="ea2" placeholder="Specify Others Here"/></div>'
                   }*/
                   ]
          };
          $modal.find('#ed').ea(op);
          resetModalCheckboxes();
          populateModalEditForm(data);
          specifyOthersOld = $modal.find('#othersSpecified').val();
          if(specifyOthersOld !== '') {

          }
          if (mode ==='edit') {
            ben_ = $modal.find('#benefeciaries').benefeciaries(bObj);//do benefeciary plugin
            ben_.fillFreshSet($.parseJSON(data.beneficiaries));//call benefeciary fillFreshSet on update
          }
        }
      })
    }

    var populateModalEditForm = function(fields) {
        excludedFields = [//'EAcourse',
                          //'EAdegree',
                          //'EAelementary',
                          //'EAothers',
                          //'EAsecondary',
                          //'EAtertiary',
                          'beneficiaries',
                          //'sourceOfIncome',
                          'jointIndividual',
                          //'noOfChildren',
                          //'spouseOccupation',
                          'subscribedNumberOfShare',
                          'updated_at',
                          'created_at',
                          'id'];

                          translateFields = [];
      if(fields.nameOfCompany_FI !== '') {
        $modal.find('#ebf\\[employed\\]').trigger('click').prop('checked', true);
      }
      $.each(fields, function(name, val){
        if(name.match(/_FI$/)) {
          name = name.replace(/_FI$/,'');
        }
        if(!($.inArray(name ,excludedFields)!==(-1))) {
          if(name === 'dateOfBirth') {
            month1 = val.substring(0,val.indexOf('-'));
            dayYear = val.substring(val.indexOf('-')+1);
            day1 = dayYear.substring(0,dayYear.indexOf('-'));
            year1 = dayYear.substring(dayYear.indexOf('-')+1);
            $modal.find('#birth1month option[value="'+month1+'"]').attr('selected','selected');
            $modal.find('#birth1day option[value="'+day1+'"]').attr('selected','selected');
            $modal.find('#birth1year option[value="'+year1+'"]').attr('selected','selected'); 
          } else if(name === 'spouseDateOfBirth') {
            month2 = val.substring(0,val.indexOf('-'));
            dayYear = val.substring(val.indexOf('-')+1);
            day2 = dayYear.substring(0,dayYear.indexOf('-'));
            year2 = dayYear.substring(dayYear.indexOf('-')+1);
            $modal.find('#birth2month option[value="'+month2+'"]').attr('selected','selected');
            $modal.find('#birth2day option[value="'+day2+'"]').attr('selected','selected');
            $modal.find('#birth2year option[value="'+year2+'"]').attr('selected','selected'); 

          } else if(name === 'memberType') {
            if(val === 'regular') {
              $modal.find('#mtregular').prop('checked',true);
              $modal.find('#mtassociate').prop('checked',false);
            } else {
              $modal.find('#mtregular').prop('checked',false);
              $modal.find('#mtassociate').prop('checked',true);
            }
          }  else if (name === 'noOfChildren') {
            $('#noOfChildren option[value="'+val+'"]').attr('selected','selected');
          } else if (name === 'spouseOccupation') {
            var fieldsArr = [
                         { "k" : "#o\\[homeMaker\\]", "v" : "Home Maker"},
                         { "k" : "#o\\[governmentEmployed\\]", "v" : "Government Employed"},
                         { "k" : "#o\\[selfEmployed\\]", "v" : "Self-employed"},
                         { "k" : "#o\\[farmer\\]", "v" : "Farmer"},
                         { "k" : "#o\\[privateEmployed\\]", "v" : "Private-employed"}
                        ];

            populateCheckBoxes(fieldsArr, val);//empty param 3 defaults to , $('.spouse-info')

          } else  if(name === 'EAelementary'){
            if(val !== 0) {
              $modal.find('select#ea1 option[value="0"]').prop('selected',true);
              $modal.find('select#ea2 option[value="'+val+'"]').prop('selected',true);
            }
          } else if(name === 'EAsecondary') {
            if(val !== 0) {
              var input = document.getElementById("ea1");
              input.value = 1;
              $modal.find('select#ea1').trigger('change');
              $modal.find('select#ea1 option[value="1"]').prop('selected',true);
              $modal.find('select#ea2 option[value="'+val+'"]').prop('selected',true)
            }
          } else if(name === 'EAtertiary') {
            if(val !== '') {
              var input = document.getElementById("ea1");
              input.value = 2;
              $modal.find('select#ea1').trigger('change');
              $modal.find('#ed #degree').val(fields.EAdegree);
              $modal.find('#ed #course').val(fields.EAcourse);
            }
          } else if (name === 'sourceOfIncome') {
            var fieldsArr = [
                         { "k" : "#si\\[interest\\]", "v" : "Interest / Commission"},
                         { "k" : "#si\\[salary\\]", "v" : "Salary / Honoraria"},
                         { "k" : "#si\\[business\\]", "v"  : "Business"},
                         { "k" : "#si\\[ofwremittance\\]", "v"  : "OFW remittance"},
                         { "k" : "#si\\[otherRemittances\\]", "v"  : "Other Remittances"},
                         { "k" : "#si\\[farmer\\]", "v"  : "Farmer"},
                         { "k" : "#si\\[pension\\]", "v"  : "Pension"}
                        ];
            populateCheckBoxes(fieldsArr, val, $('.si-income-container'));
          } else  {
            $modal.find('#'+name).val(val);  
          }
        }
    });
   }

  var getTableData = function() {
    var params = ty_my_dataTable.oApi._fnAjaxParameters(ty_my_dataTable.dataTable().fnSettings());
    $.post("members/membersPrintList", $.param(params),function(result){
       if(result.success) {
          //fields key being the exact (database) field name
          var fields = [
                        [{"name":"lastName","value":"Member Name"},{"name":"firstName","value":"Member Name"}],
                        {"name":"membersID","value":"Member's ID"},
                        {"name":"memberType","value":"Type"}
                       ];
          var contentHeader='', content='', content_footer='';
          content_header = "<div><table><thead><tr>";
          //add row numbers th
          content_header += '<th>#</th>';
            for(var ii in fields) {
              if(fields[ii].length > 1) { //if name (lastName, firstName)
                content += "<th>"+fields[ii][0].value+"</th>";
              } else {
                content += "<th>"+fields[ii].value+"</th>";
              }
            }

          content += "</tr><tbody>";
          var rowNumber = 0;

          for(var i in result.data) {
            content += '<tr>';
            content += '<td>'+(rowNumber++)+'</td>';
            for(var ii in fields) {
              //add row numbers td
              if(fields[ii].length > 1) { //if name (lastName, firstName)
                content += "<td>" + result.data[i][fields[0][0].name]; //lastName
                content += ", " + result.data[i][fields[0][1].name] + "</td>"; //firstName              
              } else {
                content += "<td>"+result.data[i][fields[ii].name]+"</td>";
              }
            }
            content += '</tr>';
          }

          var datePrinted = getDate('full-filipino');
          content_footer = '</tbody></table>'+'<br><br><div style="float:right">'+datePrinted+'</div></div>'
          var finalContent = content_header+content+content_footer;

          var newWin = window.open('','newWin','width=auto,height=auto');
          newWin.document.open();
          newWin.document.writeln("<html><head><title>Console</title></head><body>" + finalContent + "</body></html>");
          newWin.window.print();
          newWin.document.close();
        }
    });
    var getDate = function(format) {
      if(format === 'full-filipino') {
        var dateP = new Date();
        var datePrinted = ( dateP.getMonth()+1)+'/'+dateP.getDate()+'/'+dateP.getFullYear();

            //format am pm
        var hours = dateP.getHours();
        var minutes = dateP.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return datePrinted+' '+strTime;
      }
    }

  }

  var resetModalCheckboxes = function () {
    $modal.find('input[type="checkbox"]').prop('checked',false);
    $modal.find('#othersSpecified').val('');
    $modal.find('#siOthersSpecified').val('');
    $modal.find('#mtassociate').prop('checked',false);
    $modal.find('#mtregular').prop('checked',true);
  }   

  var populateCheckBoxes = function(fields, data, $c) {
     dSpouseOccupation = typeof $c === 'undefined' ? true : false;
     $c = typeof $c !== 'undefined' ? $c : $('.spouse-info');
      var others = '';

      var dataArr = data.split(', ');
      data2 = data;
      var restricts = [];// let us also catch matcing coincidence with our value and valur on other
      for(var i in fields) {
        field = fields[i];
        if(($.inArray(field.v, dataArr) !== -1) && ($.inArray(field.v, restricts) === -1) ) {
          $c.find(field.k).prop('checked',true);
          restricts.push(field.v);
        } else {
          data2 = data2.replace(new RegExp(field.v), '');
        }
      }
      console.log(restricts);
      var fnPluckRestricts = function() {

        //console.log('so data2 1 is ',data2);
        //data2 = data.replace(/\//,'\\\/');
        console.log('so data2 2 is ',data2);
        for(var i in restricts) {
          restrict = restricts[i];
          console.log('from data2 ',data2);
          data2 = data2.replace(new RegExp('('+restrict + '){1}(, ){1}'),'');
          console.log('for '+restrict,'data is',data2);
        }
        console.log('so data2 3 is ',data2);
        return data2;
      }
      others = fnPluckRestricts();
      console.log('is others empty?',others === '');
      if(dSpouseOccupation) {//defaults at Spouse Occupation
        if(others !== '') {

          sPrevVal = data2;
          $c.find('#others').trigger('click');
          $c.find('#others').prop('checked', true);
          $c.find('#othersSpecified').val(others);
        } else {
          tsPrevVal = '';
        }
      } else {
        if(others !== '') {
          $c.find('#si\\[siOthers\\]').trigger('click');
          $c.find('#si\\[siOthers\\]').prop('checked', true);
          $c.find('#siOthersSpecified').val(others);
        } else {
          console.log("input text should be hidden, fix this TYRO")
          $c.find('#si\\[siOthers\\]').trigger('click');
          $c.find('#si\\[siOthers\\]').prop('checked', false);
        }
        
      }
  }

  var callServerConProblem = function(modalElementSelector) {
    modalElementSelector = typeof modalElementSelector !== 'undefined' ? modalElementSelector : '.modal-msg';
    
    if(modalElementSelector === '#memberTable') {
      msg = '<div class="alert-danger">There was a server connection problem. Please try to <a href="/members">fix it by refreshing the page</a></div>';
      $(modalElementSelector).prepend(msg);
      $('html').animate({ scrollTop: 0 }, "slow");//SCROLL MODAL UP
    } else {
      msg = '<div class="alert-danger">There was a server connection problem.</div>';
      $modal.find(modalElementSelector).html(msg);
      $(sBtn).prop('disabled',false);
      $(sBtn).text('Save Edit');
      $modal.animate({ scrollTop: 0 }, "slow");//SCROLL MODAL UP
    }

  }

  var getEBFfields = function(type) {
    type = typeof type !== 'undefined' ? type : 'ifEmployed';
    if(type === 'ifEmployed') { // the default

    }
  }

  var addRegexRules = function($el) {
    console.log("am i called 1?")
    if(typeof $el !== 'undefined') {
        if($el.attr('id') === 'firstName') {
              $el.rules("add", {
                alphanumeric : true
              });
        
        }
    }
  }

  var roundToTwo = function(number) {
    return Math.round(parseFloat(number) * 100) / 100;
  }

 var addExtraFieldRule = function(extras) {
   if(typeof extras === 'undefined') {
        //for birthday selects
        //locals 
        $ebfChkBox = $modal.find('.ebfChkBox');
        $ben = $modal.find('#benefeciaries');

        if($.data(document, "isMarried") === 'truestring')//if married
          $SelectNames = $modal.find('select[id^="b"]').serializeObject();
        else {//if not married
          $SelectNames = $modal.find('select[id^="b"]').not($spouseSelect).serializeObject();
        }
        $.each($SelectNames, function(val, key) {
          var $item = $('[name="'+val+'"]');
          var label = $item.attr('data-label');
          //label = ($item.attr('id').match(/^b$/i) && $item.is('select'))?label:
          $item.rules("add", { required: true, notEqualTo : {'val':'0', "label" : label} } );
        });

        $benInput = $ben.find('input').not('input[id*="\\[share\\]"]');

        $.each($benInput, function() {
          $(this).rules("add", { required: true, alphaSpace : true});
        })

        $educationalA = $modal.find('#ed');
        if($educationalA.children('#ea1').val() === '2') {
          $educationalA.find('#degree').rules("add", { required: true, alphaNumSD : true } );
          $educationalA.find('#course').rules("add", { required: true, alphaNumSD : true } );
        }

        $benShare = $ben.find('input[id*="\\[share\\]"]');
        empties = 0, sharesLen = 0;
        $ben.find('input[id*="\\[share\\]"]').each(function() {
          empties += ($(this).val()==='')?1:0;
        })
        sharesLen = $benShare.length;
        if(sharesLen === empties) {
          $benShare.val(roundToTwo(100/sharesLen));
          updateShares();
        }

        $.each($benShare, function() {
          $(this).rules('add', {numeric : true, nowhitespace : true, shareTo100 : true})
        });

        $siOthersCheckBox = $modal.find('#si\\[siOthers\\]');
      if($siOthersCheckBox.is(':checked')) {
        $modal.find('#siOthersSpecified').rules("add", { required : true, letterswithbasicpunc : true } ); // or $modal.find('#siOthersSpecified').rules("add" ...
      }

      /*$eChkBox = $ebfChkBox.find('#ebf\\[employed\\]');
      if($eChkBox.is(':checked')) {
        $ifEmployed2 = $modal.find('.ifEmployed .container_FI');
        $ifEmployed2.find('#nameOfCompany').rules('add', {required:true});
      }*/
    }//end
    //return false; 
  }

var updateShares = function () {
    $sh = $ben_g.find('input[id*="share\\]"]');
    numShares2 = $sh.length;
    numEmptyShares2 = 0;
    totalShares2  = 0;
    $.each($sh, function() {
      totalShares2 += roundToTwo(parseFloat($(this).val() || 0));
      numEmptyShares2 += ($(this).val()==='')?1:0;
    })
    test = (100 === roundToTwo(totalShares2) || (99.99 === roundToTwo(totalShares2)) ) && numEmptyShares2 === 0;
    test = (numEmptyShares2 > 0 && numShares2 === numEmptyShares2)?true:test;
    if(test) {
      $.each($sh, function() {
        $(this).data("title", "") // Clear the title - there is no error associated anymore
          .removeClass("ty-has-error")
          .tooltip("destroy");
      });
    } else {
      $.each($sh, function() {
        $(this).tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
          .data("title", 'Total shares should be approx. 100.')
          .addClass("ty-has-error")
          .tooltip();
      });
    }
  }

$(document).ready(function(){
      $('html').animate({ scrollTop: 0 }, "slow");//SCROLL MODAL UP

      //modal tabs personalInformation, financialInformation etc
      $('#member-nav-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      })

      var submitButton = $modal.find('button[type="submit"]');

    var ID2;
    $('h1').on('click','button[data-target="#ModalAdd"]',function() {
    	var ID = (new Number(new Date()))+'-'+(Math.floor(Math.random()*100));
    	$('#membersID').val('b'+ID);
    	ID2 = 'b'+ID;
      var op = {};

          op = {
          mainItems : [{"name" : "Elementary", 
                    "mainDom" : "<option value='0'>Elementary</option>",
                    "hiddenDom" : '<div id="ea2Container"><select id="ea2" name="ea2" class="form-control">' +
                                  '<option value="1">Grade 1</option>' +
                                  '<option value="2">Grade 2</option>' +
                                  '<option value="3">Grade 3</option>' +
                                  '<option value="4">Grade 4</option>' +
                                  '<option value="5">Grade 5</option>' +
                                  '<option value="6">Grade 6</option>' +
                                  '</select>' +
                                  '<input  id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                       "values":{"eao":''}
                   },
                   {"name" : "Secondary", 
                    "mainDom" : "<option value='1'>Secondary</option>",
                    "hiddenDom" : '<div id="ea2Container"><select id="ea2" name="ea2" class="form-control">' +
                                  '<option value="1">1st Year</option>' +
                                  '<option value="2">2nd Year</option>' +
                                  '<option value="3">3rd Year</option>' +
                                  '<option value="4">4th Year</option>' +
                                  '</select>' + 
                                  '<input id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                    "values":{"eao":''}
                   },
                   {"name" : "Tertiary", 
                    "mainDom" : "<option value='2'>Tertiary</option>",
                    "hiddenDom" : '<div id="ea2Container"><input id="degree" type="text" class="form-control" name="ea2degree" placeholder="Specify Degree Here"/>' +
                                  '<input id="course" type="text" class="form-control" name="ea2course" placeholder="Specify Course Here"/>' +
                                  '<input id="specifyOthers" type="text" class="form-control" name="eao" placeholder="Specify Others Here"/></div>',
                    "values": {"ea2degree":'', 
                             "ea2course":'',
                             "eao":''
                             }
                   }/*,
                   {"name" : "Others", 
                    "mainDom" : "<option value='3'>Others</option>",
                    "hiddenDom" : '<div id="ea2Container"><input id="specifyOthers" type="text" class="form-control" name="ea2" placeholder="Specify Others Here"/></div>'
                   }*/
                   ]
          };
          $modal.find('#ed').ea(op);
          ben_ = $modal.find('#benefeciaries').benefeciaries(bObj);
    });

    $modal.find('.modal-footer button[data-dismiss="modal"]').on('click', function(e) { // on modal cancel btn clicked
      if(e.ctrlKey) { // if ctrl key is pressed open a new tab (feature to help undecided user not to immediately lose field input entered; not yet submitted)
        window.open(location.href);
        return false;
      }
    })

    $modal.on('hidden.bs.modal', function (e) { // on modal close
      $('.modal-msg').html('');
      $modal.find('.ty-has-error, .ty-has-error-si, .ty-has-error-tab-pane').removeClass("ty-has-error ty-has-error-si ty-has-error-tab-pane");
      //$modal.find('.ty-has-error-tab-pane').removeClass('ty-has-error-tab-pane');
      $('#ModalLabel').html('Add Member');
      ele = $modal.find('button[type="submit"]');
      $(ele).html('Add Member');
      $(ele).removeClass('member-edit');
      $(submitButton).show();
      $modal.find('input, textarea, select').removeAttr('disabled');
      //$modal.find('input, textarea, select').prop('disabled',false);
    })

    $modal.on('submit','.member-create-submit',function(e) { //on modal form submit
      e.preventDefault();
      //$modal.find('.modal-msg').delay(2000).fadeOut(1000).html('').show();
      $modal.find('.ty-has-error-tab-pane').removeClass('ty-has-error-tab-pane').end().find('.modal-msg').html('').end().find('.ty-has-error').removeClass('ty-has-error');
      
      sBtn = $modal.find('button[type="submit"]');
      sBtnText = $(sBtn).text();
      $(sBtn).text("Sending..");
      $(sBtn).prop('disabled',true);
      //$modal.find('').removeClass('ty-has-error');
      

    	$('.modal-msg').html('');
    	//$(this).find('#members-id').val(ID2);
    	data = $(this).serialize()+'&isMarried='+$.data(document, "isMarried")+'&id='+$.data(document, "hiddenmember");
      url = (isEditMode())?"members/update/"+$.data(document, "hiddenmember"):"members/create";
      
      if(!($modal.find('#others').is(":checked"))) { // if no other spouse occu clear input
        $('#othersSpecified').val("");
      } 

      //source of income sourceofincome
      if(!$modal.find('#si\\[siOthers\\]').is(":checked")) {
        $modal.find('#siOthersSpecified').val('');
      }

    	$.ajax({
    		type:"POST",
    		url:url,
    		data : data,
    		success:function(result) {
    			if(typeof result === 'object' && !result.success) {
    				//no more loop that populates .modal-msg
            for (var key in result.data) {
             if (result.data[key]) {
              $('.modal-msg').append('<div class="alert-danger">'+result.data[key]+"</div>");
              //tabPaneID = $('.modal-dialog').find('input[name="firstName"]').addClass('has-error').closest('.tab-pane').attr('id');

              if(key==='sourceOfIncome') {//source of income sourceofincome
                $si = $fi.find('#siLabel');
                $si.html('Source of Income: (please select atleast 1)').addClass('ty-has-error-si');
              } else {
                //$('#'+key).addClass('ty-has-error');
                //$(modal).find('#'+key).after('<div class="ty-has-error">error</div>');
                //.delay(2000).fadeOut(1000).html('').show();
              }
             }
          }
          $(sBtn).prop('disabled',false);
          $(sBtn).text(sBtnText);
          $errorTabs = $modal.find('.has-error, .ty-has-error, .ty-has-error-si').closest('.tab-pane');
          //$modal.find('#member-nav-tabs a[href="#'+tabPaneID+'"]').addClass('ty-has-error-tab-pane').first().click();
          $.each($errorTabs, function() {
            $modal.find('#member-nav-tabs a[href="#'+$(this).attr('id')+'"]').addClass('ty-has-error-tab-pane');
          });

          $modal.find('#member-nav-tabs .ty-has-error-tab-pane:first').click();
          
    				//$('.modal-msg').append()
          $modal.animate({ scrollTop: 0 }, "slow");//SCROLL MODAL UP
    			} else if(result.success) {
    				window.location.reload(true);
    			} else {
            console.log("system died");
            errorMsg = 'You are not logged in/ session expired. Please '+'<a id="failGotoLogin" href="/login" target="_blank">Log In</a>';
            $('.modal-msg').append('<div class="alert-danger">'+errorMsg+"</div>");
            $modal.animate({ scrollTop: 0 }, "slow");//SCROLL MODAL UP
            $(sBtn).prop('disabled',false);
            $(sBtn).text(sBtnText);
            //window.open('/login','Login','width=auto,height=auto');
            //window.location.reload('bupharco.dev/members/failIt');
          }
  		  },
        error : function(request, status, error) {
          console.log(request);
          console.log(status);
          console.log(error);
          if(status === 'error') { // this is triggered when you turn off apache engine, or error in code, dunno what others that triggers this
            callServerConProblem();
          }
        }
    	})
    });

    /* add member contact validation*/
    $modal.on('change keydown keyup', '#contact',function(e) {
      content = $(this).val();
      contactfn(content);
      //$(this).val(filtered);
    });

    /* edit member */
    $('#memberTable').on('click','a[class^="memberedit-"]',function(e) {
      e.preventDefault();
      className = $(this).attr('class');
      id = className.substring(className.lastIndexOf('-')+1);
      getMemberByMode(id,'edit');
    });

  /* toggle spouse data */
  $('#others').prop('checked',false);
  //on modal shown
  $modal.on('shown.bs.modal', function(){
    civilStatus = $('#civilStatus option:selected').text();
    if(civilStatus === 'Married') {
      $.data(document, "isMarried",'truestring');
      $('.spouse-info').show();
    } else {
      $.data(document, "isMarried",'falsestring');
      $('.spouse-info').hide();
    }

$.validator.addMethod("shareTo100", function(value, element) {
  eachShare = roundToTwo(totalShares2/numShares2);
  $.validator.messages.shareTo100 = 'Total shares should be approx. 100';
  test = (100 === roundToTwo(totalShares2) || (99.99 === roundToTwo(totalShares2)) ) && numEmptyShares2 === 0;
  test = (numEmptyShares2 > 0 && numShares2 === numEmptyShares2)?true:test;
  return test;
}, $.validator.messages.shareTo100);

updateShares();
$ben_g.find('.addSet').on('click', function() {
  updateShares();
}).end().on('change, focusout', 'input[id*="share"]', function() {
  updateShares();
}).on('click', '.btrash', function() {
  updateShares();
})

var myRules = {
          "suffixName" : {
            isSuffix : true
          },
          "membersID" : {
            required : true
          },
          "firstName" : {
            alphaSpace : true,
            required : true
          },
          "lastName" : {
            alphaSpace : true,
            required : true
          },
          "middleName" : {
            alphaSpace : true,
            required : true
          },
          "birth1[month]" : {
            notEqualTo : {'val':'0', "label" : "Month of Birth"},
            required : true
          },
          "birth1[day]" : {
            notEqualTo : {'val':'0', "label" : "Day of Birth"},
            required : true
          },
          "birth1[year]" : {
            notEqualTo : {'val':'0', "label" : "Year of Birth"},
            required : true
          },
          "siChecker" : {
            required : true
          },
          "nameOfCompany" : {
            required : true,
            alphaNumSDCSl : true
          },
          "officeAddress" : {
            required : true,
            alphaNumSDCSl : true
          },
          "sssgsis" : {
            required : true,
            numDCS : true
          },
          "jobTitle" : {
            required : true,
            alphaNumSDCSl : true
          },
          "employmentStatus" : {
            required : true,
            alphaNumSDCSl : true
          },
          "contactNumber" : {
            required : true,
            numDCS : true
          },
          "grossIncomePerMonth" : {
            required : true,
            nowhitespace : true,
            numeric : true
          },
          "typeOfBusiness" : {
            required : true,
            alphaNumSDCSl : true
          },
          "tradeName" : {
            required : true,
            alphaNumSDCSl : true
          },
          "businessAddress" : {
            required : true,
            alphaNumSDCSl : true
          },
          "sSSNo" : {
            required : true,
            numDCS : true
          },
          "capital" : {
            required : true,
            nowhitespace : true,
            numeric : true
          },
          "contactNumber2" : {
            required : true,
            numDCS : true
          },
          "grossIncomePerMonth2" : {
            required : true,
            nowhitespace : true,
            numeric : true
          }
        }

    $modal.on('hidden.bs.tooltip', function() {
      var tooltips = $('.tooltip').not('.in');
      if (tooltips) {
        tooltips.remove();
      }
    });

    $siCheckboxes = $modal.find('.si-income-container div input:checkbox');
    $siCheckInput = $siCheckboxes.not('#siChecker');
    $siCheckInput.on('change', function(e) {
      count = 0;
      $.each($siCheckInput, function() {
        count += ($(this).is(':checked')?1:0);
      })
      $siHiddenCheckbox = $siCheckboxes.parent('div').find('#siChecker');
      if(count) {
        if(!$siHiddenCheckbox.is(':checked')) {
          $siHiddenCheckbox.click().prop('checked',true);
        } 
      } else {
        $siHiddenCheckbox.click().prop('checked',false);
      }

    })

    $modal.find('form[class^="member-"]').submit(function() {
        addExtraFieldRule();
        errorTabsReady = 1;
    });
    $modal.find('form[class^="member-"]').validate({
        invalidHandler: function(form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {                    
                var $erredEl = $(validator.errorList[0].element);
            }
        },
        ignore : "",
        onkeyup : false,
        rules : myRules,
        showErrors: function(errorMap, errorList) {

          /*console.log("error Map", errorMap);
          console.log("error List", errorList);*/
         
        // Clean up any tooltips for valid elements
        $.each(this.validElements(), function (index, element) {
          var $element = $(element);
          
          if($element.prop('type') == 'checkbox') {
            //$element.attr('id')
            key = 'si';
            $el = $modal.find('.'+key);
            $el.data("title", "") // Clear the title - there is no error associated anymore
            .removeClass("ty-has-error-si")
            .tooltip("destroy");
              return true;
          } 

          $element.data("title", "") // Clear the title - there is no error associated anymore
          .removeClass("ty-has-error")
          .tooltip("destroy");
        });
         
        // Create new tooltips for invalid elements
        $.each(errorList, function (index, error) {
          var $element = $(error.element);
          //if($element.prog('tagName') == )
          if($element.prop('type') == 'checkbox') {
            //$element.attr('id')
            key = 'si';
            $el = $modal.find('.'+key);
            $el.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
            .data("title", error.message)
            .addClass("ty-has-error-si")
            .tooltip(); 
              return true;
            }
             
          $element.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
          .data("title", error.message)
          .addClass("ty-has-error")
          .tooltip(); // Create a new tooltip based on the error messsage we just set in the title
        });
        $modal.find('#member-nav-tabs .ty-has-error-tab-pane').removeClass('ty-has-error-tab-pane');
        $errorTabs = $modal.find('.has-error, .ty-has-error, .ty-has-error-si').closest('.tab-pane');
          //$modal.find('#member-nav-tabs a[href="#'+tabPaneID+'"]').addClass('ty-has-error-tab-pane').first().click();
        $.each($errorTabs, function() {
          $modal.find('#member-nav-tabs a[href="#'+$(this).attr('id')+'"]').addClass('ty-has-error-tab-pane');
        });
        //console.log($modal.find('#member-nav-tabs .ty-has-error-tab-pane'));
        //$modal.find('#member-nav-tabs .ty-has-error-tab-pane:first').click();
          if(errorTabsReady) {
            errorTabsReady = 0;
            $modal.find('#member-nav-tabs .ty-has-error-tab-pane:first').click();
          }
        }/*,
         
        submitHandler: function(form) {
        //alert("This is a valid form!");
        //form.submit();
        }*/
      });

$modal.find('form[class^="member-"]').valid();

  });/* end toggle spouse data */


    $('#others').on('change', function() {  
      $(ts).val(tsPrevVal).toggle();
      /*if($(ts).is(':visible')) {
        $(ts).prop('required',true);
      } else {
        $(ts).prop('required',false);
      }*/
    })

    $('#si\\[siOthers\\]').on('change', function() {  
      $(siOtherts).val(siOtherPV).toggle();
      /*if($(ts).is(':visible')) {
        $(ts).prop('required',true);
      } else {
        $(ts).prop('required',false);
      }*/
    })

    $modal.on('change','#civilStatus',function(e) {
      civilStatus = $(this).find('option:selected').text();
      if(civilStatus === 'Married') {
        $.data(document, "isMarried",'truestring');
        $('.spouse-info').show();
      } else {
        if($('.spouse-info').is(':visible')) {
          $('.spouse-info').hide();
        }
        $.data(document, "isMarried",'falsestring');
        $spouseSelect.rules('remove');
      }
    })

    /*show member*/
    //1
    $('#memberTable').on('click','a[class^=show-member-]',function(e) {
      e.preventDefault();
      className = $(this).prop('class');
      id = className.substring(className.lastIndexOf('-')+1);
      getMemberByMode(id,'show');
    });

    //2
    $('#memberTable').on('click','a[class^=member-show-]',function(e) {
      e.preventDefault();
      $(this).closest('td').prev("td").find('a[class^="show-member-"]').trigger('click');
    });

  /*modal 2 modes edit/show */
  var showModalByMode = function(mode) {}

  /*member delete*/
  $('#memberTable').on('click', '.memberdelete', function(e) {
    fullName = $(this).closest('td').prev('td').children('a[class^="show-member"]').text();
    if(confirm("Are you sure you want to delete member "+fullName+'?')) {
      ;
    } else {
      e.preventDefault();
    }
  })

  if(1 || window.location.href === 'http://bupharco.dev/members' || (new RegExp('(bupharco.dev/members)+(#)+','gim').test(window.location.href))) {
    var ele = '<div style="width:300px; float:left">' + 
                '<i style="float:left" data-toggle="context" data-target="#context-menu" class="member-options fa fa-cogs btn btn-default"></i>' +
                //then the print and other btns
                '<i style="float:left" class="btn btn-default list-print fa fa-print fa-lg"></i>' +
                '<select style="width:150px; float:left" class="form-control" id="ty_member_sorter">' +
                '<option data-item="First Name">Some Option</option>' +
                '<option data-item="Last Name">Some Other Option</option>' +
                '</select>' +
              '</div>';
    $('.dataTables_filter').after(ele);
  }

    var th = $('th[class^="head"]');
    var th_count = $(th).length;
    $('th[class^="head"]:not(.head0, .head'+(th_count-1)+')').prepend('<i class="fa fa-sort"></i>    ');

    $('#memberTable').on('click', th, function(e) {
      th_count = $(th).length;
      $('th[class^="head"]:not(.head'+(th_count-1)+').sorting').find('i').removeClass().addClass('fa fa-sort');
      $('th[class^="head"]:not(.head'+(th_count-1)+').sorting_asc').find('i').removeClass().addClass('fa fa-sort-desc');
      $('th[class^="head"]:not(.head'+(th_count-1)+').sorting_desc').find('i').removeClass().addClass('fa fa-sort-asc');
    });

  //ty.. member list print
  $('#memberTable').on('click', '.list-print', function(e) {
      //getTableDataTest('#memberTable');
      getTableData();
  })

  //column 1 member-options check all/ print ... etc
  var memberCheckAll = $('#memberCheckALl');
  $(memberCheckAll).prop('checked', false);
  $(memberCheckAll).on('click', function(e) {
    if($(this).prop('checked')) {
      $('input[type="checkbox"][id^="member-checked-"]').prop('checked', true);
    } else {
      $('input[type="checkbox"][id^="member-checked-"]').prop('checked', false);
    }
  });

  $('.member-options').contextmenu({
      target: '#context-menu',
      before: function (e, element, target) {
          e.preventDefault();
          if (e.target.tagName == 'SPAN') {
              e.preventDefault();
              this.closemenu();
              return false;
          }
          return true;
      },
    onItem: function(e, item) {
      e.preventDefault();
      tabindex = $(item).attr('tabindex');
      if(tabindex === '0') {//delete all
        var deleteIDs = [];
        var items = $('input[type="checkbox"][id^="member-checked-"]:checked');
        $.each(items, function() {
          deleteIDs.push(($(this).attr('id')).substring(($(this).attr('id')).lastIndexOf('-')+1));
        });

      if(deleteIDs.length>0) 
        if(confirm("are you sure to delete all checked entries?")) {
          var f = document.createElement("form");
          f.setAttribute('method',"post");
          f.setAttribute('action',"members/deleteChecked");

          var i = document.createElement("input"); //input element, text
          i.setAttribute('type',"text");
          i.setAttribute('name',"deleteIDS");
          i.value = JSON.stringify(deleteIDs);


          var s = document.createElement("input"); //input element, Submit button
          s.setAttribute('type',"submit");
          s.setAttribute('value',"Submit");

          f.appendChild(i);
          f.appendChild(s);

          //and some more input elements here
          //and dont forget to add a submit button

          document.getElementsByTagName('body')[0].appendChild(f);
          f.submit();
        }
      }
    }
  });

  $('#memberTable').on('click', '.member-options', function(e) {
          e.stopPropagation();
          $(this).contextmenu( 'show', e )
  });

  $ebf.find('.ifEmployed').load('/api/getIfEmployed', function(responseText, textStatus, XMLHttpRequest) {
    if(textStatus === 'success') {
      ebfE = responseText;
      $(this).children('.container_FI').remove();
    } else {
      callServerConProblem('#memberTable');
    }
  });

  $ebf.find('.ifBusiness').load('/api/getIfBusiness', function(responseText, textStatus, XMLHttpRequest) {
    if(textStatus === 'success') {
      ebfB = responseText;
      $(this).children('.container_FI').remove();
    } else {
      callServerConProblem('#memberTable');
    }
  });

  $ebf.find('#ebf\\[employed\\]').on('change', function(e) {
    if($(this).is(":checked")) {
      if(typeof ebfE === 'undefined') {
        $ebf.find('.ifEmployed').load('/api/getIfEmployed', function(html) {
          ebfE = html;
          $ebf.find('.ifEmployed').html(ebfE);
        });
      }
      else {
        $ifE = $ebf.find('.ifEmployed');
        $ifE.html(ebfE);
        if(!$.isEmptyObject(ifEmployedArr)) {
            for(var prop in ifEmployedArr) {
              item = ifEmployedArr[prop];
              if(ifEmployedArr.hasOwnProperty(prop)){
                $ifE.find('input[name="'+prop+'"]').val(item);
              }
            }
          }
      }
    } else {
      ifEmployedArr = $ebf.find('.ifEmployed :input').serializeObject();
      $ebfE = $ebf.find('.ifEmployed');//todo make a function that would fill the form. leveraging serializeObject plgin, (to mke sure field input retains on unlicks, q to ponder : data might then be arbitrary so as to be unreliable, use view for reliability instead.)
      $ebf.find('.ifEmployed .container_FI').remove();
    }
  }).end().find('#ebf\\[business\\]').on('change', function() {
    if($(this).is(":checked")) {
      if(typeof ebfB === 'undefined') {
        $ebf.find('.ifEmployed').load('/api/getIfEmployed', function(html) {
          ebfB = html;
          $ebf.find('.ifEmployed').html(ebfB);
        });
      }
      else {
        $ifB = $ebf.find('.ifBusiness');
        $ifB.html(ebfB);
        if(!$.isEmptyObject(ifBusinessArr)) {
            for(var prop in ifBusinessArr) {
              item = ifBusinessArr[prop];
              if(ifBusinessArr.hasOwnProperty(prop)){
                $ifB.find('input[name="'+prop+'"]').val(item);
              }
            }
          }
      }
    } else {
      ifBusinessArr = $ebf.find('.ifBusiness :input').serializeObject();
      $ebfB = $ebf.find('.ifBusiness');//todo make a function that would fill the form. leveraging serializeObject plgin, (to mke sure field input retains on unlicks, q to ponder : data might then be arbitrary so as to be unreliable, use view for reliability instead.)
      $ebf.find('.ifBusiness .container_FI').remove();
    }
  }).end().find('#ebf\\[farmer\\]').on('change', function() {
    if($(this).is(":checked")) {
      if(typeof ebfB === 'undefined')
        $ebfB = $ebf.find('.ifBusiness').load('/api/getIfBusiness');
      else
        $ebf.find('.ifBusiness').html(ebfB);
    } else {
      $ebf.find('.ifBusiness .container_FI').remove();
    }
  })

  resetModalCheckboxes();
});//.ready end
}).call(this);