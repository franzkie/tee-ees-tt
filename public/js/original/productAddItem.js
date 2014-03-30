function productAddItem(){

    $.getScript("/js/original/calculate.js", function(){ 
     //Here you can use anything you defined in the loaded script
    });

	$.ajax({
	    type: 'post',
	    url: '/inventory',
	    dataType: 'json',
	    data:$('form#productAddItem').serialize(),
	    success: function(data){
	   	console.log(data);
	    	if(data.success)
					{
					var module = location.pathname.split("/")[1];
					console.log(module);	


					$(".msg").html("<p class='text-success'>new item created</p>");
					$("#modalAdd").modal("hide");
					$("#DataTables_Table_0").dataTable().fnDraw();

					if(module!='inventory'){
						$("#s2id_itemName"+data.rowId).select2('data', {itemId: data.itemId, itemName: data.itemName});	

						var name = $("input#itemName"+data.rowId).val(data.itemName);
						var parent = $("#s2id_itemName"+data.rowId).parent().parent();
						var price = parent.find("td>input.price").val(data.itemPrice);
						var description = parent.find("td>textarea.description").text(data.itemDescription);
						var itemId = parent.find("td>input#itemId").val(data.itemId);
						var qty = parent.find("td>input.qty").val();
						var itemName = $(parent).find('input.itemSearch');
						$(itemName).attr("value",data.itemName);

						parent.find("td>input.qty").focus();

						subTotal = data.itemPrice * qty;

						var st = new Number(subTotal);
						var sub = st.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
	    				parent.find('.subtotal>center>h3').text(sub);
						calculate();
						
					}

					var notify = '<div class="message alert alert-success fade in">'+
					      '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>'+
					      '<h5><b>'+data.itemName+'</b> has been added to Item list!</h5></div>';


					$("#message-container").append(notify);     	
					$(".message").fadeTo(4000,0, function() {$(this).hide()});

						$('.message').hover(function(){
	        				$(this).stop().show().fadeTo(100,1);
	            		},
	            		function() {
	        			$(this).stop().fadeTo(4000,0, function() {$(this).hide()});
	            		});
							
					}
			else
					{
					$(".msg").html("<p class='text-danger'>"+data.error+"</p>");
					}

	   $('.msg').fadeIn().delay(4000).fadeOut();
	    }
	  
	});


	return false;

};