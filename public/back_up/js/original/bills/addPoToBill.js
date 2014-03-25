function addPoToBill(){

var poId = $(this).attr("value");

    $.get('/api/getPoContent', 
    { poId: poId }, 
    function(data) {
  	
var html = '';
for (i in data)
{

  html += "<tr class='poNumber"+data[i].poNumber+"'><td class='itemName'>"+data[i].itemName+"</td><td><input type='number' class='rQty form-control' value='"+data[i].quantity+"'></input></td><td><input value='"+data[i].quantity+
  "' class='eQty form-control'></td><td><input value='"+data[i].itemPrice+"' class='price form-control'></td><td class='subtotal'><center><h3>"+data[i].quantity*data[i].itemPrice+"</h3></center></td><td><label>"+data[i].poNumber+
  "</label></td><td class='actions'><a href='#' class='btnRemoveRow btn btn-danger'>x</a></td></tr>";
}

$("#tblItemList tbody").append(html);
calculate();
  });

$(this).text("remove PO");
$(this).addClass("removePoButton");    
$(this).removeClass("addPoButton");


}

function removePoToBill(){
	var poId = $(this).attr("value");
	$("tr.poNumber"+poId).remove();
	$(this).text("add PO");
	$(this).addClass("addPoButton");    
	$(this).removeClass("removePoButton");

calculate();

}