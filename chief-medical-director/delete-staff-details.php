<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../dev/registration/class_registration.php';
	require '../ict-department/libs_dev/staff/hospital_staff.php';
	try{
		$all_purpose = new all_purpose($db);
		$register = new registration($db);
		$staffDetails = new hospitalstaffDetails($db);
		if(isset($_GET['staff_number'])){
			$email = $_SESSION['user_name'];
			$staff_number = $_GET['staff_number'];
			$staff_email = $_GET['staff_email'];
			$staff_name = $_GET['staff_name'];
			if(!empty($staffDetails->deleteLogin($staff_email)) AND (!empty($staffDetails->deleteStaffDetails($staff_number)))){

				$action= "Deleted $staff_name with the Staff Number $staff_number From The Staff List";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success'] = "You Have Deleted $staff_name With The Staff Number $staff_number From The Staff List Successfully";
				$all_purpose->redirect("view-all-staff.php");
			}else{
				$_SESSION['error'] = "Unable to Delete $staff_name With The Staff Number $staff_number From The Staff List  The Moment, Please Try Again Later";
				$all_purpose->redirect("view-all-staff.php");
			}

		}else{
			$_SESSION['error'] = "Please Fill Click on The Trash Can To Delete The Staff Details";
			$all_purpose->redirect("view-all-staff.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-staff.php");
	}