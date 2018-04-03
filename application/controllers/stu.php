<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stu extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		// log_message('info','$stu_id'.$data['stu_id']);	
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		log_message('info','data '.print_r($data,TRUE));
			$this->load->view('stuDashboardView',$data);
		}else{
			$this->load->view('stuLoginView');
		} 
	}
	public function createStu() {
		$rsp = array();
		$newStuData = array();
		$newStuData = $this->input->post(NULL, TRUE);
		//$this->input->post(array('agnUsername', 'agnPassword', 'agn_phone', 'agn_city', 'agn_country', 'agn_region'));
		//log_message('info','post'.$this->input->post('agnUsername'));
		$rsp['status'] = $this->data->insertStu($newStuData);
		if ($rsp['status'] == TRUE){
			$rsp['msg'] =  "Student Registered";
			$rsp['statusID'] = 1;
			$rsp['data'] = NULL;
		}elseif($rsp['status'] == FALSE)
		{
			$rsp['status'] = FALSE;
			$rsp['msg'] =  "Registration Failed";
			$rsp['statusID'] = 0;
			$rsp['data'] = NULL;
		}
		echo json_encode ($rsp);
	}
	public function editStu() {
		$data = array();
		$rsp = array();
		$updateStuData = array();
		$updateStuData = $this->input->post(NULL, TRUE);
		//$this->input->post(array('agnUsername', 'agnPassword', 'agn_phone', 'agn_city', 'agn_country', 'agn_region'));
		//log_message('info','post'.$this->input->post('agnUsername'));
		$rsp['status'] = $this->data->updateStu($updateStuData);
		if ($rsp['status'] == TRUE){
			$rsp['msg'] =  "Student Updated";
			$rsp['statusID'] = 1;
			$rsp['data'] = NULL;
		}elseif($rsp['status'] == FALSE)
		{
			$rsp['status'] = FALSE;
			$rsp['msg'] =  "Update Failed";
			$rsp['statusID'] = 0;
			$rsp['data'] = NULL;
		}
		echo json_encode ($rsp);
	}
	public function checkStuUsername() {
		$stuUsername = array();
		$rsp = array();
		$stuUsername = $this->input->post('stuUsername');
		//$this->input->post(array('agnUsername', 'agnPassword', 'agn_phone', 'agn_city', 'agn_country', 'agn_region'));
		log_message('info','post'.$stuUsername);
		$rsp['status'] = $this->data->checkStuUsernameDb($stuUsername);
		$rsp['stuUsername'] = $stuUsername;
		echo json_encode ($rsp);
	}
	public function authStu() {
		$rsp = array();
		$authStuData = array();
		$authStuData = $this->input->post(NULL, TRUE);
		log_message('info',print_r($authStuData,TRUE));		
		$rsp = $this->data->authStuDb($authStuData);
		if ($rsp['authStuStatus'] == TRUE){
			$rsp['status'] = TRUE;
			$rsp['msg'] =  "Student Valid";
			$rsp['statusID'] = 010;
			$rsp['data'] = NULL;

			$newdata = array(
				'stu_id'  => $rsp['stu_id'],
				'logType' => 'stu',
				'loggedIn' => TRUE
			);
			$this->session->set_userdata($newdata);

		}elseif($rsp['authStuStatus'] == FALSE){
			$rsp['status'] = FALSE;
			$rsp['msg'] =  "Sorry, this student doesn't exist";
			$rsp['statusID'] = 000;
			$rsp['data'] = NULL;
		}
		echo json_encode ($rsp);
	}
	public function profileComplete(){
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
			$data = $this->session->all_userdata();
			$perc = $this->calc->profileCompleteDb($data['stu_id']);
			echo json_encode ($perc);
		}
	}
	public function profile() {
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		log_message('info','data '.print_r($data,TRUE));
			$this->load->view('stuProfileView',$data);
		}else{
			$this->load->view('stuLoginView');
		} 
	}	
	// public function getStuById() {
	// 	if ($this->session->userdata('loggedIn') !== FALSE && 
	// 		$this->session->userdata('logType') == 'stu') {
	// 	$rsp = array();
	// 	$ = $this->input->post(NULL, TRUE);
	// 	log_message('info',print_r($authStuData,TRUE));		
	// 	$rsp = $this->data->authStuDb($authStuData);
	// 	if ($rsp['authStuStatus'] == TRUE){
	// 		$rsp['status'] = TRUE;
	// 		$rsp['msg'] =  "Student Valid";
	// 		$rsp['statusID'] = 010;
	// 		$rsp['data'] = NULL;

	// 		$newdata = array(
	// 			'stu_id'  => $rsp['stu_id'],
	// 			'logType' => 'stu',
	// 			'loggedIn' => TRUE
	// 		);
	// 		$this->session->set_userdata($newdata);

	// 	}elseif($rsp['authStuStatus'] == FALSE){
	// 		$rsp['status'] = FALSE;
	// 		$rsp['msg'] =  "Sorry, this student doesn't exist";
	// 		$rsp['statusID'] = 000;
	// 		$rsp['data'] = NULL;
	// 	}
	// 	echo json_encode ($rsp);
	// }
	public function signup() {
		$data = array();
		// $this->load->view('agentDashboardView',$data);
		if ($this->session->userdata('loggedIn') !== FALSE) {
		$data = $this->session->all_userdata();
		log_message('info',print_r($data,TRUE));
			$this->load->view('agentDashboardView',$data);
		}else{
			$this->load->view('stuSignupView');
		} 
	}
	public function getAllNews() {
		$rsp = array();
		$newsListArray = array();
            $rsp['status'] = FALSE;
            $rsp['msg'] =  "No Data Fetched";
            $rsp['statusID'] = 0;
            $rsp['data'] = NULL;
		$newsListArray = $this->data->getAllNewsDb();
        if ($newsListArray){
			$rsp['status'] = TRUE;
            $rsp['msg'] =  "Data Fetched";
            $rsp['statusID'] = 1;
            $rsp['data'] = $newsListArray;
		}
		echo json_encode ($rsp);
    } 
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url() . 'stu','refresh');
		}


	//Competition Part
	public function stuCompet()
	{
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		log_message('info','data '.print_r($data,TRUE));
			$this->load->view('stuCompetitionView',$data);
		}else{
			$this->load->view('stuLoginView');
		} 
	}
	public function getQuesType()
	{
		$rsp = array();
		$quesTypeArray = array();
            $rsp['status'] = FALSE;
            $rsp['msg'] =  "No Data Fetched";
            $rsp['statusID'] = 0;
            $rsp['data'] = NULL;
		$quesTypeArray = $this->data->getQuesTypeDb();
        if ($quesTypeArray){
			$rsp['status'] = TRUE;
            $rsp['msg'] =  "Data Fetched";
            $rsp['statusID'] = 1;
            $rsp['data'] = $quesTypeArray;
		}
		echo json_encode ($rsp);
	}
