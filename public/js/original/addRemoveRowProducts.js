 function addRow(setCookie){
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
      rowToInsert = "<tr><td><input id='itemName"+rowArrayId+"' required name='product["+rowArrayId+"][name]' class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' />"+
      "<input type='hidden' class='rowId' value='"+rowArrayId+"'>"+
      "<input type='hidden' name='product[" + rowArrayId + "][itemId]' id='itemId'></td>";
        $("#tblItemList tbody").append(
            rowToInsert+
            "<td><textarea readonly name='product["+rowArrayId+"][description]' class='form-control description' rows='1' ></textarea></td>"+
            "<td><input type='number' min='1' max='9999' name='product["+rowArrayId+"][quantity]' class='qty form-control' required />"+
            "<input id='poItemId' type='hidden' name='product[" + rowArrayId + "][poContentId]'></td>"+
            "<td><input type='number' min='1' step='any' max='9999' name='product["+rowArrayId+"][price]' class='price form-control' required /></td>"+
            "<td class='subtotal'><center><h3>0.00</h3></center></td>"+
            "<input type='hidden' name='product["+rowArrayId+"][delete]' class='hidden-deleted-id'>"+
            "<td class='actions'><a href='#' class='btnRemoveRow btn btn-danger'>x</a></td>"+
            "</tr>");
            
var rowId = "#itemName"+rowArrayId;
$(rowId).select2(sOptions);

rowArrayId = rowArrayId + 1;
 
};

  $(".qty, .price").bind("keyup change", calculate);

storeData();
};



    
function removeRow(){
      
var row = $(this).closest('tr');
var selected = row.find('input.itemSearch').val();

if(selected)
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
     
     storeData();
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
        storeData();
      return false;

}
     

};








    // $("#btnAddRow").bind("click", addRow);     