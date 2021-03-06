<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    $staffDetails = new hospitalstaffDetails($db);
    $staff_email = $_SESSION['user_name'];
    $staffO = $staffDetails->seeStaffEmailDetails($staff_email);
    $staff_umber =$staffO['staff_number'];
    $staff_name = $staffO['staff_name'];
    $view_act = $db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC");
    $arrView = array(':staff_email'=>$staff_email);
    $view_act->execute($arrView);
    if($view_act->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">No Activities Was Found For <?php echo $staff_name ?></p>
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
                                                        <a href="my-activities-log.php">
                                                            <i class="ti-cloud-down"></i> <b> My Activities Log </b>
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
                                                        <i class="ti-list"></i> <b> View All My Activities </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    List of <?php echo $staff_name ?> Activities Log</p>
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
                                                        <th>S/N</th>
                                                        <th>Staff Email</th>
                                                        <th>Activity</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Staff Email</th>
                                                        <th>Activity</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_act = $view_act->fetch()){?>
                                                        
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                
                                                            </td>
                                                            <td><?php echo $see_act['user_details']?></td>
                                                            <td><?php echo $see_act['action'];?></td>
                                                            
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
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
