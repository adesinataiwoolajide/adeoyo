<?php
	class hospitalUnits{

		public $db;
		function __construct($db){
			$this->db=$db;
		}

		public function addingPatientCaseNote($staff_number, $card_number, $observation, $test_id)
		{
			try {
				$inserttocasenote = $this->db->prepare("INSERT INTO case_note(card_number, staff_number, content, test_id) VALUES(:card_number, :staff_number, :observation, :test_id)");
				$arrInst= array(':card_number'=>$card_number, ':staff_number'=>$staff_number, ':observation'=>$observation, ':test_id'=>$test_id);
				if(!empty($inserttocasenote->execute($arrInst))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updatePatientCaseNote($case_note_id, $card_number, $observation, $test_id)
		{
			try {
				$updateCaseNote = $this->db->prepare("UPDATE case_note SET card_number=:card_number, content=:observation, test_id=:test_id WHERE case_note_id=:case_note_id");
				$arrUpCase =array(':card_number'=>$card_number, ':observation'=>$observation, ':test_id'=>$test_id, ':case_note_id'=>$case_note_id);
				if(!empty($updateCaseNote->execute($arrUpCase))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deletePatientCaseNote($case_note_id)
		{
			try {
				$deleteCaseNote = $this->db->prepare("DELETE FROM case_note WHERE case_note_id=:case_note_id");
				$arrDelCase = array(':case_note_id'=>$case_note_id);
				if(!empty($deleteCaseNote->execute($arrDelCase))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getPatientCaseNoteId($case_note_id)
		{
			try {
				$getNote = $this->db->prepare("SELECT * FROM case_note WHERE case_note_id=:case_note_id");
				$arrGetNo = array(':case_note_id'=>$case_note_id);
				$getNote->execute($arrGetNo);
				$rolls = $getNote->fetch();
				return $rolls;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function recommendingTestForPatient($staff_number, $card_number, $specification, $test_id)
		{
			try {
				$addPatTest = $this->db->prepare('INSERT INTO patient_test(staff_number, card_number, specification, test_id)VALUES(:staff_number, :card_number, :specification, :test_id)');
				$arrPatTest = array(':staff_number'=>$staff_number, ':card_number'=>$card_number, ':specification'=>$specification, ':test_id'=>$test_id);
				if(!empty($addPatTest->execute($arrPatTest))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateRecoTest($patient_test_id, $staff_number, $card_number, $specification, $test_id)
		{
			try {
				$updatePatTest = $this->db->prepare("UPDATE patient_test SET staff_number=:staff_number, card_number=:card_number, specification=:specification, test_id=:test_id WHERE patient_test_id=:patient_test_id");
				$arrUpPatTes = array(':staff_number'=>$staff_number, ':card_number'=>$card_number, 
					':specification'=>$specification, ':test_id'=>$test_id, ':patient_test_id'=>$patient_test_id);
				if(!empty($updatePatTest->execute($arrUpPatTes))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteRecommendedTest($patient_test_id)
		{
			try {
				$deleteTest = $this->db->prepare("DELETE FROM patient_test WHERE patient_test_id=:patient_test_id");
				$arrDelTest = array(':patient_test_id'=>$patient_test_id);
				if(!empty($deleteTest->execute($arrDelTest))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getingPatStaTest($card_number, $staff_number)
		{
			try {
				$gettingPatStaTest = $this->db->prepare("SELECT * FROM patient_test WHERE card_number=:card_number AND staff_number=:staff_number");
				$arrFot = array(':card_number'=>$card_number, ':staff_number'=>$staff_number);
				$gettingPatStaTest->execute($arrFot);
				$folo = $gettingPatStaTest->fetch();
				return $folo;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getingPatIDTest($patient_test_id)
		{
			try {
				$gettingPatStaTestID = $this->db->prepare("SELECT * FROM patient_test WHERE patient_test_id=:patient_test_id");
				$arrFotID = array(':patient_test_id'=>$patient_test_id);
				$gettingPatStaTestID->execute($arrFotID);
				$foloId = $gettingPatStaTestID->fetch();
				return $foloId;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingStaffTest($staff_number)
		{
			try {
				$gettingStaTest = $this->db->prepare("SELECT * FROM patient_test WHERE staff_number=:staff_number");
				$arrSFot = array(':staff_number'=>$staff_number);
				$gettingStaTest->execute($arrSFot);
				$star = $gettingStaTest->fetch();
				return $star;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingPatientTest($card_number)
		{
			try {
				$gettingPatTest = $this->db->prepare("SELECT * FROM patient_test WHERE card_number=:card_number");
				$arrSDFot = array(':card_number'=>$card_number);
				$gettingPatTest->execute($arrSDFot);
				$starP = $gettingPatTest->fetch();
				return $starP;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function patientHospitalCard($card_number, $patient_name, $sex, $date_birth, $address, 
			$card_category_id)
		{
			try {
				$addHosCard = $this->db->prepare("INSERT INTO hospital_card(card_number, patient_name, sex, date_birth, address, card_category_id)VALUES(:card_number, :patient_name, :sex, :date_birth, :address, :card_category_id)");
				$arrCard = array(':card_number'=>$card_number, ':patient_name'=>$patient_name, ':sex'=>$sex, ':date_birth'=>$date_birth, ':address'=>$address, ':card_category_id'=>$card_category_id);
				if(!empty($addHosCard->execute($arrCard))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingPatientCard($card_number)
		{
			try {
				$getCard = $this->db->prepare("SELECT * FROM hospital_card WHERE card_number=:card_number");
				$arrgetCard = array(':card_number'=>$card_number);
				$getCard->execute($arrgetCard);
				$love = $getCard->fetch();
				return $love;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingPreVPatientCard($prev_card)
		{
			try {
				$getCard = $this->db->prepare("SELECT * FROM hospital_card WHERE card_number=:prev_card");
				$arrgetCard = array(':prev_card'=>$prev_card);
				$getCard->execute($arrgetCard);
				$love = $getCard->fetch();
				return $love;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkingPatientCard($card_number)
		{
			try {
				$getCard = $this->db->prepare("SELECT * FROM hospital_card WHERE card_number=:card_number");
				$arrgetCard = array(':card_number'=>$card_number);
				$getCard->execute($arrgetCard);
				if($getCard->rowCount()==0){
					return true;
				}
				else{
					return false;
				}
				
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateHospitalCard($card_number, $patient_name, $sex, $date_birth, $address, $card_category_id)
		{
			try {
				$updateCard = $this->db->prepare("UPDATE hospital_card SET patient_name=:patient_name, sex=:sex, date_birth=:date_birth, address=:address, card_category_id=:card_category_id WHERE card_number=:card_number");
				$arrUpCard = array(':card_number'=>$card_number, ':patient_name'=>$patient_name, ':sex'=>$sex, ':date_birth'=>$date_birth, ':address'=>$address, ':card_category_id'=>$card_category_id);
				if(!empty($updateCard->execute($arrUpCard))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteHospitalCard($card_number)
		{
			try {
				$deleteCard = $this->db->prepare("DELETE FROM hospital_card WHERE card_number=:card_number");
				$arrDelcard = array(':card_number'=>$card_number);
				if(!empty($deleteCard->execute($arrDelcard))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingCardCategory($card_category_id)
		{
			try {
				$getCardCategory = $this->db->prepare("SELECT * FROM card_category WHERE card_category_id=:card_category_id");
				$arrGetCAte = array(':card_category_id'=>$card_category_id);
				$getCardCategory->execute($arrGetCAte);
				$ope = $getCardCategory->fetch();
				return $ope;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function addingHospitalPatient($patient_number, $patient_name, $sex, $date_birth, $ward_id, $bed_space, $patient_condition, $causes_admission, $reaction_drugs, 
			$next_kin_name, $next_kin_phone, $next_kin_adress)
		{
			try {
				$addingPatient = $this->db->prepare("INSERT INTO patient(patient_number, patient_name, sex, date_birth, ward_id, bed_space, patient_condition, causes_admission, reaction_drugs, next_kin_name, next_kin_phone, next_kin_adress)VALUES(:patient_number, :patient_name, :sex, :date_birth, :ward_id, :bed_space, :patient_condition, :causes_admission, :reaction_drugs, :next_kin_name, :next_kin_phone, :next_kin_adress)");
				$arrAddPatient= array(':patient_number'=>$patient_number, ':patient_name'=>$patient_name, ':sex'=>$sex, ':date_birth'=>$date_birth, ':ward_id'=>$ward_id, 
					':bed_space'=>$bed_space, ';patient_condition'=>$patient_condition, 
					':causes_admission'=>$causes_admission, ':reaction_drugs'=>$reaction_drugs, 
					':next_kin_name'=>$next_kin_name, ':next_kin_phone'=>$next_kin_phone, 
					':next_kin_adress'=>$next_kin_adress);
				if(!empty($addingPatient->execute($arrAddPatient))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingPatientInformation($patient_number){
			try {
				$getPatient = $this->db->prepare("SELECT * FROM patient WHERE patient_number=:patient_condition");
				$arrGetPatient = array(':patient_number'=>$patient_number);
				$getPatient->execute($arrGetPatient);
				$royal = $getPatient->fetch();
				return $royal;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updatePatientDetails($patient_number, $patient_name, $sex, $date_birth, $ward_id, $bed_space, $patient_condition, $causes_admission, $reaction_drugs, 
			$next_kin_name, $next_kin_phone, $next_kin_adress)
		{
			try {
				$updatingPatientDetails = $this->db->prepare("UPDATE patient SET patient_name=:patient_name, sex=:sex, date_birth=:date_birth, ward_id=:ward_id, bed_space=:bed_space, patient_condition=:patient_condition, causes_admission=:causes_admission, reaction_drugs=:reaction_drugs, next_kin_name=:next_kin_name, next_kin_phone=:next_kin_phone, next_kin_adress=:next_kin_adress");
				$arrUpPatient= array(':patient_number'=>$patient_number, ':patient_name'=>$patient_name, ':sex'=>$sex, ':date_birth'=>$date_birth, ':ward_id'=>$ward_id, 
					':bed_space'=>$bed_space, ';patient_condition'=>$patient_condition, 
					':causes_admission'=>$causes_admission, ':reaction_drugs'=>$reaction_drugs, 
					':next_kin_name'=>$next_kin_name, ':next_kin_phone'=>$next_kin_phone, 
					':next_kin_adress'=>$next_kin_adress);
				if(!empty($updatingPatientDetails->execute($arrUpPatient))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deletePatientDetails($patient_number)
		{
			try {
				$deletePatient = $this->db->prepare("DELETE FROM patient WHERE patient_number=:patient_number");
				$arrDle = array(':patient_number'=>$patient_number);
				if(!empty($deletePatient->execute($arrDle))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

	}

	class patientAppointTest extends hospitalUnits {
		function __construct($db){
			parent:: __construct($db);
		}

		public function checkExistingAppointment($patient_number, $dateof_appointment)
		{
			try {
				$checkAppoint = $this->db->prepare("SELECT * FROM patient_appointment WHERE patient_number=:patient_number AND dateof_appointment=:dateof_appointment");
				$arrchekcApp = array(':patient_number'=>$patient_number, ':dateof_appointment'=>$dateof_appointment);
				$checkAppoint->execute($arrchekcApp);
				if($checkAppoint->rowCount()>0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function addingPatientAppointment($staff_number, $patient_number, $dateof_appointment, $unit_id)
		{
			try{
				$addingAppointment = $this->db->prepare("INSERT INTO patient_appointment(staff_number, patient_number, dateof_appointment, unit_id)VALUES(:staff_number, :patient_number, :dateof_appointment, :unit_id)");
				$arrAddAppintment = array(':staff_number'=>$staff_number, ':patient_number'=>$patient_number, ':dateof_appointment'=>$dateof_appointment, ':unit_id'=>$unit_id);
				if(!empty($addingAppointment->execute($arrAddAppintment))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getttingPatientAppointment($patient_number)
		{
			try {
				$getAppointment = $this->db->prepare("SELECT * FROM patient_appointment WHERE patient_number=:patient_number");
				$arrApn = array(':patient_number'=>$patient_number);
				$getAppointment->execute($arrApn);
				$king = $getAppointment->fetch();
				return $king;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function getttingPatientAppointmentID($appointment_id)
		{
			try {
				$getAppointment = $this->db->prepare("SELECT * FROM patient_appointment WHERE appointment_id=:appointment_id");
				$arrApn = array(':appointment_id'=>$appointment_id);
				$getAppointment->execute($arrApn);
				$king = $getAppointment->fetch();
				return $king;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updatePatientAppointment($appointment_id, $staff_number, $patient_number, $dateof_appointment, $unit_id)
		{
			try {
				$updateAppoinment = $this->db->prepare("UPDATE patient_appointment SET staff_number=:staff_number, dateof_appointment=:dateof_appointment, patient_number=:patient_number, unit_id=:unit_id WHERE appointment_id=:appointment_id");
				$arrUpApp = array(':staff_number'=>$staff_number, ':dateof_appointment'=>$dateof_appointment, ':patient_number'=>$patient_number, ':appointment_id'=>$appointment_id, ':unit_id'=>$unit_id);
				if(!empty($updateAppoinment->execute($arrUpApp))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteAppointment($patient_number, $appointment_id)
		{
			try {
				$delAppoit = $this->db->prepare("DELETE FROM patient_appointment WHERE patient_number=:patient_number AND appointment_id=:appointment_id");
				$arrDelApp = array(':patient_number'=>$patient_number, ':appointment_id'=>$appointment_id);
				if(!empty($delAppoit->execute($arrDelApp))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function seePatientDischarge($patient_number)
		{
			try {
				$seeDischarge = $this->db->prepare("SELECT * FROM patient_discharge WHERE patient_number=:patient_number");
				$arrSeeDis = array(':patient_number'=>$patient_number);
				$seeDischarge->execute($arrSeeDis);
				$piro = $seeDischarge->fetch();
				return $piro;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkingPatientDischarge($patient_number)
		{
			try {
				$checkDischarge = $this->db->prepare("SELECT * FROM patient_discharge WHERE patient_number=:patient_number");
				$arrcheDis = array(':patient_number'=>$patient_number);
				$checkDischarge->execute($arrcheDis);
				if($checkDischarge->rowCount()==0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingPatientTransfer($patient_number)
		{
			try {
				$getTest = $this->db->prepare("SELECT * FROM patient_transfer WHERE patient_number=:patient_number");
				$arrTest = array(':patient_number'=>$patient_number);
				$getTest->execute($arrTest);
				$seeTest = $getTest->fetch();
				return $seeTest;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkPatientTransfer($patient_number)
		{
			try {
				$checkTtransfer = $this->db->prepare("SELECT * FROM patient_transfer WHERE patient_number=:patient_number");
				$arrCheckTest = array(':patient_number'=>$patient_number);
				$checkTtransfer->execute($arrCheckTest);
				if($checkTtransfer->rowCount()==0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}
	}