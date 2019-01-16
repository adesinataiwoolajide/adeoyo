<?php
	include("../header.php");
	include("../side-bar.php");
    require 'libs_dev/ward/ward_class.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $wardClass = new hospitalWards($db);
    $ward_id =$_GET['ward_identification'];
    $ward_name =$_GET['ward_name'];
    $details = $wardClass->getWardDetails($ward_name, $ward_id);
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
                                    <a href="edit-ward-details.php?ward_name=<?php echo $ward_name ?>&&ward_identification=<?php echo $ward_id ?>">
                                        <i class="ti-plus"></i> <b> Edit <?php echo $ward_name ?> Details</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-ward.php">
                                        <i class="ti-plus"></i> <b> Add Ward</b>
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
                                    <i class="ti-plus"></i> <b> Add Hospital Ward </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Update <?php echo $ward_name ?> Ward Details</p>
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
                                    <form action="update-ward-details.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                           <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ward Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Ward Name" required value="<?php echo $ward_name; ?>" name="ward_name">
                                                </div>
                                                <span style="color: red" >** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Unit Name</label>
                                                    <select class="form-control select" required name="unit_id"><?php
                                                        $unit_id = $details['unit_id'];
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
                                                    <label>Number of Bed Spaces</label>
                                                    <input class="form-control" type="number" placeholder="Enter The Number of Bed Spaces" value="<?php echo $details['bed_space'] ?>" name="bed_space" required>
                                                </div>
                                                <span style="color: red" >** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="ward_id" value="<?php echo $ward_id ?>">
                                            <input type="hidden" name="previus_name" value="<?php echo $ward_name ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-ward">Update <?php echo $ward_name ?> Ward Details</button>
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