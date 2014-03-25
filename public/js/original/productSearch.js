function productSearch(){

	var input = this.value;
	//console.log(input);

	$.get('/api/productSearch', 
    { option: input }, 
    function(data) {    

    return data;
	//console.log(data);

  });


}