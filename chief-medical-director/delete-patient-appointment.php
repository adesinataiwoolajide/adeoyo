<?php
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
		
		if(isset($_GET['appointment_identification'])){
			$email = $_SESSION['user_name'];
			$patient_number = $_GET['card_number'];
			$staff_number = $_GET['staff_number'];
			$appointment_id = $_GET['appointment_identification'];
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			
			$deta = $appointment->getttingPatientAppointmentID($appointment_id);
			$dateof_appointment = $deta['dateof_appointment'];
			$card_number = $patient_number;
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];

			
			if(!empty($appointment->deleteAppointment($patient_number, $appointment_id))){
				$action= "Deleted The Scheduled Appointment For $patient_name On $dateof_appointment with Dr. $staff_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Deleted The Scheduled Appointment For $patient_name On $dateof_appointment with Dr. $staff_name Successfully";
				$all_purpose->redirect("view-patient-appointment.php");
			}else{
				$_SESSION['error'] = "Unable To Delete The Scheduled Appointment For $patient_name On $dateof_appointment with Dr. $staff_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-patient-appointment.php");
			}
		}else{
			
			$_SESSION['error'] = "Please Fill The Below Form Delete Schedule Appointment For The Patient";
			$all_purpose->redirect("view-patient-appointment.php");
		}
	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-patient-appointment.php");
	}