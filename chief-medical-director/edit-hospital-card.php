<?php
	include("../header.php");
	include("../side-bar.php");
    require '../ict-department/libs_dev/patient/patient_class.php';
    $cardDetails = new hospitalUnits($db);
    $card_number= $_GET['card_number'];
    $pat = $cardDetails->gettingPatientCard($card_number);
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="card">
                            <div class="row">
                                <li class="breadcrumb-item">
                                    <a href="create-hospital-card.php">
                                        <i class="ti-plus"></i> <b> Edit <?php echo $card_number ?>  Hospital Card</b>
                                    </a>
                                </li>
                                
                                <li class="breadcrumb-item">
                                    <a href="view-all-patient-cards.php">
                                        <i class="ti-list"></i> <b> View Hospital Cards </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="create-hospital-card.php">
                                        <i class="ti-plus"></i> <b> Open Hospital Card</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="./">
                                        <i class="ti-home"></i><b> Home Page </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                                    
                                </li>
                                <li class="breadcrumb-item-active">
                                    <i class="ti-plus"></i> <b> Edit Patient Hospital Card For <?php echo $card_number ?> Details  </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Update <?php echo $card_number ?> Hospital Card </p>
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
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="process-update-hospital-card.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter The Patient Full Name" name="full_name" required value="<?php echo $pat['patient_name'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control select" required name="gender">
                                                        <option value="<?php echo $pat['sex'] ?>"><?php echo $pat['sex'] ?></option>
                                                        <option value=""></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                
                                                <div class="form-group">
                                                    <label>Card Category</label>
                                                    <select class="form-control select" required name="card_category_id">
                                                        <?php 
                                                        $card_category_id = $pat['card_category_id']; 
                                                        $category_details = $cardDetails->gettingCardCategory($card_category_id);
                                                        $category_name = $category_details['card_category_name']; ?>
                                                        <option value="<?php echo $card_category_id ?>"><?php echo $category_name ?></option>
                                                        <option value=""></option><?php
                                                        $carding = $db->prepare("SELECT * FROM card_category ORDER BY card_category_name ASC");
                                                        $carding->execute();
                                                        while($see_carding = $carding->fetch()){ ?>
                                                            <option value="<?php echo $see_carding['card_category_id']; ?>"><?php echo $see_carding['card_category_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" class="form-control" placeholder="" name="date_birth" required value="<?php echo $pat['date_birth'] ?>">
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Residential Address</label>
                                                    <textarea class="form-control" placeholder="Enter The Patient Residential Address" name="address" required><?php echo $pat['address'] ?></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="card_number" value="<?php echo $card_number ?>">
                                            <input type="hidden" name="prev_name" value="<?php echo $category_name ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update-card">UPDATE <?php echo $card_number ?> DETAILS</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    <?php
        include("../footer.php");
    ?>