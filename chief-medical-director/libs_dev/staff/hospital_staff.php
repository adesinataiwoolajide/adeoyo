<?php
	class hospitalstaffDetails{

		public $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkExistencePhone($staff_phone)
		{
			try {
				$checkPhone=$this->db->prepare("SELECT * FROM staff WHERE staff_phone=:staff_phone");
				$arrCheck =array(':staff_phone'=>$staff_phone);
				$checkPhone->execute($arrCheck);
				if($checkPhone->rowCount()>0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkExistenceEmil($staff_email)
		{
			try {
				$checkEmail=$this->db->prepare("SELECT * FROM staff WHERE staff_email=:staff_email");
				$arrCheck =array(':staff_email'=>$staff_email);
				$checkEmail->execute($arrCheck);
				if($checkEmail->rowCount()>0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function seeStaffDetails($staff_number)
		{
			try {
				$gettingStaffDetails = $this->db->prepare("SELECT * FROM staff WHERE staff_number=:staff_number");
				$arrGet = array(':staff_number'=>$staff_number);
				$gettingStaffDetails->execute($arrGet);
				$see_staff = $gettingStaffDetails->fetch();
				return $see_staff;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function seeStaffEmailDetails($staff_email)
		{
			try {
				$gettingStaffDetails = $this->db->prepare("SELECT * FROM staff WHERE staff_email=:staff_email");
				$arrGet = array(':staff_email'=>$staff_email);
				$gettingStaffDetails->execute($arrGet);
				$see_staffo = $gettingStaffDetails->fetch();
				return $see_staffo;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteLogin($staff_email){
			try{
				$delLog = $this->db->prepare("DELETE FROM admin_login WHERE user_name=:staff_email");
				$arrLod = array(':staff_email'=>$staff_email);
				if(!empty($delLog->execute($arrLod))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkingStaffLogin($staff_email){
			try{
				$checkLogin = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:staff_email");
				$arrLog = array(':staff_email'=>$staff_email);
				$checkLogin->execute($arrLog);
				if($checkLogin->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addingNewStaff($file_name, $staff_number, $staff_name, $sex, $marital_status, $religion, $date_birth, $staff_email, $staff_phone, $address, $type_id, $dept_id, 
			$year_employ, $state_origin, $qualification_id, $kin_details){
			try {
				$insertNewStaff = $this->db->prepare("INSERT INTO staff(passport, staff_number, staff_name, sex, marital_status, religion, date_birth, staff_email, staff_phone, address, type_id, dept_id, year_employ, state_origin, qualification_id, kin_details)VALUES(:file_name, :staff_number, :staff_name, :sex, :marital_status, :religion, :date_birth, :staff_email, :staff_phone, :address, :type_id, :dept_id, :year_employ, :state_origin, :qualification_id, :kin_details )");
				$arrAddStaff = array(':file_name'=>$file_name, ':staff_number'=>$staff_number, 
					':staff_name'=>$staff_name, ':sex'=>$sex, ':marital_status'=>$marital_status, 
					':religion'=>$religion, ':date_birth'=>$date_birth, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':address'=>$address, ':type_id'=>$type_id, 
					':dept_id'=>$dept_id, ':year_employ'=>$year_employ, ':state_origin'=>$state_origin, ':qualification_id'=>$qualification_id, ':kin_details'=>$kin_details);
				if(!empty($insertNewStaff->execute($arrAddStaff))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStaffDetailsWithImage($file_name, $staff_number, $staff_name, $sex, $marital_status, $religion, $date_birth, $staff_email, $staff_phone, $address, $type_id, $dept_id, $year_employ, $state_origin, $qualification_id, $kin_details)
		{
			try {
				$updateStaffDetails = $this->db->prepare("UPDATE staff SET passport=:file_name, staff_name=:staff_name, sex=:sex, marital_status=:marital_status, religion=:religion, date_birth=:date_birth, staff_email=:staff_email, staff_phone=:staff_phone, address=:address, type_id=:type_id, dept_id=:dept_id, year_employ=:year_employ, state_origin=:state_origin, qualification_id=:qualification_id, kin_details=:kin_details WHERE staff_number=:staff_number");
				$arrUpdateStaff =array(':file_name'=>$file_name, ':staff_number'=>$staff_number, 
					':staff_name'=>$staff_name, ':sex'=>$sex, ':marital_status'=>$marital_status, 
					':religion'=>$religion, ':date_birth'=>$date_birth, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':address'=>$address, ':type_id'=>$type_id, 
					':dept_id'=>$dept_id, ':year_employ'=>$year_employ, ':state_origin'=>$state_origin, ':qualification_id'=>$qualification_id, ':kin_details'=>$kin_details);
				if(!empty($updateStaffDetails->execute($arrUpdateStaff))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateStaffDetailsWithOutImage($staff_number, $staff_name, $sex, $marital_status, $religion, $date_birth, $staff_email, $staff_phone, $address, $type_id, $dept_id, $year_employ, $state_origin, $qualification_id, $kin_details)
		{
			try {
				$updateStaffWithoutDetails = $this->db->prepare("UPDATE staff SET staff_name=:staff_name, sex=:sex, marital_status=:marital_status, religion=:religion, date_birth=:date_birth, staff_email=:staff_email, staff_phone=:staff_phone, address=:address, type_id=:type_id, dept_id=:dept_id, year_employ=:year_employ, state_origin=:state_origin, qualification_id=:qualification_id, kin_details=:kin_details WHERE staff_number=:staff_number");
				$arrUpdateOutStaff = array(':staff_number'=>$staff_number, ':staff_name'=>$staff_name, ':sex'=>$sex, ':marital_status'=>$marital_status, ':religion'=>$religion, ':date_birth'=>$date_birth, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':address'=>$address, ':type_id'=>$type_id, ':dept_id'=>$dept_id, 
					':year_employ'=>$year_employ, ':state_origin'=>$state_origin, ':qualification_id'=>$qualification_id, ':kin_details'=>$kin_details);
				if(!empty($updateStaffWithoutDetails->execute($arrUpdateOutStaff))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteStaffDetails($staff_number)
		{
			try {
				$deleteStaff=$this->db->prepare("DELETE FROM staff WHERE staff_number=:staff_number");
				$arrDelete = array(':staff_number'=>$staff_number);
				if(!empty($deleteStaff->execute($arrDelete))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getttingStaffAppointment($staff_number)
		{
			try {
				$getAppointment = $this->db->prepare("SELECT * FROM patient_appointment WHERE staff_number=:staff_number");
				$arrApn = array(':staff_number'=>$staff_number);
				$getAppointment->execute($arrApn);
				$kings = $getAppointment->fetch();
				return $kings;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function insertingTheLastNumber($category, $numbers, $year_employ)
		{
			try {
				$addNumber= $this->db->prepare("INSERT INTO last_numbers(category, numbers, year_number)VALUES(:category, :numbers, :year_employ)");
				$srrNum = array(':category'=>$category, ':numbers'=>$numbers, ':year_employ'=>$year_employ);
				if(!empty($addNumber->execute($srrNum))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getStaffType($type_id)
		{
			try {
				$getType = $this->db->prepare("SELECT * FROM staff_type WHERE type_id=:type_id");
				$arrTy = array(':type_id'=>$type_id);
				$getType->execute($arrTy);
				$seeTy = $getType->fetch();
				return $seeTy;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getStaffQualification($qualification_id)
		{
			try {
				$getType = $this->db->prepare("SELECT * FROM staff_qualification WHERE qualification_id=:qualification_id");
				$arrTy = array(':qualification_id'=>$qualification_id);
				$getType->execute($arrTy);
				$seeTyQ = $getType->fetch();
				return $seeTyQ;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function transferingStaff($staff_number, $new_unit_id)
		{
			try {
				$transfer = $this->db->prepare("INSERT INTO staff_transfer(staff_number, new_unit_id)VALUES(:staff_number, :new_unit_id)");
				$arrTrans = array(':staff_number'=>$staff_number, ':new_unit_id'=>$new_unit_id);
				if(!empty($transfer->execute($arrTrans))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingStaffTransfer($staff_number)
		{
			try {
				$getTrans = $this->db->prepare("SELECT * FROM staff_transfer WHERE staff_number=:staff_number");
				$arrGetTrans = array(':staff_number'=>$staff_number);
				$getTrans->execute($arrGetTrans);
				$see_trans = $getTrans->fetch();
				return $see_trans;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateSTaffTransfer($staff_number, $prev_unit_id, $new_unit_id, 
			$staff_transfer_id)
		{
			try {
				$updateSTaffTrans = $this->db->prepare("UPDATE staff_transfer SET new_unit_id=:new_unit_id, prev_unit_id=:prev_unit_id WHERE staff_number=:staff_number AND staff_transfer_id=:staff_transfer_id");
				$arrStaTra = array(':new_unit_id'=>$new_unit_id, ':prev_unit_id'=>$prev_unit_id, 
					':staff_number'=>$staff_number, ':staff_transfer_id'=>$staff_transfer_id);
				if(!empty($updateSTaffTrans->execute($arrStaTra))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

	}

	class staffPatient extends hospitalstaffDetails{
		function __construct($db){
			parent::__construct($db);
		}

		public function seeStaffDischarge($staff_number)
		{
			try {
				$seeDischarge = $this->db->prepare("SELECT * FROM patient_discharge WHERE staff_number=:staff_number");
				$arrSeeDis = array(':staff_number'=>$staff_number);
				$seeDischarge->execute($arrSeeDis);
				$piroo = $seeDischarge->fetch();
				return $piroo;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkStaffDischarge($staff_number)
		{
			try {
				$cheDischarge = $this->db->prepare("SELECT * FROM patient_discharge WHERE staff_number=:staff_number");
				$arrchDis = array(':staff_number'=>$staff_number);
				$cheDischarge->execute($arrchDis);
				if($cheDischarge->rowCount()==0){
					return true;
				}else{
					return false;
				}
				
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function dischargePatient($staff_number, $patient_number, $discharge_condition)
		{
			try {
				$addDischarge = $this->db->prepare("INSERT INTO patient_discharge(staff_number, 
					patient_number, discharge_condition)VALUES(:staff_number, :patient_number, :discharge_condition)");
				$arrDis = array(':staff_number'=>$staff_number, ':patient_number'=>$patient_number, ':discharge_condition'=>$discharge_condition);
				if(!empty($addDischarge->execute($arrDis))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updatePatientDischarge($staff_number, $patient_number, $discharge_condition)
		{
			try {
				$updatingDischarge = $this->db->prepare("UPDATE patient_discharge SET patient_number=:patient_number, discharge_condition=:discharge_condition WHERE staff_number=:staff_number");
				$arrUpDiss = array(':staff_number'=>$staff_number, ':patient_number'=>$patient_number, ':discharge_condition'=>$discharge_condition);
				if(!empty($updatingDischarge->execute($arrUpDiss))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deletePatientDischarge($discharge_id)
		{
			try {
				$delAppointment = $this->db->prepare("DELETE FROM patient_discharge WHERE discharge_id=;discharge_id");
				$arrDelAppoint = array(':discharge_id'=>$discharge_id);
				if(!empty($delAppointment->execute($arrDelAppoint))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingStaffPatientTransfer($staff_number)
		{
			try {
				$getTest = $this->db->prepare("SELECT * FROM patient_transfer WHERE staff_number=:staff_number");
				$arrTest = array(':staff_number'=>$staff_number);
				$getTest->execute($arrTest);
				$seeTest = $getTest->fetch();
				return $seeTest;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkStaffPatientTransfer($staff_number)
		{
			try {
				$cheTrans = $this->db->prepare("SELECT * FROM patient_transfer WHERE staff_number=:staff_number");
				$arrTrans = array(':staff_number'=>$staff_number);
				$cheTrans->execute($arrTrans);
				if($cheTrans->rowCount()==0){
					return true;
				}else{
					return false;
				}
				
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function transferHospitalPatient($patient_number, $staff_number, $previous_ward, $previous_unit, $previous_bed, $new_ward, $new_unit, $patient_condition)
		{
			try {
				$transfetPatient = $this->db->prepare("INSERT INTO patient_transfer(patient_number, staff_number, previous_ward, previous_unit, previous_bed, new_ward, new_unit, patient_condition)VALUES(:patient_number, :staff_number, :previous_ward, :previous_unit, :previous_bed, :new_ward, :new_unit, :patient_condition)");
				$arrTransfering = array(':patient_number'=>$patient_number, ':staff_number'=>$staff_number, ':previous_ward'=>$previous_ward, ':previous_unit'=>$previous_unit, ':previous_bed'=>$previous_bed, ':new_ward'=>$new_ward, ':new_unit'=>$new_unit, 
					':patient_condition'=>$patient_condition);
				if(!empty($transfetPatient->execute($arrTransfering))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updatePatientTransfer($previous_ward, $previous_unit, $previous_bed, $new_ward, $new_unit, $patient_condition, $transfer_id)
		{
			try {
				$updateTransfer = $this->db->prepare("UPDATE patient_transfer SET previous_ward=:previous_ward, previous_unit=:previous_unit, previous_bed=:previous_bed, new_ward=:new_ward, new_unit=:new_unit, patient_condition=:patient_condition WHERE $transfer_id=:transfer_id");
				$arrUpaTra = array(':previous_ward'=>$previous_ward, ':previous_unit'=>$previous_unit, ':previous_bed'=>$previous_bed, ':new_ward'=>$new_ward, ':new_unit'=>$new_unit, ':transfer_id'=>$transfer_id);
				if(!empty($updateTransfer->execute($arrUpaTra))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}
	}
