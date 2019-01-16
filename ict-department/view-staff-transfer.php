<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';

    $unitDetails = new hospitalUnitings($db);
    $staffDetails = new hospitalstaffDetails($db);
    $view_staff = $db->prepare("SELECT * FROM staff_transfer ORDER BY staff_transfer_id ASC");
    $view_staff->execute();
    if($view_staff->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Staff Transfer List is Empty, Please Click<a href="transfer-staff.php" class=" btn btn-success"> On This Button to Transfer Staff From One Unit To The Other</a></p>
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
                                    <form action="process-transfer-staff.php" method="post" enctype="multipart/form-data">
                                        <div class="bootstrap-data-table-panel">
                                            <div class="table-responsive">
                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                    <p>
                                                        <li class="breadcrumb-item">
                                                            <a href="view-staff-transfer.php">
                                                                <i class="ti-list"></i> <b> View All Transfer </b>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item">
                                                            <a href="edit-staff-transfer.php">
                                                                <i class="ti-plus"></i> <b>Edit Staff Transfer </b>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item">
                                                            <a href="transfer-staff.php">
                                                                <i class="ti-list"></i> <b> Transfer Staff </b>
                                                            </a>
                                                        </li>
                                                        
                                                        <li class="breadcrumb-item">
                                                            <a href="view-all-staff.php">
                                                                <i class="ti-list"></i> <b> View All Staff </b>
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
                                                            <i class="ti-list"></i> <b>View Transfer Staff </b>
                                                        </li>
                                                    </p>
                                                     <h4 align="center" style="color: green"><p style="color: green" align=""> LIST OF 
                                                        <?php echo $hospital_name ?> STAFF TRANSFER FORM</p>
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
                                                        while($see_staff = $view_staff->fetch()){
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
                                                                        <p style="color: green"><b><?php echo $naming ;?></b><?php
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
    } ?>
