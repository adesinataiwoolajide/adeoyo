<?php
    include("../header.php");
    include("../side-bar.php");
    require 'libs_dev/hos_dept/hospital_unit_class.php';
    require 'libs_dev/patient/patient_class.php';
    require 'libs_dev/staff/hospital_staff.php';
    require 'libs_dev/test/hospital_test.php';
    $hosUnit = new hospitalUnitings($db);
    $hosTest = new hospitalTest($db);
    $hosPay = new hospitalPayment($db);
    $patientDetails = new hospitalUnits($db);
    $staffoDet = new hospitalstaffDetails($db);
    $user_name = $_SESSION['user_name'];
    $receipt_number = $_GET['receipt_number'];
    $recieptDetails = $hosPay->gettingPaymentReciept($receipt_number);
    $card_number = $recieptDetails['card_number'];
    $staff_number = $recieptDetails['staff_number'];
    $oruko = $patientDetails-> gettingPatientCard($card_number);
    $osise = $staffoDet->seeStaffDetails($staff_number);
    $name = $oruko['patient_name'];
    $staff_name = $osise['staff_name'];
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table  class="table table-responsive table-bordered">
                                        <p>
                                            <li class="breadcrumb-item">
                                                <a href="payment-reciept.php?receipt_number=<?php echo $receipt_number ?>">
                                                    <i class="fa fa-print"></i> <b> Payment Reciept </b>
                                                </a>
                                            </li>
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
                                        <div class="col-md-12" align="center">
                                            <img src="../icons/1530823255102.jpg" style="height: 100px;" align="center">
                                        </div>
                                        <h4 align="center" style="color: green"><p style="color: green" align="">
                                            Payment Reciept For <?php echo $name ?></p>
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
                                        <tbody>
                                            <tr>
                                                <td>Patient Name</td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>Card Number</td>
                                                <td><?php echo $recieptDetails['card_number'] ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>Payment Type</td>
                                                <td><?php echo $recieptDetails['payment_type'] ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>Amount Paid</td>
                                                <td><?php echo $recieptDetails['amount'] ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>Reciept Number</td>
                                                <td><?php echo $receipt_number ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>Staff In Charge</td>
                                                <td><?php echo $staff_name ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
            </section>
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Reciept</a>
            </div>
        </div>
    </div>
<!-- /# row --><?php
include("../table-footer.php");
