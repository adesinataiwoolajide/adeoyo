<?php
	include("../header.php");
	include("../side-bar.php");
    require 'libs_dev/patient/patient_class.php';
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $cardDetails = new hospitalUnits($db);
    $appointment = new patientAppointTest($db);
    $staffDetails = new hospitalstaffDetails($db);
    $card_number = $_GET['card_number'];
    $appointment_id = $_GET['appointment_identification'];
    $patient_number = $card_number;
    $detal=$appointment->getttingPatientAppointment($patient_number);
    $staff_number = $detal['staff_number'];
    $depo = $staffDetails->seeStaffDetails($staff_number);
    $staff_name = $depo['staff_name'];
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
                                    <a href="edit-schedule-patient-appointment.php?card_number=<?php echo $card_number ?>&&appointment_identification=<?php echo $appointment_id ?>">
                                        <i class="ti-plus"></i> <b>Edit <?php echo $card_number ?> Appointment Schedule</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="schedule-patient-appointment.php">
                                        <i class="ti-plus"></i> <b> Schedule Patient Appointment</b>
                                    </a>
                                </li>
                                edit-schedule-patient-appointment.php
                                <li class="breadcrumb-item">
                                    <a href="schedule-patient-appointment.php">
                                        <i class="ti-plus"></i> <b> Schedule Patient Appointment</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-patient-appointment.php">
                                        <i class="ti-list"></i> <b> View Patient Appointments </b>
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
                                    <i class="ti-plus"></i> <b> Adding Patient Appointment </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Add Patient Appointment</p>
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
                                    <form action="process-update-appointment.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Patient Number</label>
                                                    <input type="text" class="form-control date" name="card_number" placeholder="Enter The Patient Number" required value="<?php echo $card_number ?>">
                                                </div>
                                                <span style="color: red">
                                                    ** This Field is Required **
                                                </span>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date of Appointment</label>
                                                    <input type="date" class="form-control date" name="dateof_appointment" placeholder="" value="<?php echo $detal['dateof_appointment'] ?>" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Details</label>
                                                    <select class="form-control select" required name="staff_number">
                                                        <option value="<?php echo $staff_number ?>"><?php echo $staff_name. " ".$staff_number ?></option>
                                                        <option value=""></option><?php
                                                        $dept = $db->prepare("SELECT * FROM staff WHERE type_id=3 ORDER BY staff_name ASC");
                                                        $dept->execute();
                                                        while($see_dept = $dept->fetch()){ ?>
                                                            <option value="<?php echo $see_dept['staff_number']; ?>"><?php echo $see_dept['staff_name']. " ".$see_dept['staff_number']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Unit Name</label>
                                                    <select class="form-control select" required name="unit_id"><?php
                                                        $unit_id = $detal['unit_id'];
                                                        $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                        $unit_name = $gosh['unit_name']; ?> 
                                                        <option value="<?php echo $unit_id ?>"><?php echo $unit_name ?></option>
                                                        <option value=""></option><?php
                                                        $dept = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
                                                        $dept->execute();
                                                        while($see_dept = $dept->fetch()){ ?>
                                                            <option value="<?php echo $see_dept['unit_id']; ?>"><?php echo $see_dept['unit_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            <input type="hidden" name="prev_card" value="<?php echo $card_number ?>">
                                            
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-appointment">Update Patient Appointment</button>
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