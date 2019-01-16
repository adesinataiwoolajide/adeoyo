<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/drugs/drugs_class.php';
    $hosDrug = new hospitaldrugs($db);
    $hosDrugsCategory = new drugsCategory($db);
    $view_stock = $db->prepare("SELECT * FROM drug_stock ORDER BY drug_name ASC");
    $view_stock->execute();
    if($view_stock->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Pharmacy Drug Stock is Empty, Please Click On <a href="add-drugs-to-pharmacy.php" class=" btn btn-success">On This To Add Drugs To The Pharmacy</a></p>
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
                                                        <a href="view-all-drug-stock.php">
                                                            <i class="ti-list"></i> <b> View Drugs Stock </b>
                                                        </a>
                                                    </li>
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
                                                        <a href="./">
                                                            <i class="ti-home"></i> <b> Home Page </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        
                                                    </li>
                                                    <li class="breadcrumb-item-active">
                                                        <i class="ti-list"></i> <b> View All Pharmacy Drugs Stock </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> PHARMACY DRUG STOCK</p>
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
                                                        
                                                        <th><strong><i class="ti-infinite"></i>Drug Miligram</strong></th>
                                                        <th><strong><i class="ti-receipt"></i>Drug Category</strong></th>
                                                        <th><strong><i class="ti-vector"></i>Drug Type</strong></th>
                                                        <th><strong><i class="ti-settings"></i>Numbers of Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Numbers of Pack</strong></th>
                                                        <th><strong><i class="ti-hand-point-up"></i>Numbers of Sachet</strong></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-id-badge"></i>Drug Name </strong></th>
                                                        
                                                        <th><strong><i class="ti-infinite"></i>Drug Miligram</strong></th>
                                                        <th><strong><i class="ti-receipt"></i>Drug Category</strong></th>
                                                        <th><strong><i class="ti-vector"></i>Drug Type</strong></th>
                                                        <th><strong><i class="ti-settings"></i>Numbers of Carton</strong></th>
                                                        <th><strong><i class="ti-bar-chart"></i>Numbers of Pack</strong></th>
                                                        <th><strong><i class="ti-hand-point-up"></i>Numbers of Sachet</strong></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_stock = $view_stock->fetch()){
                                                        
                                                        $category_id = $see_stock['drug_cate_id'];
                                                        $type_id = $see_stock['type_id'];

                                                        $boss = $hosDrugsCategory->getTypeDetails($type_id);
                                                        $type_name = $boss['type_name'];

                                                        $kate = $hosDrugsCategory->getCategoryDetailsId($category_id);
                                                        $category_name = $kate['drug_category_name'];
                                                        
                                                        $drug_name = $see_stock['drug_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                               
                                                                
                                                            </td>
                                                            <td><?php echo $drug_name ; ?></td>
                                                            
                                                            
                                                            <td><?php echo $see_stock['miligram']; ?>  </td>
                                                            <td> <?php echo $category_name ?>  </td>
                                                            <td>  <?php echo $type_name ?> </td>
                                                            <td><?php echo $see_stock['carton'] ?></td>
                                                            <td><?php echo $see_stock['quantity']; ?></td>
                                                            <td><?php echo $see_stock['total_sachet'] ?></td>
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
