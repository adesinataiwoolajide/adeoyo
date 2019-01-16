<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnits($db);
    $view_unit = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
    $view_unit->execute();
    if($view_unit->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Department/Unit List is Empty, Please Kindly Click On This Button To  <a href="add-hospital-unit.php" class=" btn btn-success"> Add Department To The Department List</a></p>
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
                                                        <a href="view-all-units.php">
                                                            <i class="ti-list"></i> <b> View All Department/Unit </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="add-hospital-unit.php">
                                                            <i class="ti-plus"></i> <b> Add Department/Unit</b>
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
                                                        <i class="ti-list"></i> <b> View All Department </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    List of Olufunmilayo Specialist Hospital Unit/Department</p>
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
                                                        <th>Department/Unit Name</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Department/Unit Name</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_unit = $view_unit->fetch()){
                                                        $unit_id = $see_unit['unit_id']; 
                                                        $unit_name = $see_unit['unit_name']; ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-Unit/Department-details.php?unit_name=<?php echo $unit_name ?>&&unit_identification=<?php echo $unit_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-Unit/Department-details.php?unit_name=<?php echo $unit_name ?>&&unit_identification=<?php echo $unit_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $unit_name?></td>
                                                            
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
                                return confirm("Click Okay to Delete Unit/Department Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Unit/Department and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
