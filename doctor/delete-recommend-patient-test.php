<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/test/hospital_test.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	$all_purpose = new all_purpose($db);
	$cardDetails = new hospitalUnits($db);
	$testerPa = new hospitalTest($db);
	$appointment = new patientAppointTest($db);
	$staffDetails = new hospitalstaffDetails($db);
	try{
		
		if(isset($_GET['patient_test_id'])){
			$patient_test_id = $_GET['patient_test_id'];
			$email = $_SESSION['user_name'];
			$card_number = $_GET['card_number'];
			$staff_number = $_GET['staff_number'];
			
			$depo = $staffDetails->seeStaffDetails($staff_number);
			$staff_name = $depo['staff_name'];
			
			$cardo = $cardDetails->gettingPatientCard($card_number);
			$patient_name = $cardo['patient_name'];
			$deto = $cardDetails->getingPatIDTest($patient_test_id);
			$test_id = $deto['test_id'];
			$testing =$testerPa->getHospitalTest($test_id);
			$test_name = $testing['test_name'];
			
			if($cardDetails->deleteRecommendedTest($patient_test_id)){
				$action= "Deleted Recommended $test_id For $patient_name With The Card Number $card_number";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Deleted The Recommended $test_name For $patient_name With The Card Number $card_number Successfully";
				$all_purpose->redirect("view-patients-test.php");
			}else{

				$_SESSION['error']="Unable To Schedule  Delete The Recommended $test_name For $patient_name With The Card Number $card_number at The Moment, Please Try Again Later";
				$all_purpose->redirect("view-patients-test.php");
			}
			

		}else{

			$_SESSION['error'] = "Please Click on The Rad Trash Can to Delete The Recommended Test For The Patient";
			$all_purpose->redirect("view-patients-test.php");
		}
	}catch(PDOException $e){

		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-patients-test.php");
	}