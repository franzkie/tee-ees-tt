function addRow(){
    var rowCount = document.getElementById('tblItemList').rows.length - 1 ;
    var rowArrayId = rowCount ;
    var toBeAdded = document.getElementById('toBeAdded').value;
    
    if (toBeAdded=='')
        { toBeAdded = 2; }
    else if(toBeAdded>10)
    {
      toBeAdded = 10;
    }

      for (var i = 0; i < toBeAdded; i++) {
      var rowToInsert = '';
      rowToInsert = "<tr><td><input id='itemId"+rowArrayId+"' required name='product["+rowArrayId+"][name]' class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' /></td>";
        $("#tblItemList tbody").append(
            rowToInsert+
            "<input type='hidden' name='product[" + rowArrayId + "][itemId]' id='itemId'>"+
            "<td><input type='number' min='1' max='9999' name='product["+rowArrayId+"][receivedQuantity]' class='rQty form-control' required /></td>"+
            "<td><input type='number' min='1' max='9999' name='product["+rowArrayId+"][expectedQuantity]' class='eQty form-control' required /></td>"+
            "<td><input type='number' min='1' step='any' max='9999' name='product["+rowArrayId+"][price]' class='price form-control' required /></td>"+
            "<td class='subtotal'><center><h3>0.00</h3></center></td>"+
            "<td class='poNumber'><label></label></td>"+
            "<input type='hidden' name='product["+rowArrayId+"][delete]' class='hidden-deleted-id'>"+
            "<td class='actions'><a href='#' class='btnRemoveRow btn btn-danger'>x</a></td>"+
            "</tr>");
            
var rowId = "#itemId"+rowArrayId;
$(rowId).select2({
        placeholder: 'Select a product',
        formatResult: productFormatResult,
        formatSelection: productFormatSelection,
        dropdownClass: 'bigdrop',
        escapeMarkup: function(m) { return m; },
        formatNoMatches: function( term ) {
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
    });

rowArrayId = rowArrayId + 1;
 
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
      $(".rQty, .price").bind("keyup change", calculate);
};

    
    function removeRow(){
      
var row = $(this).closest('tr');
var selected = row.find('input.itemSearch').val();
var hasItem = row.find('.itemName').text();
//alert(selected);
//$.getScript("/js/original/calculate.js", function(){});

if(selected||hasItem)
{
    var r=confirm("Confirm Remove?");
    if (r==true)
    {
   
      row.find('input.qty,input.price,textarea,input.itemSearch').attr("disabled", true);
      row.find('input.itemSearch').attr("required", false);
      row.find('input.hidden-deleted-id').val("yes");
      row.find('.subtotal>center>h3').text("0");
      calculate();
      
      row.hide();
      // row.css("opacity",".1");  
      // var b = $(this).parent("td").text();
      // console.log(b);
      return false;
    }
    else
    {
      return false;
    } 
}

else{

      row.find('input.qty,input.price,textarea,select').attr("disabled", true);
      row.find('input.itemSearch').attr("required", false);
      row.find('input.hidden-deleted-id').val("yes");
      row.find('.subtotal>center>h3').text("0");
      calculate();
      row.hide();
      // row.css("opacity",".1");  
      // var b = $(this).parent("td").text();
      // console.log(b);
      return false;

}
     
};
 

    // $("#btnAddRow").bind("click", addRow);     