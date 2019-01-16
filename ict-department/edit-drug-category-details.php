<?php
	include("../header.php");
	include("../side-bar.php");
    $category_name = $_GET['category_name'];
    $drug_cate_id = $_GET['category_identification'];
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
                                    <a href="edit-drug-category-details.php?unit_name=<?php echo $category_name ?>&&category_identification=<?php echo $drug_cate_id ?>">
                                        <i class="ti-plus"></i> <b> Edit <?php echo $category_name ?> Drug Category</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-drug-category.php">
                                        <i class="ti-plus"></i> <b> Add Drug Category</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-drug-categories.php">
                                        <i class="ti-list"></i> <b> View All Drug Category </b>
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
                                    <i class="ti-plus"></i> <b> Add Drug Category </b>
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
                                    <form action="process-update-category-details.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Drug Category Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Drug Categry Name" name="category_name" required value="<?php echo $category_name ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="drug_cate_id" value="<?php echo $drug_cate_id ?>">
                                            <input type="hidden" name="prev_name" value="<?php echo $category_name ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-ward">Update The Drug Category</button>
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