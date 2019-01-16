<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/patient/patient_class.php';
    $cardDetails = new hospitalUnits($db);
    $view_card = $db->prepare("SELECT * FROM hospital_card ORDER BY card_number DESC");
    $view_card->execute();
    if($view_card->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Card List is Empty, Please Kindly Click On This Button To  <a href="add-hospital-unit.php" class=" btn btn-success"> Add Hospital Catd For Patient</a></p>
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
                                                            <i class="ti-home"></i> <b> Home Page </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        
                                                    </li>
                                                    <li class="breadcrumb-item-active">
                                                        <i class="ti-list"></i> <b> View All Hospital Card </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    LIST OF 
                                                    <?php echo $hospital_name ?> PATIENT CARD</p>
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
                                                        <th><strong><i class="ti-user"></i> Patient Name </i></th>
                                                        <th><strong><i class="ti-id-badge"></i> Card Number </i></th>
                                                        <th><strong><i class="ti-id-badge"></i> Sex </i></th>
                                                        <th><strong><i class="ti-id-calendar"></i> Date of Birth </i></th>
                                                        <th><strong><i class="ti-location"></i> Addresss </i></th>
                                                        <th><strong><i class="ti-location"></i> Card Type</i></th>
                                                        <th><strong><i class="ti-location"></i> Time Registered </i></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                     <tr>
                                                        <tr>
                                                        <th><strong><i class="ti-list"></i>Serial Number</strong></th>
                                                        <th><strong><i class="ti-user"></i> Patient Name </i></th>
                                                        <th><strong><i class="ti-id-badge"></i> Card Number </i></th>
                                                        <th><strong><i class="ti-id-badge"></i> Sex </i></th>
                                                        <th><strong><i class="ti-id-calendar"></i> Date of Birth </i></th>
                                                        <th><strong><i class="ti-location"></i> Address </i></th>
                                                        <th><strong><i class="ti-location"></i> Card Type</i></th>
                                                        <th><strong><i class="ti-location"></i> Time Registered </i></th>
                                                    </tr>
                                                       
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_card = $view_card->fetch()){
                                                        $card_number = $see_card['card_number']; 
                                                        $patient_name = $see_card['patient_name'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="edit-hospital-card.php?card_number=<?php echo $card_number ?>" class="btn btn-success" onclick="return(confirmToEdit());">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </a>
                                                                <a href="delete-hospital-card.php?card_number=<?php echo $card_number ?>" class="btn btn-danger" onclick="return(confirmToDelete());">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                                <a href="patient_case_note.php?card_number=<?php echo $card_number ?>" class="btn btn-primary" onclick="return(confirmToDeleddte());">
                                                                    <i class="ti-id-badge"></i>
                                                                </a>
                                                            </td>
                                                            <td> <?php echo $patient_name ?></td>
                                                            <td> <?php echo $card_number ?></td>
                                                            <td> <?php echo $see_card['sex']; ?></td>
                                                            <td> <?php echo $see_card['date_birth']; ?></td>
                                                            <td> <?php echo $see_card['address']; ?></td>
                                                            <td><?php $card_category_id = $see_card['card_category_id']; $category_details = $cardDetails->gettingCardCategory($card_category_id);
                                                                            echo $category_name = $category_details['card_category_name']; ?></td>
                                                            <td><?php echo $see_card['time_added']; ?></td>
                                                            <!-- <td>
                                                                <div class="col-md-3" >
                                                                    <div class="card" onclick="location.href='';" style="width: 450px; height: 300px;" >
                                                                        <div align="center">
                                                                            <img src="../icons/botiquin.png" style="margin-top: -20px;  width: 30px; height: 30px;" align="center">                    
                                                                            <p align="center"><b>Olufunmilayo Specialist Hospital</b></p>
                                                                        </div> 
                                                                        <p align="left">Name: <?php echo $patient_name ?></p>   
                                                                         <p align="left">Card Number: <?php echo $card_number ?></p>
                                                                         <p align="left">Date of Birth: <?php echo $see_card['date_birth']; ?></p> 
                                                                         <p align="left">Sex: <?php echo $see_card['sex']; ?></p>  
                                                                         <p align="left">Address: <?php echo $see_card['address']; ?></p> 
                                                                         <p align="left">Card Type: <?php $card_category_id = $see_card['card_category_id']; $category_details = $cardDetails->gettingCardCategory($card_category_id);
                                                                            echo $category_name = $category_details['card_category_name']; ?></p>        
                                                                    </div>                            
                                                                </div>

                                                                
                                                            </td> -->
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
                                return confirm("Click Okay to Delete Patient Card Details and Cancel to Stop");
                            }
                        </script>

                        <script>
                            function confirmToEdit(){
                                return confirm("Click okay to Edit Patient Card and Cancel to Stop");
                            }
                        </script>    
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
