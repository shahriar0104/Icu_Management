<?php 
include 'db.php';

if(isset($_POST['pid'])){
	$user_input = $_POST['pid'];
	$fetch_info = "select * from old_test_report where pid='$user_input'";
}

$result = mysqli_query($conn,$fetch_info);
if ($user_input != '') {
while ($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['spo2']; ?></td>
		<td><?php echo $row['hr']; ?></td>
		<td><?php echo $row['temp']; ?></td>
		<td><?php echo $row['urine']; ?></td>
		<td><?php echo $row['ph']; ?></td>
		<td><?php echo $row['pco2']; ?></td>
		<td><?php echo $row['hco3']; ?></td>
		<td><?php echo $row['na']; ?></td>
		<td><?php echo $row['k']; ?></td>
		<td><?php echo $row['cl']; ?></td>
	</tr>
	<?php   
}
}

?>