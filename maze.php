<?php
  include_once "header.php";
?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="./js/imaze.js"></script>
  <script type="text/javascript" src="./js/canvas-touch.js"></script>
  <script type="text/javascript" src="./js/URI.js"></script>

  <script type="text/javascript">
  //<!--
  $(document).ready(function() {
    var canvas = document.getElementById('maze');
    var ctx = canvas.getContext("2d");

    var token = window.location.href.match(/token=([^\.#$\[\]]+)/);
    if (token) {
        token = token[1];
        loadMaze(token, function (snapshot) {
          if (snapshot.name() == 'data') {
        	  var data = JSON.parse(snapshot.val());
             
            // load image;
            $('#user-image').attr('src', data.url);
            // bitmap (global)
            pixSize = data.scale;
            ibitmap = scale(bitmap(data.maze), pixSize);
            
            // initialize moving      
            initializeCanvas(canvas, ctx, [255,0,0,255], token);
            var $readyBtn = $('<a href="#" class="button awesome-button">I\'m ready!</a>').click(function() {
              setReady(token, "player2", true);
            });
            $('.buttons').html($readyBtn);
            $readyBtn = null;
          }
          else if (snapshot.name() == 'ready') {
            var ready = snapshot.val();
            if (ready.player2) {
              $('.buttons').html('<span class="awesome-button">Waiting for player 1...</span>');
              if (ready.player1) {
                $('.buttons').hide();
                // starting count down shuld goes here
                showMaze(ibitmap, pixSize);
              }
            }
          }
      	});
    }
    else {
        $('#single-player').click(function() {
          initializeGame(false);
        }); 
        $('#competition').click(function() {
          initializeGame(true);
        }); 

        // meze size
        var imaze = maze(20, 40);
        var iscale = 12; pixSize = iscale;
        var ibitmap = scale(bitmap(imaze), iscale);
        
        function initializeGame(multiplayer) {
          if (multiplayer) {
            var token = requestMultiplayerGame($('#user-image').attr('src'), imaze, iscale, function(snapshot) {
              if (snapshot.name() == 'ready') {  
                var ready = snapshot.val();
                if (ready.player1) {
                  $('.buttons').html('<span class="awesome-button">Waiting for player 2...</span>');
                  if (ready.player2) {
                    $('.buttons').hide();
                    // starting count down shuld goes here
                    showMaze(ibitmap, iscale);
                  }
                } 
              }
            });
            
            // initialize moving      
            initializeCanvas(canvas, ctx, [0,255,0,255], token);
            $('.buttons').html('<div class="awesome-button" style="display: inline-block;"><label for="url">Send the following URL to your opponent<br></label><input id="url" type="text" value="' + URI(window.location.href).search('token='+token) + '"</span><br><br></div>');
            var $readyBtn = $('<a href="#" class="button" style="color: #000; font-size: 120%;">I\'m ready!</a>').click(function() {
              setReady(token, "player1", true);
            });
            $('.buttons > div').append($readyBtn);
            $readyBtn = null;
          }
          else {
            // initialize moving      
            initializeCanvas(canvas, ctx);
            $('.buttons').hide();
            // show maze immediately
            showMaze(ibitmap, iscale);
          }
        }
      }
        
      function showMaze(ibitmap, iscale) {
        var width = ibitmap[0].length;
        var height = ibitmap.length;
        canvas.width = width;
        canvas.height = height;
  
        for (var y=0; y<height; y++) {
          for (var x=0; x<width; x++) {
            if (ibitmap[y][x] != 1) {
              // White
              ctx.fillStyle = "#fff";
              ctx.fillRect( x, y, 1, 1 );
            }
          }        
        }
      
        // Starting point
        ctx.fillStyle = "#0f0";
        ctx.fillRect( 0, iscale, iscale, iscale );
        // destination point
        ctx.fillStyle = "#f00";
        ctx.fillRect( width-iscale, height-(2*iscale), iscale, iscale );
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
            <img src="./img/logo.png" width="50%" height="50%">
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
        <h1 class="text-center">Maze</h1>
      </div>
    </div>
  </div>
  <div class="maze">
  <div class="row">
    <div class="maze-wrap">
      <div class="buttons">
        <div id="single-player" class="awesome-button"><p class="playbutton">Sigle player</p></div>
        <div id="competition" class="awesome-button"><p class="playbutton">Competition</p></div>
        <!--
          <a id="single-player" class="button" href="#">Sigle player</a>
          <a id="competition" class="button" href="#">Competition</a>
        -->
      </div>
      <canvas id="maze" width="600" height="400"></canvas>
      <?php if (isset($_GET['mazeImage'])): ?>
        <img id="user-image" src="<?php echo $_GET['mazeImage']; ?>" />
      <?php else: ?>
        <!-- Logo here! -->
        <img id="user-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
      <?php endif; ?>
    </div>
  </div>
  </div>  
<?php
  include_once "footer.php";
?>