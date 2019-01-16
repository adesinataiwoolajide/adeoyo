<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';

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
                                    <form action="process-update-transfer-staff.php" method="post" enctype="multipart/form-data">
                                        <div class="bootstrap-data-table-panel">
                                            <div class="table-responsive">
                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                    <p>
                                                        
                                                        <li class="breadcrumb-item">
                                                            <a href="edit-staff-transfer.php">
                                                                <i class="ti-plus"></i> <b>Edit Staff Transfer </b>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item">
                                                            <a href="view-staff-transfer.php">
                                                                <i class="ti-list"></i> <b> View All Transfer </b>
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
                                                            <i class="ti-list"></i> <b>Edit Transfer Staff </b>
                                                        </li>
                                                    </p>
                                                    <h4 align="center" style="color: green"><p style="color: green" align="">
                                                        Olufunmilayo Specialist Hospital Staff Transfer Update Form</p>
                                                    </h4>
                                                    <p style="color: green"><strong>Please Click On The Button Beside The Serial Number to Transfer Staff, Multiple Staff Can Be Transfered Simultenously and Click The Button below The Table To Update and Confirm The Staff Transfer</strong></p>
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
                                                            
                                                            <th><strong>S/N</strong></th>
                                                            <th><strong><i class="ti-user"></i> Staff Name</strong></th>
                                                            <th><strong><i class="ti-id-badge"></i> Staff Number</strong></th>
                                                            <th><strong> <i class="ti-home"></i> Previous Unit</strong></th>
                                                            <th><strong> <i class="ti-calendar"></i> Transfer Time</strong></th>
                                                            <th><strong> <i class="ti-home"></i> New Unit</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th><strong>S/N</strong></th>
                                                            <th><strong><i class="ti-user"></i> Staff Name</strong></th>
                                                            <th><strong><i class="ti-id-badge"></i> Staff Number</strong></th>
                                                            <th><strong> <i class="ti-home"></i> Previous Unit</strong></th>
                                                            <th><strong> <i class="ti-calendar"></i> Transfer Time</strong></th>
                                                            <th><strong> <i class="ti-home"></i> New Unit</strong></th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody><?php 
                                                        
                                                        $y=1;
                                                        while($see_staff = $view_staff->fetch()){
                                                            $transfer_id = $see_staff['staff_transfer_id'];
                                                            $staff_number =$see_staff['staff_number'];
                                                            $deta = $staffDetails->seeStaffDetails($staff_number);
                                                            
                                                            $staff_name = $deta['staff_name']; ?>
                                                            <tr>
                                                                <td><?php echo $y; ?>
                                                                    <input type="checkbox" value="1" name="trans<?php echo $y ?>" >
                                                                </td>
                                                                <td><?php echo $staff_name ; ?></td>
                                                                <td><?php echo $staff_number ?></td>
                                                                <td><?php 
                                                                   $unit_id=$see_staff['new_unit_id']; 
                                                                    $uniting = $unitDetails->getUnitDetailsID($unit_id);
                                                                    $naming = $uniting['unit_name'];?>
                                                                    <p style="color: green"><b><?php echo $naming ?></b></p>   
                                                                </td>
                                                                <td><?php echo $see_staff['transfer_time']; ?></td>
                                                                <td>
                                                                    <?php 
                                                                    $hos = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
                                                                    $hos->execute(); ?>
                                                                    
                                                                    <select class="form-control" name="new_unit_id<?php echo $y ?>">
                                                                        <option value="">-- Select The Hospital Unit --</option>
                                                                        <option value=""></option><?php
                                                                        while($see_uni=$hos->fetch()){ ?>
                                                                            <option value="<?php echo $see_uni['unit_id']; ?>"><?php echo $see_uni['unit_name']; ?></option><?php
                                                                        } ?>
                                                                    </select>
                                                                    
                                                                </td> 
                                                                
                                                                <input type="hidden" name="staff_number<?php echo $y ?>" value="<?php echo $staff_number ?>">  
                                                                <input type="hidden" name="prev_unit_id<?php echo $y ?>" value="<?php echo $unit_id ?>">
                                                                <input type="hidden" name="prev<?php echo $y ?>" value="<?php echo $naming ?>">
                                                                <input type="hidden" name="transfer_id<?php echo $y ?>" value="<?php echo $transfer_id ?>">
                                                            </tr><?php
                                                            $y++;
                                                        } ?>
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="col-lg-12" align="center">
                                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                                    <button type="submit" class="btn btn-success">Update The The Staff(s) Transfer </button>
                                                </div>
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
