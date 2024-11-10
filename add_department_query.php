<?php
include('connect.php');
// Check if the 'save' button was clicked and the form was submitted
if(isset($_POST['save'])) {
	$dept_name = $_POST['dept_name'];

	// insert a new record into the 'tbl_department' table
	$add_personnel = $con->prepare("INSERT INTO tbl_department (dept_name) VALUES (?)");

	//adds a new department name (dept_name) into the table
	$add_personnel->execute(array($dept_name));
	header('location:department_table.php');
}
?>