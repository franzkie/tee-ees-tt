(function() {

  (function( $ , document){
      /* plgins 
      ** 1.) ea
      ** 2.) benefeciaries
      ** 3.) serializeObject
      */
      $.fn.ea = function(options) { //plugin 1
        options = $.extend({}, $.fn.ea.defaultOptions, options);

        var DOM = this;

        $(this).html(options.mainItems[0].hiddenDom);
        mainCboxHead = "<label class='control-label' for='ea1'>Educational Attainment</label>" +
                    '<select id="ea1" name="ea1" class="form-control">';
        mainCboxFoot = '</select>';
        SecCboxHtml = '';

        for(var i in options.mainItems) {
          var item = options.mainItems[i];
          mainCboxHead += item.mainDom;
        }
        mainCboxHtml = mainCboxHead + mainCboxFoot;

        SecCboxHtml = options.mainItems[0].hiddenDom;
        var values = options.mainItems[2].values;
        $(document).off('change').on('change', '#ea1', function() {
          SecCboxHtml = options.mainItems[$(this).val()].hiddenDom;
          $(DOM).find('#ea2Container').replaceWith(SecCboxHtml);
          if(values.EAdegree !== '') {
            $(DOM).find('#degree').val(values.ea2degree);
          }
          if(values.EAcourse !== '') {
            $(DOM).find('#course').val(values.ea2course);
          }
          if(values.EAothers !== '') {
            $(DOM).find('#specifyOthers').val(values.eao);
          }
        })

        $(this).html(mainCboxHtml + SecCboxHtml);
        return this;
      }

       $.fn.benefeciaries = function(options) {//plugin 2
        options = $.extend({}, $.fn.benefeciaries.defaultOptions, options);

        var DOM = this;
        var n,r,bm,db,by,s,count=0,bHeadNext,totalShare = 0, numShares = 0;
        $modalMsg = $(document).find('.modal-msg');

        var appendSet = function(content) {
         content = (typeof content !== 'undefined') ? content : {};
          DOM.appendSet(content);
        }

        var fillFreshSet = function(dbObj) {
         dbObj = (typeof dbObj !== 'undefined') ? dbObj : {}; //set default value
          DOM.fillFreshSet(dbObj);
        }

        //$(DOM).html('wow');
        bHead = "<label class='control-label' for='b1[name][0]'>Member's Benefeciaries and corresponding percentage share: </label>" +
                    '</br><label class="control-label" style="font-size:80%">(in case percentage is not specified, it is understood that they will have equal shares)</label></br>';
        
        bMain = '';
        bFoot = '<div class="col-xs-11"><i style="color:green" class="fa fa-plus fa-lg btn-default btn addSet"></i></div>';
        count = 0;
        for(var i in options) {
          count++;
        }
        //console.log("NOw count is "+count);

        bHead += '<div class="b-container-0">';
        for(var i in options[(count-1)].set) {
          var item = options[(count-1)].set[i];
          bHead += item.mainEl;
        }
        bHead += '</div>';
        //console.log("count is "+(count-1));


        mainHtml = bHead + bFoot;
        $(DOM).html(mainHtml);
        $(DOM).off('change').on('change', 'input, select', function(e) {
          //delete on change event. supposidly for auto addSet
        }).off('click').on('click', '.btrash', function(e) {//delete
            isDeletable = ($(DOM).find('div[class^="b-con"]').length > 1);
            if(isDeletable) {
              if(confirm("Are you sure? This delete operation cannot be undone.")) {
                self = this;
                index = $(self).attr('data-value'); 
                $(self).closest('.b-container-'+index).remove();//delete item
              }
            }
        }).find('.addSet').click(function() {//addset
          appendSet();
        });

         this.initialize = function() {
          //isFormValid();
          return this;
        };


        this.appendSet = function(content) { // public method
  //<div class="col-sm-1"><i class="fa fa-trash-o"></i></div>
         if($(DOM).find('div[class^="b-con"]').length === 3) return false;
         var set = [{
                    "mainEl" : '<div class="col-xs-4">' + 
                    '<div class="col-xs-12 col-xs-offset-2"><label for="b1[name]['+count+']">Name</label></div>' +
                    '<div class="col-xs-2"><i class="btrash fa fa-times btn btn-danger" data-value="'+count+'"></i></div><div class="col-xs-10"><input type="text" value="'+""+'" class="form-control b-input" id="b1[name]['+count+']" name="b1[name]['+count+']"/></div></div>'
                  },
                  {
                    "mainEl" : '<div class="col-xs-2">' + 
                    '<label for="b1[relation]['+count+']">Relation</label>' +
                    '<input type="text" value="'+""+'" class="form-control b-input" id="b1[relation]['+count+']" name="b1[relation]['+count+']"/></div>'
                  },
                  {
                    "mainEl" : '<div class="col-xs-4">' + 
                    '<label for="b1m['+count+']">Date of Birth</label>' +
                    '<fieldset class="birthday-picker"><select id="b1m['+count+']" data-label="Month of Birth" name="b1[month]['+count+']" class="birth-month form-control"><option value="0">MM</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="7">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select id="b1d['+count+']" data-label="Day of Birth" name="b1[day]['+count+']" class="birth-day form-control"><option value="0" selected="selected">DD</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select id="b1y['+count+']" data-label="Year of Birth" name="b1[year]['+count+']" class="birth-year form-control"><option value="0">YY</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option><option value="1895">1895</option><option value="1894">1894</option></select></fieldset></div>'
                  },
                  {
                    "mainEl" : '<div class="col-xs-2">' + 
                    '<label for="b1[share]['+count+']">% Share</label>' +
                    '<input type="text" value="'+""+'" class="form-control b-input" id="b1[share]['+count+']" name="b1[share]['+count+']"/></div>'
                  }];
          bHeadNext = '<div class="b-container-'+count+'">'
          for(var i in options[0].set) {
          var item = set[i];
          bHeadNext += item.mainEl;
          //console.log("i is "+i);
          //[{"name":"Tyro Hunter Tan","relation":"R1","Bday":"25","Bmonth":"6","Byear":"1990","share":"50"},{"name":"Tyrah","relation":"r2","Bday":"20","Bmonth":"1","Byear":"1986","share":"25"},{"name":"Tyrone Jr.","relation":"r3","Bday":"9","Bmonth":"11","Byear":"1983","share":"25"}]
        }
          bHeadNext += '<div>';
          //console.log(bHeadNext);
          $(DOM).find('div[class^="b-cont"]:last').after(bHeadNext);
          count++;
        }//end appendSet

        this.fillFreshSet = function(dbObj) {
         dbObj = typeof dbObj !== 'undefined' ? dbObj : {}; //set default value
         c = (dbObj.length)-1;
         for(x=0;x<c;x++) {
           appendSet();
         }
         for(var i in dbObj) {
          name = dbObj[i].name;
          relation = dbObj[i].relation;
          Bmonth = dbObj[i].Bmonth;
          Bday = dbObj[i].Bday;
          Byear = dbObj[i].Byear;
          share = dbObj[i].share;
          $(DOM).find('#b1\\[name\\]\\['+i+'\\]').val(name);
          $(DOM).find('#b1\\[relation\\]\\['+i+'\\]').val(relation);
          $(DOM).find('#b1m\\['+i+'\\]').val(Bmonth);
          $(DOM).find('#b1d\\['+i+'\\]').val(Bday);
          $(DOM).find('#b1y\\['+i+'\\]').val(Byear);
          $(DOM).find('#b1\\[share\\]\\['+i+'\\]').val(share);
         }
        }
      return this.initialize();
      }

      $.fn.ea.defaultOptions = {
      };

      $.fn.benefeciaries.defaultOptions = {
      };

      $.fn.serializeObject = function() {// plugin 3
         var o = {};
         var a = this.serializeArray();
         $.each(a, function() {
             if (o[this.name]) {
                 if (!o[this.name].push) {
                     o[this.name] = [o[this.name]];
                 }
                 o[this.name].push(this.value || '');
             } else {
                 o[this.name] = this.value || '';
             }
         });
         return o;
      };
    })(jQuery, document);

// custom $.validators except shareTo100 because of global vars like totalShares2

 $.validator.addMethod("alphaName", function(value, element) {
    re = new RegExp('^[a-zA-Z ]+(( )(jr.|sr.)){0,1}$','i');
  //return this.optional(element) || re.test(value);
  return this.optional(element) || re.test(value);
  },"Improper Characters.");

  $.validator.addMethod("alphaSpace", function(value, element) {
    re = new RegExp('^[a-zA-Z ]+$');
  return this.optional(element) || re.test(value);
  },"Improper Characters.");

  $.validator.addMethod("numDCS", function(value, element) {
    re = new RegExp('^[0-9 \\-,]+$');
  return this.optional(element) || re.test(value);
  },"Numbers, dashes, commas, or spaces only.");

  $.validator.addMethod("notEqualTo", function(value, element, param) {
  $.validator.messages.notEqualTo = 'Please specify a proper '+param.label+'. ';
  return this.optional(element) || value != param.val;
  }, $.validator.messages.notEqualTo);

  $.validator.addMethod("alphaNumSD", function(value, element) {
    re = new RegExp('^[a-zA-Z0-9 \\-]+$');
  return this.optional(element) || re.test(value);
  },"Letters, numbers, spaces or dashes only please.");

  $.validator.addMethod("alphaNumSDCSl", function(value, element) {
    re = new RegExp('^[a-zA-Z0-9 \\-,/]+$');
  return this.optional(element) || re.test(value);
  //},"Letters, numbers, spaces dashes, commas, or slashes only please.");
  },"Letters or valid punctuations only please.");

  $.validator.addMethod("numeric", function(value, element) {
    re = new RegExp('^\\d*(\\.\\d+)?$');
  return this.optional(element) || re.test(value);
  },"Only valid numeric input is allowed.");

  $.validator.addMethod("isSuffix", function(value, element) {
    re = new RegExp('^(jr|junior|sr|senior|(i|x|v|l)*)(\\.)?$','i');
    return this.optional(element) || re.test(value);
  },"Only jr, sr, III, IV etc.");

}).call(this);