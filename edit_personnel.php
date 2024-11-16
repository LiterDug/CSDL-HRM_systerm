<?php include("header.php"); ?>
<?php
include("connect.php");

$per_id = $_GET['per_id'];

// Fetch the existing personnel data
$result = $con->prepare("SELECT * FROM tbl_personnel 
    LEFT JOIN tbl_department ON tbl_personnel.dept_id = tbl_department.dept_id 
    LEFT JOIN tbl_position ON tbl_personnel.pos_id = tbl_position.pos_id 
    WHERE per_id = ?");
$result->execute([$per_id]);
$fetch = $result->fetch(); // Only fetch the first result, as per_id is unique

// Initialize the values for the form
$per_name = $fetch['per_name'];
$per_gender = $fetch['per_gender'];
$per_address = $fetch['per_address'];
$per_date_of_birth = $fetch['per_date_of_birth'];
$per_position = $fetch['pos_id'];
$dept_id = $fetch['dept_id'];
$per_designation = $fetch['per_designation'];
$per_contact_no = $fetch['per_contact_no'];
$bank_name = $fetch['bank_name'];
$bank_account = $fetch['bank_account'];
$hire_date = $fetch['hire_date'];

// Handle form submission and update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Update the database with new values
    $query = $con->prepare("UPDATE tbl_personnel SET 
        per_name = ?, per_gender = ?, per_address = ?, per_date_of_birth = ?, 
        pos_id = ?, dept_id = ?, per_designation = ?, per_contact_no = ?, 
        bank_name = ?, bank_account = ?, hire_date = ?, date_modified = NOW() 
        WHERE per_id = ?");
    $query->execute([$per_name, $per_gender, $per_address, $per_date_of_birth, $per_position, $dept_id, 
                     $per_designation, $per_contact_no, $bank_name, $bank_account, $hire_date, $per_id]);

    // Redirect to another page after the update (for example, view_personnel.php)
    header("Location: all_personnel.php");
    exit;
}
?>
<section class="content">
    <div class="container-fluid">
        <form action="edit_personnel.php?per_id=<?= $per_id ?>" method="POST">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>EDIT PERSONNEL INFORMATION</h4>
                            </div>
                        </div>
                        <div class="body">
                            <div class="container-fluid" style="background-color: #ddd;">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">Name:</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_name" value="<?= $per_name ?>" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">Sex:</span>
                                                <select class="form-control show-tick" name="per_gender">
                                                    <option value="Male" <?= $per_gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                                                    <option value="Female" <?= $per_gender == 'Female' ? 'selected' : ''; ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Address:</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_address" value="<?= $per_address ?>" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Date of Birth:</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" name="per_date_of_birth" value="<?= $per_date_of_birth ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Position:</span>
                                                <select class="form-control show-tick" name="per_position">
                                                    <?php
                                                    $pos1 = $con->prepare("SELECT * FROM tbl_position ORDER BY pos_id");
                                                    $pos1->execute();
                                                    while ($pos = $pos1->fetch()) {
                                                        $selected = $pos['pos_id'] == $per_position ? 'selected' : '';
                                                        echo "<option value='{$pos['pos_id']}' $selected>{$pos['pos_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Department:</span>
                                                <select class="form-control show-tick" name="dept_id">
                                                    <?php
                                                    $department = $con->prepare("SELECT * FROM tbl_department ORDER BY dept_id");
                                                    $department->execute();
                                                    while ($dept = $department->fetch()) {
                                                        $selected = $dept['dept_id'] == $dept_id ? 'selected' : '';
                                                        echo "<option value='{$dept['dept_id']}' $selected>{$dept['dept_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Designation:</span>
                                                <select class="form-control show-tick" name="per_designation">
                                                    <option value="Permanent" <?= $per_designation == 'Permanent' ? 'selected' : ''; ?>>Permanent</option>
                                                    <option value="Full-time" <?= $per_designation == 'Full-time' ? 'selected' : ''; ?>>Full-time</option>
                                                    <option value="Part-Time" <?= $per_designation == 'Part-Time' ? 'selected' : ''; ?>>Part-time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Mobile No.:</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_contact_no" id="contact_no" maxlength="22" value="<?= $per_contact_no ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Bank Name:</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="bank_name" value="<?= $bank_name ?>" placeholder="Bank Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Bank Account:</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="bank_account" value="<?= $bank_account ?>" placeholder="Account Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Hire Date:</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" name="hire_date" value="<?= $hire_date ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="save" value="SAVE" class="btn btn-success" style="float:right; margin-top: 10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="plugins/js/formatter.js"></script>
<script src="js/jquery.min.js"></script>
<?php include("script.php"); ?>
<script>
    var contact_no = new Formatter(document.getElementById('contact_no'), {
        'pattern': '+639 {{999}}-{{999}}-{{999}}',
        'persistent': true
    });
</script>
<script type="">
    $(function(){
  
  $("select.main").on("change", function(){
    //remove active
    $("select.models.active").removeClass("active");
    //check if select vlass exists..if it does show it
    var subList = $("select.models."+$(this).val());
    if (subList.length){
      //it does! show it by adding active class to it
      subList.addClass("active");
    }
  });
  
});
</script>
<script type="">
    var Privileges = jQuery('#privileges');
    var select = this.value;
    Privileges.change(function () {
        if ($(this).val() == '') {
            $('.resources').enabled();
        }
        else $('.resources').disabled();
    });
</script>
<!-- <?php include("footer.php"); ?> -->
