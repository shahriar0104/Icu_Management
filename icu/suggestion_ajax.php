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
		</tr>
		";
		$c++;
	}
}

?>