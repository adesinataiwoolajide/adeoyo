<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../dev/registration/class_registration.php';
	require 'libs_dev/staff/hospital_staff.php';
	try{
		$all_purpose = new all_purpose($db);
		$register = new registration($db);
		$staffDetails = new hospitalstaffDetails($db);
		$dir = "staff-passport/";
	   	
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-hospital-staff.php");	
     	}
		if($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect("add-hospital-staff.php");	
    	}else{
        
	        
	    	if(isset($_POST['add-staff'])){
	    		
				$email = $_SESSION['user_name'];

				$staff_name = $all_purpose->sanitizeInput($_POST['staff_name']);
				$sex = $all_purpose->sanitizeInput($_POST['gender']);
				$marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
				$religion = $all_purpose->sanitizeInput($_POST['religion']);
				$date_birth = $all_purpose->sanitizeInput($_POST['date_birth']);
				$staff_email = $all_purpose->sanitizeInput($_POST['staff_email']);
				$staff_phone = $all_purpose->sanitizeInput($_POST['staff_phone']);
				$address = $all_purpose->sanitizeInput($_POST['address']);
				$type_id = $all_purpose->sanitizeInput($_POST['type_id']);
				$dept_id = $all_purpose->sanitizeInput($_POST['unit_id']);
				$year_employ = $all_purpose->sanitizeInput($_POST['year_employ']);
				$state= $all_purpose->sanitizeInput($_POST['state_origin']);
				
				$qualification_id = implode(",", $_POST['qualification_id']);
				$kin_details = $all_purpose->sanitizeInput($_POST['kin_details']);
				$full_name= $staff_name;
				$eemail = $staff_email;
				$password = sha1($staff_email);
				$access = $type_id;

				$break = substr($year_employ, 2,2);
				$category = "Staff";
				if($state =="Outside Nigeria"){
					$state_origin = "Outside Nigeria";
				}else{
					$state_origin = $state." State";
				}
				$getNumber = $db->prepare("SELECT * FROM last_numbers WHERE category=:category AND year_number=:year_employ ORDER BY last_id DESC LIMIT 0,1");
				$arrNum = array(':category'=>$category, ':year_employ'=>$year_employ);
				$getNumber->execute($arrNum);
				if($getNumber->rowCount()==0){
					$new_number =0;
					$adding = $new_number+1;
					//$adding = "000".$add;
				}else{
					$see_last = $getNumber->fetch();
					$conf = $see_last['numbers'];
					$adding = $conf+1;
				}
				$hos_name = "OSPH/$break";
				$staff_number =$hos_name."/000".$adding;
				$numbers = "000".$adding;
				$move= move_uploaded_file($file_tmp, $dir.$file_name);
				if($staffDetails->checkExistencePhone($staff_phone)){
					$_SESSION['error'] = "This Phone Number $staff_phone is Already in Use By Another Staff";
					$all_purpose->redirect("add-hospital-staff.php");
				}elseif($staffDetails->checkExistenceEmil($staff_email)){
					$_SESSION['error'] ="This E-Mail $staff_email is Already in Use By Another Staff";
					$all_purpose->redirect("add-hospital-staff.php");
				}else{
					if(!empty($staffDetails->addingNewStaff($file_name, $staff_number, $staff_name, 
						$sex, $marital_status, $religion, $date_birth, $staff_email, $staff_phone, 
						$address, $type_id, $dept_id, $year_employ, $state_origin, $qualification_id,
						$kin_details))
						AND
						(!empty($staffDetails->insertingTheLastNumber($category, 
							$numbers, $year_employ))) 
						AND 
						(!empty($register->userRegistration($full_name, $eemail, $password, $access)))){
						$action= "Added $staff_name with the Staff Number $staff_number To The Staff List";
						$his= $all_purpose->operationHistory($action, $email);
						$_SESSION['success'] = "You Have Added $staff_name With The Staff Number $staff_number To The Staff List Successfully";
						$all_purpose->redirect("view-all-staff.php");

					}else{
						$_SESSION['error'] = "Unable to Add $staff_name With The Staff Number $staff_number To The Staff List at The Moment, Please Try Again Later";
						$all_purpose->redirect("add-hospital-staff.php");
					}
				}

			}else{
				$_SESSION['error'] = "Please Fill The Below Form To Add The Staff Details";
				$all_purpose->redirect("add-hospital-staff.php");
			}
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-hospital-staff.php");
	}