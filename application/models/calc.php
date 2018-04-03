<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calc extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

    function resultCalc($resultData, $quesTypeArray){
		log_message('info','resultData in CALC '.print_r($resultData,TRUE));
        $res=0;
        foreach($resultData as $key => $value)
        {
        //   $checkDataLen = sizeof($checkData);
            if ($value == 'TRUE'){
                $res = $res+$quesTypeArray['ext_value_ind'];
                // array_push ($totalAns, $indAns);
            }
            // log_message('info','jumblResCheckDb '.$this->db->last_query());
            // log_message('info','checheckDatackData '.print_r($totalAns,TRUE));
        }
        return $res;
    }
    function profileCompleteDb($stu_id){
        $this->db->select('*');
        $this->db->from ('sb_stu');
        $this->db->where('stu_id', $stu_id);
        $this->db->where('stu_profstatus', '1');
        $query = $this->db->get ();
        // log_message('info','$query->num_rows() '.$query->num_rows());
        $perc = 0;
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
            $perc = 'No Data';
        }
        if($userData['stuFullname'] != ''){$perc = $perc + (50/6);}
        if($userData['stuUsername'] != ''){$perc = $perc + (50/6);}
        if($userData['stuEmail'] != ''){$perc = $perc + (50/6);}
        if($userData['stuDob'] != ''){$perc = $perc + (50/6);}
        if($userData['stuGender'] != ''){$perc = $perc + (50/6);}
        if($userData['stuPhoto'] != ''){$perc = $perc + (50/6);}
        if($userData['stuFathername'] != ''){$perc = $perc + (50/11);}
        if($userData['stuMothername'] != ''){$perc = $perc + (50/11);}
        if($userData['stuCommadd'] != ''){$perc = $perc + (50/11);}
        if($userData['stuCommadd1'] != ''){$perc = $perc + (50/11);}
        if($userData['stuCommadd2'] != ''){$perc = $perc + (50/11);}
        if($userData['stuCapincode'] != ''){$perc = $perc + (50/11);}
        if($userData['stuPermadd'] != ''){$perc = $perc + (50/11);}
        if($userData['stuPermadd1'] != ''){$perc = $perc + (50/11);}
        if($userData['stuPermadd2'] != ''){$perc = $perc + (50/11);}
        if($userData['stuPapincode'] != ''){$perc = $perc + (50/11);}
        if($userData['stuPhone'] != ''){$perc = $perc + (50/11);}
        return floor($perc);
    }
}    