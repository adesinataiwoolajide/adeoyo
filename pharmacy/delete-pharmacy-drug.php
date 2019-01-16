<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/drugs/drugs_class.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	
	try{
		$all_purpose = new all_purpose($db);
		$hosDrug = new hospitaldrugs($db);
		$staffDetails = new hospitalstaffDetails($db);
		
		if(isset($_GET['drug_number'])){
			$drug_number = $_GET['drug_number'];
			$drug_name = $_GET['drug_name'];
			$details = $hosDrug->gettingDrugsDetails($drug_number);

			$miligram = $details['miligram'];
			$drug_cate_id = $details['category_id'];
			$type_id = $details['type_id'];
			$quantity = $details['quantity'];

			$hp = $hosDrug->getStock($drug_name, $miligram, $drug_cate_id, $type_id);
			echo $before = $hp['quantity'];
			echo $sub = $before - $quantity;
			
			if(!empty($hosDrug->deleteDrugsDetails($drug_number)) AND (!empty($hosDrug->updateQuantity($drug_name, $miligram, $drug_cate_id, $type_id, $sub)))){
				$action = "Deleted $drug_name with Drug Number $drug_number from the Drug list";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Deleted $drug_name with the Drug number $drug_number deleted successfully";
				$all_purpose->redirect("view-all-pharmacy-drugs.php");	
			}else{
				$_SESSION['error'] = "Unable to delete $drug_name with the Drug Number $drug_number at the moment, Please try again later";
				$all_purpose->redirect("view-all-pharmacy-drugs.php");
			}
		}else{

			$_SESSION['error'] = "Please Fill Click On The Trash CAN To Delete THe Drug Details";
			$all_purpose->redirect("view-all-pharmacy-drugs.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-hospital-test.php");
	}