<?php
include 'db.php';
if(isset($_REQUEST['submit_form'])){

	$pid = mysqli_real_escape_string($conn, strip_tags($_REQUEST['id']));
	//$name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
	$medicinename = mysqli_real_escape_string($conn, strip_tags($_REQUEST['medicine']));
	$dosase = mysqli_real_escape_string($conn, strip_tags($_REQUEST['dosase']));
	$tempdur = mysqli_real_escape_string($conn, strip_tags($_REQUEST['duration']));
	$dm = mysqli_real_escape_string($conn, strip_tags($_REQUEST['dm']));
	$duration = $tempdur." ".$dm;
	$ins_sql = "INSERT INTO medicine (ser_no, pid, medicine, dosase , duration) VALUES ('','$pid','$medicinename','$dosase','$duration')";
	$run_sql = mysqli_query($conn, $ins_sql);
	initialize($conn,$pid);
}

if(isset($_REQUEST['del_id'])){
	$sql = mysqli_fetch_assoc(mysqli_query($conn,"select pid from medicine where ser_no = '$_REQUEST[del_id]'"));
	$id = $sql['pid'];
	$del_sql = "DELETE FROM medicine WHERE ser_no = '$_REQUEST[del_id]'";
	$del_run = mysqli_query($conn, $del_sql);
	//echo $id;
	initialize($conn,$id);
}

if(isset($_REQUEST['edit_form'])) {

	$edit_medicine = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_medicine']));
	$edit_dosase = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_dosase']));
	$edit_duration = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_duration']));
	$edit_sql = "UPDATE medicine SET medicine = '$edit_medicine', dosase = '$edit_dosase', duration = '$edit_duration' WHERE ser_no = '$_REQUEST[edit_id]'";
	mysqli_query($conn, $edit_sql);
	$sql = mysqli_fetch_assoc(mysqli_query($conn,"select pid from medicine where ser_no = '$_REQUEST[edit_id]'"));
	$id = $sql['pid'];
	//echo $id;
	initialize($conn,$id);
}

	//require_once 'medicinetable_ajax.php';

function initialize($conn,$id) {
	$sql = "SELECT * FROM medicine where pid='$id'";
	$run = mysqli_query($conn, $sql);
	$c = 1;
	while($rows = mysqli_fetch_assoc($run)) {
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