<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    require '../ict-department/libs_dev/test/hospital_test.php';
    $hosUnit = new hospitalUnitings($db);
    $hosTest = new hospitalTest($db);
    $view_test = $db->prepare("SELECT * FROM hospital_test ORDER BY test_name ASC");
    $view_test->execute();
    if($view_test->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Test List is Empty, Please Kindly Click On This Button To  <a href="add-hospital-test.php" class=" btn btn-success"> Add Test To The Test List</a></p>
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
                                                        <a href="view-all-test.php">
                                                            <i class="ti-list"></i> <b> View Hospital Tests </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="add-hospital-test.php">
                                                            <i class="ti-plus"></i> <b> Add Hospital Test</b>
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
                                                        <i class="ti-list"></i> <b> View All Wards </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> AVAILABLE TEST</p>
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
                                                        <th><strong><i class="ti-list"></i> S/N
                                                        </strong></th>
                                                        <th><strong><i class="ti-home"></i> Test Name</strong></th>
                                                        <th><strong><i class="ti-info"></i> Department/Unit Name</strong></th>
                                                        <th><strong><i class="ti-credit-card"></i> Test Amount</strong></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i> S/N
                                                        </strong></th>
                                                        <th><strong><i class="ti-home"></i> Test Name</strong></th>
                                                        <th><strong><i class="ti-info"></i> Department/Unit Name</strong></th>
                                                        <th><strong><i class="ti-credit-card"></i> Test Amount</strong></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_test = $view_test->fetch()){
                                                        $test_id = $see_test['test_id']; 
                                                        $test_name = $see_test['test_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-hospital-test.php?test_name=<?php echo $test_name ?>&&test_identification=<?php echo $test_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-hospital-test.php?test_name=<?php echo $test_name ?>&&test_identification=<?php echo $test_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $test_name; ?></td>
                                                            <td><?php 
                                                                $unit_id = $see_test['unit_id'];
                                                                $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                                echo $unit_name = $gosh['unit_name']; ?></td>
                                                            <td><?php $amount = $see_test['test_amount']; 
                                                                if($amount==0){ ?>
                                                                    <p style="color: green">FREE TEST</p><?php
                                                                }else{ ?>
                                                                    <p style="color: red"><?php echo "#".$amount; ?></p><?php
                                                                } ?>
                                                                
                                                            </td>
                                                            
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
                                return confirm("Click Okay to Delete Test Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Test and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
