<?php
include('connect.php');
if (isset($_POST['save'])) {
    // Lấy giá trị từ form
    $per_name = $_POST['per_name']; // Sửa tên biến cho đồng nhất
    $per_gender = $_POST['per_gender'];
    $per_address = $_POST['per_address'];
    $per_position = $_POST['per_position']; // Sửa theo tên form
    $dept_id = $_POST['dept_id'];

    $per_designation = $_POST['per_designation'];
    $per_date_of_birth = $_POST['per_date_of_birth'];
    $per_contact_no = $_POST['per_contact_no'];
    $bank_name = $_POST['bank_name'];
    $bank_account = $_POST['bank_account']; 

    // Câu lệnh SQL
    $add_personnel = $con->prepare("INSERT INTO tbl_personnel 
    (per_name, per_gender, per_address, pos_id, dept_id, per_designation, 
    per_date_of_birth, per_contact_no, bank_name, bank_account, date_modified) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    // Execute câu lệnh SQL với đủ tham số
    $add_personnel->execute(array(
        $per_name, $per_gender, $per_address, $per_position, $dept_id, 
        $per_designation, $per_date_of_birth, $per_contact_no, $bank_name, $bank_account
    ));

    // Chuyển hướng về trang home
    header('Location: all_personnel.php');
    exit(); // Đảm bảo không có mã nào tiếp theo được thực thi
}
?>
