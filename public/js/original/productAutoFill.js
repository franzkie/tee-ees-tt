//$(".productDropdown").bind("change", productDropdown);
function productAutoFill(){
    // $.getScript("/js/original/calculate.js", function(){ 
     // Here you can use anything you defined in the loaded script
//     });
var subTotal = 0;

    var $this = $(this);

    $.get('/api/productAutoFill', 
    { option: $this.val() }, 
    function(data) {    
        // console.log(data);
    var parent = $this.parents('tr'); 
    var price  = $(parent).find('input.price');
    var itemName = $(parent).find('input.itemSearch');
    var itemId = $(parent).find('input#itemId');
    var qty    = $(parent).find('input.qty').val();

    //var rQty   = $(parent).find('input.rQty').val();

    var description = $(parent).find('textarea.description');

    price.val(data.unitPrice);
    description.val(data.description);
    itemId.val(data.id);

    $(itemName).attr("value",data.itemName);

    console.log(itemName);
    if(!qty){
       qty = 0;
    }


    subTotal = data.unitPrice * qty;
    $(parent).find('.subtotal>center>h3').text(subTotal);
    storeData();
    calculate();
  });




}




var storeData = function () {
     var data = []; 
    $('#tblItemList tbody>tr').each(function () {
        var $this = $(this),

            pId = $this.find("#itemId").val();
            pname = $this.find('input.itemSearch').attr("value"),
            poId = $this.find('input#poItemId').val(),
            desc = $this.find(".description").val(),
            quant = $this.find(".qty").val(),
            rowId = $this.find(".rowId").val(),
            deleted = $this.find(".hidden-deleted-id").val(),
            price = $this.find(".price").val();
           
        var temp = { 
            productName: pname, 
            itemId:pId,
            poId:poId,
            description: desc,
            quantity: quant, 
            price: price,
            deleted:deleted, 
            rowId: rowId };
        data.push(temp);
    });


  
  
  var url = window.location.pathname;
  var storageName = 'dataOn'+url;
  localStorage.setItem(storageName, JSON.stringify(data));

  console.log(localStorage.getItem(storageName));

}




function loadStorageData(){
    var cookiePath = 'Table_Rows-'+$(location).attr('pathname');
    //console.log("loadCookieData:"+cookiePath);
    var url = window.location.pathname;
    var storageName = 'dataOn'+url;
    temp = localStorage.getItem(storageName);
    var parseData = JSON.parse(temp);
    //console.log(parseData);

    var url = window.location.pathname;
    var storageName = 'dataOn'+url;

    var html ='';



    for (i in parseData) {

        subTotal = parseData[i].quantity*parseData[i].price;
        var st = new Number(subTotal);
        var sub = st.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
        
        if(parseData[i].poId==null){
        parseData[i].poId="";
        }

       // alert(parseData[i].poId);

    if(parseData[i].deleted){     

        html+="<tr style='display:none;'><td><input id='itemName"+parseData[i].rowId+"' value='"+parseData[i].productName+"' name='product["+parseData[i].rowId+"][name]' disabled='true' class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' />"+
      "<input type='hidden' class='rowId' value='"+parseData[i].rowId+"'>"+
      "<input type='hidden' name='product[" + parseData[i].rowId + "][itemId]' value='"+parseData[i].itemId+"' id='itemId'></td>"+
      "<td><textarea readonly disabled='true' name='product["+parseData[i].rowId+"][description]' class='form-control description' rows='1' >"+parseData[i].description+"</textarea></td>"+
      "<td><input type='number' value='"+parseData[i].quantity+"' min='1' max='9999' name='product["+parseData[i].rowId+"][quantity]' disabled='true' class='qty form-control'  />"+
      "<input id='poItemId' type='hidden' value='"+parseData[i].poId+"' name='product[" + parseData[i].rowId + "][poContentId]'></td>"+
      "<td><input type='number' value='"+parseData[i].price+"' disabled='true' min='1' step='any' max='9999' name='product["+parseData[i].rowId+"][price]' class='price form-control'  /></td>"+
      "<td class='subtotal'><center><h3>0</h3></center></td>"+
      "<input type='hidden' name='product["+parseData[i].rowId+"][delete]' value='"+parseData[i].deleted+"' class='hidden-deleted-id'>"+
      "<td class='actions'><a href='#' class='btnRemoveRow btn btn-danger'>x</a></td>"+
      "</tr>";
    }

   else{

    html+="<tr><td><input id='itemName"+parseData[i].rowId+"' value='"+parseData[i].productName+"' required name='product["+parseData[i].rowId+"][name]' class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' />"+
      "<input type='hidden' class='rowId' value='"+parseData[i].rowId+"'>"+
      "<input type='hidden' name='product[" + parseData[i].rowId + "][itemId]' value='"+parseData[i].itemId+"' id='itemId'></td>"+
      "<td><textarea readonly name='product["+parseData[i].rowId+"][description]' class='form-control description' rows='1' >"+parseData[i].description+"</textarea></td>"+
      "<td><input type='number' value='"+parseData[i].quantity+"' min='1' max='9999' name='product["+parseData[i].rowId+"][quantity]' class='qty form-control' required />"+
      "<input id='poItemId' value='"+parseData[i].poId+"' type='hidden' name='product[" + parseData[i].rowId + "][poContentId]'></td>"+
      "<td><input type='number' value='"+parseData[i].price+"' min='1' step='any' max='9999' name='product["+parseData[i].rowId+"][price]' class='price form-control' required /></td>"+
      "<td class='subtotal'><center><h3>"+sub+"</h3></center></td>"+
      "<input type='hidden' name='product["+parseData[i].rowId+"][delete]' value='"+parseData[i].deleted+"' class='hidden-deleted-id'>"+
      "<td class='actions'><a href='#' class='btnRemoveRow btn btn-danger'>x</a></td>"+
      "</tr>";
        }
    }

$("#tblItemList tbody").html(html);

    for (i in parseData){
      var inputBox = "#itemName"+parseData[i].rowId;
      $(inputBox).select2(sOptions);
    }
    
   calculate(); 



}



