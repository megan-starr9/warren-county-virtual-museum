
      
      <div class="well well-small">
        <i>Contents copyright &copy; 2012, Warren County Historical Society.</i><br>
        Page rendered in <strong>{elapsed_time}</strong> seconds&nbsp;&nbsp;|&nbsp;&nbsp;Memory usage: <strong>{memory_usage}</strong>.
      </div>

    </div> <!-- /container -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script> 
    <script>
      $(document).ready(function(){
        $('.carousel').carousel({
          interval: false
        });
        $('.modal').modal({
            show: false
        });
        $("#first").click(function(){
            $('#myCarousel').carousel(0);
        });
        $("#second").click(function(){
            $('#myCarousel').carousel(1);
        });
      });
    </script>
  </body>
</html>