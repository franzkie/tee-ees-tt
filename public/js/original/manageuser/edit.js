

 $('.edit-btn').click(function() {
 	
 
    //var text = $('#test-text').text();
   // alert(text);
    var $this = $(this);
   	var p = $this.siblings('p');
    var div = $this.siblings('div');
   	var pId = p.attr('id');
   	var pText = p.text();
    var input = '';
    var inputType = '';
  console.log("pText = "+pText);

    console.log(p.attr('class'));
   	$this.hide();
   
   if(p.hasClass('dropdown'))
   {
    input = $('<select id="i'+pId+'"></select>');
    var opts = '';
    inputType = 'dropdown';
    var getOpts = $.ajax({
        type:'get',
        url: '/api/getUserOption/'+pId,
        data:{},
        success: function(data){       
          data.option.forEach(function(type)
            {
              if(type==pText){
              $('#i'+pId).append($('<option>').text(type).attr('value', type).attr('selected',true)); }
              else
              $('#i'+pId).append($('<option>').text(type).attr('value', type));
              
            });

        }});

   
 

    console.log(input);
   }
   else{
    input = $('<input id="i'+pId+'" value="' + pText + '" />');
   }
    
    $('#'+pId).text('').append(input);
    if (inputType=='dropdown') {
      input.focus();
    }
    else{input.select();}

    $('#i'+pId).on('keyup', function(e) {
             if(e.keyCode === 13 || e.keyCode === 27 ) 
               {
	           this.blur();
               }
          });


  input.blur(function() {
  var text = $('#i'+pId).val();
  console.log("text = "+text +": pText = "+pText);

		console.log(text);
        if(text == pText ){
 		       p.text(pText);
             $this.show();    
        }

      if(!text){

        	p.text(pText);
            $this.show();   
     
        }

       if(text&&text!=pText){
          console.log("sucess");
         

        $.ajax({
	    type: 'post',
	    url: '/humanresource/manageusers/'+myvar,
	    dataType: 'json',
	    data:{field:pId, data:text},
      beforeSend: function () { div.addClass('loader'); },             
      complete: function () { div.removeClass('loader'); },
	    success: function(data){
	
	    	if(data.success)
					{
						  console.log("posted!");
              $('#i'+pId).parent().text(data.value);
              $('#i'+pId).remove();
              $this.show();			

					}
			else
					{

              console.log("posted!");
              $('#i'+pId).parent().text(pText);
              $('#i'+pId).remove();
              $this.show();   
					
					}

	  
	    }
	  
	});
}


       
    });
});
