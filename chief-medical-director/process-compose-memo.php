<?php
	session_start();
	require("../connection/connection.php");
    include("../ict-department/libs_dev/hospital_memo/memo_class.php");
    require("../dev/general/all_purpose_class.php");
    try{
        $hos_memo = new hospitallMemo($db);
        $all_purpose = new all_purpose($db);
    	if(isset($_POST['send-memo'])){
            $dir = "./memo-attachment/";
        
            $attachment = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_tmp =$_FILES['file']['tmp_name'];
            $file_type=$_FILES['file']['type'];
            $file_ext = pathinfo($attachment);
            
            $email = $_SESSION['user_name'];
            $sender = $email;
            echo $category = $_POST['category_name'];
            $category_id = $_POST['category_id'];
            if($category == "All The Staff"){
                echo $reciever = $_POST['reciever'];
            }else{
                echo $reciever = implode(",", $_POST['reciever']);
            }
            echo $subject = $all_purpose->sanitizeInput($_POST['subject']);
            $content = $all_purpose->sanitizeInput($_POST['content']);
            
            
            if(empty($attachment)){

                if($hos_memo ->addNewMemo($sender, $reciever, $content, $category, $subject)){
                    $action ="Sent Memo To $category on $subject To $reciever";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success']=strtoupper("You Have Sent $subject Memo To $category Successfully");
                    $all_purpose->redirect("view-all-memo.php");
                }else{
                    $_SESSION['error'] = "Unable to Send The Memo at the moment, Please try Again Later";
                    $all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");
                }	
    		}else{
                $ext = $file_ext['extension'];
                $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG", "ppt", "PPT", "pdf", "PDF", "docx", "DOCX", "csv","CSV", "txt", "TXT","dotx", "DOTX", "dotm", "DOTM", "xlsx", "XLSX", "xlsm", "XLSM", "xltx", "XLTX", "xltm", "XLTM");
                $move= move_uploaded_file($file_tmp, $dir.$attachment);
                if(!(in_array($ext,$extensions))){
                    $_SESSION['error']="The Extension Is Not Allowed.";
                    $all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");   
                }
                if($file_size > 2097152){
                    $_SESSION['error'] = 'File size must be not greater than 2 MB';
                    $all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");   
                }else{

                    if($hos_memo ->addNewMemoWithAttachment($sender, $reciever, $content, $category, $subject, $attachment)){
                        $action ="Sent Memo To $category on $subject To $reciever";
                        $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                        $_SESSION['success']=strtoupper("You Have Sent $subject Memo To $category Successfully");
                        $all_purpose->redirect("view-all-memo.php");
                    }else{
                        $_SESSION['error'] = "Unable to Attach the File with The Memo at the moment, Please try Again Later";
                        $all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");
                    }   
                }
            }
    	}else{
            $_SESSION['error'] = "Please Fill The Below Form To Send Memo To $category";
    		$all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("compose_memo.php?staff_type=$category&&type_identification=$category_id");
    }