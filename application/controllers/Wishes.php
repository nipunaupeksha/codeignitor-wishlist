<?php 
    class Wishes extends CI_controller{
        public function index($offset=0){
            /*
            //pagination config
            $config['base_url'] = base_url().'wishes/index/';
            $config['total_rows'] = $this->db->count_all('wishes');;
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class'=>'pagination-links');

            //init pagination
            $this->pagination->initialize($config);
            */

            $data['title']='Latest Wishes';

            $data['wishes'] = $this->wish_model->get_wishes(FALSE/*,$config['per_page'],$offset*/);

            $this->load->view('templates/header');
            $this->load->view('wishes/index',$data);
            $this->load->view('templates/footer');
        }

        public function view($slug=NULL){
            $data['wish']=$this->wish_model->get_wishes($slug);
            if(empty($data['wish'])){
                show_404();
            }
            $data['title'] = $data['wish']['title'];

            $this->load->view('templates/header');
            $this->load->view('wishes/view',$data);
            $this->load->view('templates/footer');
        }

        public function create(){
            //check login 
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create a Wish';
            //$data['categories'] = $this->wish_model->get_categories();

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');

            if($this->form_validation->run()===FALSE){
                $this->load->view('templates/header');
                $this->load->view('wishes/create',$data);
                $this->load->view('templates/footer'); 
            }else{
                //upload image
                $config['upload_path']='./assets/images/wishes';
                $config['allowed_types']='gif|jpg|png';
                $config['max_size']='2048';
                $config['max_width']='500';
                $config['max_height']='500';

                $this->load->library('upload',$config);

                if(!$this->upload->do_upload()){
                    $errors=array('error'=>$this->upload->display_errors());
                    $wish_image = 'noimage.jpg';
                }
                else{
                    $data = array('upload_data'=>$this->upload->data());
                    $wish_image = $_FILES['userfile']['name'];
                }

                $this->wish_model->create_wish($wish_image);
                //set message
                $this->session->set_flashdata('wish_created','your wish has been created');
                redirect('wishes');
            }
        }

        public function delete($id){
            //check login 
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $this->wish_model->delete_wish($id);
            //set message
            $this->session->set_flashdata('wish_deleted','your wish has been deleted');
             
            redirect('wishes');
        }

        public function edit($slug){
            //check login 
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['wish']=$this->wish_model->get_wishes($slug);

            //check user
            if($this->session->userdata('user_id')!=$this->wish_model->get_wishes($slug)['user_id']){
                redirect('wishes');
            }

            //$data['categories'] = $this->wish_model->get_categories();
            if(empty($data['wish'])){
                show_404();
            }

            $data['title'] = 'Edit Wish';

            $this->load->view('templates/header');
            $this->load->view('wishes/edit',$data);
            $this->load->view('templates/footer');
        }

        public function update(){
            //check login 
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $this->wish_model->update_wish();
            //set message
            $this->session->set_flashdata('wish_updated','your wish has been updated');
                
            redirect('wishes');
        }

        
    } 