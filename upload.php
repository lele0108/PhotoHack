<?php
  include_once "header.php";
?>
    <body>
<script type="text/javascript">

	function filepickerUploadDone(url){
		//$('#maze').load('maze.html');
		window.location.href = "maze.html/?mazeImg="+url;
	}

</script>    
    <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <p>iMaze</p>
          </div>
          <div class="span3 offset6">
            <p class="text-right"><a href="#">HELLO</a> <a href="#">GENERATE</a> <a href="#">ABOUT</a></p>
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
                <div class="row-fluid">

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Pick image you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Edit to what you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Play!</p>
                  </div>

                </div>
                  <br><br>
                  <!-- Button to trigger modal -->
<<<<<<< HEAD
<<<<<<< HEAD
                  <center>
                  	<a href="#myModal" role="button" class="btn" data-toggle="modal">Pick Image</a>                      
                  	<input type="filepicker" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="filepickerUploadDone(event.fpfile.url)">
=======
                  <center>                     
                  	<input type="filepicker" class="button-link" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="alert(event.fpfile.url)">
>>>>>>> fcd148798c986cccd96a35bf3dfc1e5f9c90ddda
=======
                  <center>                     
                  	<input type="filepicker" class="button-link" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="alert(event.fpfile.url)">
>>>>>>> fcd148798c986cccd96a35bf3dfc1e5f9c90ddda
                  </center>
                   
                  </div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->
      </div><!--end class slider!-->


<?php
   include_once "footer.php";
?>