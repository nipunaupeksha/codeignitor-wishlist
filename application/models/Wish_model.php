<?php
    class Wish_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_wishes($slug=FALSE/*,$limit=FALSE,$offset=FALSE*/){
            
            /*
            if($limit){
                $this->db->limit($limit,$offset);
            }*/
            if($slug===FALSE){
                //$this->db->order_by('wishes.id','DESC');
                $this->db->join('users','wishes.user_id=users.id');
                $query = $this->db->get_where('wishes',array('user_id'=>$this->session->userdata('user_id')));
                return $query->result_array();
            }
            $query=$this->db->get_where('wishes',array('slug'=>$slug));
            //$query=$this->db->get_where('wishes',array('user_id'=>$this->session->userdata('user_id')));
            return $query->row_array();
        }

        public function create_wish($wish_image){
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title'=>$this->input->post('title'),
                'slug'=>$slug,
                'body'=>$this->input->post('body'),
                'priority_id'=>$this->input->post('priority_id'),
                //'category_id' =>$this->input->post('category_id'),
                'user_id'=>$this->session->userdata('user_id'),
                'url'=>$this->input->post('url'),
                'price'=>$this->input->post('price'),
                'wish_image'=>$wish_image
            );

            return $this->db->insert('wishes',$data);
        }

        public function delete_wish($id){
            $this->db->where('id',$id);
            $this->db->delete('wishes');
            return true;
        }

        public function update_wish(){
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title'=>$this->input->post('title'),
                'slug'=>$slug,
                'body'=>$this->input->post('body'),
                'priority_id'=>$this->input->post('priority_id'),
                'url'=>$this->input->post('url'),
                'price'=>$this->input->post('price'),
                //'category_id' =>$this->input->post('category_id')
            );
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('wishes',$data);
        }

        /*
        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_wishes_by_category_id($category_id){
            $this->db->order_by('wishes.id','DESC');
            $this->db->join('categories','categories.id=wishes.category_id');
            $query=$this->db->get_where('wishes',array('category_id'=>$category_id));
            return $query->result_array();
        }
        */
        public function get_wishes_by_priority_id($priority_id){
            $this->db->order_by('wishes.id','DESC');
            $this->db->join('priorities','priorities.id=wishes.priority_id');
            $query=$this->db->get_where('wishes',array('priority_id'=>$priority_id));
            return $query->result_array();
        }
    }