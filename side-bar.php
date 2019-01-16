<?php
    $access = $_SESSION['access'];
?>
<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="./">ADEOYO HOSPITAL<img src="" style="height: 100px;" align="center"></a></div>
                    <li class="label">Admin Panel</li>
                    <li><a href="./"><i class="ti-home"></i> Home Page </a></li><?php
                    if(($access ==1)OR ($access ==2)){ ?>
                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Hospital Staff <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-hospital-staff.php"><i class="ti-plus"></i>Add Staff</a></li>
                                <li><a href="view-all-staff.php"><i class="ti-list"></i>View Staff</a></li>
                                <li><a href="transfer-staff.php"><i class="ti-plus"></i>Transfer Staff</a></li>
                                <li><a href="view-all-transfers.php"><i class="ti-list"></i>View Staff Transfer</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-id-badge"></i> Hospital Patient <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="create-hospital-card.php"><i class="ti-plus"></i>Open Patient Card</a></li>
                                <li><a href="view-all-patient-cards.php"><i class="ti-list"></i>View Patients Card</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-tablet"></i> Drugs <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-drug-category.php"><i class="ti-plus"></i>Add Drug Category</a></li>
                                <li><a href="view-all-drug-categories.php"><i class="ti-list"></i>View Drug Categories</a></li>
                                <li><a href=""><i class="ti-plus"></i>Add Drug Type</a></li>
                                <li><a href=""><i class="ti-list"></i>View Drug Types</a></li>
                                <li><a href="add-drugs-to-pharmacy.php"><i class="ti-plus"></i>Add Drugs To Pharmacy </a></li>
                                <li><a href="view-all-pharmacy-drugs.php"><i class="ti-list"></i>View Drugs</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-shield"></i> Hospital Test <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-hospital-test.php"><i class="ti-plus"></i>Add Test</a></li>
                                <li><a href="view-all-test.php"><i class="ti-list"></i>View Test</a></li>
                                <li><a href="view-all-patient-test.php"><i class="ti-list"></i>Patients Test</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-align-center"></i> Hospital Ward <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-ward.php"><i class="ti-plus"></i>Add Ward</a></li>
                                <li><a href="view-all-wards.php"><i class="ti-list"></i>View Wards</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-align-center"></i> Hospital Unit <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-hospital-unit.php"><i class="ti-plus"></i>Add Unit</a></li>
                                <li><a href="view-all-units.php"><i class="ti-list"></i>View Units</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bell"></i>  Appointment  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="view-all-patient-appointment.php"><i class="ti-list"></i>View Appointments</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-settings"></i> Hospital Facilittes <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-facilities.php"><i class="ti-plus"></i>Add Facilities</a></li>
                                <li><a href="view-all-facilities.php"><i class="ti-list"></i>View Facilities</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-email"></i>  Memo  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-memo.php"><i class="ti-plus"></i>Add Memo</a></li>
                                <li><a href="view-all-memo.php"><i class="ti-list"></i>View All Memo</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-money"></i>  Payment  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <!-- <li><a href="add-payment.php"><i class="ti-plus"></i>Add Payment</a></li> -->
                                <li><a href="view-all-payments.php"><i class="ti-list"></i>View All Payment</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="site-history.php"><i class="ti-cloud-up"></i>Staff Activity Log </a></li><?php
                    }elseif($access ==2){ ?>
                        <li><a href="../log-out.php"><i class="ti-close"></i> Logout</a></li><?php

                    }elseif ($access ==3) { ?>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bell"></i>  Appointment  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="schedule-patient-appointment.php"><i class="ti-plus"></i>Add Appointment</a></li>
                                <li><a href="view-patient-appointment.php"><i class="ti-list"></i>View Appointment</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-book"></i>  Case Note  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-case-note.php"><i class="ti-plus"></i>Add Case Note</a></li>
                                <li><a href="view-patient-case-note.php"><i class="ti-list"></i>View Case Notes</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-target"></i>  Patient Test  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="recommend-test.php"><i class="ti-plus"></i>Recommend Test</a></li>
                                <li><a href="view-patients-test.php"><i class="ti-list"></i>View All Test</a></li>
                            </ul>
                        </li><?php
                    }elseif($access ==4){ ?>
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> Drugs Category <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-drug-category.php"><i class="ti-plus"></i>Add Drug Category</a></li>
                                <li><a href="view-all-drug-categories.php"><i class="ti-list"></i>View Drug Categories</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-settings"></i>Pharmacy Drugs <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-drugs-to-pharmacy.php"><i class="ti-plus"></i>Add Drugs To Pharmacy </a></li>
                                <li><a href="view-all-pharmacy-drugs.php"><i class="ti-list"></i>View Drugs</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bell"></i>  Appointment  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="schedule-patient-appointment.php"><i class="ti-plus"></i>Add Appointment</a></li>
                                <li><a href="view-patient-appointment.php"><i class="ti-list"></i>View Appointment</a></li>
                            </ul>
                        </li>
                        <li><a href="view-all-patient-casenote.php"><i class="ti-book"></i>Case Note </a></li>
                        
                        <li><a href="view-all-drug-stock.php"><i class="ti-ruler"></i>Drug Stock </a></li><?php
                    }?>  
                    <li><a href="my-activities-log.php"><i class="ti-cloud-down"></i>My Activity Log </a></li>
                    <!-- <li><a href=""><i class="ti-email"></i> Email</a></li>
                     -->
                    <li><a href="../log-out.php"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <ul>

                            
                            <li class="header-icon dib"><span class="user-avatar"><?php echo $_SESSION['name']; ?> <i class="ti-angle-down f-s-10"></i></span>
                                <div class="drop-down dropdown-profile">
                                    
                                    <div class="dropdown-content-body">
                                        <ul>
                                           <!--  <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                            <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                             -->
                                            <li><a href="../log-out.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>