////////////////////////////////////////////////////////JUMBLED PART/////////////////////////////////////////////////////////	
	// public function jumble()
	// {
	// 	if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
	// 	$data = $this->session->all_userdata();
	// 	$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
	// 	log_message('info','data '.print_r($data,TRUE));
	// 	$this->load->view('stuJumlQuesView',$data);
	// 	}else{
	// 		$this->load->view('stuLoginView');
	// 	} 
	// }
	// public function stuJumbledView()
	// {
	// 	$data = array();
	// 	if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
	// 	$data = $this->session->all_userdata();
	// 	$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
	// 	log_message('info','data '.print_r($data,TRUE));
	// 	$this->load->view('stuJumbledView',$data);
	// 	}else{
	// 		$this->load->view('stuLoginView');
	// 	} 
	// }
	public function allQuesGet($ext_id)
	{
		$rsp = array();
		$jumbGetArray = array();
            $rsp['status'] = FALSE;
            $rsp['msg'] =  "No Data Fetched";
            $rsp['statusID'] = 0;
            $rsp['data'] = NULL;
		$jumbGetArray = $this->data->getQuesTypeDbById($ext_id);
        if ($jumbGetArray){
			$rsp['status'] = TRUE;
            $rsp['msg'] =  "Data Fetched";
            $rsp['statusID'] = 1;
            $rsp['data'] = $jumbGetArray;
		}
		echo json_encode ($rsp);
	}

	public function jumblQues()
	{
		$rsp = array();
		$jumblQuesArray = array();
            $rsp['status'] = FALSE;
            $rsp['msg'] =  "No Data Fetched";
            $rsp['statusID'] = 0;
            $rsp['data'] = NULL;
		$jumblQuesArray = $this->data->jumlQuesDb();
        if ($jumblQuesArray){
			$rsp['status'] = TRUE;
            $rsp['msg'] =  "Data Fetched";
            $rsp['statusID'] = 1;
            $rsp['data'] = $jumblQuesArray;
		}
		echo json_encode ($rsp);

	}	
	public function createInstance($ext_id)
	{	
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		$stu_id = $data['stu_id'];
		$instReturn = $this->data->createInstanceDb($ext_id, $stu_id);
		log_message('info','instReturn'.print_r($instReturn,TRUE));
			if($instReturn['status'] === TRUE){

                $this->whichQues($ext_id, $instReturn['inst_id']);
			}
		}else{
			$this->load->view('stuLoginView');			
		}

	}
	public function whichQues($ext_id, $inst_id)
	{	
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && 
			$this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		log_message('info','$ext_id '.$ext_id);	
		log_message('info','$inst_id '.$inst_id);	
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		$data['ext_id']=$ext_id;		
			switch ($ext_id) {
				case 1:
					$this->load->view('stuJumlQuesView', $data);
					break;
				case 2:
					$this->load->view('stuDictationQuesView', $data);
					break;
				case 3:
					$this->load->view('stuIdentQuesView', $data);
					break;
			}
		}else{
			$this->load->view('stuLoginView');
		}
	}
	public function whichPractQues()
	{	
		$newPractData = $this->input->post(NULL, TRUE);
		log_message('info','newPractData '.print_r($newPractData,TRUE));
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && 
			$this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();	
		// log_message('info','$ext_id '.$ext_id);	
		// log_message('info','$inst_id '.$inst_id);	
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		$data['ext_id']=$newPractData['ext_id'];
			switch ($newPractData['ext_id']) {
				case 1:
					$data['quests']=$this->data->jumPractQuesDb($newPractData); 
					//$data['timeLimit'] = $newPractData['timeLimit'];
					log_message('info','data for hint check '.print_r($data,TRUE));
					$this->load->view('practices/stuJumlPractQuesView',$data);
					break;
				case 2:
					$data['quests']=$this->data->dictPractQuesDb($newPractData); 
					log_message('info','data '.print_r($data,TRUE));
					$this->load->view('practices/stuDictPractQuesView',$data);
					break;
				case 3:
				$data['quests']=$this->data->identPractQuesDb($newPractData); 
				log_message('info','data '.print_r($data,TRUE));
					$this->load->view('practices/stuIdentPractQuesView',$data);
					break;
			}
		}else{
			$this->load->view('stuLoginView');
		}
	}
	public function jumblRes()
	{
		$rsp = array();
		$jumblResArray = array();
            $rsp['status'] = FALSE;
            $rsp['msg'] =  "No Data Fetched";
            $rsp['statusID'] = 0;
            $rsp['data'] = NULL;
		$jumblResArray = $this->data->jumlResDb();
        if ($jumblResArray){
			$rsp['status'] = TRUE;
            $rsp['msg'] =  "Data Fetched";
            $rsp['statusID'] = 1;
            $rsp['data'] = $jumblResArray;
		}
		echo json_encode ($rsp);
	}
	public function jumblResCheck($ext_id)
	{	
		$rsp = array();
		$checkData = array();

		$resultData = array();
		$rsp['status'] = FALSE;
		$rsp['msg'] =  "No Data Fetched";
		$rsp['statusID'] = 0;
		$rsp['data'] = NULL;

		$checkData = $this->input->post(NULL, TRUE);

		if($checkData == '' || $checkData == NULL){
			echo json_encode ($rsp);
		}else{

			$resultData= $this->data->jumblResCheckDb($checkData);
			log_message('info','resultData in STU '.print_r($resultData,TRUE));
			$quesTypeArray = $this->data->getQuesTypeDbById($ext_id);
			$jumbTotalMark = $this->calc->resultCalc($resultData, $quesTypeArray);
			//log_message('info','$jumbTotalMark my ttest '.$jumbTotalMark);
			$jumbResults['resultData'] = $resultData;
			//log_message('info','jumbResults my test'.print_r($jumbResults,TRUE));
			$jumbResults['jumbTotalMark'] = $jumbTotalMark;		
			// log_message('info','resultJumb'.print_r($resultJumb,TRUE));
			$jumbResults['jumbSelQues'] = $this->data->getJumPractQuesDb($checkData);
			if ($jumbResults){
				$rsp['status'] = TRUE;
				$rsp['msg'] =  "Result Fetched";
				$rsp['statusID'] = 1;
				$rsp['data'] = $jumbResults;
			}
		echo json_encode ($rsp);
		}
		/*$rsp = array();
		$checkData = array();
		$checkData = $this->input->post(NULL, TRUE);
		//$this->input->post(array('agnUsername', 'agnPassword', 'agn_phone', 'agn_city', 'agn_country', 'agn_region'));
		
		log_message('info','checkData '.print_r($checkData,TRUE));
		$data = $this->data->jumblResCheckDb($checkData);
		if ($rsp['status'] == TRUE){
			$rsp['msg'] =  "Student Registered";
			$rsp['statusID'] = 1;
			$rsp['data'] = NULL;
		}elseif($rsp['status'] == FALSE)
		{
			$rsp['status'] = FALSE;
			$rsp['msg'] =  "Registration Failed";
			$rsp['statusID'] = 0;
			$rsp['data'] = NULL;
		}
		echo json_encode ($rsp);*/
	}
	////////////////////////////////////////JUMBLED END/////////////////////////////////////////////
	///////////////////////Dictation////////////////////////////////////////////////
	public function dictResCheck($ext_id)
	{	
		$rsp = array();
		$checkData = array();

		$resultData = array();
		$rsp['status'] = FALSE;
		$rsp['msg'] =  "No Data Fetched";
		$rsp['statusID'] = 0;
		$rsp['data'] = NULL;

		$checkData = $this->input->post(NULL, TRUE);
		log_message('info','checkData in STU '.print_r($checkData,TRUE));
		if($checkData == '' || $checkData == NULL){
			echo json_encode ($rsp);
		}else{

			$resultData= $this->data->dictResCheckDb($checkData);
			log_message('info','resultData in STU '.print_r($resultData,TRUE));
			$quesTypeArray = $this->data->getQuesTypeDbById($ext_id);
			$dictTotalMark = $this->calc->resultCalc($resultData, $quesTypeArray);
			log_message('info','$dictTotalMark my ttest '.$dictTotalMark);
			$dictResults['resultData'] = $resultData;
			log_message('info','idnResults my test'.print_r($dictResults,TRUE));
			$dictResults['dictTotalMark'] = $dictTotalMark;		
			// log_message('info','resultJumb'.print_r($resultJumb,TRUE));
			$dictResults['dictSelQues'] = $this->data->getDictPractQuesDb($checkData);
			if ($dictResults){
				$rsp['status'] = TRUE;
				$rsp['msg'] =  "Result Fetched";
				$rsp['statusID'] = 1;
				$rsp['data'] = $dictResults;
			}
		echo json_encode ($rsp);
		}
	}
	///////////////////////Indentify////////////////////////////////////////////////
	public function idnResCheck($ext_id)
	{	
		$rsp = array();
		$checkData = array();

		$resultData = array();
		$rsp['status'] = FALSE;
		$rsp['msg'] =  "No Data Fetched";
		$rsp['statusID'] = 0;
		$rsp['data'] = NULL;

		$checkData = $this->input->post(NULL, TRUE);
		log_message('info','checkData in STU '.print_r($checkData,TRUE));
		if($checkData == '' || $checkData == NULL){
			echo json_encode ($rsp);
		}else{

			$resultData= $this->data->idnResCheckDb($checkData);
			log_message('info','resultData in STU '.print_r($resultData,TRUE));
			$quesTypeArray = $this->data->getQuesTypeDbById($ext_id);
			$idnTotalMark = $this->calc->resultCalc($resultData, $quesTypeArray);
			log_message('info','$idnTotalMark my ttest '.$idnTotalMark);
			$idnResults['resultData'] = $resultData;
			log_message('info','idnResults my test'.print_r($idnResults,TRUE));
			$idnResults['idnTotalMark'] = $idnTotalMark;		
			// log_message('info','resultJumb'.print_r($resultJumb,TRUE));
			$idnResults['idnSelQues'] = $this->data->getIdnPractQuesDb($checkData);
			if ($idnResults){
				$rsp['status'] = TRUE;
				$rsp['msg'] =  "Result Fetched";
				$rsp['statusID'] = 1;
				$rsp['data'] = $idnResults;
			}
		echo json_encode ($rsp);
		}
		/*$rsp = array();
		$checkData = array();
		$checkData = $this->input->post(NULL, TRUE);
		//$this->input->post(array('agnUsername', 'agnPassword', 'agn_phone', 'agn_city', 'agn_country', 'agn_region'));
		
		log_message('info','checkData '.print_r($checkData,TRUE));
		$data = $this->data->jumblResCheckDb($checkData);
		if ($rsp['status'] == TRUE){
			$rsp['msg'] =  "Student Registered";
			$rsp['statusID'] = 1;
			$rsp['data'] = NULL;
		}elseif($rsp['status'] == FALSE)
		{
			$rsp['status'] = FALSE;
			$rsp['msg'] =  "Registration Failed";
			$rsp['statusID'] = 0;
			$rsp['data'] = NULL;
		}
		echo json_encode ($rsp);*/
	}
	///~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~/////
	///////////////////////////////////Online Practice///////////////////////////////////////////////
	public function stuPractice()
	{
		$data = array();
		if ($this->session->userdata('loggedIn') !== FALSE && $this->session->userdata('logType') == 'stu') {
		$data = $this->session->all_userdata();
		$data['user_data'] = $this->data->getStuByIdDb($data['stu_id']);
		log_message('info','data '.print_r($data,TRUE));
			$this->load->view('practices/stuOnlinePracticeView',$data);
		}else{
			$this->load->view('stuLoginView');
		} 
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */