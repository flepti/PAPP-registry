<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container" style="font-family: candara">
	<div class="panel panel-primary">
      <div class="panel-heading"><h4>Registry of Diseases for: Hospital Name</h4><br>
      Matches: <?php echo @$matches; ?>

          <form action = "<?php echo site_url(); ?>/Hospitals/filter" method="POST">
          <input type="hidden" name="hName" value="<?php echo $hName; ?>">
          	<input type="text" name="hSearch" class="form-control" placeholder="Search" style="width: 20%; position: relative; left: 80%">
          </form>
      </div>
      <div class="panel-body">
      	<table class="table table-hover">
		    <thead>
		      <tr>
		      <th style="border-color: red">CATEGORY</th>
		      	<th style="border-color: blue;">SUB-CATEGORY</th>
		        <th style="border-color: blue;">PATIENT NAME</th>
		        <th style="border-color: blue;">AGE</th>
		        <th style="border-color: blue;">GENDER</th>
		        <th style="border-color: blue;">DATE OF BIRTH</th>
		        <th style="border-color: blue;">ICD CODE</th>
		        <th style="border-color: blue;">DIAGNOSIS</th>
		        <th style="border-color: blue;">MONTH</th>
		        <th style="border-color: blue;">YEAR</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      	foreach ($dumpData as $record) {
		      		unset($record['id'], $record['ret']);
		      		echo '
		      			<tr>
		      				<td>
		      					'.$record["category"].'
		      				</td>
		      				<td>
		      					'.$record["subcategory"].'
		      				</td>
		      				<td>
		      					'.$record["patientName"].'
		      				</td>
		      				<td>
		      					'.$record["age"].'
		      				</td>
		      				<td>
		      					'.$record["gender"].'
		      				</td>
		      				<td>
		      					'.$record["dateOfBirth"].'
		      				</td>
		      				<td>
		      					'.$record["icd"].'
		      				</td>
		      				<td>
		      					'.$record["diagnosis"].'
		      				</td>
		      				<td>
		      					'.$record["month"].'
		      				</td>
		      				<td>
		      					'.$record["year"].'
		      				</td>
		      				
		      			</tr>
		      		';
		      	}
		      ?>
		    </tbody>
		 </table>
      </div>
    </div>
</div>
</body>
</html>
