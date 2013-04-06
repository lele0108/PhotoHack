<?php
  include_once "header.php";
?>
    <body>
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
      <div class="upload">
        <div class="row-fluid">
          <div class="span12">
            <div class="row-fluid">
              <div class="span10 offset1">
                <div class="row-fluid">

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Pick image you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Edit to what you want</p>
                  </div>

                  <div class="span4">
                    <center><img src="http://placehold.it/150x150"></center>
                    <p class="text-center">Play!</p>
                  </div>

                </div>
                  <br><br>
                  <!-- Button to trigger modal -->
                  <center><a href="#myModal" role="button" class="btn" data-toggle="modal">Pick Image</a></center>
                   
                  <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Getting a Image</h3>
                    </div>
                    <div class="modal-body">
                      <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="btn btn-primary">Save changes</button>
                    </div> <!-- end modal !-->
                  </div>
              </div>
            </div>
          </div>
        </div><!--end row fluid!-->
      </div><!--end class slider!-->



<?php
   include_once "footer.php";
?>