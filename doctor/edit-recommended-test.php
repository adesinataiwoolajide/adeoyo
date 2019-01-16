<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/patient/patient_class.php';
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    require '../ict-department/libs_dev/test/hospital_test.php';
    $staff_email = $_SESSION['user_name'];
    $testerPa = new hospitalTest($db);
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $staffO = $staffDetails->seeStaffEmailDetails($staff_email);
    //$staff_number =$staffO['staff_number'];
    $staff_name = $staffO['staff_name'];
    $card_number = $_GET['card_number'];
    $staff_number = $_GET['staff_number'];
    $patient_test_id= $_GET['patient_test_id'];
    $deto = $cardDetails->getingPatIDTest($patient_test_id);
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
                                    <a href="edit-recommended-test.php?card_number=<?php echo $card_number ?>&&patient_test_id=<?php echo $patient_test_id ?>">
                                        <i class="ti-plus"></i> <b>Edit <?php echo $card_number ?> Recommended Test</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="recommend-test.php">
                                        <i class="ti-plus"></i> <b> Recommend Test</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-patients-test.php">
                                        <i class="ti-list"></i> <b> View Patient Test </b>
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
                                    <i class="ti-plus"></i> <b> Editing <?php echo $card_number ?> Recommended Test </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Recommend Test For Patient</p>
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
                                    <form action="update-recommended-test.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Patient Number</label>
                                                    <input type="text" class="form-control date" name="card_number" placeholder="Enter The Patient Number" required value="<?php echo $card_number ?>">
                                                </div>
                                                <span style="color: red">
                                                    ** This Field is Required **
                                                </span>
                                            </div>
                                            
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Staff Details</label>
                                                     <input type="text" class="form-control text" name="" readonly="" value="<?php echo $staff_name. " ".$staff_number ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="staff_number" value="<?php echo $staff_number ?>">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Test Category</label>
                                                    <select class="form-control" required name="test_id"><?php
                                                        //$patient_test_id= $see_test['patient_test_id'];
                                                        $test_id=$deto['test_id'];
                                                        $testing =$testerPa->getHospitalTest($test_id);
                                                        $test_name = $testing['test_name']; ?>
                                                        <option value="<?php echo $test_id ?>"><?php echo $test_name ?></option>
                                                        <option value=""></option><?php
                                                        $test = $db->prepare("SELECT * FROM hospital_test ORDER BY test_name ASC");
                                                        $test->execute();
                                                        while($see_test = $test->fetch()){ ?>
                                                            <option value="<?php echo $see_test['test_id']; ?>"><?php echo $see_test['test_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Test Full Specification/Details</label>
                                                    <textarea class="form-control" name="specification" placeholder="" required><?php echo $deto['specification'] ?></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="prev_number" value="<?php echo $card_number ?>">
                                            <input type="hidden" name="patient_test_id" value="<?php echo $patient_test_id ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-test">UPDATE RECOMMENDED TEST FOR T<?php echo $card_number ?></button>
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