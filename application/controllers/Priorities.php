<?php
    class Priorities extends CI_controller{
        public function index(){
            $data['title']='Priorities';
            $data['priorities']=$this->priority_model->get_priorities();
            $this->load->view('templates/header');
            $this->load->view('priorities/index',$data);
            $this->load->view('templates/footer');
        }


        public function posts($id){
            $data['title']=$this->priority_model->get_priority($id)->name;

            $data['wishes']=$this->wish_model->get_wishes_by_priority_id($id);

            $this->load->view('templates/header');
            $this->load->view('wishes/index',$data);
            $this->load->view('templates/footer');
        }
    }
