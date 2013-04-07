<?php
  include_once "header.php";
?>
    <body>
    <!-- Load Feather code -->
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>
<script type='text/javascript'>
	function uploadToMaze(){
		window.location.href = "../maze.php/?mazeImage="+$("#image").attr('src');
	}

   var featherEditor = new Aviary.Feather({
       apiKey: 'R5ctaJYc7kSNYxrLjHSREg',
       apiVersion: 2,
       tools: 'all',
       appendTo: '',
       onSave: function(imageID, newURL) {
           var img = document.getElementById(imageID);
           img.src = newURL;
       },
       onError: function(errorObj) {
           alert(errorObj.message);
       }
   });
   function launchEditor(id, src) {
       featherEditor.launch({
           image: id,
           url: src
       });
      return false;
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
              <center><img type='image' src='http://images.aviary.com/images/edit-photo.png' value='Edit photo' onclick="return launchEditor('image', '<?php echo $_GET['mazeImage'];?>');" style="border-radius:0px">
              <img id='image' src='<?php echo $_GET['mazeImage'];?>' style="border-radius:0px"/>
              </center>
               </div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->

        <div class="options">
          <div class="row">
            <div class="span10 offset1">
              <div class="row-fluid">
              <div class="text-center">

                <div class="span3"><p>option 1</p>
                </div>

                <div class="span3"><p>option 2</p>
                </div>

                <div class="span3"><p>option 3</p>
                </div>

                <div class="span3"><p>option 4</p>
                </div>

                </div>
              </div>
              <center><br><br><br><div onclick="uploadToMaze()" class="awesome-button" >Play Now!</div></center><br>
            </div>
          </div>
      </div>




<?php
   include_once "footer.php";
?>
