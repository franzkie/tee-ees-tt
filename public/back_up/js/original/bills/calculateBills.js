
function calculate(){
var parent = $(this).parents('tr');
var price = $(parent).find('input.price').val();
var qty = $(parent).find('input.rQty').val();

if(qty==null){
	qty=0;
}
var subTotal;
subTotal = price*qty;

var st = new Number(subTotal);
var sub = st.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

$(parent).find('.subtotal>center>h3').text(sub);

var sum = 0;
$('.subtotal>center>h3').each(function () {
    sum += parseFloat($(this).text().replace( /,/g, '')) || 0;
    });

var num = new Number(sum);
var x = num.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
$('#total').text(x);
return false;
}

