<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/staff/hospital_staff.php';
    
    $staffDetails = new hospitalstaffDetails($db);
    $staff_email = $_SESSION['user_name'];
    $myDetails = $staffDetails->seeStaffEmailDetails($staff_email);
    $memo = $db->prepare("SELECT * FROM hospital_memo ORDER BY memo_id DESC");
    $memo->execute();
    if($memo->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Hospital Memo List is Empty, Please Kindly Click On This Button To  <a href="add-memo.php" class=" btn btn-success"> Add Memo To The Memo List</a></p>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                <li class="breadcrumb-item">
                                    <a href="view-all-memo.php">
                                        <i class="ti-list"></i> <b> View All Memo </b>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="add-memo.php">
                                        <i class="ti-plus"></i> <b> Add Memo </b>
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
                                    <i class="ti-list"></i> <b> View All Hospital Memo </b>
                                </li>
                            </p>
                        </div>
                        
                    <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-12">
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
                                                        <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-compose"><i class="ti-plus"> </i> Send General Memo</a>
                                                        <!-- Modal -->
                                                        <div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                                             <div class="modal-dialog">
                                                                <div class="modal-content text-left">
                                                                    <div class="modal-header">
                                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="ti-close"></i></button>
                                                                        <h4 class="modal-title" style="color: green">Fill The Below Form To Add The Memo</h4>
                                                                    </div>
                                                                    <?php include("form-modal.php"); ?>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                        </div>
                                                        <ul class="inbox-nav inbox-divider">
                                                            <li>
                                                                <a href="compose_memo.php?staff_type=<?php echo "All The Staff" ?>&&type_identification=<?php echo 0 ?>"> <i class="fa fa-bell-o"></i>All Staff</a>
                                                            </li><?php 
                                                            $typres = $db->prepare("SELECT * FROM staff_type ORDER BY type_name ASC");
                                                            $typres->execute();
                                                            while($see_hopev = $typres->fetch()){
                                                                $type_name = $see_hopev['type_name'];
                                                                $type_id = $see_hopev['type_id']; ?>
                                                                <li>
                                                                    <a href="compose_memo.php?staff_type=<?php echo $type_name ?>&&type_identification=<?php echo $type_id ?>">
                                                                        <i class="fa fa-bell-o"></i>
                                                                        
                                                                        <?php echo $see_hopev['type_name']; ?> 
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
                                                    <aside class="lg-side">
                                                        <div class="inbox-head">
                                                            <h3 class="input-text" style="color: green"><?php echo $hospital_name ?> STAFF MEMO LIST</h3>
                                                            
                                                        </div>
                                                        
                                                        <div class="bootstrap-data-table-panel">
                                                            <div class="table-responsive">
                                                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr class="unread">
                                                                            <td class="inbox-small-cells">
                                                                                Serial Number
                                                                            </td>
                                                                            <td class="inbox-small-cells">
                                                                                Sender
                                                                            </td>
                                                                            <td class="view-message  dont-show">Subject</td>
                                                                            <td class="view-message ">Memo Content</td>
                                                                            <td>Recievers Category</td>
                                                                            <td>Reciever</td>
                                                                            <td class="view-message  inbox-small-cells">Attachment</td>
                                                                            <td class="view-message  text-right">Time Sent</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody><?php
                                                                        $y=1;
                                                                        while($see_memo = $memo->fetch()){ ?>
                                                                            <tr class="">
                                                                                <td class="inbox-small-cells">
                                                                                    <?php echo $y; ?>
                                                                                    <a href="" >
                                                                                    <i class="ti-pencil"></i>
                                                                                    </a>
                                                                                    <a href="">
                                                                                        <i class="ti-trash"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td><?php echo $see_memo['memo_sender']; ?></td>
                                                                                <td><?php echo $see_memo['subject']; ?>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td><?php  $cont = $see_memo['memo_content']; echo substr($cont, 0,20). "...." ; ?>
                                                                                </td>

                                                                                <td><?php  
                                                                                    echo $rev= $see_memo['memo_category']; ?>  
                                                                                </td>
                                                                                <td><?php  
                                                                                    $rev= $see_memo['memo_reciever']; 
                                                                                    if($rev == 0){
                                                                                        echo "All The Staff";
                                                                                    }else{
                                                                                        echo substr($rev, 0,20). "....";
                                                                                    }?>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td><?php 
                                                                                    $ata = $see_memo['attachment'];
                                                                                    if(empty($ata)){ 
                                                                                        echo "No Attachment";
                                                                                    }else{ ?>
                                                                                        <a href="<?php echo "memo-attachment/". $see_memo['attachment'] ?>" target="_blank"><i class="fa fa-paperclip"></i>Attachment
                                                                                    </a><?php
                                                                                    } ?>

                                                                                    
                                                                                </td>
                                                                                 
                                                                                <td><?php echo $see_memo['time_written']; ?></td> 
                                                                            </tr><?php
                                                                            $y++;
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
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