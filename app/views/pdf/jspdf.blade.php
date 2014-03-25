<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title></title>
     
	{{ HTML::script("js/jspdf/js/jquery/jquery-1.7.1.min.js")}}
	{{ HTML::script("js/jspdf/js/jquery/jquery-ui-1.8.17.custom.min.js")}}
	{{ HTML::script("js/jspdf/js/libs/polyfill.js")}}
	{{ HTML::script("js/jspdf/jspdf.js")}}
	{{ HTML::script("js/jspdf/js/libs/deflate.js")}}
	{{ HTML::script("js/jspdf/js/libs/adler32cs.js/adler32cs.js")}}
	{{ HTML::script("js/jspdf/js/libs/FileSaver.js/FileSaver.js")}}
	{{ HTML::script("js/jspdf/js/libs/Blob.js/Blob.js")}}
	{{ HTML::script("js/jspdf/jspdf.plugin.standard_fonts_metrics.js")}}
	{{ HTML::script("js/jspdf/jspdf.plugin.split_text_to_size.js")}}
	{{ HTML::script("js/jspdf/jspdf.plugin.addimage.js")}}
	{{ HTML::script("js/jspdf/jspdf.plugin.cell.js")}}
	{{ HTML::script("js/jspdf/jspdf.plugin.from_html.js")}}


	</head>
	<body>



<div style="border-width: 2px; border-style: dotted; padding: 1em; font-size:120%;line-height: 1.5em;" id="fromHTMLtestdiv">

<table width="400">
  <colgroup>
    <col width="100%">
  </colgroup>
  <tbody>
  <tr>
    <td colspan="2">Mrs. Rosana May almora dela sajulga</td>
    <td></td>
    <td></td>
    
  </tr>
    <tr>
    <td colspan="2">Propia st.Malaybalay City</td>

    <td></td>
  </tr>


  </tbody>

</table>

<h1>table 2</h1>
<table>
  <colgroup>
    <col width="10%">
    <col width="30%">
    <col width="40%">
    <col width="10%">
    <col width="10%">
  </colgroup>
  <thead>
    <tr>
      <th>id</th>
      <th>item name</th>
      <th>description</th>
      <th>price</th>
      <th>qty</th>
      <th>subtotal</th>
    </tr>
  </thead>
  <tbody>

@for ($x=0; $x < 20; $x++)  


  @foreach ($items as $item => $value)
  <tr>

    <td>{{$value->itemId}}</td>
    <td>{{$value->itemName}}</td>
    <td>{{$value->description}}</td>
    <td>{{$value->itemPrice}}</td>
    <td>{{$value->quantity}}</td>
    <td>{{$value->quantity*$value->itemPrice}}</td>

  </tr>
  @endforeach

@endfor
  </tbody>

</table>



</div>
<div>

<button onclick="javascript:demoFromHTML()" class="button">Run Code</button></p></div></div>

</div>
	</div>

		<h1></h1>
    <script>
$(document).ready(function() {

demoFromHTML();
});

function demoFromHTML() {
  var pdf = new jsPDF('p', 'pt', 'letter')
 
  // source can be HTML-formatted string, or a reference
  // to an actual DOM element from which the text will be scraped.
  , source = $('#fromHTMLtestdiv')[0]

  // we support special element handlers. Register them with jQuery-style 
  // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
  // There is no support for any other type of selectors 
  // (class, of compound) at this time.
  , specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '#bypassme': function(element, renderer){
      // true = "handled elsewhere, bypass text extraction"
      return true
    }
  }

  margins = {
      top: 80,
      bottom: 60,
      left: 40,
      width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
      source // HTML string or DOM elem ref.
      , margins.left // x coord
      , margins.top // y coord
      , {
        'width': margins.width // max width of content on PDF
        , 'elementHandlers': specialElementHandlers
      },
      function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        

        pdf.save('Test.pdf');
        },
      margins

    )
}


    </script>

	</body>
	<footer>
	</footer>
	</html>

