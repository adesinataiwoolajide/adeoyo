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
		
    	if(isset($_POST['update_details'])){
	    	$dir = "staff-passport/";
		    $file_name = $_FILES['image']['name'];
		    $file_size =$_FILES['image']['size'];
		    $file_tmp =$_FILES['image']['tmp_name'];
		    $file_type=$_FILES['image']['type'];
		    $file_ext = pathinfo($file_name);
		   
		    $email = $_SESSION['user_name'];

			$staff_name = $all_purpose->sanitizeInput($_POST['staff_name']);
			$sex = $all_purpose->sanitizeInput($_POST['gender']);
			$marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
			$religion = $all_purpose->sanitizeInput($_POST['religion']);
			$date_birth = $all_purpose->sanitizeInput($_POST['date_birth']);
			$staff_phone = $all_purpose->sanitizeInput($_POST['staff_phone']);
			$address = $all_purpose->sanitizeInput($_POST['address']);
			$type_id = $all_purpose->sanitizeInput($_POST['type_id']);
			$dept_id = $all_purpose->sanitizeInput($_POST['unit_id']);
			$year_employ = $all_purpose->sanitizeInput($_POST['year_employ']);
			$state_origin= $all_purpose->sanitizeInput($_POST['state_origin']);
			
			$qualification_id = implode(",", $_POST['qualification_id']);
			$kin_details = $all_purpose->sanitizeInput($_POST['kin_details']);
			$full_name= $staff_name;
			$staff_number=$_POST['staff_number'];
			$staff_email = $_POST['staff_email'];
			$users = $staff_email;
			$login = $register->gettingUserDetails($users);
			$user_id = $login['user_id'];
			$access = $type_id;
			$prev_name = $_POST['prev_name'];
		

			if(empty($file_name)){
	
	    		if($staffDetails->updateStaffDetailsWithOutImage($staff_number, $staff_name, $sex, 
	    			$marital_status, $religion, $date_birth, $staff_email, $staff_phone, $address,
	    			$type_id, $dept_id, $year_employ, $state_origin, $qualification_id, $kin_details)
	    			AND($register->updateUserdetailsID($user_id, $full_name, $access))){
	    			$action ="Updated $staff_number Details";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Updated $staff_name with the Staff Number $staff_number Details Successfully";
					$all_purpose->redirect("staff-details.php?staff_name=$staff_name&&staff_number=$staff_number");

	    		}else{
	    			$return = $_POST['return'];
	    			$_SESSION['error'] = "Unable to Update Staff $staff_name with the Staff Number $staff_number Details at the Moment, Please try again later";
					$all_purpose->redirect("$return");
	    		}
		    }else{
		    	$ext = $file_ext['extension'];
				$extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
			    if(!(in_array($ext,$extensions))){
			    	$return = $_POST['return'];
			    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
			        $all_purpose->redirect("$return");	
		     	}
				if($file_size > 2097152){
					$return = $_POST['return'];
		          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
		          	$all_purpose->redirect("$return");	
		    	}else{	
		    		$ext = $file_ext['extension'];
					$extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	        		$move= move_uploaded_file($file_tmp, $dir.$file_name);
	        		if($staffDetails->updateStaffDetailsWithImage($file_name, $staff_number, $staff_name, $sex, $marital_status, $religion, $date_birth, $staff_email, $staff_phone, $address, $type_id, $dept_id, $year_employ, $state_origin, $qualification_id, $kin_details)AND($register->updateUserdetailsID($user_id, $full_name, $acess))){
		    			$action ="Update $staff_number Details And Changed The Staff Passport";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Updated Staff $Staff_name with the Staff Number $staff_number Details And Changed The Staff Passport Successfully";
						$all_purpose->redirect("staff-details.php?staff_name=$staff_name&&staff_number=$staff_number");
		    		}else{
		    			$return = $_POST['return'];
		    			$_SESSION['error'] = "Unable to Update Staff $staff_name with the Staff Number $staff_number and Passport Details at the Moment, Please try again later";
						$all_purpose->redirect("$return");
		    		}
			    	
	        	}
		    }
		}else{
			$return = $_POST['return'];
			$all_purpose->redirect("$return");	
		}  	
    }catch(PDOException $e){
    	$return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("$return");    }
?>