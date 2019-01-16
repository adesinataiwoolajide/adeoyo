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
                                    <a href="add-payment.php">
                                        <i class="ti-money"></i> <b> Add Payment</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-payments.php">
                                        <i class="ti-list"></i> <b> View All Payment </b>
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
                                    <i class="ti-plus"></i> <b> Add Payment </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Click The Payment Category</p>
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
                                    <div class="row"><?php
                                        $test = $db->prepare("SELECT * FROM hospital_test ORDER BY test_name ASC");
                                        $test->execute();
                                        while($see_test = $test->fetch()){
                                            $test_name = $see_test['test_name'];
                                            $test_id = $see_test['test_id']; ?>
                                            <div class="col-md-3">
                                                <div class="card" onclick="location.href='add-patient-payment.php?test_name=<?php echo $test_name?>&&test_identification=<?php echo $test_id ?>';">
                                                    <div align="center">
                                                        <img src="../icons/unnamed.jpg" style="width: 100px; height: 100px;" align="center">                    
                                                        <p align="center" style="color: green"><?php echo $see_test['test_name']; ?></p>
                                                        <p align="center" style="color: green"><?php echo "#". $see_test['test_amount']; ?></p>
                                                    </div>         
                                                </div>                            
                                            </div><?php
                                        } ?>
                                    </div>
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