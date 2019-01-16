<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/patient/patient_class.php';
	require 'libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$staffDetails = new hospitalstaffDetails($db);
	
	try{
		
		if(isset($_POST['add-card'])){
			$email = $_SESSION['user_name'];
			$patient_name = $all_purpose->sanitizeInput($_POST['full_name']);
			$sex = $all_purpose->sanitizeInput($_POST['gender']);
			$date_birth = $all_purpose->sanitizeInput($_POST['date_birth']);
			$card_category_id = $all_purpose->sanitizeInput($_POST['card_category_id']);
			$address = $all_purpose->sanitizeInput($_POST['address']);
			$category = "Patient";
			$year_employ = date("Y");
			$break = substr($year_employ, 2,2);

			$category_details = $cardDetails->gettingCardCategory($card_category_id);
			$category_name = $category_details['card_category_name'];
			$up = strtoupper($category_name);
			$cut = substr($up, 0,3);

			$getNumber = $db->prepare("SELECT * FROM last_numbers WHERE category=:category AND year_number=:year_employ ORDER BY last_id DESC LIMIT 0,1");
			$arrNum = array(':category'=>$category, ':year_employ'=>$year_employ);
			$getNumber->execute($arrNum);
			if($getNumber->rowCount()==0){
				$new_number =0;
				$adding = $new_number+1;
			}else{
				$see_last = $getNumber->fetch();
				$conf = $see_last['numbers'];
				$adding = $conf+1;
			}
			$hos_name = "$break/OSPH/$cut";
			$card_number =$hos_name."/00".$adding;
			$numbers = "00".$adding;

			if(!empty($cardDetails->patientHospitalCard($card_number, $patient_name, $sex, $date_birth, $address, $card_category_id)) AND (!empty($staffDetails->insertingTheLastNumber($category, $numbers, $year_employ)))) {

				$action="Open Card $card_number With The Card Category $category_name For $patient_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success'] = "You Have Opened Card $card_number With The Card Category $category_name For $patient_name Successfully";
				$all_purpose->redirect("view-all-patient-cards.php");

			}else{
				$_SESSION['error'] = "Unable to Open Hospital Card For $patient_name at the moment,  Please Try Again Later";
				$all_purpose->redirect("create-hospital-card.php");
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Create Patient Hospital Card";
			$all_purpose->redirect("create-hospital-card.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("create-hospital-card.php");
	}
