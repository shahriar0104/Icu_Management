<?php
include 'db.php';

if(isset($_REQUEST['submit_form'])){
	$docname = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
	$docemail = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
	$ins_sql = "INSERT INTO doctor (ser_no, name , email) VALUES ('','$docname','$docemail')";
	$run_sql = mysqli_query($conn, $ins_sql);
}

if(isset($_REQUEST['del_id'])){
	$del_sql = "DELETE FROM doctor WHERE ser_no = '$_REQUEST[del_id]'";
	$del_run = mysqli_query($conn, $del_sql);
}

if(isset($_REQUEST['edit_form'])) {
	$edit_name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_name']));
	$edit_email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_email']));
	
	$edit_sql = "UPDATE doctor SET name = '$edit_name', email = '$edit_email' WHERE ser_no = '$_REQUEST[edit_id]'";
	mysqli_query($conn, $edit_sql);
}

$sql = "SELECT * FROM doctor";
$run = mysqli_query($conn, $sql);
$c = 1;
while($rows = mysqli_fetch_assoc($run)) {
	echo "
	<tr>
	<td>$c</td>
	<td>$rows[name]</td>
	<td>$rows[email]</td>
	<td class='text-left'>
	<button class='btn btn-success' data-toggle='modal' data-target='#edit_doc$rows[ser_no]'>Edit</button>
	<button class='btn btn-danger' onclick=delete_func('$rows[ser_no]');>Delete</button>

	<div class='modal fade' id='edit_doc$rows[ser_no]'>
	<div class='modal-dialog'>
	<div class='modal-content'>

	<div class='modal-header'>Edit Form</div>
	<div class='modal-body'>
	<form onsubmit='return edit_form($rows[ser_no]);' id='edit_form$rows[ser_no]'>
	<div class='form-group'>
	<label>Doctor Name</label>
	<input type='text' value='$rows[name]' id='edit_name$rows[ser_no]' class='form-control' required>
	</div>
	<div class='form-group'>
	<label>Doctor Name</label>
	<input type='text' value='$rows[email]' id='edit_email$rows[ser_no]' class='form-control' required>
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

?> 