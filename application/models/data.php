<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

    function insertStu($newStuData){
        $stuData = array(
            'stu_fullname' => $newStuData['stuFullname'],
            'stu_username' => $newStuData['stuUsername'],
            'stu_password' => $newStuData['stuPassword'],
            'stu_email' => $newStuData['stuEmail'],
            'stu_modified_date' => date('y-m-d')
        );
        // log_message('info',print_r($data,TRUE));
        $this->db->insert('sb_stu', $stuData);
        return ($this->db->affected_rows() == 1) ? true : false;        
    }    
    function checkStuUsernameDb($stuUsername) {
        $this->db->select('*');
        $this->db->from ('sb_stu');
        $this->db->where('stu_username',$stuUsername);
        $query = $this->db->get();
        log_message('info','checkStuUsernameDb '.$this->db->last_query());
        if ($query->num_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function updateStu($updateStuData) {
        $data = array(
              'stu_fullname' => $updateStuData['stuFullname'],
              'stu_username' => $updateStuData['stuUsername'],
              'stu_email' => $updateStuData['stuEmail'],
              'stu_dob' => $updateStuData['stuDob'],
              'stu_gender' => $updateStuData['stuGender'],
              'stu_photo' => $updateStuData['stuPhoto'],
              'stu_fathername' => $updateStuData['stuFathername'],
              'stu_mothername' => $updateStuData['stuMothername'],
              'stu_commadd' => $updateStuData['stuCommadd'],
              'stu_commadd1' => $updateStuData['stuCommadd1'],
              'stu_commadd2' => $updateStuData['stuCommadd2'],          
              'stu_capincode' => $updateStuData['stuCapincode'],
              'stu_permadd' => $updateStuData['stuPermadd'],
              'stu_permadd1' => $updateStuData['stuPermadd1'],
              'stu_permadd2' => $updateStuData['stuPermadd2'], 
              'stu_papincode' => $updateStuData['stuPapincode'], 
              'stu_modified_date' => date('y-m-d'),
              'stu_phone' => $updateStuData['stuPhone']
        );

        $this->db->where('stu_id', $updateStuData['stu_id']);
        $this->db->update('sb_stu', $data);
        // log_message('info','updateStuData '.$this->db->last_query());
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
      }  
    function authStuDb($authStuData = NULL){
        // $authStuData = array();
        $stuUsername = $authStuData['stuUsername'];
        $stuEmail = $authStuData['stuEmail'];
        $this->db->select('*');
        $this->db->from ('sb_stu');
        $this->db->where('stu_password =', $authStuData['stuPassword']);
        $this->db->where('stu_profstatus =', '1');
        $this->db->where('stu_username =', $stuUsername);
        $this->db->or_where('stu_email =', $stuEmail); 
        $query = $this->db->get ();
        log_message('info','authStuDb '.$this->db->last_query());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $userData['stu_id'] = $row -> stu_id;
                $userData['authStuStatus'] = TRUE;
            }
            }else{
                $userData['authStuStatus'] = FALSE;
            }
            return $userData;
    }  
    function getStuByIdDb($stu_id){
        $userData = array();
        $this->db->select('*');
        $this->db->from ('sb_stu');
        $this->db->where('stu_id', $stu_id);
        $this->db->where('stu_profstatus', '1');
        $query = $this->db->get ();
        log_message('info','getStuByIdDb '.$this->db->last_query());
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $userData['stu_id'] = $row -> stu_id;
            $userData['stuFullname'] = $row -> stu_fullname;
            $userData['stuUsername'] = $row -> stu_username;
            $userData['stuEmail'] = $row -> stu_email;
            $userData['stuDob'] = $row -> stu_dob;
            $userData['stuGender'] = $row -> stu_gender;
            $userData['stuPhoto'] = $row -> stu_photo;
            $userData['stuFathername'] = $row -> stu_fathername;
            $userData['stuMothername'] = $row -> stu_mothername;
            $userData['stuCommadd'] = $row -> stu_commadd;
            $userData['stuCommadd1'] = $row -> stu_commadd1;            
            $userData['stuCommadd2'] = $row -> stu_commadd2;
            $userData['stuCapincode'] = $row -> stu_capincode;
            $userData['stuPermadd'] = $row -> stu_permadd;            
            $userData['stuPermadd1'] = $row -> stu_permadd1;      
            $userData['stuPermadd2'] = $row -> stu_permadd2;
            $userData['stuPapincode'] = $row -> stu_papincode;
            $userData['stu_created_date'] = $row -> stu_created_date;
            $userData['stu_modified_date'] = $row -> stu_modified_date;
            $userData['stuPhone'] = $row -> stu_phone;         
            $userData['stu_status'] = $row -> stu_status;
            $userData['stu_profstatus'] = $row -> stu_profstatus;
        } 
        }else{
            $userData = 'No Data';
        }
        return $userData;
    }  
    function getAllNewsDb(){
        $newsList = array();
        $newsListArray = array();
        $this->db->select('*');
        $this->db->from ('sb_stu_news');
        $this->db->where('stu_news_status', '1');
        $this->db->order_by("stu_news_modified_date", "DESC");
        $query = $this->db->get ();
        log_message('info','getAllNewsDb '.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result () as $news){
            $newsList['stu_news_id'] = "No Data";
            $newsList['stuNewsTitle'] = "No Data";
            $newsList['stuNewsContent'] = "No Data";
            $newsList['stuNewsCreatedDate'] = "No Data";
            $newsList['stuNewsModifiedDate'] = "No Data";
            $newsList['stuNewsStatus'] = "No Data";

            array_push ($newsListArray, $newsList);
            }
            return $newsListArray;
        }else{
            foreach ($query->result () as $news){

            $newsList['stu_news_id'] = $news->stu_news_id;
            $newsList['stuNewsTitle'] = $news->stu_news_title;
            $newsList['stuNewsContent'] = $news->stu_news_content;
            $newsList['stuNewsCreatedDate'] = $news->stu_news_created_date;
            $newsList['stuNewsModifiedDate'] = $news->stu_news_modified_date;
            $newsList['stuNewsStatus'] = $news->stu_news_status; 

            array_push ($newsListArray, $newsList);
            }
            //  log_message('info',"ddddd");
            // log_message('info','articleDataList '.$this->db->last_query());
        //  log_message('info',print_r($promoListDataList,TRUE));
            return $newsListArray;
        }
 
    } 
    function createInstanceDb($ext_id, $stu_id){
        $instData = array(
            'stu_id' => $stu_id,
            'ext_id' => $ext_id,
            'inst_date_added' => date('y-m-d'),
            'inst_date_modified' => date('y-m-d'),
            'inst_status' => '0'
        );
         log_message('info',print_r($instData,TRUE));
        $this->db->insert('sb_stu_exam_inst', $instData);
        $instReturn['inst_id'] = $this->db->insert_id();
        if ($this->db->affected_rows() == 1){
            $instReturn['status'] = TRUE;
        }else{
            $instReturn['status'] = FALSE;
        }
        return $instReturn;
    }   
    function getQuesTypeDb()
    {
        $typeList = array();
        $quesTypeArray = array();
        $this->db->select('*');
        $this->db->from ('sb_stu_exam_type');
        $this->db->where('ext_status', '1');
        $query = $this->db->get ();
        log_message('info','getQuesTypeDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result () as $types){
            $typeList['ext_id'] = "No Data";
            $typeList['ext_type'] = "No Data";
            $typeList['ext_status'] = "No Data";
            $typeList['ext_load_img'] = "No Data";

            array_push ($quesTypeArray, $typeList);
            }
            return $quesTypeArray;
        }else{
            foreach ($query->result () as $types){

            $typeList['ext_id'] = $types->ext_id;
            $typeList['ext_type'] = $types->ext_type;
            $typeList['ext_load_img'] = $types->ext_load_img;
            $typeList['ext_status'] = $types->ext_status;

            array_push ($quesTypeArray,$typeList);
            }
          
            return $quesTypeArray;
        }
    }
    // function getPtractQuesTypeDbById($ext_id)
    // {
    //     $typeList = array();
    //     $quesTypeArray = array();
    //     $this->db->select('*');
    //     $this->db->from ('sb_stu_exam_type');
    //     $this->db->where('ext_id', $ext_id);
    //     $this->db->where('ext_status', '1');
    //     $query = $this->db->get ();
    //     log_message('info','getQuesTypeDb'.$this->db->last_query());
    //     if ($query->num_rows() < 0){
    //         foreach ($query->result () as $types){
    //         $typeList['ext_id'] = "No Data";
    //         $typeList['ext_type'] = "No Data";
    //         $typeList['ext_status'] = "No Data";
    //         $typeList['ext_description'] = "No Data";
    //         $typeList['	ext_value_ind'] = "No Data";
    //         $typeList['	ext_total_marks'] = "No Data";
    //         $typeList['ext_total_time'] = "No Data";
    //         $typeList['ext_question_time'] = "No Data";
    //         $typeList['	ext_date_added'] = "No Data";
    //         $typeList['	ext_date_modified'] = "No Data";

    //         }
    //         return $quesTypeArray;
    //     }else{
    //         foreach ($query->result () as $types){

    //         $typeList['ext_id'] = $types->ext_id;
    //         $typeList['ext_type'] = $types->ext_type;
    //         $typeList['ext_status'] = $types->ext_status;
    //         $typeList['ext_description'] = $types->ext_description;
    //         $typeList['	ext_value_ind'] = $types->ext_value_ind;
    //         $typeList['	ext_total_marks'] = $types->ext_total_marks;
    //         $typeList['ext_total_time'] = $types->ext_total_time;
    //         $typeList['ext_question_time'] = $types->ext_question_time;
    //         $typeList['	ext_date_added'] = $types->ext_date_added;
    //         $typeList['	ext_date_modified'] = $types->ext_date_modified;
    //         }
          
    //         return $typeList;
    //     }
    // }
    function getQuesTypeDbById($ext_id)
    {
        $jumList = array();
        $jumblListArray = array();
        $this->db->select('*');
        $this->db->from ('sb_stu_exam_type');
        $this->db->where('ext_status', '1');
        $this->db->where('ext_id', $ext_id);
        $query = $this->db->get ();
        log_message('info','getQuesTypeDbById'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result () as $ques){
            $quesTypeList['ext_id'] = "No Data";
            $quesTypeList['ext_type'] = "No Data";
            $quesTypeList['ext_description'] = "No Data";
            $quesTypeList['ext_value_ind'] = "No Data";
            $quesTypeList['ext_total_marks'] = "No Data";
            $quesTypeList['ext_total_time'] = "No Data";
            $quesTypeList['ext_question_time'] = "No Data";
            $quesTypeList['ext_date_added'] = "No Data";
            $quesTypeList['ext_date_modified'] = "No Data";
            $quesTypeList['ext_status'] = "No Data";

            // array_push ($jumblListArray, $jumList);
            }
            return $quesTypeList;
        }else{
            foreach ($query->result () as $ques){
                $quesTypeList['ext_id'] = $ques->ext_id;
                $quesTypeList['ext_type'] = $ques->ext_type;
                $quesTypeList['ext_description'] = $ques->ext_description;
                $quesTypeList['ext_value_ind'] = $ques->ext_value_ind;
                $quesTypeList['ext_total_marks'] = $ques->ext_total_marks;
                $quesTypeList['ext_total_time'] = $ques->ext_total_time;
                $quesTypeList['ext_question_time'] = $ques->ext_question_time;
                $quesTypeList['ext_date_added'] = $ques->ext_date_added;
                $quesTypeList['ext_date_modified'] = $ques->ext_date_modified;
                $quesTypeList['ext_status'] = $ques->ext_status;

            // array_push ($jumblListArray, $jumList);
            }
            //  log_message('info',"ddddd");
            // log_message('info','articleDataList '.$this->db->last_query());
        //  log_message('info',print_r($promoListDataList,TRUE));
            return $quesTypeList;
        }
    }
    function jumlQuesDb()
    {
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
        $this->db->from ('sb_stu_exam_jumbled_questions');
       // $this->db->where('stu_news_status', '1');
       // $this->db->order_by("stu_news_modified_date", "DESC");
        $query = $this->db->get ();
        log_message('info','jumlQuesDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['jum_id'] = "No Data";
            $quesList['jumbled_questions'] = "No Data";
            $quesList['jum_ans'] = "No Data";
            $quesList['jum_hints'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['jum_id'] = $ques->jum_id;
            $quesList['jumbled_questions'] = $ques->jumbled_questions;
            $quesList['jum_ans'] = $ques->jum_ans;
            $quesList['jum_hints'] = $ques->jum_hints;
            array_push ($quesArray, $quesList);
            }
 
            return $quesArray;
        }
    }
    function jumlResDb()
    {
        $resList = array();
        $resArray = array();
        $this->db->select('*');
        $this->db->from ('sb_stu_exam_jumbled_questions3');
        $query = $this->db->get ();
        log_message('info','jumlResDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $res){
            $resList['jum_id'] = "No Data";
            $resList['jumbled_questions'] = "No Data";
            $resList['jum_ans'] = "No Data";
            $resList['jum_hints'] = "No Data";
 
            array_push ($resArray, $resList);
            }
            return $resArray;
        }else{
            foreach ($query->result() as $res){

            $resList['jum_id'] = $res->jum_id;
            $resList['jumbled_questions'] = $res->jumbled_questions;
            $resList['jum_ans'] = $res->jum_ans;
            $resList['jum_hints'] = $res->jum_hints;
            array_push ($resArray, $resList);
            }
 
            return $resArray;
        } 
    }
    function jumblResCheckDb($checkData = NULL)
    {
       /* $indAns = array();
        $totalAns = array();
        foreach($checkData as $key => $value )
        {
        //   $checkDataLen = sizeof($checkData);
            $this->db->select('*');
            $this->db->from ('sb_stu_exam_jumbled_questions');
            $this->db->where('jum_ans',$value);
            $this->db->where('jum_id',$key);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                $indAns = 'TRUE';
                log_message('info','indAns'.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
              $totalAns[$key] = $indAns;
              log_message('info','indAns '.print_r($indAns,TRUE));
            }else{
                $indAns = 'FALSE';
                // array_push ($totalAns, $indAns);
               $totalAns[$key] = $indAns;
            }
            log_message('info','jumblResCheckDb '.$this->db->last_query());
            log_message('info','checkData '.print_r($totalAns,TRUE));
        }*/
        $indAns = array();
        $totalAns = array();
        foreach($checkData as $key => $value )
        {
        //   $checkDataLen = sizeof($checkData);
            $this->db->select('*');
            $this->db->from ('sb_stu_exam_jumbled_questions');
            $this->db->where('jum_ans',$value);
            $this->db->where('jum_id',$key);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                $indAns = 'TRUE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }elseif($value == '------'){
                $indAns = '------';
                $totalAns[$key] = $indAns;
                log_message('info','value '.$indAns);
            }else{
                $indAns = 'FALSE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }
            //return $totalAns;
            // log_message('info','jumblResCheckDb '.$this->db->last_query());
        }
        log_message('info','totalAns in Data '.print_r($totalAns,TRUE));
        return $totalAns;

    }
    public function getJumPractQuesDb($checkData)
    {
        foreach($checkData as $key => $value ){
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
        $this->db->where('jum_id',$key);
        $this->db->from ('sb_stu_exam_jumbled_questions');
        $query = $this->db->get ();
        log_message('info','getJumPractQuesDb for new hintsss'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['jum_id'] = "No Data";
            $quesList['jumbled_questions'] = "No Data";
            $quesList['jum_ans'] = "No Data";
            $quesList['jum_hints'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['jum_id'] = $ques->jum_id;
            $quesList['jumbled_questions'] = $ques->jumbled_questions;
            $quesList['jum_ans'] = $ques->jum_ans;
            $quesList['jum_hints'] = $ques->jum_hints;
            
            array_push ($quesArray, $quesList);
            }
 
            return $quesArray;
        }
    } 
   
    }
    public function jumPractQuesDb($newPractData = NULL)
    {
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
       // $this->db->where('')
        $this->db->from ('sb_stu_exam_jumbled_questions');
       // $this->db->where('stu_news_status', '1');
       // $this->db->order_by("stu_news_modified_date", "DESC");
        $this->db->order_by('rand()');
        $this->db->limit($newPractData['quesLimit'],0);
        $query = $this->db->get ();
        log_message('info','jumlQuesDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['jum_id'] = "No Data";
            $quesList['jumbled_questions'] = "No Data";
            $quesList['jum_ans'] = "No Data";
            $quesList['jum_hints'] = "No Data";
            $quesList['dif_id'] = "No Data";
           // $quesList['timeLimit'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = "No Data";
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['jum_id'] = $ques->jum_id;
            $quesList['jumbled_questions'] = $ques->jumbled_questions;
            $quesList['jum_ans'] = $ques->jum_ans;
            $quesList['jum_hints'] = $ques->jum_hints;
            $quesList['dif_id'] = $ques->dif_id;
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = $newPractData['timeLimit'];
            return $quesArray;
        } 
    }
    public function dictPractQuesDb($newPractData = NULL)
    {
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
       // $this->db->where('')
        $this->db->from ('sb_stu_exam_dictation_questions');
       // $this->db->where('stu_news_status', '1');
       // $this->db->order_by("stu_news_modified_date", "DESC");
       //$this->db->order_by('dic_id', 'RANDOM');
        $this->db->order_by('rand()');
        $this->db->limit($newPractData['quesLimit'],0);
        $query = $this->db->get ();
        log_message('info','dictPractQuesDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['dic_id'] = "No Data";
            $quesList['dictation_questions'] = "No Data";
            $quesList['dic_hints'] = "No Data";
            $quesList['dif_id'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = "No Data";
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['dic_id'] = $ques->dic_id;
            $quesList['dictation_questions'] = $ques->dictation_questions;
            $quesList['dic_hints'] = $ques->dic_hints;
            $quesList['dif_id'] = $ques->dif_id;
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = $newPractData['timeLimit'];
            return $quesArray;
        } 
    }
    function dictResCheckDb($checkData = NULL)
    {
       
        $indAns = array();
        $totalAns = array();
        foreach($checkData as $key => $value )
        {
        //   $checkDataLen = sizeof($checkData);
            $this->db->select('*');
            $this->db->from ('sb_stu_exam_dictation_questions');
            $this->db->where('dictation_questions',$value);
            $this->db->where('dic_id',$key);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                $indAns = 'TRUE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }elseif($value == '------'){
                $indAns = '------';
                $totalAns[$key] = $indAns;
                log_message('info','value '.$indAns);
            }else{
                $indAns = 'FALSE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }
            //return $totalAns;
            // log_message('info','jumblResCheckDb '.$this->db->last_query());
        }
        log_message('info','totalAns in Data '.print_r($totalAns,TRUE));
        return $totalAns;

    }
    public function getDictPractQuesDb($checkData)
    {
        foreach($checkData as $key => $value ){
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
        $this->db->where('dic_id',$key);
        $this->db->from ('sb_stu_exam_dictation_questions');
        $query = $this->db->get ();
        log_message('info','getDictPractQuesDb for new hintsss'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['dic_id'] = "No Data";
            $quesList['dictation_questions'] = "No Data";
            $quesList['dic_hints'] = "No Data";
            $quesList['dif_id'] = "No Data";

            array_push ($quesArray, $quesList);
            }
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['dic_id'] = $ques->dic_id;
            $quesList['dictation_questions'] = $ques->dictation_questions;
            $quesList['dic_hints'] = $ques->dic_hints;
            $quesList['dif_id'] = $ques->dif_id;
            
            array_push ($quesArray, $quesList);
            }
 
            return $quesArray;
        }
    } 
   
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function identPractQuesDb($newPractData = NULL)
    {
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
       // $this->db->where('')
        $this->db->from ('sb_stu_exam_identify_correct_spell');
       // $this->db->where('stu_news_status', '1');
       // $this->db->order_by("stu_news_modified_date", "DESC");
        $this->db->order_by('rand()');
        $this->db->limit($newPractData['quesLimit'],0);
        $query = $this->db->get ();
        log_message('info','identPractQuesDb'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['idn_id'] = "No Data";
            $quesList['option1'] = "No Data";
            $quesList['option2'] = "No Data";
            $quesList['option3'] = "No Data";
            $quesList['idn_ans'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = "No Data";
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['idn_id'] = $ques->idn_id;
            $quesList['option1'] = $ques->option1;
            $quesList['option2'] = $ques->option2;
            $quesList['option3'] = $ques->option3;
            $quesList['idn_ans'] = $ques->idn_ans;
            
            array_push ($quesArray, $quesList);
            }
            $quesArray['length'] = count($quesArray);
            $quesArray['timeLimit'] = $newPractData['timeLimit'];
            return $quesArray;
        } 
    }
    function idnResCheckDb($checkData = NULL)
    {
        $indAns = array();
        $totalAns = array();
        foreach($checkData as $key => $value )
        {
        //   $checkDataLen = sizeof($checkData);
            $this->db->select('*');
            $this->db->from ('sb_stu_exam_identify_correct_spell');
            $this->db->where('idn_ans',$value);
            $this->db->where('idn_id',$key);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                $indAns = 'TRUE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }elseif($value == '------'){
                $indAns = '------';
                $totalAns[$key] = $indAns;
                log_message('info','value '.$indAns);
            }else{
                $indAns = 'FALSE';
                log_message('info','indAns '.print_r($indAns,TRUE));
                // array_push ($totalAns, $indAns);
                $totalAns[$key] = $indAns;
            }
            //return $totalAns;
            // log_message('info','jumblResCheckDb '.$this->db->last_query());
        }
        log_message('info','totalAns in Data '.print_r($totalAns,TRUE));
        return $totalAns;

    }
    public function getIdnPractQuesDb($checkData)
    {
        foreach($checkData as $key => $value ){
        $quesList = array();
        $quesArray = array();
        $this->db->select('*');
        $this->db->where('idn_id',$key);
        $this->db->from ('sb_stu_exam_identify_correct_spell');
        $query = $this->db->get ();
        log_message('info','getIdnPractQuesDb for new hintsss'.$this->db->last_query());
        if ($query->num_rows() < 0){
            foreach ($query->result() as $ques){
            $quesList['idn_id'] = "No Data";
            $quesList['option1'] = "No Data";
            $quesList['option2'] = "No Data";
            $quesList['option3'] = "No Data";
            $quesList['idn_ans'] = "No Data";
 
            array_push ($quesArray, $quesList);
            }
            return $quesArray;
        }else{
            foreach ($query->result() as $ques){

            $quesList['idn_ans'] = $ques->idn_ans;
            $quesList['option1'] = $ques->option1;
            $quesList['option2'] = $ques->option2;
            $quesList['option2'] = $ques->option3;
            $quesList['idn_ans'] = $ques->idn_ans;
            
            array_push ($quesArray, $quesList);
            }
 
            return $quesArray;
        }
    } 
   
    }
    
    
    
}
?>
