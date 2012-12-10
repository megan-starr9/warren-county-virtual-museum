<!DOCTYPE html>
<html>
  <head>
    <title>Warren County Virtual Museum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      .top-unit {
        margin-bottom: 30px;
        background-color: #eeeeee;
        -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
                border-radius: 6px;
        height: 300px;
        padding-right: 20px;
        background: #000000 url("<?php echo base_url(); ?>/css/images/hero1.png");
        background-repeat: no-repeat;
      }
    </style>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          
          <a class="brand" href="#">Warren County Virtual Museum</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Username">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
      
    <div class="container">
        <div class="top-unit">
        <h1 class="pull-right">Warren County Virtual Museum</h1>
      </div>
      <div class="row">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Featured Exhibits</li>
              <li class="active"><a href="#">Local Heroes</a></li>
              <li><a href="#">Wyatt Earp</a></li>
              <li><a href="#">Journey Stories</a></li>
              <li><a href="#">Canopus Stone</a></li>
              <li><a href="#">Native Artifacts</a></li>
              <li><a href="#">Shields Collections</a></li>
              <li><a href="#">Reagan House</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <h1>Development Sandbox</h1>
      <p>This is the first-pass development sandbox for prototyping the design approaches for the Warren County Virtual Museum.</p>
        </div>
      
      </div>
      
      <div class="well well-small">
        <i>Contents copyright &copy; 2012, Warren County Historical Society.</i><br>
        Page rendered in <strong>{elapsed_time}</strong> seconds&nbsp;&nbsp;|&nbsp;&nbsp;Memory usage: <strong>{memory_usage}</strong>.
      </div>

    </div> <!-- /container -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script> 
  </body>
</html>