<!DOCTYPE html>
<html>
  <head>
    <title>500px SDK Example 1</title>
    <script src="../js/500px.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  </head>
  <body>
    <script>
      function searchNext(){
        $("#logged_in").empty();
        
        _500px.api('/users', function (response) {
            var me = response.data.user;
            // Get my favorites
            _500px.api('/photos/search', { term: '<?php echo $_GET['term']; ?>', rpp: 5, page: $("#page").val(), user_id: me.id }, function (response) {
                console.log(response);
                $.each(response.data.photos, function () {
                  $('#logged_in').append('<img src="' + this.image_url + '" />');
                });
            });
          });
          $("#page").val(parseInt($("#page").val())+1); 
      }
    
      $(function () {
        _500px.init({
          sdk_key: '9920bb2b69c7f071b25edeb643cc70d9c98373cc'
        });
          
// When the user logs in we will pull their favorite photos
        _500px.on('authorization_obtained', function () {
          $('#not_logged_in').hide();
          $('#logged_in').show();

          // Get my user id
          _500px.api('/users', function (response) {
            var me = response.data.user;
            // Get my favorites
            _500px.api('/photos/search', { term: '<?php echo $_GET['term']; ?>', rpp: 5, page: $("#page").val(), user_id: me.id }, function (response) {
                console.log(response);
                $.each(response.data.photos, function () {
                  $('#logged_in').append('<img src="' + this.image_url + '" />');
                });
                $("#page").val(parseInt($("#page").val())+1);
            });
          });
        });

       _500px.on('logout', function () {
          $('#not_logged_in').show();
          $('#logged_in').hide();
          $('#logged_in').html('');
        });

        // If the user has already logged in & authorized your application, this will fire an 'authorization_obtained' event
        _500px.getAuthorizationStatus();

        // If the user clicks the login link, log them in
        $('#login').click(_500px.login);
      });
    </script>

    <h1>Your 500px favorite photos</h1>

    <?php echo $_GET['term']; ?>

    <form name="search" id="search">
      <input type="text" name="term">
      <button type="submit">Search</button>
    </form>
    <div id="not_logged_in">
      <a href="#" id="login">Login to 500px</a>
    </div>
    <div id="logged_in" style="display: none;">
    </div>
    <div id="" style="" onclick="searchNext()">Search Next
    </div>
    <input id="page" type="hidden" name="page" value="1">
  </body>
</html>