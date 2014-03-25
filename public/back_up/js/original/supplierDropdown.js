 

$('#supplierId').change(function(){
 $.get('/api/supplierDropdown', 
    { option: $(this).val() }, 
    function(data) {
      console.log(data);
      var firstNameID = $('#firstnameID');
      var middleNameID = $('#middleNameID');
      var lastNameID = $('#lastNameID');
      var emailId = $('#emailId');
      var phoneNumberId = $('#phoneNumberId');
      var shippingaddress = $('#shippingAddress');

      var sa = $('#sa');


      firstNameID.text(data.firstName);
      middleNameID.text(data.middleName);
      lastNameID.text(data.lastName);
      emailId.text(data.email);
      phoneNumberId.text(data.phone);
      shippingaddress.text(data.addressStreet+', '+data.addressCity+', '+data.addressProvince+', '+data.addressPostalCode);
      sa.val(data.addressStreet+', '+data.addressCity+', '+data.addressProvince+', '+data.addressPostalCode);

        });
});