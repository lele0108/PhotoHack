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

      <div class="title">
        <div class="row">
          <div class="span10 offset1">
            <h1 class="text-center">Current Maze Title</h1>
          </div>
        </div>
      </div>

      <div class="info">
        <div class="row">
          <div class="span10 offset1">
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
      </div><!--end class slider!-->


<?php
   include_once "footer.php";
?>
