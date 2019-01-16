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
	$testing = new hospitalTest($db);
	try{
		
		if(isset($_POST['update-casenote'])){
			$email = $_SESSION['user_name'];
			$card_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$staff_number = $_POST['staff_number'];
			$test_id = $all_purpose->sanitizeInput($_POST['test']);
			$observation = $all_purpose->sanitizeInput($_POST['observation']);
			$prev_card = $_POST['prev_number'];
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$patient_number = $card_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$prevo = $cardDetails->gettingPreVPatientCard($prev_card);
			$patient_name = $cardo['patient_name'];
			$frosh = $testing->getHospitalTest($test_id);
			$prev_name = $prevo['patient_name'];
			$case_note_id = $_POST['case_note_id'];
			if($test_id ==0){
				$test_name = "No Test ";
			}else{
				$test_name = $frosh['test_name'];
			}
			if($appointment->checkingPatientCard($card_number)){
				$return = $_POST['return'];
				$_SESSION['error'] = "This Card Number $card_number Does Not Exist, Please Retype The Card Number and Try Again";
				$all_purpose->redirect("$return");
			
			}else{
				if($cardDetails->updatePatientCaseNote($case_note_id, $card_number, $observation, $test_id)){
					$action= "Upadated Case Note Details and Changed The Patient Name From $prev_name to $patient_name And Recommended $test_name";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Upadated Case Note Details and Changed The Patient Name From $prev_name to $patient_name And Recommended $test_name Successfully";
					$all_purpose->redirect("view-patient-case-note.php");
				}else{
					$return = $_POST['return'];
					$_SESSION['error'] = "Unable To Upadate Case Note Details and Changed The Patient Name From $prev_name to $patient_name at The Moment, Please Try Again Later";
					$all_purpose->redirect("$return");
				}
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Add Details To Patient Case Note";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}