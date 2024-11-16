<?php
include('connect.php');
if(isset($_POST['save'])) {
    $per_id = $_POST['per_id'];
    $per_name = $_POST['per_name'];
    $pos_id = $_POST['pos_name'];
    $per_gender = $_POST['per_gender'];
    $per_address = $_POST['per_address'];
	
    $per_date_of_birth = $_POST['per_date_of_birth'];
    $dept_id = $_POST['dept_name'];
    $per_contact = $_POST['per_contact_no'];
    $per_designation = $_POST['per_designation'];
    $hire_date = $_POST['hire_date'];
    $bank_name = $_POST['bank_name'];
    $bank_account = $_POST['bank_account'];


	  // Prepare the SQL statement with only the relevant columns
	  $add_personnel = $con->prepare("
	  INSERT INTO tbl_personnel (
		  per_name, per_gender, per_address, pos_id, dept_id, per_designation, 
		  per_date_of_birth, hire_date, per_contact_no, bank_name, bank_account, date_modified
	  ) 
	  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
  ");

  // Execute the statement with only the necessary values
  $add_personnel->execute(array(
	  $per_name, $per_gender, $per_address, $pos_id, $dept_id, $per_designation, 
	  $per_date_of_birth, $hire_date, $per_contact, $bank_name, $bank_account
  ));

	header('location:home.php');
}
?>