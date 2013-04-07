<?php
  include_once "header.php";
?>
    <script>$('#homepageimage').load('maze.php/?mazeImage=http://farm9.staticflickr.com/8319/7988784175_f662ddb020.jpg #mazehere');</script>
    <body>
    <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <img src="img/logo.png" width="50%" height="50%">
          </div>
          <div class="span3 offset6">
            <p class="text-right"><a href="#" style="text-decoration:underline">HELLO</a> <a href="upload.php">GENERATE</a> <a href="about.php">ABOUT</a></p>
          </div>
        </div>
        </div><!--end span10 offset1!-->
      </div><!--end row fluid!-->
      </div><!--end menu!-->
      <div class="slider">
        <div class="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <div class="span12">
                <div id="homepageimage"></div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->
      </div><!--end class slider!-->

      <div class="features">
        <div class="row-fluid">
          <div id="topic">
          <h1>Awesome Features</h1>
          </div>
        </div><!--end row fluid!-->
        <div id="features1">
        <div class="row-fluid">
          <div class="span4 offset1">
            <h2>Custom Mazes</h2>
            <p>Upload your images and we will generate stunning mazes for you to solve with your friends. The image will be the basis for the image and it is a ton of fun to play with friends when your bored.</p>
          </div><!--end span10 offset1!-->

          <div class="span4 offset2">
          <img src="http://placehold.it/350x150">
          </div>

          </div><!--row fluid!-->
          </div>

        <div id="features2">
        <div class="row-fluid">
          <div class="span4 offset1">
             <img src="http://placehold.it/350x150">
          </div><!--end span10 offset1!-->

          <div class="span4 offset2">
            <h2>Easy Imports</h2>
            <p>Easily import your images from a variety of online services such as FaceBook, DropBox, Flickr, Instagram, etc. Or choose a picture on your computer, take a webcam pic, or one from our public gallery.</p>
          </div>

          </div><!--row fluid!-->
        </div>

        <div id="features1">
        <div class="row-fluid">
          <div class="span4 offset1">
            <h2>Play with Friends</h2>
            <p>Looking to compete against your friends? No problem. Compete in real time with your friends, even on different devices. Be able to see your opponenets progress, and win awesome prizes.</p>
          </div><!--end span10 offset1!-->

          <div class="span4 offset2">
          <img src="http://placehold.it/350x150">
          </div>

          </div><!--row fluid!-->
          </div>

        </div>
   </div><!--end features!-->

    <div class="signup">
      <div class="row-fluid">
        <div class="span10 offset1">
          <h1 class="text-center">Want to play? Let's get started!</h1><br><br>
          <center><a class="awesome-button" href="upload.php">Get Started</a></center>
        </div>
      </div>
    </div>
<?php
   include_once "footer.php";
?>