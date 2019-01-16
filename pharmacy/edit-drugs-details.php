<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/drugs/drugs_class.php';
    $hosDrugsCategory = new drugsCategory($db);
    $hosDrug = new hospitaldrugs($db);
    $drug_number = $_GET['drug_number'];
    $drug_name = $_GET['drug_name'];
    $drug_deta = $hosDrug->gettingDrugsDetails($drug_number);
    $drug_number = $drug_deta['drug_number'];
    $manufacturer_id = $drug_deta['manufacturer']; 
    $category_id = $drug_deta['category_id'];
    $type_id = $drug_deta['type_id'];

    $manu = $hosDrug->getManufacturerDetails($manufacturer_id);
    $manu_name = $manu['manufacturer_name'];

    $boss = $hosDrugsCategory->getTypeDetails($type_id);
    $type_name = $boss['type_name'];

    $kate = $hosDrugsCategory->getCategoryDetailsId($category_id);
    $category_name = $kate['drug_category_name'];
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
                                    <a href="edit-drugs-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>">
                                        <i class="ti-plus"></i> <b> Edit <?php echo $drug_name ?> Details</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-drugs-to-pharmacy.php">
                                        <i class="ti-plus"></i> <b> Add Drug To Pharmacy</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-pharmacy-drugs.php">
                                        <i class="ti-list"></i> <b> View All Pharmacy Drug </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-drug-category.php">
                                        <i class="ti-plus"></i> <b> Add Drug Category</b>
                                    </a>
                                </li>

                                <li class="breadcrumb-item">
                                    <a href="view-all-drug-stock.php">
                                        <i class="ti-list"></i> <b> View Drugs Stock </b>
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
                                    <i class="ti-plus"></i> <b> Editing <?php echo $drug_name ?> Details </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Add Staff To Update <?php echo $drug_name ?> Details</p>
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
                                    <form action="process-update-pharmacy-drugs.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Name</label>
                                                    <input type="text" class="form-control date" name="drug_name" placeholder="Enter The Drug Name" required value="<?php echo $drug_deta['drug_name'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Carton</label>
                                                    <input type="number" class="form-control" name="carton" placeholder="Enter The Numbers of Carton For The Drugs" required value="<?php echo $drug_deta['carton'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Pack In a Carton</label>
                                                    <input type="number" class="form-control" name="pack_carton" placeholder="Enter The Drug Quantity" required value="<?php echo $drug_deta['quantity'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Price Per Pack</label>
                                                    <input type="number" class="form-control" name="pack_price" placeholder="Enter The Drug Price Per Pack" required value="<?php echo $drug_deta['pack_price'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Sachet In a Pack</label>
                                                    <input type="number" class="form-control " name="nos_sachet" placeholder="Enter The Numbers of Sachet In (Pack)" required value="<?php echo $drug_deta['sachet'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Price Per Sachet</label>
                                                    <input type="number" class="form-control" name="drug_price" placeholder="Enter The Drug Price Per Sachet" required value="<?php echo $drug_deta['price'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Manufacturer</label>
                                                    <select class="form-control" name="manufacturer" required>
                                                        <option value="<?php echo $drug_deta['manufacturer'] ?>"><?php echo $manu_name ?></option>
                                                        <option value=""></option>
                                                        <?php
                                                        $manu = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name ASC");
                                                        $manu->execute();
                                                        while($see_manu = $manu->fetch()){ ?>
                                                            <option value="<?php echo $see_manu['manufacturer_id']; ?>"><?php echo $see_manu['manufacturer_name']; ?></option>
                                                            <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Miligram</label><?php
                                                    $tow =range(50, 2000,50);
                                                    print '<select class ="form-control select" required name ="miligram">';?> 
                                                    <option value="<?php echo $drug_deta['miligram'] ?>"><?php echo $drug_deta['miligram'] ?></option>
                                                    <option value=""></option><?php
                                                    foreach($tow as $i){
                                                        print'<option value=" '.$i."MG".'"'.($i === $tow ? 'selected="selected"' : '').'>'.$i."MG".'</option>';
                                                    }
                                                    print '</select>';?> 
                                                    
                                                </div>
                                                
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Category</label>
                                                    <select class="form-control" name="category_id" required>
                                                        <option value="<?php echo $drug_deta['category_id'] ?>"><?php echo $category_name ?></option>
                                                        <option value=""></option>
                                                        <?php
                                                        $del = $db->prepare("SELECT * FROM drug_category ORDER BY drug_category_name");
                                                        $del->execute();
                                                        while($nov = $del->fetch()){ ?>
                                                            <option value="<?php echo $nov['drug_cate_id']; ?>"><?php echo $nov['drug_category_name']; ?></option>
                                                            <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Type</label>
                                                    <select class="form-control" name="type_id" required>
                                                        <option value="<?php echo $drug_deta['type_id'] ?>"><?php echo $type_name ?></option>
                                                        <option value=""></option>
                                                        <?php
                                                        $dele = $db->prepare("SELECT * FROM drug_type ORDER BY type_name");
                                                        $dele->execute();
                                                        while($novl = $dele->fetch()){ ?>
                                                            <option value="<?php echo $novl['type_id']; ?>"><?php echo $novl['type_name']; ?></option>
                                                            <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Manufacturing Date</label>
                                                    <input type="date" class="form-control date" name="manu_date" placeholder="Enter The Drug Name" required value="<?php echo $drug_deta['manu_date'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Expiry Date</label>
                                                    <input type="date" class="form-control email" name="exp_date" placeholder="Enter The Drug Quantity" required value="<?php echo $drug_deta['exp_date'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="drug_number" value="<?php echo $drug_number ?>">
                                            <input type="hidden" name="prev_name" value="<?php echo $drug_name ?>">
                                            <input type="hidden" name="qty" value="<?php echo $drug_deta['quantity']; ?>">
                                            <input type="hidden" name="prev_sachet" value="<?php echo $drug_deta['sachet']; ?>">
                                            <input type="hidden" name="prev_carton" value="<?php echo $drug_deta['carton']; ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            
                                            
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-drugs">UPDATE <?php echo $drug_name ?> DETAILS</button>
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