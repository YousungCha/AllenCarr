<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TableBuilder extends CI_Controller
{
      /*
       * --------------------------------------------------------------------
       * 멤버 시스템 클래스
       * --------------------------------------------------------------------
       *
       *  - 회원 가입
       *  - 테라피 신청 (회원 : 이메일, 예약번호 검색)
       *  - 테라피 신청 (페이스북 회원 : 페이스북 번호 / 예약번호 검색)
       *  - 테라피 신청 (비회원 주문 : 예약번호 기준 검색)
       * 
       */

    // * 생성자 및 인덱스 함수
    function __construct() 
    {
        parent::__construct();
        
        // 기본 라이브러리 호출
        date_default_timezone_set("Asia/Seoul");
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');              
    }

      public function index($boardName = '')
      {                 
          $this->load->view('ese/header_v');
          $this->load->view('ese/admin_v');
          $this->load->view('ese/footer_v');
      }
      public function vInv($boardName = '')
      {
        $this->load->view('ese/header_v');
        if ($boardName)
        {
          $sql = "select * from $boardName";
          $query = $this->db->query($sql);
          $result = array('data' => $query->result_array() );        

          $this->load->view('ese/inv_v', $result);
        }
        $this->load->view('ese/footer_v');
      }
      public function btnSubmit()
      {
        $name = $this->input->post('name',true);
        $bdName = $this->input->post('bdName',true);
        $contents = $this->input->post('contents',true);
        $contents = str_replace("\r\n","<br>",$contents);

        $data = array(
          'name' => $name,
          'contents' => $contents,
          'modified' => date('Y-m-d H:i:s',time()) 
        );
        $this->db->set($data);
        $this->db->insert($bdName);
        redirect("TableBuilder/vInv/$bdName");
      }

      public function btnCreateApp()
      {
        $name = $this->input->post('name',true);
        $bdName = $this->input->post('board_name',true);
        $date = $this->input->post('date',true);
        $this->btnCreateDB($bdName, $name, $date);
      }


      public function btnCreateDB($boardName, $name, $date)
      {
        $board = 
        "CREATE TABLE IF NOT EXISTS {$boardName} (
            no int(10) NULL AUTO_INCREMENT,
            name varchar(20) NOT NULL,
            contents text NOT NULL,
            modified datetime NOT NULL,
            hits int(10) NOT NULL,
            ip_address varchar(45) NOT NULL,
            PRIMARY KEY(no)
        )";

        $this->db->query($board);

        // 0번 데이터 스틸
        $firstData = array(
          'no' => 1,
          'name' => $name,
          'modified' => $date
        );
        $this->db->set($firstData);
        $this->db->insert($boardName);


        redirect("TableBuilder/vInv/$boardName");


      }    



}
