<?php 
include 'db.php';

if(isset($_POST['id'])){
	$user_input = $_POST['id'];
	$fetch_info = "select * from old_patient_info WHERE id='$user_input'";
}

$result = mysqli_query($conn,$fetch_info) or die(mysqli_error($conn));
if ($user_input != '') {
	while ($row = mysqli_fetch_assoc($result)) { 
		echo "
		<tr data-toggle='modal' data-backdrop='static' data-target='#mailModal'>
		<td>$row[id]</td>
		<td>$row[name]</td>
		<td>$row[height]</td>
		<td>$row[weight]</td>
		<td>$row[gender]</td>
		<td>$row[doctor]</td>

		<div class='modal fade' id='mailModal'>
		<div class='modal-dialog'>
		<div class='modal-content'>
		<div class='modal-header'>
		<button class='close' data-dismiss='modal'>&times;</button>

		</div>
		<div class='modal-body'>
		<form id='user_form'>
		<div class='form-group'>
		<label>Medicine Name</label>
		<input type='text' id='medicinename' class='form-control' required>
		</div>

		<div class='form-group'>
		<label>Dosage</label>
		<!--<input type='text' id='dosase' class='form-control' required> -->
		<select id='dosase' class='form-control'>
		<option value=''>choose Dosase Time</option>
		<option value='0-0-1'>0-0-1</option>
		<option value='0-1-0'>0-1-0</option>
		<option value='1-0-0'>1-0-0</option>
		<option value='0-1-1'>0-1-1</option>
		<option value='1-1-0'>1-1-0</option>
		<option value='1-0-1'>1-0-1</option>
		<option value='1-1-1'>1-1-1</option>
		</select>
		</div>

		<div class='form-group'>
		<label>Duration</label>
		<!--<input type='text' id='duration' class='form-control' required>-->
		<div class='form-group row'>
		<div class='col-sm-6'>
		<input type='number' class='form-control' id='duration' placeholder='Time'>
		</div>
		<div class='col-sm-6'>
		<select id='dm' class='form-control'>
		<option value=''>duration</option>
		<option value='days'>days</option>
		<option value='month'>month</option>
		<option value='year'>year</option>
		</select>
		</div>
		</div>
		</div>

		<div class=form-group>
		<button class='btn btn-info btn-block btn-lg'>ADD</button>
		</div>
		</form>
		</div>

		</div>
		</div>
		</div>

		<td>$row[problem]</td>
		</tr>
		";
	}
}

?>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
