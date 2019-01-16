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
		
		if(isset($_GET['casenote_identification'])){
			$email = $_SESSION['user_name'];
			$card_number = $_GET['card_number'];
			$staff_number = $_GET['staff_number'];
			$case_note_id = $_GET['casenote_identification'];
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$patient_number = $card_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];
			
			if($cardDetails->deletePatientCaseNote($case_note_id)){
				$action= "Deleted Case Note Details For $patient_name With Card Number $card_number";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have UDeleted Case Note Details For $patient_name With Card Number $card_number Successfully";
				$all_purpose->redirect("view-patient-case-note.php");
			}else{
				
				$_SESSION['error'] = "Unable To Delete Case Note Details For $patient_name With Card Number $card_number at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-patient-case-note.php");
			}
		}else{
			
			$_SESSION['error'] = "Please Click On The Trash Can To Delete Patient Case Note";
			$all_purpose->redirect("view-patient-case-note.php");
		}
	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-patient-case-note.php");
	}