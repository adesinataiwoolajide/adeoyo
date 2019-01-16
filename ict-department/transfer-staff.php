<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    require 'libs_dev/patient/patient_class.php';

    $unitDetails = new hospitalUnits($db);
    $staffDetails = new hospitalstaffDetails($db);
    $next=  new hospitalUnitings($db);
    $view_staff = $db->prepare("SELECT * FROM staff ORDER BY staff_number ASC");
    $view_staff->execute();
    if($view_staff->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Staff List is Empty, Please Kindly Click On This Button To  <a href="add-hospital-staff.php" class=" btn btn-success"> Add Staff To The Staff List</a></p>
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
                                                            <a href="transfer-staff.php">
                                                                <i class="ti-list"></i> <b> Transfer Staff </b>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item">
                                                            <a href="view-staff-transfer.php">
                                                                <i class="ti-list"></i> <b> View All Transfer </b>
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
                                                            <i class="ti-list"></i> <b> Transfer Staff </b>
                                                        </li>
                                                    </p>
                                                    <h4 align="center" style="color: green"><p style="color: green" align=""><?php echo date("M-Y"); ?>
                                                        List of Olufunmilayo Specialist Hospital Staff</p>
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
                                                            <th>Staff Name</th>
                                                            <th>Staff Number</th>
                                                            <th>Department</th>
                                                            <th> Category</th>
                                                            <th> Transfer</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Staff Name</th>
                                                            <th>Staff Number</th>
                                                            <th>Department</th>
                                                            <th> Category</th>
                                                            <th> Transfer</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody><?php 
                                                        
                                                        $y=1;
                                                        while($see_staff = $view_staff->fetch()){
                                                            $staff_number =$see_staff['staff_number'];
                                                            $staff_email = $see_staff['staff_email']; 
                                                            $staff_name = $see_staff['staff_name']; ?>
                                                            <tr>
                                                                <td><?php echo $y; ?>
                                                                    <input type="checkbox" value="1" name="trans<?php echo $y ?>" >
                                                                </td>
                                                                <td><?php echo $staff_name ; ?></td>
                                                                <td><?php echo $staff_number ?></td>
                                                                
                                                                <td><?php 
                                                                    $unit_id = $see_staff['dept_id']; 
                                                                    $uniting = $next->getUnitDetailsID($unit_id);
                                                                    echo $uniting['unit_name'];
                                                                    ?>    
                                                                </td>
                                                                <td><?php 
                                                                    $type_id = $see_staff['type_id'];
                                                                    $typo = $staffDetails->getStaffType($type_id);
                                                                    echo $type_name = $typo['type_name'];?>   
                                                                </td>
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
                                                            </tr><?php
                                                            $y++;
                                                        } ?>
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="col-lg-12" align="center">
                                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                                    <button type="submit" class="btn btn-success">Transfer The Staff(s)</button>
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
