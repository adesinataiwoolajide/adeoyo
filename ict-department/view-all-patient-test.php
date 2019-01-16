<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/patient/patient_class.php';
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    require 'libs_dev/test/hospital_test.php';
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $testerPa = new hospitalTest($db);

    $staff_email = $_SESSION['user_name'];
    $staffO = $staffDetails->seeStaffEmailDetails($staff_email);
    $staff_number =$staffO['staff_number'];
    $staff_name = $staffO['staff_name'];
    $view_pat_test = $db->prepare("SELECT * FROM patient_test WHERE staff_number=:staff_number ORDER BY patient_test_id DESC");
    $arrAp = array(':staff_number'=>$staff_number);
    $view_pat_test->execute($arrAp);
    if($view_pat_test->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Patient Test List is Empty, <!-- Please Click On<a href="recommend-test.php" class=" btn btn-success"> This Button To Recommend Test For Patient</a> --></p>
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
                                                        <a href="view-patients-test.php">
                                                            <i class="ti-list"></i> <b> View Patient Test </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="recommend-test.php">
                                                            <i class="ti-plus"></i> <b> Recommend Test</b>
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
                                                        <i class="ti-list"></i> <b> View All My Patient Test </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> PATIENTS RECOMMENDED TEST</p>
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
                                                        <th><strong><i class="ti-user"></i> Patient Name</strong></th>
                                                        <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Specification</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Type</strong></th>
                                                        <th><strong><i class="ti-info"></i> Test Unit</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Amount</strong></th>
                                                        <th><strong><i class="ti-credit-card"></i> Time Recommended</strong></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i> S/N
                                                        </strong></th>
                                                        <th><strong><i class="ti-user"></i> Patient Name</strong></th>
                                                        <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Specification</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Type</strong></th>
                                                        <th><strong><i class="ti-info"></i> Test Unit</strong></th>
                                                        <th><strong><i class="ti-calendar"></i> Test Amount</strong></th>
                                                        <th><strong><i class="ti-credit-card"></i> Time Recommended</strong></th>                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_test = $view_pat_test->fetch()){
                                                        $patient_test_id= $see_test['patient_test_id'];
                                                        $test_id=$see_test['test_id'];
                                                        $testing =$testerPa->getHospitalTest($test_id);
                                                        $test_name = $testing['test_name']; 
                                                        $unit_id = $testing['unit_id'];
                                                        $test_amount = $testing['test_amount'];
                                                        $staff_number=$see_test['staff_number'];
                                                        $card_number = $see_test['card_number'];
                                                        $depo = $staffDetails->seeStaffDetails($staff_number);
                                                        $staff_name = $depo['staff_name'];
                                                        
                                                        $cardo = $cardDetails->gettingPatientCard($card_number);
                                                        $patient_name = $cardo['patient_name'];?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-recommended-test.php?card_number=<?php echo $card_number ?>&&staff_number=<?php echo $staff_number ?>&&patient_test_id=<?php echo $patient_test_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-recommend-patient-test.php?card_number=<?php echo $card_number ?>&&staff_number=<?php echo $staff_number ?>&&patient_test_id=<?php echo $patient_test_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $patient_name. " $card_number"; ?></td>
                                                            <td><?php echo $staff_name; ?></td>
                                                            <td><?php echo $see_test['specification']; ?></td>
                                                            <td><?php echo $test_name ?></td>
                                                            
                                                            <td><?php $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                                echo $unit_name = $gosh['unit_name']; ?>
                                                                    
                                                            </td>
                                                            <td><?php echo "#". $test_amount ?></td>
                                                            <td><?php echo $see_test['time_recommended']; ?>
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
                                return confirm("Click Okay to Delete Patient Test Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Patient Test Details and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
