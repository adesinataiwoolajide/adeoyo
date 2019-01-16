<?php
	include("../header.php");
	include("../side-bar.php");
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
                                    <a href="add-ward.php">
                                        <i class="ti-plus"></i> <b> Add Ward</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-wards.php">
                                        <i class="ti-list"></i> <b> View Wards </b>
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
                                Please Kindly Fill The Below Form To Add Hospital Ward</p>
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
                                    <form action="process-add-ward.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ward Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Ward Name" name="ward_name" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Unit Name</label>
                                                    <select class="form-control select" required name="unit_id">
                                                        <option value="">-- Select The Ward Unit --</option>
                                                        <option value=""></option><?php
                                                        $dept = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
                                                        $dept->execute();
                                                        while($see_dept = $dept->fetch()){ ?>
                                                            <option value="<?php echo $see_dept['unit_id']; ?>"><?php echo $see_dept['unit_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Number of Bed Spaces</label>
                                                    <input class="form-control" type="number" placeholder="Enter The Number of Bed Spaces" name="bed_space" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-ward">Add Ward To The Hospital Ward List</button>
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