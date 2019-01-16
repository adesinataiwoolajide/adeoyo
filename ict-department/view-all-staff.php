<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    $unitDetails = new hospitalUnitings($db);
    $staffDetails = new hospitalstaffDetails($db);
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
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                <p>
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
                                                        <a href="view-staff-transfer.php">
                                                            <i class="ti-list"></i> <b> View All Transfer </b>
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
                                                        <i class="ti-list"></i> <b> View All Hospital Staff </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    <?php echo $hospital_name ?> STAFF(S)</p>
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
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-user"></i>Staff Name </th>
                                                        <th><strong><i class="ti-id-badge"></i>Staff Number </strong></th>
                                                        <th><strong><i class="ti-alert"></i>Phone Number </strong></th>
                                                        <th><strong><i class="ti-email"></i>E-Mail</strong></th>
                                                        <th><strong><i class="ti-home"></i>Department </strong></th>
                                                        <th><strong><i class="ti-magnet"></i> Category </strong></th>
                                                        <th><strong><i class="ti-calendar"></i>Year of Employment </strong></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-user"></i>Staff Name </th>
                                                        <th><strong><i class="ti-id-badge"></i>Staff Number </strong></th>
                                                        <th><strong><i class="ti-alert"></i>Phone Number </strong></th>
                                                        <th><strong><i class="ti-email"></i>E-Mail</strong></th>
                                                        <th><strong><i class="ti-home"></i>Department </strong></th>
                                                        <th><strong><i class="ti-magnet"></i> Category </strong></th>
                                                        <th><strong><i class="ti-calendar"></i>Year of Employment </strong></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_staff = $view_staff->fetch()){
                                                        $staff_number = $see_staff['staff_number'];
                                                        $staff_email = $see_staff['staff_email']; 
                                                        $staff_name = $see_staff['staff_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>" >
                                                                    <i class="ti-id-badge"></i>
                                                                </a>
                                                                <a href="edit-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>&&staff_email=<?php echo  $staff_email ?>" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $staff_name ; ?></td>
                                                            <td><?php echo $staff_number ?></td>
                                                            <td><?php echo $see_staff['staff_phone'] ?></td>
                                                            <td><?php echo $see_staff['staff_email'] ?></td>
                                                            <td><?php 
                                                                $unit_id = $see_staff['dept_id']; 
                                                                $uniting = $unitDetails->getUnitDetailsID($unit_id);
                                                                echo $uniting['unit_name'];
                                                                ?>
                                                                    
                                                            </td>
                                                            <td><?php 
                                                                $type_id = $see_staff['type_id'];
                                                                $typo = $staffDetails->getStaffType($type_id);
                                                                echo $type_name = $typo['type_name'];?>   
                                                            </td>
                                                            <td><?php echo $see_staff['year_employ'] ?></td>
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
