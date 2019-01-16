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
            <p>
                <li class="breadcrumb-item">
                    <a href="drug-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>">
                        <i class="ti-list"></i> <b> View <?php echo $drug_name ?> Details</b>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="edit-drugs-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>">
                        <i class="ti-pencil"></i> <b> Edit <?php echo $drug_name ?> Details</b>
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
                    <i class="ti-plus"></i> <b> Viewing <?php echo $drug_name ?> Details </b>
                </li>
            </p>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                                <div class="alert alert-info" align="center">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                 <?php include("../includes/feed-back.php"); ?>
                                </div><?php 
                            }  ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="user-profile">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="user-photo m-b-30">
                                                <img class="img-fluid" src="../icons/drugs.png" style="" alt="" align="center" />
                                            </div>
                                            <p>Other Details</p>
                                            <div class="user-work">
                                                <h4><i class="ti-calendar"> </i> Drug category:  <?php echo $category_name; ?>
                                                </h4>
                                                
                                            </div>
                                            <div class="user-work">
                                                
                                                <h4> <i class="ti-home"></i> Drug Type: <?php echo $type_name ?>
                                                </h4>
                                                
                                            </div>
                                            <div class="user-work">
                                                
                                                <h4> <i class="ti-layers-alt"></i> Drug Manufacturer: 
                                                    <?php echo $manu_name ?>
                                                </h4>
                                                
                                            </div>
                                            
                                            <div class="user-send-message">
                                                <a href="edit-drugs-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>" class="btn btn-primary btn-addon">
                                                    <i class="ti-pencil"></i> <b> EDIT <?php echo $drug_name ?> DETAILS</b>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                           
                                            <div class="card-body">
                                                <div class="bootstrap-data-table-panel">
                                                    <div class="table-responsive">
                                                        <table class="table table table-bordered">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>Drug Name</td>
                                                                    <td><?php echo $drug_name; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Drug Number</td>
                                                                    <td><?php echo $drug_number; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Numbers of Carton</td>
                                                                    <td><?php echo $kol = $drug_deta['carton']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>Numbers of Pack in a Carton</td>
                                                                    <td><?php echo $kol = $drug_deta['quantity']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Numbers of Sachet in a Pack</td>
                                                                    <td><?php echo $kol = $drug_deta['sachet']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Miligram</td>
                                                                    <td><?php echo $kol = $drug_deta['miligram']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Manufacturer date</td>
                                                                    <td><?php echo $kol = $drug_deta['manu_date']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Expiry date</td>
                                                                    <td><?php echo $kol = $drug_deta['exp_date']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php
            include("../table-footer.php"); 
        ?>