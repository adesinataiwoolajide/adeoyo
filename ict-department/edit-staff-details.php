<?php
	include("../header.php");
      include("../side-bar.php");
      require 'libs_dev/staff/hospital_staff.php';
      require 'libs_dev/hos_dept/hospital_unit_class.php';
      $unitDetails = new hospitalUnitings($db);
      $staffDetails = new hospitalstaffDetails($db);
      $staff_name = $_GET['staff_name'];
      $staff_number = $_GET['staff_number'];
      $myDetails = $staffDetails->seeStaffDetails($staff_number);
      $staff_email = $myDetails['staff_email'];
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <p>
                <li class="breadcrumb-item">
                    <a href="edit-staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-pencil-alt"></i> <b> Edit <?php echo $staff_name ?> Details </b>
                    </a>
                </li>
                
                <li class="breadcrumb-item">
                    <a href="staff-details.php?staff_name=<?php echo $staff_name ?>&&staff_number=<?php echo $staff_number ?>">
                        <i class="ti-id-badge"></i> <b> View <?php echo $staff_name ?> Details </b>
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
                    <i class="ti-list"></i> <b> <?php echo $staff_name ?> Details </b>
                </li>
            </p>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="card">

                            <h4 align="center"><p style="color: green" align="">
                                Please Kindly Fill The Below Form To Update <?php echo $staff_name ?> Details</p>
                            </h4>
                             <?php include("school-logo.php"); ?>   
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
                                    <form action="update-staff-details.php" method="post" enctype="multipart/form-data">
                                        
                                        <div class="row">
                                            <div class="col-lg-12" align="right">
                                                <div class="user-photo m-b-30">
                                                    <img class="img-fluid" src="<?php echo "staff-passport/".$myDetails['passport'] ?>" style="width: 100px; height: 100px;" alt="" />
                                                </div>

                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Change Staff Passport ?</label>
                                                    <input type="file" class="form-control file" placeholder="Enter The Ward Name" name="image" >
                                                </div>
                                                <span style="color: green">** This Field is Optional **</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Staff Number</label>
                                                    <input type="text" class="form-control file" placeholder="Enter The Staff Number" value="<?php echo $staff_number ?>" readonly>
                                                </div>
                                                <span style="color: pink">** This Field is Readonly **</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <input type="text" class="form-control text" placeholder="Enter The Staff Full Name" name="staff_name" value="<?php echo $myDetails['staff_name']; ?>" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input type="date" class="form-control date" name="date_birth" value="<?php echo $myDetails['date_birth']; ?>" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>E-Mail</label>
                                                    <input type="email" class="form-control email" placeholder="Enter The Staff Email" value="<?php echo $myDetails['staff_email']; ?>" readonly>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" class="form-control number" name="staff_phone" placeholder="Enter The Staff Phone Number" value="<?php echo $myDetails['staff_phone']; ?>" required>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <select class="form-control select" required name="gender">
                                                        <option value="<?php echo $myDetails['sex']; ?>"><?php echo $myDetails['sex']; ?></option>
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
                                                        <option value="<?php echo $myDetails['religion']; ?>"><?php echo $myDetails['religion'] ?></option>
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
                                                        <option value="<?php echo $myDetails['marital_status']; ?>"><?php echo $myDetails['marital_status'] ?></option>
                                                        <option value=""></option>
                                                        <option value="Divorced"> Divorced </option>
                                                        <option value="Single"> Single </option>
                                                        <option value="Married"> Married</option>
                                                        <option value="Widow"> Widow</option>
                                                    </select>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Staff Category</label>
                                                    <select class="form-control select" required name="type_id">
                                                        <?php
                                                        $type_id = $myDetails['type_id'];
                                                        $typo = $staffDetails->getStaffType($type_id);
                                                        $type_name = $typo['type_name'];?>   
                                                        <option value="<?php echo $type_id ?>">
                                                            <?php echo $type_name ?>
                                                        </option>
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
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Staff Department</label>
                                                    <select class="form-control select" required name="unit_id">
                                                        <?php 
                                                        $unit_id = $myDetails['dept_id'];
                                                        $unitDe = $unitDetails->getUnitDetailsID($unit_id);
                                                        $unit_name = $unitDe['unit_name'];
                                                        ?>
                                                        <option value="<?php echo $unit_id ?>"> 
                                                            <?php echo $unit_name ?> </option>
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

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Staff Qualification</label>
                                                    <select class="form-control " name="qualification_id[]" multiple required><?php
                                                        $ema = $myDetails['qualification_id'];
                                                        $split = explode(",", $ema);
                                                        foreach($split as $new){
                                                            $qualif = $db->prepare("SELECT * FROM staff_qualification WHERE qualification_id=:new");
                                                            $arr = array(':new'=>$new);
                                                            $qualif->execute($arr);
                                                            while($bring = $qualif->fetch()){ ?>
                                                                <option value="<?php echo  $ema ?>"><?php echo $bring['qualification_name']. ", "; ?>
                                                                </option> <?php
                                                                
                                                            }
                                                        }?>
                                                        
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

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Year of Employment</label>
                                                    <?php
                                                    $early = 2000;
                                                    $current = date("Y");
                                                    print '<select class ="form-control select" required name ="year_employ">';?>
                                                    <option value="<?php echo $myDetails['year_employ']; ?>"><?php echo $myDetails['year_employ']; ?></option>
                                                    <option value=""></option><?php
                                                    foreach(range($current, $early) as $i){
                                                        print'<option value=" '.$i.'"'.($i === $current ? 'selected="selected"' : '').'>'.$i.'</option>';
                                                    }
                                                    print '</select>';?>    
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Permanent Home Address</label>
                                                    <textarea class="form-control textarea" cols="5" name="address" placeholder="Enter The Staff Permanent Home Address" required ><?php echo $myDetails['address'] ?></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>State of Origin</label>
                                                    <select class="form-control select" name="state_origin" required>
                                                        <option value="<?php echo $myDetails['state_origin'] ?>"><?php echo $myDetails['state_origin'] ?></option>
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
                                                    <textarea class="form-control textarea" cols="5" name="kin_details" placeholder="Enter The Staff Next of Kin Details (Name, Phone Number, Address)" required ><?php echo $myDetails['kin_details'] ?></textarea>
                                                </div>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <input type="hidden" name="staff_number" value="<?php echo $staff_number ?>">
                                            <input type="hidden" name="prev_name" value="<?php echo $staff_name ?>">
                                            <input type="hidden" name="staff_email" value="<?php echo $staff_email ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            
                                            <div class="col-lg-12" align="center">
                                                <button type="submit" class="btn btn-success" name="update_details">Update <?php echo $staff_name ?> Details</button>
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