<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/patient/patient_class.php';
	require 'libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$appointment = new patientAppointTest($db);
	$staffDetails = new hospitalstaffDetails($db);
	try{
		
		if(isset($_POST['update-appointment'])){
			$email = $_SESSION['user_name'];
			$patient_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$staff_number = $all_purpose->sanitizeInput($_POST['staff_number']);
			$dateof_appointment = $all_purpose->sanitizeInput($_POST['dateof_appointment']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$card_number = $patient_number;
			$prev_card = $_POST['prev_card'];
			$appoitment_id = $_POST['appointment_id'];
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];

			$rado = $cardDetails->gettingPreVPatientCard($prev_card);
			$prev_name = $rado['patient_name'];

			if($appointment->checkingPatientCard($card_number)){
				$return = $_POST['return'];
				$_SESSION['error'] = "This Card Number $card_number Does Not Exist, Please Retype The Card Number and Try Again";
				$all_purpose->redirect($return);
			}else{
				if(!empty($appointment->updatePatientAppointment($appoitment_id, $staff_number, $patient_number, $dateof_appointment, $unit_id))){
					$action= "Updated The Patient Appointment and Changed The Card Num From $prev_card To $card_number And The Appointment Date is 
					$dateof_appointment with Dr. $staff_name";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Updated The Patient Appointment and Changed The Card Num From $prev_card To $card_number And The Appointment Date is 
					$dateof_appointment with Dr. $staff_name Successfully";
					$all_purpose->redirect("view-patient-appointment.php");
				}else{
					$return = $_POST['return'];
					$_SESSION['error'] = "Unable To Update The Scheduled Appointment For $patient_number at The Moment, Please Try Again Later";
					$all_purpose->redirect($return);
				}
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form Update The Schedule Appointment For The Patient";
			$all_purpose->redirect($return);
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect($return);
	}