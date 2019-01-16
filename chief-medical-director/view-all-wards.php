<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $view_ward = $db->prepare("SELECT * FROM ward ORDER BY ward_name ASC");
    $view_ward->execute();
    if($view_ward->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Ward List is Empty, Please Kindly Click On This Button To  <a href="add-ward.php" class=" btn btn-success"> Add Ward To The Ward List</a></p>
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
                                                        <a href="view-all-wards.php">
                                                            <i class="ti-list"></i> <b> View Wards </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="add-ward.php">
                                                            <i class="ti-plus"></i> <b>Add Ward </b>
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
                                                        <i class="ti-list"></i> <b> View All Wards </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">LIST OF 
                                                    <?php echo $hospital_name ?> WARD</p>
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
                                                        <th><strong><i class="ti-list"></i> S/N
                                                        </strong></th>
                                                        <th><strong><i class="ti-home"></i> Ward Name</strong></th>
                                                        <th><strong><i class="ti-info"></i> Unit Name</strong></th>
                                                        <th><strong><i class="ti-layers-alt"></i> Number of Bed Spaces</strong></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong><i class="ti-list"></i> S/N
                                                        </strong></th>
                                                        <th><strong><i class="ti-home"></i> Ward Name</strong></th>
                                                        <th><strong><i class="ti-info"></i> Unit Name</strong></th>
                                                        <th><strong><i class="ti-layers-alt"></i> Number of Bed Spaces</strong></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_ward = $view_ward->fetch()){
                                                        $ward_id = $see_ward['ward_id']; 
                                                        $ward_name = $see_ward['ward_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-ward-details.php?ward_name=<?php echo $ward_name ?>&&ward_identification=<?php echo $ward_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-ward-details.php?ward_name=<?php echo $ward_name ?>&&ward_identification=<?php echo $ward_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $ward_name. " Ward"; ?></td>
                                                            <td><?php 
                                                                $unit_id = $see_ward['unit_id'];
                                                                $gosh = $hosUnit->getUnitDetailsID($unit_id);
                                                                echo $unit_name = $gosh['unit_name']; ?></td>
                                                            <td><?php echo $see_ward['bed_space']. " Bed Space For Patients"; ?></td>
                                                            
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
                                return confirm("Click Okay to Delete Ward Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Ward and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
