<?php
include("connect.php");

if (isset($_POST['save'])) {
    $per_id = $_GET['per_id'];
    $per_name = $_POST['per_name'];
    $per_gender = $_POST['per_gender'];
    $per_address = $_POST['per_address'];
    $per_date_of_birth = $_POST['per_date_of_birth'];
    $per_position = $_POST['per_position'];
    $dept_id = $_POST['dept_id'];
    $per_designation = $_POST['per_designation'];
    $per_contact_no = $_POST['per_contact_no'];
    $bank_name = $_POST['bank_name'];
    $bank_account = $_POST['bank_account'];
    $hire_date = $_POST['hire_date'];

    $query = $con->prepare("UPDATE tbl_personnel SET 
        per_name = ?, per_gender = ?, per_address = ?, per_date_of_birth = ?, 
        pos_id = ?, dept_id = ?, per_designation = ?, per_contact_no = ?, 
        bank_name = ?, bank_account = ?, hire_date = ?, date_modified = NOW() 
        WHERE per_id = ?");
    $query->execute([$per_name, $per_gender, $per_address, $per_date_of_birth, $per_position, $dept_id, 
                     $per_designation, $per_contact_no, $bank_name, $bank_account, $hire_date, $per_id]);

    header("Location: all_personnel.php");
}
?>
