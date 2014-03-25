 //var sOptions={};

var sOptions = {
        placeholder: 'Select a product',
        formatResult: productFormatResult,
        formatMessage: console.log("successxx"),
        formatSelection: productFormatSelection,
         initSelection : function (element, callback) {

        //alert(element.val());
        if(element.attr("value")=="undefined"){
        	element.attr("value",'');
        }
        var data = {
          itemName: element.attr("value")
        };

		//console.log(element);

        callback(data);
    },

        dropdownClass: 'bigdrop',
        escapeMarkup: function(m) { return m; },
        formatNoMatches: function( term ) { 
         
          $('.select2-input').on('keyup', function(e) {
             if(e.keyCode === 13) 
               {
                $("#modalAdd").modal();          
                $(".select2-input").unbind( "keyup" );
               }
          });

        return "<li class='select2-no-results'>"+"No results found.<button class='btn btn-success pull-right btn-xs' onClick='modal()'>Add New Item</button></li>";
        },
        minimumInputLength:1,
        ajax: {
            url: '/api/productSearch',
            dataType: 'json',
            data: function(term, page) {
                return {
                    q: term
                };  
            },  
            results: function(data, page) {
                return {results:data};
            }   
        }   
  
    };

function productFormatResult(product) {
    var html = "<table><tr>";
    html += "<td>";
    html += product.itemName ;
    html += "</td></tr></table>";
    return html;
}



  function productFormatSelection(product) {
    var selected = "<input type='hidden' name='itemId' value='"+product.id+"'/>";

    return selected + product.itemName;
  }

