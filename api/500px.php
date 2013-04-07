<!DOCTYPE html>
<html>
  <head>
    <title>500px SDK Example 1</title>
    <script src="../js/500px.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  </head>
  <body>
    <script>        

	function show(){
		_500px.init({
	    	sdk_key: '9920bb2b69c7f071b25edeb643cc70d9c98373cc'
	    });
		_500px.api('/users', function (response) {
	          var me = response.data.user;
			  
	          // Get my favorites
	          _500px.api('/photos', { feature: 'user_favorites', user_id: me.id }, function (response) {
	            if (response.data.photos.length == 0) {
	              alert('You have no favorite photos.');
	            } else {
	              $.each(response.data.photos, function () {
	                $('#logged_in').append('<img src="' + this.image_url + '" />');
	              });
	            }
	          });
	        });
	}
    
    $(function () {
        _500px.init({
          sdk_key: '9920bb2b69c7f071b25edeb643cc70d9c98373cc'
        });

        // When the user logs in we will pull their favorite photos
        _500px.on('authorization_obtained', function () {
          $('#not_logged_in').hide();
          $('#logged_in').show();

        });

     // Get my user id
        _500px.api('/users', function (response) {
          var me = response.data.user;
		  
          // Get my favorites
          _500px.api('/photos', { feature: 'user_favorites', user_id: me.id }, function (response) {
            if (response.data.photos.length == 0) {
              alert('You have no favorite photos.');
            } else {
              $.each(response.data.photos, function () {
                $('#logged_in').append('<img src="' + this.image_url + '" />');
              });
            }
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

    <div id="show" onclick="show()"></div>
    <div id="logged_in" style="display: none;">
    </div>
  </body>
</html>