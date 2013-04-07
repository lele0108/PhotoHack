<?php
  include_once "header.php";
?>
    <body>
<script type='text/javascript'>
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
<?php 
	//$ourFileName = "test.jpg";
	//$ourFileHandle = fopen('/img/'+$ourFileName, 'w');
	//file_put_contents($ourFileHandle,file_get_contents('http://www.filepicker.io/api/file/KHkhvZT7S1mynaVeSC18')); 
	
	
$imagecontent= file_get_contents("http://www.filepicker.io/api/file/KHkhvZT7S1mynaVeSC18");
$date = new DateTime();
$timestamp = $date->getTimestamp();
$savefile = fopen("img/customers/".$timestamp.".jpg", "w");
fwrite($savefile, $imagecontent);
fclose($savefile);

$_SESSION['to_maze'] = $timestamp;

echo $_SESSION['to_maze'];
?>
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
              <center><br><br><br><a class="awesome-button" href="upload.php">Play Now!</a></center><br>
            </div>
          </div>
      </div>




<?php
   include_once "footer.php";
?>
