<?php
    include("../header.php");
    include("../side-bar.php");
    require '../ict-department/libs_dev/staff/hospital_staff.php';
    
    $staffDetails = new hospitalstaffDetails($db);
    $staff_email = $_SESSION['user_name'];
    $myDetails = $staffDetails->seeStaffEmailDetails($staff_email);
    $type_name = $_GET['staff_type'];
    $type_identification = $_GET['type_identification'];

    $naco= $type_name;
    $naco_id= $type_identification;
    if(($type_name == "All The Staff") OR ($type_identification ==0)){
        $sta = $db->prepare("SELECT * FROM staff ORDER BY staff_email ASC");
        $sta->execute();
    }else{
        $sta = $db->prepare("SELECT * FROM staff WHERE type_id=:type_identification ORDER BY staff_email ASC");
        $arrSta = array(':type_identification'=>$type_identification);
        $sta->execute($arrSta);
    }
    if($sta->rowCount()==0){    
        $_SESSION['error'] = "No Staff is Available in The Selected Staff Category $type_name" ?>
        <script> window.location="add-memo.php";</script><?php
       
    }else{?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <li class="breadcrumb-item">
                                <a href="compose_memo.php?staff_type=<?php echo $type_name ?>&&type_identification=<?php echo $type_identification ?>">
                                    <i class="ti-plus"></i> <b> Compose Memo </b>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="add-memo.php">
                                    <i class="ti-plus"></i> <b> Add Memo </b>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="view-all-memo.php">
                                    <i class="ti-list"></i> <b> View All Memo</b>
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
                                <i class="ti-list"></i> <b> Add Hospital Memo </b>
                            </li>
                        </p>
                    </div>
                    
                <!-- /# column -->
                </div>
                <!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                             <?php
                            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                                <div class="alert alert-info" align="center">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                 <?php include("../includes/feed-back.php"); ?>
                                </div><?php 
                            }  ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="compose-email">
                                        <div class="mail-box">
                                            <aside class="sm-side">
                                                <div class="user-head">
                                                    <img class="img-fluid" src="<?php echo "staff-passport/".$myDetails['passport'] ?>" alt="" style="width: 100px; height: 100px;" />
                                                    <div class="user-name">
                                                        <h5><a href=""><?php echo $myDetails['staff_name']; ?></a></h5>
                                                        <span><a href=""><?php echo $staff_email ?></a></span>
                                                    </div>
                                                </div>
                                                <div class="inbox-body text-center">
                                                    
                                                    <ul class="inbox-nav inbox-divider">
                                                        <li>
                                                            <a href="compose_memo.php?staff_type=<?php echo "All The Staff" ?>&&type_identification=<?php echo $type_identification ?>"> <i class="fa fa-bell-o"></i>All Staff</a>
                                                        </li><?php
                                                        $typres = $db->prepare("SELECT * FROM staff_type ORDER BY type_name ASC");
                                                        $typres->execute();
                                                        while($see_hopev = $typres->fetch()){
                                                            $type_name = $see_hopev['type_name'];
                                                            $type_id = $see_hopev['type_id']; ?>
                                                            <li>
                                                                <a href="compose_memo.php?staff_type=<?php echo $type_name ?>&&type_identification=<?php echo $type_id ?>">
                                                                    <i class="fa fa-bell-o"></i>
                                                                    
                                                                    <?php echo$see_hopev['type_name'];?>  
                                                                </a>
                                                            </li><?php
                                                        } ?> 
                                                    </ul>


                                                    <div class="inbox-body text-center">
                                                        <div class="btn-group">
                                                            <a class="btn mini btn-primary" href="javascript:;">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a class="btn mini btn-success" href="javascript:;">
                                                                <i class="fa fa-phone"></i>
                                                            </a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a class="btn mini btn-info" href="javascript:;">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </aside>
                                                
                                                <form class="form-horizontal" action="process-compose-memo.php" method="post"  enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label class="col-lg-4  control-label">Memo Reciever</label>
                                                            <div class="col-lg-12"><?php
                                                                 
                                                                if(($type_name == "All The Staff") OR ($type_identification ==0)){ ?>
                                                                    <select class="form-control" name="reciever" required>
                                                                        <option value="<?php echo 0
                                                                             ?>"><?php echo "All The Staff" ?>      
                                                                        </option>
                                                                    </select><?php
                                                                }else{?>
                                                                    <select class="form-control" name="reciever[]" multiple required><?php
                                                                        $sta = $db->prepare("SELECT * FROM staff WHERE type_id=:type_identification ORDER BY staff_email ASC");
                                                                        $arrSta = array(':type_identification'=>$type_identification);
                                                                        $sta->execute($arrSta); ?>
                                                                        <option value="">-- Select The Staff Below --</option>
                                                                        <option value=""></option><?php
                                                                        
                                                                        while($set_sta = $sta->fetch()){    ?>
                                                                            <option value="<?php echo 
                                                                            $set_sta['staff_number'] ?>"><?php echo $set_sta['staff_name']. " ". $set_sta['staff_email'] ?></option><?php

                                                                        } ?>
                                                                    </select><?php
                                                                } ?>
                                                                    
                                                                
                                                                <span style="color: red">** This Field is Required **</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="col-lg-4  control-label">Memo Subject</label>
                                                            <div class="col-lg-12">
                                                                <input type="text" placeholder="" id="" class="form-control" name="subject" placeholder="Please Enter The Memo Subject Here" required>
                                                            </div>
                                                            <span style="color: red">** This Field is Required **</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4  control-label">Memo Content</label>
                                                            <div class="col-lg-12">
                                                                <textarea rows="10" cols="30" class="form-control" id="texarea1" placeholder="Please Enter The Memo Content Here" name="content" required></textarea>
                                                            </div>
                                                            <span style="color: red">** This Field is Required **</span>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-offset-2 col-lg-12">
                                                                <span class="btn green fileinput-button"><i class="fa fa-paperclip fa fa-white"></i>
                                                                <span>Attachment</span>
                                                                    <input type="file" name="file" multiple>
                                                                </span>
                                                                <button class="btn btn-primary" type="submit" name="send-memo">Send The Memo</button>
                                                            </div>
                                                        </div>
                                                       <input type="hidden" name="category_name" value="<?php echo $naco ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo $naco_id ?>"> 
                                                    </form>
                                                    
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="footer">
                                        <p><?php echo date("Y"); ?> © Olufunmilayo Specialist Hospital <a href="">www.olufunmilayospecialisthospital.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <script src="assets/js/lib/jquery.nicescroll.min.js"></script>
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <script src="assets/js/scripts.js"></script>
    </body>

    </html><?php
} ?>
