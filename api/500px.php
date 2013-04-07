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
          _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 5, page: $("#page").val(), user_id: 3007733 }, function (response) {
              console.log(response);
              $.each(response.data.photos, function () {
                $('#logged_in').append('<img src="' + this.image_url + '" />');
              });
          });
          $("#page").val(parseInt($("#page").val())+1); 
      }

      function searchNew(){
    	  $("#page").val(1);
    	  _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 5, page: $("#page").val(), user_id: 3007733 }, function (response) {
              console.log(response);
              $.each(response.data.photos, function () {
                $('#logged_in').append('<img src="' + this.image_url + '" />');
              });
          });
          $("#page").val(parseInt($("#page").val())+1); 
      }
    
      $(function () {
        _500px.init({
          sdk_key: '9920bb2b69c7f071b25edeb643cc70d9c98373cc'
        });
      });
    </script>

    <h1>Your 500px favorite photos</h1>

    <?php echo $_GET['term']; ?>

      <input id="searchInput" type="text" name="term">
      <div onclick="searchNew()">Search</div>
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