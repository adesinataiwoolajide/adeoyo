<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    require '../ict-department/libs_dev/test/hospital_test.php';
    $test_name = $_GET['test_name'];
    $test_id = $_GET['test_identification'];
    $hosUnit = new hospitalUnitings($db);
    $hosTest = new hospitalTest($db);
    $test_details = $hosTest->getHospitalTest($test_id);
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
                                    <a href="edit-hospital-test.php?test_name=<?php echo $test_name ?>&&test_identification=<?php echo $test_id ?>">
                                        <i class="ti-plus"></i> <b> Edit <?php echo $test_name ?> Details</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-hospital-test.php">
                                        <i class="ti-plus"></i> <b> Add Hospital Test</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-test.php">
                                        <i class="ti-list"></i> <b> View Hospital Tests </b>
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
                                    <i class="ti-plus"></i> <b> Edit <?php echo $test_name ?> Details </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Update <?php echo $test_name ?>  Test Details </p>
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
                                    <form action="update-hospital-test.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Test Name" name="test_name" required value="<?php echo $test_name ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Unit Name</label>
                                                    <select class="form-control select" required name="unit_id"><?php
                                                        $unit_id = $test_details['unit_id'];
                                                        $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                        $unit_name = $gosh['unit_name']; ?> 
                                                        <option value="<?php echo $unit_id ?>"><?php echo $unit_name ?></option>
                                                        <option value=""></option><?php
                                                        $dept = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
                                                        $dept->execute();
                                                        while($see_dept = $dept->fetch()){ ?>
                                                            <option value="<?php echo $see_dept['unit_id']; ?>"><?php echo $see_dept['unit_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red" >** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Test Amount</label>
                                                    <input class="form-control" type="number" placeholder="Enter The Cost of The Test" name="test_amount" required value="<?php echo $amount= $test_details['test_amount']; ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="test_id" value="<?php echo $test_id ?>">
                                            <input type="hidden" name="prev_name" value="<?php echo $test_name ?>">
                                            <input type="hidden" name="prev_unit" value="<?php echo $unit_name ?>">
                                            <input type="hidden" name="prev_amount" value="<?php echo $amount ?>">
                                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI']; ?>">

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-test">UPDATE <?php echo $test_name ?> details</button>
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