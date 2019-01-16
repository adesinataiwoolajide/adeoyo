<?php
  include("../header.php");
  include("../side-bar.php");
  require '../ict-department/libs_dev/staff/hospital_staff.php';
  require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
  require '../ict-department/libs_dev/patient/patient_class.php';
  $unitDetails = new hospitalUnitings($db);
  $staffDetails = new hospitalstaffDetails($db);
  $cardDetails = new hospitalUnits($db);
  $appointment = new patientAppointTest($db);
  $staff_name = $_GET['staff_name'];
  $staff_number = $_GET['staff_number'];
  $myDetails = $staffDetails->seeStaffDetails($staff_number);
  $staff_email = $myDetails['staff_email'];
?>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <p>

                <li class="breadcrumb-item">
                    <a href="my-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-id-badge"></i> <b> View <?php echo $staff_name ?> Details </b>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="edit-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-pencil-alt"></i> <b> Edit <?php echo $staff_name ?> Details </b>
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
                    <i class="ti-list"></i> <b> <?php echo $staff_name ?> Details </b>
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
                                                <img class="img-fluid" src="<?php echo "../ict-department/staff-passport/".$myDetails['passport'] ?>" alt="" />
                                            </div>
                                            <p>Other Details</p>
                                            <div class="user-work">
                                                <h4><i class="ti-calendar"> </i>Year Employed:  <?php echo $myDetails['year_employ']; ?>
                                                </h4>
                                                
                                            </div>
                                            <div class="user-work">
                                                <?php 
                                                    $unit_id = $myDetails['dept_id'];
                                                    $unitDe =$unitDetails->getUnitDetailsID($unit_id);
                                                    $unit_name = $unitDe['unit_name'];
                                                    ?>
                                                <h4> <i class="ti-home"></i>Staff Department: <?php echo $unit_name ?>
                                                </h4>
                                                
                                            </div>
                                            <div class="user-work">
                                                <?php 
                                                    $unit_id = $myDetails['dept_id'];
                                                    $unitDe =$unitDetails->getUnitDetailsID($unit_id);
                                                    $unit_name = $unitDe['unit_name'];
                                                    ?>
                                                <h4> <i class="ti-layers-alt"></i>Staff Qualification: <?php 
                                                
                                                $ema = $myDetails['qualification_id'];
                                                $split = explode(",", $ema);
                                                foreach($split as $qualification_id){
                                                    $camp = $staffDetails->getStaffQualification($qualification_id);
                                                    echo $camp['qualification_name']. ",";
                                                }?>
                                                
                                                </h4>
                                                
                                            </div>
                                            <div class="user-work">
                                                <h4><i class="ti-user"> </i> Next of Kin Details: <?php echo $myDetails['kin_details']; ?> </h4>
                                                  
                                            </div>

                          
                                            <div class="user-send-message">
                                                <a href="edit-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>" class="btn btn-primary btn-addon">
                                                    <i class="ti-pencil-alt"></i> <b> Edit <?php echo $staff_name ?> Details </b>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="user-profile-name"><i class="ti-id-badge"></i> <?php echo " ". $staff_name ?></div>
                                            <div class="user-Location"><i class="ti-location-pin"></i> <?php echo $myDetails['address']; ?>
                                            </div>
                                            <div class="user-job-title"><i class="ti-id-badge"></i><?php
                                                $type_id = $myDetails['type_id'];
                                                $typo = $staffDetails->getStaffType($type_id);
                                                echo " ". $type_name = $typo['type_name'], " ".$staff_name;?>   
                                            </div>


                                            <br><br>
                                            <div class="card-body">
                                                <div class="bootstrap-data-table-panel">
                                                    <div class="table-responsive">
                                                        <table class="table table table-bordered">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>Phone Number</td>
                                                                    <td><?php echo $myDetails['staff_phone']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $myDetails['address']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>E-Mail</td>
                                                                    <td><?php echo $kol = $myDetails['staff_email']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>Gender</td>
                                                                    <td><?php echo $myDetails['sex']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Date of Birth</td>
                                                                    <td><?php echo $myDetails['date_birth']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Marital Status</td>
                                                                    <td><?php echo $myDetails['marital_status']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Religion</td>
                                                                    <td><?php echo $myDetails['religion']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>State of Origin</td>
                                                                    <td><?php echo $myDetails['state_origin']; ?></td>
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
            <!-- /# row -->
            <div class="row"><?php
                $staffO = $staffDetails->seeStaffEmailDetails($staff_email);
                $staff_name = $staffO['staff_name'];
                $view_staff_transfer = $db->prepare("SELECT * FROM staff_transfer WHERE staff_number=:staff_number ORDER BY staff_transfer_id ASC LIMIT 0,5");
                $arrView = array(':staff_number'=>$staff_number);
                $view_staff_transfer->execute($arrView);
                if($view_staff_transfer->rowCount()==0){ ?>
                    <div class="content-wrap">
                        <div class="main">
                            <div class="container-fluid">
                                <section id="main-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <p style="color: red" align="center"><?php echo $staff_name ?> No Transfer Was Found For You</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div><?php
                }else{?>
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <div class="card-title">
                                            <h4 ><p style="color: green" align="center"><?php echo $staff_name ?> Transfer Details</p></h4>
                                        </div>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    
                                                    <th><strong> S/N</strong></th>
                                                    <th><strong><i class="ti-user"></i> Staff Name</strong></th>
                                                    <th><strong><i class="ti-id-badge"></i> Staff Number</strong></th>
                                                    <th><strong> <i class="ti-home"></i> Prev Unit</strong></th>
                                                    <th><strong> <i class="ti-home"></i> New Unit</strong></th>
                                                    <th><strong> <i class="ti-calendar"></i> Transfer Time</strong></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><strong> S/N</strong></th>
                                                    <th><strong><i class="ti-user"></i> Staff Name</strong></th>
                                                    <th><strong><i class="ti-id-badge"></i> Staff Number</strong></th>
                                                    <th><strong> <i class="ti-home"></i> Prev Unit</strong></th>
                                                    <th><strong> <i class="ti-home"></i> New Unit</strong></th>
                                                    <th><strong> <i class="ti-calendar"></i> Transfer Time</strong></th>
                                                </tr>
                                            </tfoot>
                                            <tbody><?php 
                                                
                                                $y=1;
                                                while($see_staff = $view_staff_transfer->fetch()){
                                                    $staff_number =$see_staff['staff_number'];
                                                    $deta = $staffDetails->seeStaffDetails($staff_number);
                                                    
                                                    $staff_name = $deta['staff_name']; ?>
                                                    <tr>
                                                        <td><?php echo $y; ?></td>
                                                        <td><?php echo $staff_name ; ?></td>
                                                        <td><?php echo $staff_number ?></td>
                                                        <td><?php 
                                                           $unit_id = $see_staff['prev_unit_id']; 
                                                           if($unit_id==0){ ?>
                                                           <p style="color: red"><b>Null</b><?php
                                                           }else{
                                                                $uniting = $unitDetails->getUnitDetailsID($unit_id);
                                                                $naming = $uniting['unit_name'];?>
                                                                <p style="color: blue"><b><?php echo $naming ;?></b><?php
                                                            } ?>
                                                        </td>

                                                        <td><?php 
                                                           $unit_id = $see_staff['new_unit_id']; 
                                                            $uniting = $unitDetails->getUnitDetailsID($unit_id);
                                                            $naming = $uniting['unit_name'];?>
                                                            <p style="color: green"><b><?php echo $naming ?></b></p>   
                                                        </td>
                                                        <td><?php echo $see_staff['transfer_time']; ?></td>
                                                        
                                                        <input type="hidden" name="staff_number<?php echo $y ?>" value="<?php echo $staff_number ?>">  
                                                    </tr><?php
                                                    $y++;
                                                } ?>
                                            </tbody>            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php
                } ?>
            </div>
            <div class="row">
                <!-- /# column --><?php
                $view_appointment = $db->prepare("SELECT * FROM patient_appointment WHERE staff_number=:staff_number ORDER BY appointment_id DESC LIMIT 0,10");
                $arrAp = array(':staff_number'=>$staff_number);
                $view_appointment->execute($arrAp);
                if($view_appointment->rowCount()==0){ ?>
                    <div class="content-wrap">
                        <div class="main">
                            <div class="container-fluid">
                                <section id="main-content">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <p style="color: red" align="center"><?php echo $staff_name ?> Your Patient Appointment List is Empty, Please Click On<a href="schedule-patient-appointment.php" class=" btn btn-success"> This Button To Schedule Patient Appointment</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div><?php
                }else{?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4><?php echo $staff_name ?> Patient Appointment List</h4>
                            </div>
                            <div class="card-body">
                                 <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                             <thead>
                                                <tr>
                                                    <th><strong><i class="ti-list"></i> S/N
                                                    </strong></th>
                                                    <th><strong><i class="ti-user"></i> Patient Name</strong></th>
                                                    <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                     <th><strong><i class="ti-calendar"></i> Date of Appointment</strong></th>
                                                    
                                                    <th><strong><i class="ti-credit-card"></i> Time Scheduled</strong></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><strong><i class="ti-list"></i> S/N
                                                    </strong></th>
                                                    <th><strong><i class="ti-user"></i> Patient Name</strong></th>
                                                    <th><strong><i class="ti-id-badge"></i> Staff Name</strong></th>
                                                     <th><strong><i class="ti-calendar"></i> Date of Appointment</strong></th>
                                                    
                                                    <th><strong><i class="ti-credit-card"></i> Time Scheduled</strong></th>
                                                </tr>
                                            </tfoot>
                                            <tbody><?php 
                                                
                                                $y=1;
                                                while($see_appointment = $view_appointment->fetch()){
                                                    $appointment_id = $see_appointment['appointment_id']; 
                                                    $staff_number=$see_appointment['staff_number'];
                                                    $card_number = $see_appointment['patient_number'];
                                                    $depo = $staffDetails->seeStaffDetails($staff_number);
                                                    $staff_name = $depo['staff_name'];
                                                    
                                                    $cardo = $cardDetails->gettingPatientCard($card_number);
                                                    $patient_name = $cardo['patient_name'];?>
                                                    <tr>
                                                        <td><?php echo $y; ?>
                                                           
                                                        </td>
                                                        <td><?php echo $patient_name; ?></td>
                                                        <td><?php echo $staff_name; ?></td>
                                                        <td><?php echo $see_appointment['dateof_appointment']; ?></td>
                                                        
                                                        <td><?php echo $see_appointment['time_added']; ?>
                                                        </td>
                                                        
                                                    </tr><?php
                                                    $y++;
                                                } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php
                } ?>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">
                            <h4 align="center"><p style="color: grey" align="center"><?php echo $staff_name ?> Activity Log</p></h4>
                        </div>
                        <div class="card-body"><?php
                            $staff_activity = $db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC LIMIT 0,5");
                            $arrAct = array(':staff_email'=>$staff_email);
                            $staff_activity->execute($arrAct);
                            if($staff_activity->rowCount()==0){  ?>
                                <p style="color: red" align="center">No Activity Was Found For <?php echo $staff_name; ?></p><?php
                            }else{?>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    
                                                    <th>Activities</th>
                                                    <th>Time of Operation</th>
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    
                                                    <th>Activities</th>
                                                    <th>Time of Operation</th>
                                                </tr>
                                            </tfoot>
                                            <tbody><?php
                                                $num =1;
                                                while($see_staff_act = $staff_activity->fetch()){ ?>
                                                    <tr>
                                                        <td><?php echo $num; ?></td>
                                                        
                                                        <td class="color-primary"><?php echo $see_staff_act['action']; ?></td>
                                                        <td><?php echo $see_staff_act['time_added']; ?></td>
                                                    </tr><?php
                                                    $num++;
                                                } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div><?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include("../table-footer.php"); 
        ?>