<?php 
include 'db.php';

if(isset($_POST['status'])){
	$user_input = $_POST['status'];
	$fetch_info = "select * from user where status='$user_input'";
}

$result = mysqli_query($conn,$fetch_info);
if ($user_input != '') {
	$c = 1;
	while ($rows = mysqli_fetch_assoc($result)) {
		echo "
		<tr>
		<td>$c</td>
		<td>$rows[name]</td>
		<td>$rows[email]</td>
		<td class='text-left'>
		<button class='btn btn-success' data-toggle='modal' data-target='#edit_person$rows[id]'>Edit</button>
		<button class='btn btn-danger' onclick=delete_func('$rows[id]');>Delete</button>

		<div class='modal fade' id='edit_person$rows[id]'>
		<div class='modal-dialog'>
		<div class='modal-content'>

		<div class='modal-header'>Edit Form</div>
		<div class='modal-body'>
		<form onsubmit='return edit_form($rows[id]);' id='edit_form$rows[id]'>
		<div class='form-group'>
		<label>Name</label>
		<input type='text' value='$rows[name]' id='edit_name$rows[id]' class='form-control' required>
		</div>
		<div class='form-group'>
		<label>Email</label>
		<input type='text' value='$rows[email]' id='edit_email$rows[id]' class='form-control' required>
		</div>
		<div class='form-group'>
		<label>Password</label>
		<input type='text' value='$rows[password]' id='edit_pass$rows[id]' class='form-control' required>
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