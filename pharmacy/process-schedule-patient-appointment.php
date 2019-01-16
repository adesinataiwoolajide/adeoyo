<?php
	session_start();
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$appointment = new patientAppointTest($db);
	$staffDetails = new hospitalstaffDetails($db);
	try{
		
		if(isset($_POST['add-appointment'])){
			$email = $_SESSION['user_name'];
			$patient_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$staff_number = $_POST['staff_number'];
			$dateof_appointment = $all_purpose->sanitizeInput($_POST['dateof_appointment']);
			$unit_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			$card_number = $patient_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];

			if($appointment->checkingPatientCard($card_number)){
				$_SESSION['error'] = "This Card Number $card_number Does Not Exist, Please Retype The Card Number and Try Again";
				$all_purpose->redirect("schedule-patient-appointment.php");
			// }elseif($appointment->checkExistingAppointment($patient_number, $dateof_appointment)){
			// 	$_SESSION['error'] = "You Have Scheduled An Appointment For $$patient_name On This Date $dateof_appointment Before";
			// 	$all_purpose->redirect("schedule-patient-appointment.php");
			}else{
				if($appointment->addingPatientAppointment($staff_number, $patient_number, $dateof_appointment, $unit_id)){
					$action= "Added an Appointment For $patient_name On Date $dateof_appointment with $staff_name";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= "You Have Scheduled an Appointment For $patient_name On Date 
					$dateof_appointment Successfully";
					$all_purpose->redirect("view-patient-appointment.php");
				}else{

					$_SESSION['error'] = "Unable To Schedule Appointment For $patient_number at The Moment, Please Try Again Later";
					$all_purpose->redirect("schedule-patient-appointment.php");
				}
			}
		}else{

			$_SESSION['error'] = "Please Fill The Below Form To Schedule an Appointment For The Patient";
			$all_purpose->redirect("schedule-patient-appointment.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("schedule-patient-appointment.php");
	}