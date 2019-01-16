<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/patient/patient_class.php';
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $view_appointment = $db->prepare("SELECT * FROM patient_appointment ORDER BY appointment_id DESC");
    $view_appointment->execute();
    if($view_appointment->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Patient Appointment List is Empty, Please Click On<a href="schedule-patient-appointment.php" class=" btn btn-success"> This Button To Schedule Patient Appointment</a></p>
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
                                                        <a href="view-patient-appointment.php">
                                                            <i class="ti-list"></i> <b> View Patient Appointments </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="schedule-patient-appointment.php">
                                                            <i class="ti-plus"></i> <b> Schedule Patient Appointment</b>
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="breadcrumb-item">
                                                        <a href="./">
                                                            <i class="ti-home"></i> <b> Home Page </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="create-hospital-card.php">
                                                            <i class="ti-plus"></i> <b> Open Hospital Card</b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="view-all-patient-cards.php">
                                                            <i class="ti-list"></i> <b> View Hospital Cards </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        
                                                    </li>
                                                    <li class="breadcrumb-item-active">
                                                        <i class="ti-list"></i> <b> View All Patient Appointment </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> AVAILABLE Appointment</p>
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
                                                         <th><strong><i class="ti-calendar"></i> Date of Appointment</strong></th>
                                                        <th><strong><i class="ti-info"></i> Department/Unit Name</strong></th>
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
                                                        <th><strong><i class="ti-info"></i> Department/Unit Name</strong></th>
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
                                                                <a href="edit-schedule-patient-appointment.php?card_number=<?php echo $card_number ?>&&appointment_identification=<?php echo $appointment_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-patient-appointment.php?card_number=<?php echo $card_number ?>&&staff_number=<?php echo $staff_number ?>&&appointment_identification=<?php echo $appointment_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $patient_name; ?></td>
                                                            <td><?php echo $staff_name; ?></td>
                                                            <td><?php echo $see_appointment['dateof_appointment']; ?></td>
                                                            <td><?php 
                                                                $unit_id = $see_appointment['unit_id'];
                                                                $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                                echo $unit_name = $gosh['unit_name']; ?>
                                                                    
                                                            </td>
                                                            <td><?php echo $see_appointment['time_added']; ?>
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
                                return confirm("Click Okay to Delete Appointment Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Appointment and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
