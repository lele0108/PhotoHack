<?php
  include_once "header.php";
?>
<<<<<<< HEAD
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <script src="../js/imaze.js" type="text/javascript"></script>	
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
  <canvas id="maze" width="100" height="100"></canvas>
  <div style="display: none;">
    <img id="user-image" src="<?php echo $_GET['mazeImage']; ?>" />
  </div>
<?php
  include_once "footer.php";
=======
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

      <div class="title">
        <div class="row">
          <div class="span10 offset1">
            <h1 class="text-center">Current Maze Title</h1>
            <p class="text-center">Timer: 0:50</p>
          </div>
        </div>
      </div>

      <div class="maze">
        <div class="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <div class="span10 offset1">
                  <p>Place maze right here</p>
                  <br><br>              
              </div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->
        <br>
      <div class="maze">
        <div class="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <div class="twoplayer">
                <div class="span5 offset1">
                    <p>Place player 1 maze right here</p>
                    <br><br>              
                </div>
              </div>

              <div class="twoplayer">
                <div class="span5 offset1">
                    <p>Place player 2 maze right here</p>
                    <br><br>              
                </div>
              </div>

              </div>
            </div>
          </div>
        </div><!--end row fluid!-->



<?php
   include_once "footer.php";
>>>>>>> fec277e2fa2819214d28159aabef4ba0c81900da
?>
