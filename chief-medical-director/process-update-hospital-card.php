<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	
	try{
		
		if(isset($_POST['update-card'])){
			$email = $_SESSION['user_name'];
			$patient_name = $all_purpose->sanitizeInput($_POST['full_name']);
			$sex = $all_purpose->sanitizeInput($_POST['gender']);
			$date_birth = $all_purpose->sanitizeInput($_POST['date_birth']);
			$card_category_id = $all_purpose->sanitizeInput($_POST['card_category_id']);
			$address = $all_purpose->sanitizeInput($_POST['address']);
			$card_number = $_POST['card_number'];
			$category_details = $cardDetails->gettingCardCategory($card_category_id);
			$category_name = $category_details['card_category_name'];
			$prev_name = $_POST['prev_name'];

			if(!empty($cardDetails->updateHospitalCard($card_number, $patient_name, $sex, $date_birth, $address, $card_category_id))){

				$action="Updated Card $card_number With The Card Category From $prev_name to $category_name For $patient_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success'] = "You Have Updated Card $card_number With The Card Category From $prev_name to $category_name For $patient_name Successfully";
				$all_purpose->redirect("view-all-patient-cards.php");

			}else{
				$return = $_POST['return'];
				$_SESSION['error'] = "Unable to Update Hospital Card For $patient_name at the moment,  Please Try Again Later";
				$all_purpose->redirect("$return");
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Create Patient Hospital Card";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}
