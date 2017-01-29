<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container" style="font-family: candara">
	<div class="panel panel-primary">
      <div class="panel-heading"><h4>Registry of Diseases for: Hospital Name</h4>

          <form action = "search" method="POST">
          	<input type="text" class="form-control" placeholder="Search" style="width: 20%; position: relative; left: 80%">
          </form>
      </div>
      <div class="panel-body">
      	<table class="table table-hover">
		    <thead>
		      <tr>
		        <th style="width: 10%; border-color: red">ICD</th>
		        <th style="border-color: blue;">DIAGNOSIS</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>John</td>
		        <td>Doe</td>
		      </tr>
		      <tr>
		        <td>Mary</td>
		        <td>Moe</td>
		      </tr>
		      <tr>
		        <td>July</td>
		        <td>Dooley</td>
		      </tr>
		    </tbody>
		 </table>
      </div>
    </div>
</div>
</body>
</html>
