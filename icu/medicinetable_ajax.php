<?php 
include 'db.php';

if(isset($_POST['id'])){
	$user_input = $_POST['id'];
	$fetch_info = "select * from medicine where pid='$user_input'";
}

$result = mysqli_query($conn,$fetch_info);
if ($user_input != '') {
	$c = 1;
	while ($rows = mysqli_fetch_assoc($result)) {
		echo "
		<tr>
		<td>$c</td>
		<td>$rows[medicine]</td>
		<td>$rows[dosase]</td>
		<td>$rows[duration]</td>
		<td class='text-left'>
		<button class='btn btn-success' data-toggle='modal' data-target='#edit_person$rows[ser_no]'>Edit</button>
		<button class='btn btn-danger' onclick=delete_func('$rows[ser_no]');>Delete</button>

		<div class='modal fade' id='edit_person$rows[ser_no]'>
		<div class='modal-dialog'>
		<div class='modal-content'>

		<div class='modal-header'>Edit Form</div>
		<div class='modal-body'>
		<form onsubmit='return edit_form($rows[ser_no]);' id='edit_form$rows[ser_no]'>
		<div class='form-group'>
		<label>Medicine Name</label>
		<input type='text' value='$rows[medicine]' id='edit_medicine$rows[ser_no]' class='form-control' required>
		</div>
		<div class='form-group'>
		<label>Dosase</label>
		<select id='edit_dosase$rows[ser_no]' class='form-control'>
		<option value='$rows[dosase]'>$rows[dosase]</option>
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
		<input type='text' value='$rows[duration]' id='edit_duration$rows[ser_no]' class='form-control' required>
		</div>
		<div class='form-group'>
		<button class='btn btn-info btn-block btn-lg'>Done Editing</button>
		</div>
		</form>
		</div>
		<div class='modal-footer'>
		<div class='text-right'>
		<button class='btn btn-danger' data-dismiss='modal'>Close</button>
		</div>
		</div>
		</div>
		</div>x
		</div>
		</td>
		</tr>
		";
		$c++;
	}
}

?>