<?php
include 'db.php';
if(isset($_REQUEST['submit_form'])){

	$name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
	$email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
	$pass = mysqli_real_escape_string($conn, strip_tags($_REQUEST['pass']));
	$status = mysqli_real_escape_string($conn, strip_tags($_REQUEST['status']));
	
	$ins_sql = "INSERT INTO user (id, name, email , password , status) VALUES ('','$name','$email','$pass','$status')";
	$run_sql = mysqli_query($conn, $ins_sql);
	initialize($conn,$status);
}

if(isset($_REQUEST['del_id'])){
	$sql = mysqli_fetch_assoc(mysqli_query($conn,"select status from user where id = '$_REQUEST[del_id]'"));
	$status = $sql['status'];
	$del_sql = "DELETE FROM user WHERE id = '$_REQUEST[del_id]'";
	$del_run = mysqli_query($conn, $del_sql);
	//echo $id;
	initialize($conn,$status);
}

if(isset($_REQUEST['edit_form'])) {

	$edit_id = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_id']));
	$edit_name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_name']));
	$edit_email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_email']));
	$edit_pass = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_pass']));
	//echo $edit_id;
	$edit_sql = "UPDATE user SET name = '$edit_name', email = '$edit_email', password = '$edit_pass' WHERE id = '$_REQUEST[edit_id]'";
	$edit_run = mysqli_query($conn, $edit_sql);
	$sql = mysqli_fetch_assoc(mysqli_query($conn,"select status from user where id = '$_REQUEST[edit_id]'"));
	$status = $sql['status'];
	//echo $id;
	initialize($conn,$status);
}

	//require_once 'medicinetable_ajax.php';

function initialize($conn,$status) {
	$sql = "SELECT * FROM user where status='$status'";
	$run = mysqli_query($conn, $sql);
	$c = 1;
	while($rows = mysqli_fetch_assoc($run)) {
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