<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/hos_dept/hospital_unit_class.php';
	require '../ict-department/libs_dev/patient/patient_class.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	require '../ict-department/libs_dev/test/hospital_test.php';
	try{
		$all_purpose = new all_purpose($db);
		$hosUnit = new hospitalUnitings($db);
		$hosTest = new hospitalTest($db);
		$hosPay = new hospitalPayment($db);
		$patientDetails = new hospitalUnits($db);
		$staffoDet = new hospitalstaffDetails($db);
		if(isset($_POST['add-payment'])){
			$email = $_SESSION['user_name'];
			$staff_email = $email;
			$staffDetails =$staffoDet->seeStaffEmailDetails($staff_email);
			$card_number = $all_purpose->sanitizeInput($_POST['card_number']);
			$amount = $_POST['test_amount'];
			$test_name = $_POST['test_name'];
			$payment_type = $test_name;
			$staff_number= $staffDetails['staff_number'];
			$unit_name = $_POST['unit_name'];
			$category = "Receipt";
			$year_employ = date("");

			if($patientDetails->checkingPatientCard($card_number)){
				$return= $_POST['return'];
				$_SESSION['error'] = "$card_number Does Not Exist In The Hospital Patient Record";
				$all_purpose->redirect("$return");
			}else{
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
				$hos_name = date("y");
				$receipt_number =$hos_name."-000".$adding;
				$numbers = "000".$adding;
				if(!empty($hosPay->addingThePayment($staff_number, $card_number, $payment_type, $amount, $receipt_number))
					AND(!empty($staffoDet->insertingTheLastNumber($category, $numbers, $year_employ)))){
					$action= "Added $card_number Payment For $test_name with the Reciept Number $receipt_number";
					$his= $all_purpose->operationHistory($action, $email);
					$_SESSION['success']= strtoupper("You Have Added $card_number Payment For $test_name with the Reciept Number $receipt_number Successfully");
					$all_purpose->redirect("view-all-payments.php");
				}else{
					$_SESSION['error']="Unable to Add $card_number Payment for $test_name at the moment, Please Try Again Later";
					$all_purpose->redirect("$return");
				}

			}

		}else{
			$return= $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Add The Patient Payment";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return= $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}