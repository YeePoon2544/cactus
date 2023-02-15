<!DOCTYPE html>
<html lang="en">

<?php

$user = $_SESSION['user_login'];
//session คือที่มาจากloing	
	$sql = "SELECT booking.id,course.name AS name_course,course.price,course.type,appointment.date,appointment.time FROM booking LEFT JOIN appointment on booking.id = appointment.id_booking LEFT JOIN course on booking.id_course = course.id WHERE booking.id_user = '$user' GROUP BY appointment.id_booking ORDER BY booking.id DESC;";
	
	$result =  mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	$i = 1;
	if ($num_row > 0) {
	while ($row = mysqli_fetch_array($result)) {
	$id_course = $row['id_course'];
	$id_booking = $row['id'];
    }
}
?>
</html>