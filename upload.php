<?php
  include_once "header.php";
?>
    <body>
<script type="text/javascript">
	function filepickerUploadDone(url){
		window.location.href = "maze.php/?mazeImage="+url;
	}

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
                <div class="row-fluid">

                  <div class="span4">
                    <center><img src="img/image.png" type="filepicker" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="filepickerUploadDone(event.fpfile.url)"></center>
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
                  	<input type="filepicker" class="awesome-button" data-fp-apikey="AK8NQWurTGqXdwjpiHQ3Qz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="BOX,COMPUTER,DROPBOX,FACEBOOK,GITHUB,GOOGLE_DRIVE,FLICKR,EVERNOTE,GMAIL,INSTAGRAM,IMAGE_SEARCH,URL,WEBCAM,PICASA" onchange="filepickerUploadDone(event.fpfile.url)">
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
