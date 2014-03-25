(function() {
  $("#login-submit").click(function(e) {
    e.preventDefault();
    return $.ajax({
      type: "POST",
      url: "laravel/ajax/login", //i put my public in "localhost/laravel/public/"
      cache: false,
      data: 'email:' + $("#email").val(),
      success: function(data) {
        return alert(data);
      },
      error: function(response) {
        return alert("ERROR:" + response.responseText);
      }
    });
  });

}).call(this);