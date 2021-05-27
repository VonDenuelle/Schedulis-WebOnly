$(document).ready(function() {

  // signup form button
$('#register').submit(function(e) {
  console.log('title');
  e.preventDefault();

  $.ajax({
      url: 'php/signup.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        fname: $("#fname").val(),
        lname: $("#lname").val(),
        uid: $("#uid").val(),
        email: $("#email").val(),
        pword: $("#pword").val(),
        repword: $("#repword").val()
      },
    })
    .done(function(data) {
      $.map(data, function(val, index) {
        switch (index) {
          case 'emptyfields':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'invalidemail':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'invalidusername':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'passwordnotmatch':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'usernametaken':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'success':
            window.location.replace('/2nd_sprint/ScheduList(REVISED)');
            console.log(data);
            break;
        }
      });
    })
    .fail(function(xhr, status, error) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});




});
