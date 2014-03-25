
function search(){
	

 var keyWord = $("#searchSupplier").val();

 console.log(keyWord);

$.ajax({
        url: 'api/searchSupplier',
        type: 'get',
        dataType: 'json',
        data: {searchKey: keyWord},
        success: function(response){
  var html = '<table><tbody>';

  console.log(response);

  response.data.forEach(function(row){
    html += '<tr><td>' + row.company + '</td><td>' + row.firstName + '</td><td>' + row.middleName + '</td><td>' + row.lastName + '</td><td>' + '<div class="btn-group"><button type="button" class="btn btn-success">Select Action</button> <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>'+
    '<ul class="dropdown-menu" role="menu">'+
    '<li><a href="">Create Bill</a></li>'+
    '<li><a href="purchase_orders/create/'+row.id+'">Create Purchase Order</a></li>'+
    '<li class="divider"></li>'+
    '<li><a href="suppliers/'+row.id+'/edit">Edit Details</a></li>'+
    '<li><a href="suppliers/delete/'+row.id+'">Delete</a></li>'+
    '</ul>'+
    '</div></td></tr>';
  });


  // html += '</tbody></table>';
  $('table#supplierTable tbody').html(html);


  //Set some elements innerHTML to html, or create the table some other way
}

    });



}

