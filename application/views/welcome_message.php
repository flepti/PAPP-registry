<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

    <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Manage Database</div>
      <div class="panel-body">
          <span>New Registry Entry</span><hr>
          <form action="<?php echo site_url();?>/Action/insert" method="post" enctype="multipart/form-data">
          <!-- <select name="hospital" class="form-control" style="width: 20%;">
          <?php
            foreach ($institutions as $hospital) {
              echo "
              <option name = 'hospital' value = $hospital>$hospital</option>    ";   
        }
          ?>
          </select><br> -->
          <input type="file" name="userfile" id="userfile"><br>
          <input type="submit" name="submit" class="btn btn-info" value="Submit">
          </form>
      </div>
    </div>


        <div class="panel panel-primary">
      <div class="panel-heading"><span>Registry of diseases</span>
         <form action = "<?php echo site_url(); ?>/welcome/search" method="POST">
            <input type="text" name="registrySearch" class="form-control" placeholder="Search" style="width: 20%; position: relative; left: 80%">
          </form>
      </div>
                <div class="panel-body">
                  <div class="row">
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/makatimed">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Makati Medical Center
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/chonghua">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Chong Hua
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/pcmc">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Philippine Children Medical Center
                    </a>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/phc">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Philippine Heart Center
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/pgh">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Philippine General Hospital
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/stlukes">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        St. Lukes Medical Center
                    </a>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <center>
                    <a href="<?php echo site_url(); ?>/hospitals/view/usth">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Univernsity of Sto. Tomas Hospital
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Others
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <!-- <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        St. Lukes Medical Center
                    </a> --> 
                </center>
            </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
