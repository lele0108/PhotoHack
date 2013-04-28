<?php
  include_once "header.php";
?>
    <body>
<script src="./js/500px.js"></script>
<script type="text/javascript">
	function linkToMaze(url){
		window.location.href = "options.php?mazeImage="+url;
	}

 
	function searchNext(){
          _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 6, page: $("#page").val(), user_id: 3007733 }, function (response) {
              $("#logged_in").empty();
              $.each(response.data.photos, function () {
                $('#logged_in').append('<div href="#" onclick="linkToMaze(\''+(this.image_url.replace('2.jpg','4.jpg'))+'\')"><img class="mazeChoose" src="' + this.image_url + '" /></div>');
              });
          });
          $("#page").val(parseInt($("#page").val())+1); 
      }

      function searchNew(){
        $("#page").val(1);
        _500px.api('/photos/search', { term: $("#searchInput").val(), rpp: 6, page: $("#page").val(), user_id: 3007733 }, function (response) {
          $("#logged_in").empty();
              $.each(response.data.photos, function () {
            	  $('#logged_in').append('<div href="#" onclick="linkToMaze(\''+(this.image_url.replace('2.jpg','4.jpg'))+'\')"><img class="mazeChoose" src="' + this.image_url + '" /></div>');
              });
          });
          $("#page").val(parseInt($("#page").val())+1); 
          $('#next-btn').css('display', 'block');
      }

/*      $(document).ready(function() {
    	  $(".mazeChoose").click(function(){
              window.location.href = "options.php/?mazeImage="+$(this).attr('src');
            });
         
       });*/
      
      $(function () {
        _500px.init({
          sdk_key: '9920bb2b69c7f071b25edeb643cc70d9c98373cc'
        });

                
      });
    </script>
    
<?php
	if(isset($_SESSION['to_maze'])){
		unset($_SESSION['to_maze']); 
	}?>
    <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <img src="img/logo.png" width="50%" height="50%">
          </div>
          <div class="span3 offset6">
            <p class="text-right"><a href="index.php">HELLO</a> <a href="upload.php"><b>GENERATE</b></a> <a href="about.php">ABOUT</a></p>
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
                  	<input type="filepicker" class="awesome-button2" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="linkToMaze(event.fpfile.url)">
                    <a href="#myModal" role="button" data-toggle="modal" class="awesome-button2">Public Gallery</a>

                  </center>
                   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      <h3 id="myModalLabel">Public Gallery</h3>
                    </div>
                    <div class="modal-body">
                      <form action="Javascript:searchNew();">
                        <input id="searchInput" type="text" name="term" class="awesomeinput">
                        <button class="awesome-button3" onclick="searchNew()">Search</button>
                      <form>
                      <div class="fivepx">
                      <div id="logged_in"></div>
                      <br>
                      <button style="display:none;" id="next-btn" class="awesome-button3" onclick="searchNext()">Next</button>
                    </div>
                    <input id="page" type="hidden" name="page" value="1">
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
