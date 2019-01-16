<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/test/hospital_test.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$testerPa = new hospitalTest($db);
	$appointment = new patientAppointTest($db);
	$staffDetails = new hospitalstaffDetails($db);
	try{
		
		if(isset($_POST['add-appointment'])){
			$email = $_SESSION['user_name'];
			$patient_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$staff_number = $_POST['staff_number'];
			$specification = $all_purpose->sanitizeInput($_POST['specification']);
			$test_id = $all_purpose->sanitizeInput($_POST['test_id']);
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$card_number = $patient_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];

			$testing =$testerPa->getHospitalTest($test_id);
			$test_name = $testing['test_name'];
			if($appointment->checkingPatientCard($card_number)){
				$_SESSION['error'] = "This Card Number $card_number Does Not Exist, Please Retype The Card Number and Try Again";
				$all_purpose->redirect("recommend-test.php");
			
			}else{
				if($cardDetails->recommendingTestForPatient($staff_number, $card_number, $specification, $test_id)){
					$action= " Recommended $test_id For $card_number";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Recommended $test_name For $card_number Successfully";
					$all_purpose->redirect("view-patients-test.php");
				}else{

					$_SESSION['error'] = "Unable To Schedule Recommend $test_name For $card_number at The Moment, Please Try Again Later";
					$all_purpose->redirect("recommend-test.php");
				}
			}

		}else{

			$_SESSION['error'] = "Please Fill The Below Form To Recommend Test For The Patient";
			$all_purpose->redirect("recommend-test.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("recommend-test.php");
	}