<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $unit_name = $_GET['unit_name'];
    $unit_id = $_GET['unit_identification'];
    $details = $hosUnit-> getUnitDetails($unit_name, $unit_id)
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
                                    <a href="edit-hospital-unit-details.php?unit_name=<?php echo $unit_name ?>&&unit_identification=<?php echo $unit_id ?>">
                                        <i class="ti-pencil-alt"></i> <b> Edit <?php echo $unit_name ?> Department/Unit</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-hospital-unit.php">
                                        <i class="ti-plus"></i> <b> Add Department/Unit</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-units.php">
                                        <i class="ti-list"></i> <b> View All Department/Unit </b>
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
                                    <i class="ti-plus"></i> <b> Add Hospital Department </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Add Hospital Unit/Department</p>
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
                                    <form action="process-update-hospital-unit.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Unit/Department Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Unit/Department Name" value="<?php echo $unit_name ?>" name="unit_name" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="prev_name" value="<?php echo $unit_name ?>">
                                            <input type="hidden" name="unit_id" value="<?php echo $unit_id ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                           
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-unit">Update <?php echo $unit_name ?> Department Details</button>
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