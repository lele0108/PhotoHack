<!DOCTYPE html>
<html>
  <head>
    <title>500px SDK Example 1</title>
    <script src="/500px.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  </head>
  <body>
    <script>
      function searchNext(){
          _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 5, page: $("#page").val(), user_id: 3007733 }, function (response) {
              $("#logged_in").empty();
              $.each(response.data.photos, function () {
                $('#logged_in').append('<img src="' + this.image_url + '" />');
              });
          });
          $("#page").val(parseInt($("#page").val())+1); 
      }

      function searchNew(){
    	  $("#page").val(1);
    	  _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 5, page: $("#page").val(), user_id: 3007733 }, function (response) {
    		  $("#logged_in").empty();
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
      <input id="searchInput" type="text" name="term">
      <div onclick="searchNew()">Search</div>
    <div id="logged_in">
    </div>
    <div id="" style="" onclick="searchNext()">Search Next
    </div>
    <input id="page" type="hidden" name="page" value="1">
  </body>
</html>