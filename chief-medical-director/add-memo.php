<?php
    include("../header.php");
    include("../side-bar.php");
?>
<div class="content-wrap">
<div class="main">
    <div class="container-fluid">
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
            </div>
            
            
        </div>
        <!-- /# row -->
        <section id="main-content">
            <div class="row">
                
                <p>
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
                </p><br><br>
                <div class="col-lg-12">
                    <h4 align="center" style="color: green"><p style="color: green" align="">
                        Please Select The Memo Reciever Below</p>
                    </h4>
                </div><?php
                $typo = $db->prepare("SELECT * FROM staff_type ORDER BY type_name ASC");
                $typo->execute();
                while($see_typo = $typo->fetch()){ 
                    $type_name = $see_typo['type_name'];
                    $type_id = $see_typo['type_id']; ?>
                    <div class="col-lg-3">
                        <div class="card" onclick="location.href='compose_memo.php?staff_type=<?php echo $type_name ?>&&type_identification=<?php echo $type_id ?>';">
                            <div align="center"><?php
                                if($type_name == "ICT Department"){ ?>
                                    <img src="../icons/unit.jpg" style="width: 100px; height: 100px;" align="center">  <?php
                                }elseif($type_name == "Chief Medical Director"){ ?>
                                    <img src="../icons/unnamed.jpg" style="width: 100px; height: 100px;" align="center"><?php
                                }elseif($type_name == "Doctor"){?>
                                    <img src="../icons/transfer.png" style="width: 100px; height: 100px;" align="center"><?php

                                }elseif(($type_name == "Pharmacy") OR ($type_name == "Pharmacist")){?>
                                    <img src="../icons/unnamed.png" style="width: 100px; height: 100px;" align="center"><?php

                                }elseif($type_name == "Nurse"){?>
                                    <img src="../icons/download.jpg" style="width: 100px; height: 100px;" align="center"><?php

                                }elseif($type_name == "Matron"){?>
                                    <img src="../icons/stu.jpg" style="width: 100px; height: 100px;" align="center"><?php
                                    
                                }elseif($type_name == "Health Assistant"){?>
                                    <img src="../icons/download (1).jpg" style="width: 100px; height: 100px;" align="center"><?php

                                }elseif($type_name == "Account Department"){?>
                                    <img src="../icons/appointment.png" style="width: 100px; height: 100px;" align="center"><?php

                                }else{ ?>
                                    <img src="../icons/images (1).jpg" style="width: 100px; height: 100px;" align="center"><?php
                                } ?>                  
                                <p align="center"><?php echo $type_name ?></p>
                            </div>         
                        </div>                            
                    </div><?php
                } ?>
                <div class="col-lg-3">

                    <div class="card" onclick="location.href='view-all-staff.php';">
                        <div align="center">
                            <img src="../icons/staff.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">All Hospital Staff</p>
                        </div>         
                    </div>                            
                </div>
            </div>
        </section>
    </div>
<?php

    include("../footer.php");
?>