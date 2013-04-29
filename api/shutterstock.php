<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script src="/bootstrap.min.js"></script>

    <script>
    
    //change to your account id at bigstock.com/partners
var account_id = '883610';
var selected_category, search_term, infinite_scroll, page, jsonp_happening, limit;

  function searchShutterstock(){
    $("#search-form").modal({backdrop: 'static'});
      page = 1;
      limit = 5;
      $("html").trigger("bigstock_search", { q:$("#searchShutterstock") });
      $("#results-holder").show('medium');
    }
        
    </script>
    
  </head>
  <body>
    <h1>500px</h1>
    
    <div id="search-form" class="modal hide fade">
    <div class="modal-body">
            <input id="searchShutterstock" type="text" class="search-query span4" placeholder="Find the perfect image...">
            <div id="submitShutterstock" type="submit" class="btn btn-primary" onclick="searchShutterstock()">Search</div>


        <div class="well hide" id="results-holder">
            <ul class="thumbnails" id="results">
            </ul>
        </div>                
    </div>
    
</div>

<!-- search results item template -->
<ul class="item-template hide">
    <li>
        <a href="#" class="thumbnail"><img></a>
    </li>
</ul>

<!-- image detail template -->
<div class="detail-template modal fade hide">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3></h3>
    </div>
    <div class="modal-body">
        <img>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Select this image</a>
    </div>
</div>
    
  </body>
</html>