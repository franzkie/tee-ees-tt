$(function(){

	function addRow(){
		$("#tblContacts tbody").append(
			"<tr>"+
			"<td><input type='text'/></td>"+
			"<td><input type='text'/></td>"+
			"<td><input type='text'/></td>"+
			"<td><img src='images/delete.png' class='btnRemoveRow'/></td>"+
			"</tr>");

		$(".btnRemoveRow").bind("click", removeRow);
	

	};

	
	function removeRow(){
		var par = $(this).parent().parent(); //tr
		par.remove();
	};

	$(".btnRemoveRow").bind("click", removeRow);
	$("#btnAddRow").bind("click", addRow);			

});