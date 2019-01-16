<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/drugs/drugs_class.php';
    $hosDrug = new hospitaldrugs($db);
    $hosDrugsCategory = new drugsCategory($db);
    $view_drugs = $db->prepare("SELECT * FROM drugs ORDER BY drug_name DESC");
    $view_drugs->execute();
    if($view_drugs->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Pharmacy Drug List is Empty, Please Click On <a href="add-drugs-to-pharmacy.php" class=" btn btn-success">On This To Add Drugs To The Pharmacy</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div><?php
    }else{?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                <p>
                                                    <li class="breadcrumb-item">
                                                        <a href="view-all-pharmacy-drugs.php">
                                                            <i class="ti-list"></i> <b> View All Pharmacy Drugs </b>
                                                        </a>
                                                    </li>
                                                   <li class="breadcrumb-item">
                                                        <a href="add-drugs-to-pharmacy.php">
                                                            <i class="ti-plus"></i> <b> Add Drug To Pharmacy</b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="view-all-drug-stock.php">
                                                            <i class="ti-list"></i> <b> View Drugs Stock </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="./">
                                                            <i class="ti-home"></i> <b> Home Page </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        
                                                    </li>
                                                    <li class="breadcrumb-item-active">
                                                        <i class="ti-list"></i> <b> View All Pharmacy Drugs </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> PHARMACY DRUGS</p>
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
                                                <thead>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-id-badge"></i>Drug Name </strong></th>
                                                        <th><strong><i class="ti-stamp"></i> Drug Number </strong></th>
                                                        <th><strong><i class="ti-infinite"></i>Drug Miligram</strong></th>
                                                        <th><strong><i class="ti-receipt"></i>Drug Category</strong></th>
                                                        <th><strong><i class="ti-vector"></i>Drug Type</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Pack in a Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Sachet in a Pack</strong></th>
                                                        <th><strong>
                                                            <i class="ti-bar-chart"></i>Price Per Sachet
                                                        </strong></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-id-badge"></i>Drug Name </strong></th>
                                                        <th><strong><i class="ti-stamp"></i> Drug Number </strong></th>
                                                        <th><strong><i class="ti-infinite"></i>Drug Miligram</strong></th>
                                                        <th><strong><i class="ti-receipt"></i>Drug Category</strong></th>
                                                        <th><strong><i class="ti-vector"></i>Drug Type</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Pack in a Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Nos of Sachet in a Pack</strong></th>
                                                        <th><strong>
                                                            <i class="ti-bar-chart"></i>Price Per Sachet
                                                        </strong></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_drug = $view_drugs->fetch()){
                                                        $drug_number = $see_drug['drug_number'];
                                                        $manufacturer_id = $see_drug['manufacturer']; 
                                                        $category_id = $see_drug['category_id'];
                                                        $type_id = $see_drug['type_id'];

                                                        $manu = $hosDrug->getManufacturerDetails($manufacturer_id);
                                                        $manu_name = $manu['manufacturer_name'];

                                                        $boss = $hosDrugsCategory->getTypeDetails($type_id);
                                                        $type_name = $boss['type_name'];

                                                        $kate = $hosDrugsCategory->getCategoryDetailsId($category_id);
                                                        $category_name = $kate['drug_category_name'];
                                                        
                                                        $drug_name = $see_drug['drug_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="drug-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>">
                                                                    <i class="ti-id-badge"></i>
                                                                </a>
                                                               <a href="edit-drugs-details.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-pharmacy-drug.php?drug_name=<?php echo $drug_name ?>&&drug_number=<?php echo $drug_number ?>" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $drug_name ; ?></td>
                                                            <td><?php echo $drug_number ?></td>
                                                            
                                                            <td><?php echo $see_drug['miligram']; ?>  </td>
                                                            <td> <?php echo $category_name ?>  </td>
                                                            <td>  <?php echo strtoupper($type_name); ?> </td>
                                                            <td><?php echo $see_drug['carton']; ?></td>
                                                            <td><?php echo $see_drug['quantity']; ?></td>
                                                            <td><?php echo $see_drug['sachet']; ?></td>
                                                            <td><?php echo "#".$see_drug['price']; ?></td>
                                                        </tr><?php
                                                        $y++;
                                                    } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                        </div>

                        <script>
                            function confirmToDelete(){
                                return confirm("Click Okay to Delete Drug Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Drug Details and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
