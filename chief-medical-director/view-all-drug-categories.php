<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
    $hosUnit = new hospitalUnitings($db);
    $view_unit = $db->prepare("SELECT * FROM drug_category ORDER BY drug_category_name ASC");
    $view_unit->execute();
    if($view_unit->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Drug Category List is Empty, Please Click On This Button To  <a href="add-drug-category.php" class=" btn btn-success"> Add Drugs Category </a></p>
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
                                                        <a href="view-all-drug-categories.php">
                                                            <i class="ti-list"></i> <b> View All Drug Category </b>
                                                        </a>
                                                    </li>

                                                    <li class="breadcrumb-item">
                                                        <a href="add-drug-category.php">
                                                            <i class="ti-plus"></i> <b> Add Drug Category</b>
                                                        </a>
                                                    </li>

                                                    <li class="breadcrumb-item">
                                                        <a href="add-drugs-to-pharmacy.php">
                                                            <i class="ti-plus"></i> <b> Add Drug To Pharmacy</b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="view-all-pharmacy-drugs.php">
                                                            <i class="ti-list"></i> <b> View All Pharmacy Drug </b>
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
                                                        <i class="ti-list"></i> <b> List of All Drug Categories </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    LIST OF 
                                                    <?php echo $hospital_name ?> PHARMACY DRUG CATEGORY</p>
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
                                                        <th><strong><i class="ti-medall"></i> Drug Category Name</i></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                       <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-medall"></i> Drug Category Name</i></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_unit = $view_unit->fetch()){
                                                        $drug_cate_id = $see_unit['drug_cate_id']; 
                                                        $category_name =$see_unit['drug_category_name'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-drug-category-details.php?category_name=<?php echo $category_name ?>&&category_identification=<?php echo $drug_cate_id ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-drug-category.php?category_name=<?php echo $category_name ?>&&category_identification=<?php echo $drug_cate_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $category_name ?></td>
                                                            
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
                                return confirm("Click Okay to Delete Drug Category Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Drug Category and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
