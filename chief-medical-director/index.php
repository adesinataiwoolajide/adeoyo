<?php
	include("../header.php");
	include("../side-bar.php");
?>
<div class="content-wrap">
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Hello, <?php echo $_SESSION['name']; ?> Welcome To The Super Admin Panel
                        </h1>
                    </div>
                </div>
            </div>
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
            </div>
            <p>
                <li class="breadcrumb-item">
                    <a href="./">
                        <i class="ti-pencil-alt"></i> <b> Home Page </b>
                    </a>
                </li>
            </p>
            
        </div>
        <!-- /# row -->
        <section id="main-content">
            <div class="row">
                
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-support color-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text" >Total Bed Space</div><?php
                                $war=$db->prepare("SELECT sum(bed_space) as new_bed FROM ward"); 
                                $war->execute();                                                                         
                                while($ro1 = $war->fetch()){ 
                                    $his1 = $ro1['new_bed']; ?>
                                    <div class="stat-digit">
                                        <?php echo $his1 ?>    
                                    </div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib">
                                <i class="ti-user color-primary border-primary"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Numbers of Staff</div><?php
                                $stu1= $db->prepare("SELECT count(staff_id) as total_act FROM staff ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Numbers of Department</div>
                                 <?php
                                $stu1= $db->prepare("SELECT count(unit_id) as total_act FROM hospital_unit ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Numbers of Ward</div><?php
                                 $stu1= $db->prepare("SELECT count(ward_id) as total_act FROM ward ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="card" onclick="location.href='view-all-staff.php';">
                        <div align="center">
                            <img src="../icons/staff.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Staff</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-wards.php';">
                        <div align="center">
                            <img src="../icons/unit.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Ward</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-staff-transfer.php';">
                        <div align="center">
                            <img src="../icons/transfer.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Staff Transfer</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-units.php';">
                        <div align="center">
                            <img src="../icons/unit.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Unit</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-test.php';">
                        <div align="center">
                            <img src="../icons/testing.png" style="width: 100px; height: 100px;" align="center">                 
                            <p align="center">Medical Test</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-pharmacy-drugs.php';">
                        <div align="center">
                            <img src="../icons/drugs.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Drugs</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-lg-3">
                    <div class="card" onclick="location.href='view-all-drug-stock.php';">
                        <div align="center">
                            <img src="../icons/botiquin.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Drug Stock</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-lg-3">
                    <div class="card" onclick="location.href='add-hospital-facilities.php';">
                        <div align="center">
                            <img src="../icons/appointment.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Facilities</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-lg-3">
                    <div class="card" onclick="location.href='view-patient-appointment.php';">
                        <div align="center">
                            <img src="../icons/appointment.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Appointment</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-lg-3">
                    <div class="card" onclick="location.href='view-all-patient-casenote.php';">
                        <div align="center">
                            <img src="../icons/course=reg (10).jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Patient Case Note</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-lg-3">
                    <div class="card" onclick="location.href='view-all-patient-appointment.php';">
                        <div align="center">
                            <img src="../icons/admission.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Patient Appointment</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-patient-test.php';">
                        <div align="center">
                            <img src="../icons/unit.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Patient Recommended Test</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/test.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Test</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/unnamed.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Pharmacy</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/download.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Doctors</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/download.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Nurses</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/course=reg (3).jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Doctors</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='my-activities-log.php';">
                        <div align="center">
                            <img src="../icons/images (211).png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">My Activity Log</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='site-history.php';">
                        <div align="center">
                            <img src="../icons/images.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Site History</p>
                        </div>         
                    </div>                            
                </div>
                <div class="col-md-3">
                    <div class="card" onclick="location.href='';">
                        <div align="center">
                            <img src="../icons/stu.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Matron</p>
                        </div>         
                    </div>                            
                </div>
                 <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-memo.php';">
                        <div align="center">
                            <img src="../icons/stu.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Memo</p>
                        </div>         
                    </div>                            
                </div>
        
            </div>
        </section>
    </div>
<?php

	include("../footer.php");
?>