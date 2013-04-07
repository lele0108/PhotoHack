<?php
  include_once "header.php";
?>
    <body>
<script type="text/javascript">
	function filepickerUploadDone(url){
		window.location.href = "maze.php/?mazeImage="+url;
	}

</script> 
<script src="../js/500px.js"></script>
 <script>
      function searchNext(){
        $("#logged_in").empty();
        
        _500px.api('/users', function (response) {
            var me = response.data.user;
            // Get my favorites
            _500px.api('/photos/search', { term: '<?php echo $_GET['term']; ?>', rpp: 6, page: $("#page").val(), user_id: me.id }, function (response) {
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
            _500px.api('/photos/search', { term: '<?php echo $_GET['term']; ?>', rpp: 6, page: $("#page").val(), user_id: me.id }, function (response) {
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

    <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <img src="img/logo.png" width="50%" height="50%">
          </div>
          <div class="span3 offset6">
            <p class="text-right"><a href="index.php">HELLO</a> <a href="upload.php" style="text-decoration:underline" >GENERATE</a> <a href="about.php">ABOUT</a></p>
          </div>
        </div>
        </div><!--end span10 offset1!-->
      </div><!--end row fluid!-->
      </div><!--end menu!-->
      <div class="upload">
        <div class="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <div class="span10 offset1">
              <h1 class="text-center">Upload and Play in Seconds</h1>
                <div class="row-fluid">

                  <div class="span4">
                    <center><img src="img/image.png"></center>
                    <p class="text-center">1. Pick image you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="img/photo.png"></center>
                    <p class="text-center">2. Edit to what you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="img/photo2.png" style="border-radius:0px"></center>
                    <p class="text-center">3. Play!</p>
                  </div>

                </div>
                  <br><br>
                  <!-- Button to trigger modal -->
                  <center>                   
                  	<input type="filepicker" class="awesome-button2" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="filepickerUploadDone(event.fpfile.url)">
                    <a href="#myModal" role="button" data-toggle="modal" class="awesome-button2">Public Gallery</a>

                  </center>
                   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Public Gallery <?php echo $_GET['term']; ?></h3>
                    </div>
                    <div class="modal-body">
                     <form name="search" id="search">
                        <input type="text" class="awesome-field"name="term">
                        <button type="submit" class="awesome-button3">Search</button>
                      </form>
                      <div class="fivepx">
                      <div id="not_logged_in">
                        <a href="#" id="login">Login to 500px</a>
                      </div>
                      <div id="logged_in" style="display: none;">
                      </div>
                      <input id="page" type="hidden" name="page" value="1">

                      <button id="" class="awesome-button3" style="text-align:left !important" onclick="searchNext()">Next</button>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button class="awesome-button3" data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="awesome-button3">Save changes</button>
                      </div>
                    </div> <!--end modal !-->
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->
      </div><!--end class slider!-->


<?php
   include_once "footer.php";
?>
