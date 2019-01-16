<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/patient/patient_class.php';
	require 'libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	
	try{
		
		if(isset($_GET['card_number'])){
			$email = $_SESSION['user_name'];
			$card_number = $_GET['card_number'];

			$pat = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $pat['patient_name'];
			if(!empty($cardDetails->deleteHospitalCard($card_number))){

				$action="Deleted Hospital Card $card_number For $patient_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success'] = "You Have Deleted Hospital Card $card_number  For $patient_name Successfully";
				$all_purpose->redirect("view-all-patient-cards.php");

			}else{
				
				$_SESSION['error'] = "Unable to Update Hospital Card $card_number For $patient_name at the moment,  Please Try Again Later";
				$all_purpose->redirect("view-all-patient-cards.php");
			}
		}else{
			
			$_SESSION['error'] = "Please Fill The Below Form To Create Patient Hospital Card";
			$all_purpose->redirect("view-all-patient-cards.php");
		}
	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-patient-cards.php");
	}
