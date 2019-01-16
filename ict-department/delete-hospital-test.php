<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/hos_dept/hospital_unit_class.php';
	require 'libs_dev/test/hospital_test.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		$hosTest = new hospitalTest($db);
		if(isset($_GET['test_identification'])){
			$email = $_SESSION['user_name'];
			$test_name = $_GET['test_name'];
			$test_id=$_GET['test_identification'];
			$test_details = $hosTest->getHospitalTest($test_id);
			$unit_id = $test_details['unit_id'];
            $gosh = $hosUnit->getUnitDetailsID($unit_id);
            $unit_name = $gosh['unit_name'];

			if($hosTest->deleteHospitalTest($test_id)){
				$action= "Deleted $test_name Test Details in $unit_name Department From The Test List";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Deleted $test_name Test Details in $unit_name Department From The Test List Successfully";
				$all_purpose->redirect("view-all-test.php");
			}else{

				$_SESSION['error'] = "Unable To Delete $test_name Test Details in $unit_name Department From The Test List at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-all-test.php");
			}
		}else{
			
			$_SESSION['error'] = "Please Fill The Below Form To Delete The Test Details";
			$all_purpose->redirect("view-all-test.php");
		}
	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-test.php");
	}