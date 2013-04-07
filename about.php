<?php
  include_once "header.php";
?>
    <body>

    <div class="menu">
      <div class="row-fluid">
        <div class="span10 offset1">
        <div class="row-fluid">
          <div class="span3">
            <img src="img/logo.png" width="50%" height="50%">
          </div>
          <div class="span9">
            <p class="text-right"><a href="index.php">HELLO</a> <a href="upload.php">GENERATE</a> <a href="#" style="text-decoration:underline">ABOUT</a></p>
          </div>
        </div>
        </div><!--end span10 offset1!-->
      </div><!--end row fluid!-->
      </div><!--end menu!-->

      <div class="features">
        <div class="row-fluid">
          <div id="titleabout">
          <h1>About Us</h1>
          </div> 
        </div><!--end row fluid!-->

        <div id="features2">
        <div class="row-fluid">
          <div class="span10 offset1">
            
            <div class="row-fluid">
              <div class="span6">
              <h2>5 <span>People</span></h2>
              <h2>24 <span>Hours</span></h2>
              <h2>1304mg <span> of Caffine</span></h2>
              <h2>1,492 <span>Lines of Code</span></h2>
              <h2>194 <span>GitHub Commits</span></h2>
              </div>
              <div class="span3"><img src="/img/boris.jpg"><p>Boris Suska: Back End Developer JavaScript</p></div>
              <div class="span3"><img src="/img/zbynek.jpg"><p>Zbynek Nedoma: Back End Developer JavaScript</p></div>
            </div>

              <br><br><br><br>

            <div class="row-fluid">
              <div class="span3 "><img src="/img/danish.jpg"><p>Danish Shaik: Front end designer</p></div>
              <div class="span3"><img src="/img/zuhayeer.jpg"><p>Zuhayeer: Back End PHP Developer</p></div>
              <div class="span3"><img src="/img/jimmy.jpg"><p>Jimmy Liu: Front End Designer</p></div>
              <div class="span3">
                <h2 class="text-right">12,920 <span>Calories</span></h2>
                <h2 class="text-right">5 <span>APIs</span></h2>
                <h2>
              </div>

            </div>

            </p>
          </div><!--end span10 offset1!-->

          
          </div><!--row fluid!-->
          <div id="features1">
        <div class="row-fluid">
          <div class="span4 offset1">
            <h2>API's</h2>
            <p>In project Maze we incorporate several photo centric api's. We use the Filepicker to 
              allow our users to use their own image for their maze background. We incorporate 500px api as a 
              primary source for pulling stuning public photos. The Aviary api is used twice in iMaze first we use the Aviary filter api to 
              allow our users to edit their uploaded photos. We also use the Aviary sever side api, when a user fills out the maze the path
               in which he goes is a less saturated version of the original image.</p>
          </div><!--end span10 offset1!-->

          <div class="span4 offset2">
          <img src="/img/banner.jpg">
          </div>

          </div><!--row fluid!-->
          </div>

        </div>
   </div><!--end features!-->
          </div>


        </div>
   </div><!--end features!-->

   
<?php
   include_once "footer.php";
?>