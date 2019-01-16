<?php
  include("../header.php");
  include("../side-bar.php");
  require 'libs_dev/staff/hospital_staff.php';
  require 'libs_dev/hos_dept/hospital_unit_class.php';
  $unitDetails = new hospitalUnitings($db);
  $staffDetails = new hospitalstaffDetails($db);
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
                    <a href="staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-id-badge"></i> <b> View <?php echo $staff_name ?> Details </b>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="edit-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-pencil-alt"></i> <b> Edit <?php echo $staff_name ?> Details </b>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="view-all-staff.php">
                        <i class="ti-list"></i> <b> View All Staff </b>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="add-hospital-staff.php">
                        <i class="ti-plus"></i> <b>Add Staff </b>
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
                                                <img class="img-fluid" src="<?php echo "staff-passport/".$myDetails['passport'] ?>" alt="" />
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
                                                <button class="btn btn-primary btn-addon" type="button"><i class="ti-email"></i>Send E-Mail To <?php echo $staff_number ?>
                                                </button>
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
                                                                    <td><?php echo $myDetails['staff_phone']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>E-Mail</td>
                                                                    <td><?php echo $myDetails['staff_email']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Phone Number</td>
                                                                    <td><?php echo $myDetails['staff_phone']; ?></td>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Staff Patients</h4>
                        </div>
                        <div class="card-body">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kolor Tea Shirt For Man</td>
                                                <td><span class="badge badge-primary">Ongoing</span></td>
                                                <td>January 22</td>
                                                <td class="color-primary">$21.56</td>
                                            </tr>
                                            <tr>
                                                <td>Kolor Tea Shirt For Women</td>
                                                <td><span class="badge badge-success">Complete</span></td>
                                                <td>January 30</td>
                                                <td class="color-success">$55.32</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- /# column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">
                            <h4>Staff Transfer</h4>
                        </div>
                        <div class="card-body">
                             <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Kolor Tea Shirt For Man</td>
                                                <td><span class="badge badge-primary">Ongoing</span></td>
                                                <td>January 22</td>
                                                <td class="color-primary">$21.56</td>
                                            </tr>
                                            <tr>
                                                <td>Kolor Tea Shirt For Women</td>
                                                <td><span class="badge badge-success">Complete</span></td>
                                                <td>January 30</td>
                                                <td class="color-success">$55.32</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">
                            <h4 align="center"><p style="color: grey" align="center"><?php echo $staff_name ?> Activity Log</p></h4>
                        </div>
                        <div class="card-body"><?php
                            $staff_activity = $db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC");
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
                                                    <th>Staff E-Mail</th>
                                                    <th>Activities</th>
                                                    <th>Time of Operation</th>
                                                </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Staff E-Mail</th>
                                                    <th>Activities</th>
                                                    <th>Time of Operation</th>
                                                </tr>
                                            </tfoot>
                                            <tbody><?php
                                                $num =1;
                                                while($see_staff_act = $staff_activity->fetch()){ ?>
                                                    <tr>
                                                        <td><?php echo $num; ?></td>
                                                        <td><?php echo $staff_email ?></span></td>
                                                        <td><?php echo $see_staff_act['action']; ?></td>
                                                        <td class="color-primary"><?php echo $see_staff_act['time_added']; ?></td>
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