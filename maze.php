<?php
  include_once "header.php";
?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <script src="../js/imaze.js" type="text/javascript"></script>
  <?php 

$date = new DateTime();
$timestamp = $date->getTimestamp();
$ch = curl_init ($_GET['mazeImage']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
$raw=curl_exec($ch);
curl_close ($ch);
if(file_exists("img/customer/".$timestamp.".jpg")){
	unlink("img/customer/".$timestamp.".jpg");
}
$fp = fopen("img/customer/".$timestamp.".jpg",'x');
fwrite($fp, $raw);
fclose($fp);

$_SESSION['to_maze'] = $timestamp;

?>	

  <script type="text/javascript">
  //<!--
    $(window).load(function() {
      var canvas = document.getElementById('maze');
      var ctx = canvas.getContext("2d");
      var wPixel = ctx.createImageData(1,1);
      wPixel.data[0] = 255; wPixel.data[1] = 255; wPixel.data[2] = 255; wPixel.data[3] = 1;
      var bPixel = ctx.createImageData(1,1);
      bPixel.data[0] = 0; wPixel.data[1] = 0; bPixel.data[2] = 0; bPixel.data[3] = 1;
      
      var img = document.getElementById('user-image');
      
      var imaze = maze(45, 80);
      var iscale = 7;
      var ibitmap = scale(bitmap(imaze), iscale);
      
      ctx.fillRect( x, y, 1, 1 );
      
      var width = ibitmap[0].length;
      var height = ibitmap.length;
      canvas.width = width;
      canvas.height = height;
      ctx.drawImage(img, 0, 0, width, height);
      
      for (var y=0; y<height; y++) {
        for (var x=0; x<width; x++) {
          if (ibitmap[y][x] == 1) {
            // black
            // ctx.fillStyle = "rgba("+0+","+0+","+0+","+1+")";
          }
          else {
            // White
            ctx.fillStyle = "rgba("+255+","+255+","+255+","+1+")";
            ctx.fillRect( x, y, 1, 1 );
          }
        }        
      }
      
    });
  //-->
  </script>
<body>
  <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <img src="/img/logo.png" width="50%" height="50%">
          </div>
          <div class="span3 offset6">
            
            <p class="text-right"><a href="/index.php">HELLO</a> <a href="/upload.php"><b>GENERATE</b></a> <a href="/about.php">ABOUT</a> </p>
            
          </div>
        </div>
        </div><!--end span10 offset1!-->
      </div><!--end row fluid!-->
      </div><!--end menu!-->

  <div class="title">
    <div class="row-fluid">
      <div class="span10 offset1">
        <h1 class="text-center">Title of Image</h1>
        <p class="text-center">Timer: 0:01</p>
      </div>
    </div>
  </div>
  <div class="maze">
  <div class="row">
  <div class="span10 offset1">
  <div id="mazehere">
    <canvas id="maze" width="100" height="100"></canvas>
  </div>
  </div>
  </div>
  </div>
  <div style="display: none;">
    <img id="user-image" src="<?php echo $_GET['mazeImage']; ?>" />
  </div>
  <input id="button" type="submit" name="button" value="enter" onclick="myFunction();"/>
  <script>
    document.getElementById('button').onclick = function() {
   alert("button was clicked");
}​;​
  </script>

<?php
  include_once "footer.php";
?>