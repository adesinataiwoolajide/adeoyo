<?php
	include("../header.php");
	include("../side-bar.php");
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
                                    <a href="add-hospital-staff.php">
                                        <i class="ti-plus"></i> <b> Add Hospital Staff</b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-all-staff.php">
                                        <i class="ti-list"></i> <b> View All Staff </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="view-staff-transfer.php">
                                        <i class="ti-list"></i> <b> View All Transfer </b>
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
                                    <i class="ti-plus"></i> <b> Add Staff To The Hospital </b>
                                </li>
                            </div>
                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Add Staff To The Staff List</p>
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
                                    <form action="process-add-staff.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Staff Passport</label>
                                                    <input type="file" class="form-control file" placeholder="Enter The Ward Name" name="image" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <input type="text" class="form-control text" placeholder="Enter The Staff Full Name" name="staff_name" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" class="form-control date" name="date_birth" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>E-Mail</label>
                                                    <input type="email" class="form-control email" name="staff_email" placeholder="Enter The Staff Email" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" class="form-control number" name="staff_phone" placeholder="Enter The Staff Phone Number" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <select class="form-control select" required name="gender">
                                                        <option value="">-- Select The Staff Sex</option>
                                                        <option value=""></option>
                                                        <option value="Male"> Male </option>
                                                        <option value="Female"> Female</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Religion</label>
                                                    <select class="form-control select" required name="religion">
                                                        <option value="">-- Select The Staff Religion --</option>
                                                        <option value=""></option>
                                                        <option value="Christainity"> Christainity </option>
                                                        <option value="Islam"> Islam</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Marital Status</label>
                                                    <select class="form-control select" required name="marital_status">
                                                        <option value="">-- Select The Staff Marital Status --</option>
                                                        <option value=""></option>
                                                        <option value="Divorced"> Divorced </option>
                                                        <option value="Single"> Single </option>
                                                        <option value="Married"> Married</option>
                                                        <option value="Widow"> Widow</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Category</label>
                                                    <select class="form-control select" required name="type_id">
                                                        <option value="">-- Select The Staff Category --</option>
                                                        <option value=""></option><?php
                                                        $type = $db->prepare("SELECT * FROM staff_type ORDER BY type_name ASC");
                                                        $type->execute();
                                                        while($see_type = $type->fetch()){ ?>
                                                            <option value="<?php echo $see_type['type_id']; ?>"><?php echo $see_type['type_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Department</label>
                                                    <select class="form-control select" required name="unit_id">
                                                        <option value="">-- Select The Staff Department --</option>
                                                        <option value=""></option><?php
                                                        $dept = $db->prepare("SELECT * FROM hospital_unit ORDER BY unit_name ASC");
                                                        $dept->execute();
                                                        while($see_dept = $dept->fetch()){ ?>
                                                            <option value="<?php echo $see_dept['unit_id']; ?>"><?php echo $see_dept['unit_name']; ?></option><?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Qualification</label>
                                                    <select class="form-control select" name="qualification_id[]" multiple required>
                                                        <option value="">-- Select The Staff Qualification --
                                                        </option>
                                                        <option value=""></option><?php
                                                        $qualification = $db->prepare("SELECT * FROM staff_qualification ORDER BY qualification_name ASC");
                                                        $qualification->execute(); 
                                                        while($rope = $qualification->fetch()){ ?>
                                                            <option value="<?php echo $rope['qualification_id']; ?>"><?php echo $rope['qualification_name']; ?></option><?php
                                                        } ?>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Year of Employment</label>
                                                    <?php
                                                    $early = 2000;
                                                    $current = date("Y");
                                                    print '<select class ="form-control select" required name ="year_employ">';?>
                                                    <option value="">-- Please Select The Year of Employment --</option>
                                                    <option value=""></option><?php
                                                    foreach(range($current, $early) as $i){
                                                        print'<option value=" '.$i.'"'.($i === $current ? 'selected="selected"' : '').'>'.$i.'</option>';
                                                    }
                                                    print '</select>';?>    
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Permanent Home Address</label>
                                                    <textarea class="form-control textarea" cols="5" name="address" placeholder="Enter The Staff Permanent Home Address" required ></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State of Origin</label>
                                                    <select class="form-control select" name="state_origin" required>
                                                        <option value="">-- Select your State of Origin --</option>
                                                        <option value=""></option>
                                                        <option value="Abuja FCT">Abuja FCT</option>
                                                        <option value="Abia">Abia</option>
                                                        <option value="Adamawa">Adamawa</option>
                                                        <option value="Akwa Ibom">Akwa Ibom</option>
                                                        <option value="Anambra">Anambra</option>
                                                        <option value="Bauchi">Bauchi</option>
                                                        <option value="Bayelsa">Bayelsa</option>
                                                        <option value="Benue">Benue</option>
                                                        <option value="Borno">Borno</option>
                                                        <option value="Cross River">Cross River</option>
                                                        <option value="Delta">Delta</option>
                                                        <option value="Ebonyi">Ebonyi</option>
                                                        <option value="Edo">Edo</option>
                                                        <option value="Ekiti">Ekiti</option>
                                                        <option value="Enugu">Enugu</option>
                                                        <option value="Gombe">Gombe</option>
                                                        <option value="Imo">Imo</option>
                                                        <option value="Jigawa">Jigawa</option>
                                                        <option value="Kaduna">Kaduna</option>
                                                        <option value="Kano">Kano</option>
                                                        <option value="Katsina">Katsina</option>
                                                        <option value="Kebbi">Kebbi</option>
                                                        <option value="Kogi">Kogi</option>
                                                        <option value="Kwara">Kwara</option>
                                                        <option value="Lagos">Lagos</option>
                                                        <option value="Nassarawa">Nassarawa</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Ogun">Ogun</option>
                                                        <option value="Ondo">Ondo</option>
                                                        <option value="Osun">Osun</option>
                                                        <option value="Oyo">Oyo</option>
                                                        <option value="Plateau">Plateau</option>
                                                        <option value="Rivers">Rivers</option>
                                                        <option value="Sokoto">Sokoto</option>
                                                        <option value="Taraba">Taraba</option>
                                                        <option value="Yobe">Yobe</option>
                                                        <option value="Zamfara">Zamfara</option>
                                                        <option value="Outside Nigeria">Outside Nigeria</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Next of Kin Details</label>
                                                    <textarea class="form-control textarea" cols="5" name="kin_details" placeholder="Enter The Staff Next of Kin Details (Name, Phone Number, Address)" required ></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="add-staff">Add Staff To The Staff List</button>
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