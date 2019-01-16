<?php
    include("../header.php");
    include("../side-bar.php");
    $user_name = $_SESSION['user_name'];
    $view_act = $db->prepare("SELECT * FROM patient_payment ORDER BY receipt_number ASC");
    $view_act->execute();
    if($view_act->rowCount()==0){ ?>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <p style="color: red" align="center">The Payment List is Empty</p>
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
                                                        <a href="view-all-payments.php">
                                                            <i class="ti-list"></i> <b> View All Payment </b>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="add-payment.php">
                                                            <i class="ti-plus"></i> <b> Add Payment</b>
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
                                                        <i class="ti-list"></i> <b> View All Patient Payment </b>
                                                    </li>
                                                </p>
                                                <h4 align="center" style="color: green"><p style="color: green" align="">
                                                    List of All Patient Payment</p>
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
                                                        <th>Staff Number</th>
                                                        <th>Card Number</th>
                                                        <th>Payment Type</th>
                                                        <th>Amount Paid</th>
                                                        <th>Reciept Number</th>
                                                        <th>Time Added</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Staff Number</th>
                                                        <th>Card Number</th>
                                                        <th>Payment Type</th>
                                                        <th>Amount Paid</th>
                                                        <th>Reciept Number</th>
                                                        <th>Time Added</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody><?php 
                                                    
                                                    $y=1;
                                                    while($see_act = $view_act->fetch()){ $receipt_number = $see_act['receipt_number'] ?>
                                                        
                                                        <tr>
                                                            <td><?php echo $y; ?>
                                                                <a href="payment-reciept.php?receipt_number=<?php echo $receipt_number ?>"><i class="fa fa-print"></i></a>
                                                            </td>
                                                            <td><?php echo $see_act['staff_number'] ?></td>
                                                            <td><?php echo $see_act['card_number'] ?></td>
                                                            <td><?php echo $see_act['payment_type'] ?></td>
                                                            <td><?php echo $see_act['amount'] ?></td>
                                                            <td><?php echo $see_act['receipt_number'] ?></td>
                                                            <td><?php echo $see_act['time_paid'] ?></td>
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
                        <!-- /# row --><?php
                        include("../table-footer.php");
    } ?>
