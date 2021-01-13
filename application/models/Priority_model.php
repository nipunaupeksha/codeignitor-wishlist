<?php
    class Priority_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_priorities(){
            $this->db->order_by('id');
            $query = $this->db->get('priorities');
            return $query->result_array();
        }

        public function get_priority($id){
            $query = $this->db->get_where('priorities',array('id'=>$id));
            return $query->row();
        }
    }