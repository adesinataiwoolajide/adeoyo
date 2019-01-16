<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/patient/patient_class.php';
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    require 'libs_dev/test/hospital_test.php';
     $cardDetails = new hospitalUnits($db);
    $card_number = $_GET['card_number'];
    $cardo = $cardDetails->gettingPatientCard($card_number);
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $testing = new hospitalTest($db);
    $view_case_note = $db->prepare("SELECT * FROM case_note WHERE card_number=:card_number ORDER BY case_note_id DESC");
    $arr = array(':card_number'=>$card_number);
    $view_case_note->execute($arr); ?>
    
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
                                                            <a href="view-all-patient-casenote.php">
                                                                <i class="ti-list"></i> <b> View All Patient Case Note </b>
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
                                                            <i class="ti-list"></i> <b>View Patient Case Note List</b>
                                                        </li>
                                                    </p>
                                                     <h4 align="center" style="color: green"><p style="color: green" align="">
                                                        <?php echo $hospital_name ?> PATIENT CASENOTE</p>
                                                    </h4><?php
                                                    if($view_case_note->rowCount()==0){ ?>
                                                        <div class="content-wrap">
                                                            <div class="main">
                                                                <div class="container-fluid">
                                                                    <section id="main-content">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <p style="color: red" align="center"><?php echo $cardo['patient_name'] ?> Case Note is Empty</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div><?php
                                                    }else{?>
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
                                                                <th><strong><i class="ti-list"></i> Serial Number
                                                                </strong></th>
                                                                <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                                <th><strong><i class="ti-user"></i> Patient Details</strong></th>
                                                                 <th><strong><i class="ti-calendar"></i> Observations</strong></th>
                                                                <th><strong><i class="ti-info"></i>  Test</strong></th>
                                                                <th><strong><i class="ti-credit-card"></i> Time </strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th><strong><i class="ti-list"></i> Serial Number
                                                                </strong></th>
                                                                <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                                <th><strong><i class="ti-user"></i> Patient Details</strong></th>
                                                                 <th><strong><i class="ti-calendar"></i> Observations</strong></th>
                                                                <th><strong><i class="ti-info"></i>  Test</strong></th>
                                                                <th><strong><i class="ti-credit-card"></i> Time </strong></th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody><?php 
                                                            
                                                            $y=1;
                                                            while($see_case_note=$view_case_note->fetch()){
                                                                $case_note_id = $see_case_note['case_note_id']; 
                                                                $staff_number=$see_case_note['staff_number'];
                                                                $depo = $staffDetails->seeStaffDetails($staff_number);
                                                                $staff_name = $depo['staff_name'];
                                                                
                                                                $patient_name = $cardo['patient_name'];?>
                                                                <tr>
                                                                    <td><?php echo $y; ?></td>
                                                                    <td><?php echo $staff_name. " $staff_number"; ?></td>
                                                                    <td><?php echo $patient_name. " $card_number"; ?></td>
                                                                    <td><?php echo $see_case_note['content']; ?></td>
                                                                    <td><?php 
                                                                        $test_id = $see_case_note['test_id']; 
                                                                        $frosh = $testing->getHospitalTest($test_id);
                                                                        if($test_id ==0){ 
                                                                           echo  "No Test Was Recommended";
                                                                        }else{ 
                                                                            echo $frosh['test_name'];
                                                                        }?>
                                                                            
                                                                    </td>
                                                                    <td><?php echo $see_case_note['time_inserted']; ?>
                                                                    </td>
                                                                    
                                                                </tr><?php
                                                                $y++;
                                                            } ?>
                                                        </tbody>
                                                    </table><?php
                                                } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                        </div>

                        <script>
                            function confirmToDelete(){
                                return confirm("Click Okay to Delete Staff Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Staff and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");