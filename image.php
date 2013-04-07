<?php
  include_once "header.php";
?>
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

<body style="text-align: center">

    <div id ="mazeresize" role="mazeresize">
    <canvas id="maze" width="100" height="100"></canvas>
    </div>

  <div style="display: none;">
    <img id="user-image" src="<?php echo $_GET['mazeImage']; ?>" />
  </div>
  </body>
  </html>