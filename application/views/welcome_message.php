<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

    <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Manage Database</div>
      <div class="panel-body">
          <span>New Registry Entry</span><hr>
          <form action="" method="post" enctype="multipart/form-data">
          <select name="hospital" class="form-control" style="width: 20%;">
              <option name = "hospital" value="h1">Hospital A</option>
              <option name = "hospital" value="h2">Hospital B</option>
          </select><br>
          <input type="file" name="fileToUpload" id="fileToUpload">
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
                    <a href="<?php echo site_url(); ?>/hospitals/view/h1">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 1
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 2
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 3
                    </a>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 4
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 5
                    </a>
                </center>
            </div>
            <div class="col-sm-4">
                <center>
                    <a href="#tosomewhere">
                        <span class="glyphicon glyphicon-briefcase" style="font-size: 100px; color: #313233"></span><br>
                        Hospital 6
                    </a>
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
