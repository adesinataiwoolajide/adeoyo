<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    require '../ict-department/libs_dev/patient/patient_class.php';
    require '../ict-department/libs_dev/test/hospital_test.php';

    $staff_email = $_SESSION['user_name'];
    $testing = new hospitalTest($db);
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $staffO = $staffDetails->seeStaffEmailDetails($staff_email);
    $staff_number =$staffO['staff_number'];
    $staff_name = $staffO['staff_name'];
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="card">
                            <div class="row">
                                <li class="breadcrumb-item">
                                    <a href="add-case-note.php">
                                        <i class="ti-plus"></i> <b> Add Case Note</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-patient-case-note.php">
                                        <i class="ti-list"></i> <b> View Patient Case Note </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="./">
                                        <i class="ti-home"></i><b> Home Page </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                                    
                                </li>
                                <li class="breadcrumb-item-active">
                                    <i class="ti-plus"></i> <b> Add Patient Case Notes </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                <?php echo $staff_name ?> Please Kindly Fill The Below Form To Add Patient Hospital Case Note</p>
                            </h4>
                                
                            <?php
                            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                                <div class="alert alert-info" align="center">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                 <?php include("../includes/feed-back.php"); ?>
                                </div><?php 
                            }  ?>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="process-add-case-note.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Patient Card Number" name="" value="<?php echo $staff_name. " $staff_number" ?>" readonly>
                                                </div>
                                                <span style="color: green">** This Field is Readonly **</span>
                                            </div>
                                            <input type="hidden" name="staff_number" value="<?php echo $staff_number ?>">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Card Number</label>
                                                    <select class="form-control" required name="card_number">
                                                        <option value="">-- Select The Patient --</option>
                                                        <option value=""></option><?php
                                                        $test = $db->prepare("SELECT * FROM patient ORDER BY card_number ASC");
                                                        $test->execute();
                                                        while($see_test = $test->fetch()){ ?>
                                                            <option value="<?php echo $see_test['card_number']; ?>"><?php echo $see_test['patient_name']. " ".$see_test['card_number']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation/Report On The Patient</label>
                                                    <textarea class="form-control textarea" placeholder="Enter The Patient Medical Condition Here" name="observation" required cols="5"></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Recommend Test For Patient</label><?php 
                                                    $tester = $db->prepare("SELECT * FROM hospital_test ORDER BY test_name ASC");
                                                    $tester->execute(); ?>
                                                    <select name="test" class="form-control" required="">
                                                        <option value="">-- Select The Test From The List of Tests --</option>
                                                        <option value=""></option><?php 
                                                        while($see_test = $tester->fetch()){ ?>
                                                            <option value="<?php echo $see_test['test_id']; ?>"><?php echo $see_test['test_name']; ?></option><?php
                                                        } ?>
                                                        <p style="color: red"><option value="0">NO TEST RECOMMENDED</option></p>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-casenote">ADD INFORMATION TO THE PATIENT CASE NOTE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    <?php
        include("../footer.php");
    ?>