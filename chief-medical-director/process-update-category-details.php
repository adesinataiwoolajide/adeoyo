<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/drugs/drugs_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$drugCate = new drugsCategory($db);
		if(isset($_POST['add-ward'])){
			$email = $_SESSION['user_name'];
			$category = $all_purpose->sanitizeInput($_POST['category_name']);
			$category_name = strtoupper($category);
			$category_id = $_POST['drug_cate_id'];
			$prev_name = $_POST['prev_name'];
				
			if($drugCate->updateCategory($category_name, $category_id)){
				$action= "Updated Drug Category Name From $prev_name To $category_name";
				$his= $all_purpose->operationHistory($action, $email);
				$_SESSION['success']= "You Have Updated Drug Category Name From $prev_name To $category_name Successfully";
				$all_purpose->redirect("view-all-drug-categories.php");
			}else{
				$return = $_POST['return'];
				$_SESSION['error'] = "Unable To Update Drug Category Name From $prev_name To $category_name at The Moment, Please Try Again Later";
				$all_purpose->redirect("$return");
			}

		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update The Drug Category Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}