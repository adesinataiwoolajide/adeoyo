<?php
	include("../header.php");
	include("../side-bar.php");
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    require 'libs_dev/test/hospital_test.php';
    $hosUnit = new hospitalUnitings($db);
    $hosTest = new hospitalTest($db);
    $test_name = $_GET['test_name'];
    $test_id = $_GET['test_identification'];
    $testDetails = $hosTest->getHospitalTest($test_id);
    $unit_id = $testDetails['unit_id'];
    $unitDetails = $hosUnit->getUnitDetailsID($unit_id);
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
                                    <a href="add-patient-payment.php?test_name=<?php echo $test_name?>&&test_identification=<?php echo $test_id ?>">
                                        <i class="ti-money"></i> <b> Add Patient Payment</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-payment.php">
                                        <i class="ti-plus"></i> <b> Add Payment</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-payments.php">
                                        <i class="ti-list"></i> <b> View All Payment </b>
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
                                    <i class="ti-plus"></i> <b> Add Payment </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Click The Payment Category</p>
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
                                    <form action="process-add-patient-payment.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Card Number</label>
                                                    <input class="form-control" type="text" placeholder="Enter The Patient Hospital Number" name="card_number" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Test Name" name="" value="<?php echo $test_name ?>" readonly>
                                                    <input type="hidden" name="test_name" value="<?php echo $test_name ?>">
                                                </div>
                                                <span style="color: pink">** This Field is Readonly **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Test Amount</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Test Name" name="" value="<?php echo $testDetails['test_amount'] ?>" readonly>
                                                    <input type="hidden" name="test_amount" value="<?php echo $testDetails['test_amount'] ?>">
                                                </div>
                                                <span style="color: pink">** This Field is Readonly **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Unit Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Test Name" name="" value="<?php echo $unitDetails['unit_name'] ?>" readonly>
                                                    <input type="hidden" name="unit_name" value="<?php echo $unitDetails['unit_name'] ?>">
                                                    <input type="hidden" name="unit_id" value="<?php echo $unitDetails['unit_id'] ?>">
                                                    
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-payment">Add Payment For The Patient</button>
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