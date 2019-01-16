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
                                Please Kindly Fill The Below Form To Add Staff To The Staff List</p>
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
                                    <form action="process-schedule-patient-appointment.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Patient Number</label>
                                                    <input type="text" class="form-control date" name="card_number" placeholder="Enter The Patient Number" required>
                                                </div>
                                                <span style="color: red">
                                                    ** This Field is Required **
                                                </span>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date of Appointment</label>
                                                    <input type="date" class="form-control date" name="dateof_appointment" placeholder="" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Details</label>
                                                    <select class="form-control select" required name="staff_number">
                                                        <option value="">-- Select The Doctor --</option>
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
                                                    <select class="form-control select" required name="unit_id">
                                                        <option value="">-- Select The Ward Unit --</option>
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
                                            
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-appointment">Schedule Appointment</button>
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