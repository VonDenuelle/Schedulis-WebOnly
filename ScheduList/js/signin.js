// Sign in
$(document).ready(function() {

//log in button
$('#signin').submit(function(e) {
  e.preventDefault();
console.log('signin' );
  $.ajax({
      url: 'php/signin.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        uid: $('#uid').val(),
        pwd: $('#pwd').val()
      },
    })
    .done(function(data) {

      $.map(data, function(val, index) {

        switch (index) {
          case 'emptyfields':
            $('h4#error').css('opacity', '1').text(val);
            console.log(val);
            break;
          case 'passwordnotmatch':
            $('h4#error').css('opacity', '1').text(val);

            break;
          case 'nouser':
            $('h4#error').css('opacity', '1').text(val);
            break;
          case 'success':
            window.location.replace('/Main/Schedulist');
            break;
        }
      });
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});


//for go to signup page button
$('#singuppage').click(function(event) {
  /* Act on the event */
  window.location.replace('/Main/Schedulist/signUp');
});

});
