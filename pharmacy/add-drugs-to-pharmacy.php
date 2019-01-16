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
                                    <i class="ti-plus"></i> <b> Adding Drug To Pharmacy </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Add Staff To The Staff List</p>
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
                                    <form action="process-add-pharmacy-drug.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Name</label>
                                                    <input type="text" class="form-control date" name="drug_name" placeholder="Enter The Drug Name" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Carton</label>
                                                    <input type="number" class="form-control" name="carton" placeholder="Enter The Numbers of Carton For The Drugs" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Pack In a Carton</label>
                                                    <input type="number" class="form-control" name="pack_carton" placeholder="Enter The Drug Quantity" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Price Per Pack</label>
                                                    <input type="number" class="form-control" name="pack_price" placeholder="Enter The Drug Price Per Pack" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Numbers of Sachet In a Pack</label>
                                                    <input type="number" class="form-control " name="nos_sachet" placeholder="Enter The Numbers of Sachet In (Pack)" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Price Per Sachet</label>
                                                    <input type="number" class="form-control" name="drug_price" placeholder="Enter The Drug Price Per Sachet" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drug Manufacturer</label>
                                                    <select class="form-control" name="manufacturer" required>
                                                        <option value="">-- Please Select the Drug Manufacturer --</option>
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
                                                    <option value="">-- Please Select The Drug Miligram --</option>
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
                                                        <option value="">-- Please Select the Drug Category --</option>
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
                                                        <option value="">-- Please Select the Drug Type --</option>
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
                                                    <input type="date" class="form-control date" name="manu_date" placeholder="Enter The Drug Name" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Expiry Date</label>
                                                    <input type="date" class="form-control email" name="exp_date" placeholder="Enter The Drug Quantity" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            
                                            
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-drugs">Add Drug To The Hospital Pahrmacy</button>
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