<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
	<div class="panel panel-primary">
      <div class="panel-heading">Search Results<br>Match: <code style="background-color: transparent; color: white"><?php echo $match; ?></code></div>
      <div class="panel-body">
        <table class="table table-hover">
		    <thead>
		      <tr>
		        <th style="width: 10%; border-color: red">ICD</th>
		        <th style="border-color: blue;">DIAGNOSIS</th>
		        <th style="border-color: blue;">HOSPITAL</th>
		      </tr>
		    </thead>
		    <tbody>
		   		<?php
		   			foreach ($search_result as $key => $value) {
		   				echo "<tr>";
		   					foreach ($value as $heading => $data) {
		   						echo "<td>$data</td>";
		   					}
		   				echo "</tr>";
		   			}
		   		?>
		    </tbody>
		 </table>
      </div>
    </div>
</div>

</body>
</html>