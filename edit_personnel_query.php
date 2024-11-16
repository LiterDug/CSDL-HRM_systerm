<?php
include('connect.php');
if(isset($_POST['update'])) {
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

    // Prepare and execute the SQL statement
    $add_personnel = $con->prepare("
        UPDATE tbl_personnel
        SET per_name = ?, per_address = ?, pos_id = ?, per_designation = ?, 
            per_date_of_birth = ?, per_gender = ?, per_contact_no = ?, 
            dept_id = ?, hire_date = ?, bank_name = ?, bank_account = ?
        WHERE per_id = ?
    ");

    // Execute the statement with the values in the correct order
    $add_personnel->execute(array(
        $per_name, $per_address, $pos_id, $per_designation, $per_date_of_birth,
        $per_gender, $per_contact, $dept_id, $hire_date, $bank_name, $bank_account, $per_id
    ));

}

?>