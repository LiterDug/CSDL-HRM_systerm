<?php include("header.php") ?>

<link href="css/style2.css" rel="stylesheet">
<section class="content">
    <div class="container-fluid">
        <!-- Input Group -->
        <form action="add_personnel_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>PERSONNEL INFORMATION</h4>
                            </div>
                        </div>
                        <div class="body">
                            <div class="container-fluid" style="background-color: #ddd;">
                                <div class="demo-masked-input" >
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Name:
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_name" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Sex:
                                                </span>
                                                <select class="form-control show-tick" name="per_gender">
                                                    <option></option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Address:
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_address" placeholder="Adrress">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Date of Birth:
                                                </span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" name="per_date_of_birth" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Position:
                                                </span>
                                                <select class="form-control show-tick" name="per_position">
                                                    <option></option>
                                                    <?php
                                                    include("connect.php");
                                                    $pos1 = $con->prepare("SELECT * FROM tbl_position ORDER BY pos_id");
                                                    $pos1->execute();
                                                    while ($row1 = $pos1->fetch()) {
                                                        $pos_name = $row1['pos_name'];
                                                    ?>
                                                        <option value="<?php echo $row1['pos_id']; ?>"><?php echo $row1['pos_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Department:
                                                </span>
                                                <select class="form-control show-tick" name="dept_id">
                                                    <option></option>
                                                    <?php
                                                    include("connect.php");
                                                    $department = $con->prepare("SELECT * FROM tbl_department ORDER BY dept_id");
                                                    $department->execute();
                                                    while ($row1 = $department->fetch()) {
                                                        $dept_name = $row1['dept_name'];
                                                    ?>
                                                        <option value="<?php echo $row1['dept_id']; ?>"><?php echo $row1['dept_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Designation:
                                                </span>
                                                <select class="form-control show-tick main" id="privileges" name="per_designation">
                                                    <option></option>
                                                    <option value='Permanent'>Permanent</option>
                                                    <option value='Full-time'>Full time</option>
                                                    <option value='Part-Time'>Part Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Mobile No.:
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_contact_no" id="contact_no" maxlength="22">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Bank Name:
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="bank_name" placeholder="Bank Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Bank Account:
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="bank_account" placeholder="Account Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Hire Date:
                                                </span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" name="hire_date">
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
    </div>

    </div>
    </div>

    </form>
    <!-- #END# Input Group -->
    </div>
</section>
<script src="plugins/js/formatter.js"></script>
<script src="js/jquery.min.js"></script>
<?php include("script.php"); ?>
<script>
    var contanct_no = new Formatter(document.getElementById('contact_no'), {
        'pattern': '+639 {{999}}-{{999}}-{{999}}',
        'persistent': true
    });
    var pagibig = new Formatter(document.getElementById('pagibig'), {
        'pattern': '{{999}}-{{999}}-{{999}}',
        'persistent': true
    });
    var tin = new Formatter(document.getElementById('tin'), {
        'pattern': '{{999}}-{{999}}-{{999}}',
        'persistent': true
    });
    var gsis = new Formatter(document.getElementById('gsis'), {
        'pattern': '{{999}}-{{999}}-{{999}}',
        'persistent': true
    });
</script>
<script>
    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) {
            target.src = this.result;
        };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src, target);
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
            $('.resources').show();
        }
        else $('.resources').hide();
    });
</script>