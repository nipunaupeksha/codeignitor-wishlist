<?php
    class Categories extends CI_controller{
        public function index(){
            $data['title']='Categories';
            $data['categories']=$this->category_model->get_categories();
            $this->load->view('templates/header');
            $this->load->view('categories/index',$data);
            $this->load->view('templates/footer');
        }

        public function create(){
            //check login 
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title']='Create Category';

            $this->form_validation->set_rules('name','Name','required');

            if($this->form_validation->run()===FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create',$data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();
                //set message
                $this->session->set_flashdata('category_created','your category has been created');
                
                redirect('categories');
            }
        }

        public function posts($id){
            $data['title']=$this->category_model->get_category($id)->name;

            $data['wishes']=$this->wish_model->get_wishes_by_category_id($id);

            $this->load->view('templates/header');
            $this->load->view('wishes/index',$data);
            $this->load->view('templates/footer');
        }

        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $this->category_model->delete_category($id);
            $this->session->set_flashdata('category_deleted','Your category has been deleted');
            redirect('categories');
        }
    }
