<?php
include 'db.php';

if(isset($_REQUEST['del_id'])){
	$del_sql = "DELETE FROM suggestion WHERE ser = '$_REQUEST[del_id]'";
	$del_run = mysqli_query($conn, $del_sql);
}


$sql = "SELECT * FROM suggestion";
$run = mysqli_query($conn, $sql);
$c = 1;
while($rows = mysqli_fetch_assoc($run)) {
	echo "
	<tr>
	<td>$c</td>
	<td>$rows[pid]</td>
	<td>$rows[name]</td>
	<td>$rows[suggestion]</td>
	<td class='text-left'>
	<button class='btn btn-danger' onclick=delete_func('$rows[ser]');>Delete</button>
	</tr>
	";
	$c++;
}

?> 