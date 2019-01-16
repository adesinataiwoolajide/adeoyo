<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	require '../ict-department/libs_dev/test/hospital_test.php';
	
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$appointment = new patientAppointTest($db);
	$staffDetails = new hospitalstaffDetails($db);
	$testerPa = new hospitalTest($db);
	
	try{
		
		if(isset($_POST['update-test'])){
			$email = $_SESSION['user_name'];
			$card_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$staff_number = $_POST['staff_number'];
			$specification = $all_purpose->sanitizeInput($_POST['specification']);
			$test_id = $all_purpose->sanitizeInput($_POST['test_id']);
			
			$testing =$testerPa->getHospitalTest($test_id);
			$test_name = $testing['test_name'];
			$prev_card = $_POST['prev_number'];
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$patient_number = $card_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$prevo = $cardDetails->gettingPreVPatientCard($prev_card);
			$patient_name = $cardo['patient_name'];
			$frosh = $testerPa->getHospitalTest($test_id);
			$prev_name = $prevo['patient_name'];
			$patient_test_id = $_POST['patient_test_id'];
			
			if($appointment->checkingPatientCard($card_number)){
				$return = $_POST['return'];
				$_SESSION['error'] = "This Card Number $card_number Does Not Exist, Please Retype The Card Number and Try Again";
				$all_purpose->redirect("$return");
			
			}else{
				if($cardDetails->updateRecoTest($patient_test_id, $staff_number, $card_number, 
					$specification, $test_id)){
					$action= "Upadated Recommended Test Details and Changed The Patient Name From $prev_name to $patient_name And Recommended $test_name";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Upadated Recommended Test Details and Changed The Patient Name From $prev_name to $patient_name And Recommended $test_name Successfully";
					$all_purpose->redirect("view-patients-test.php");
				}else{
					$return = $_POST['return'];
					$_SESSION['error'] = "Unable To Upadate Case Note Details and Changed The Patient Name From $prev_name to $patient_name at The Moment, Please Try Again Later";
					$all_purpose->redirect("$return");
				}
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update The Test Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}