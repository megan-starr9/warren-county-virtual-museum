<?php

class Curate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //session_start();
        $this->load->library('bitauth');
        $this->load->library('form_validation');
        $this->load->library('pcs_utility');
        $this->load->library('file');

        $this->load->helper('form');
        $this->load->helper('url');    
        
        $this->load->model('m_vm_tags'); 
        $this->load->model('m_vm_artifacts'); 
       
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $this->load->config('vm');
        
        //dev profiler
        //$this->output->enable_profiler(true);

    }


    public function index()
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate/login');
        } else {
            $data = array();
            $data['page'] = 'home';
            $this->load->view('curate_head',$data);
            $this->load->view('curate_home', $data);
            $this->load->view('curate_foot');
        }
    }
    
    public function login()
    {
        $data = array();
        $data['page'] = 'login';
        if($this->input->post())
        {
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if($this->form_validation->run() == TRUE)
                {
                        // Login
                        if($this->bitauth->login($this->input->post('username'), $this->input->post('password')))
                        {

                                // Redirect
                                if($redir = $this->session->userdata('redir'))
                                {
                                        $this->session->unset_userdata('redir');
                                }

                                redirect($redir ? $redir : 'curate');
                        }
                        else
                        {
                                $data['error'] = $this->bitauth->get_error();
                        }
                }
                else
                {
                        $data['error'] = validation_errors();
                }
        }
        $this->load->view('curate_head',$data);
        $this->load->view('curate_login', $data);
        $this->load->view('curate_foot');
    }
    
    public function logout()
    {
            $this->bitauth->logout();
            redirect('curate');
    }
    
    public function tag_list()
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate/login');
        } else {
            $data = array();
            $data['page'] = 'tag list';
            $data['tags'] = $this->m_vm_tags->get_tags();
            $this->load->view('curate_head',$data);
            $this->load->view('curate_tag_list', $data);
            $this->load->view('curate_foot');
        }
    }
    
    public function add_tag()
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate');
        } else {
            if($this->input->post('Tag_Text'))
            {
                $this->m_vm_tags->new_tag();
            }
            redirect('curate/tag_list');
        }
    }
    
    public function delete_tag($tag_id = NULL)
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate');
        } else {
            if (isset($tag_id))
            {
                $this->m_vm_tags->delete_tag($tag_id);
            }
            redirect('curate/tag_list');
        }
    }
    
    public function update_tag($tag_id = NULL)
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate/login');
        } else {
            $data = array();
            $data['page'] = 'tag update';
            $data['tag_id'] = $tag_id;
            $data['tag_text'] = ucwords($this->m_vm_tags->get_tag_text($tag_id));
            $this->load->view('curate_head',$data);
            $this->load->view('curate_tag_update', $data);
            $this->load->view('curate_foot');
        }
    }
    
    public function process_update_tag($tag_id = NULL)
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate');
        } else {
            if($this->input->post('Tag_Text'))
            {
                $this->m_vm_tags->new_tag($tag_id);
            }
            redirect('curate/tag_list');
        }
    }
    
    public function artifact_list()
    {
        if( ! $this->bitauth->logged_in())
        {
            redirect('curate/login');
        } else {
            $data = array();
            $data['page'] = 'artifact list';
            $data['artifacts'] = $this->m_vm_artifacts->get_artifacts();
            $this->load->view('curate_head',$data);
            $this->load->view('curate_artifact_list', $data);
            $this->load->view('curate_foot');
        }
    }
    
    
    public function test_new_user()
    {
        $user = array(
            'username'      => 'sampledev',
            'fullname'      => 'Sample Developer',
            'password'      => 'sampledev',
            'email'         => 'paul.schuytema@cityofmonmouth.com',  
            'groups'        =>  array(3),
        );

        $this->bitauth->add_user($user);
        
        $user = array(
            'username'      => 'sampleuser',
            'fullname'      => 'Sample User',
            'password'      => 'sampleuser',
            'email'         => 'paul.schuytema@cityofmonmouth.com',  
            'groups'        =>  array(2),
        );

        $this->bitauth->add_user($user);
    }
    
    
    public function update_dev_group()
    {
        $group = $this->bitauth->get_group_by_name('Dev');

        $group->roles = array('can_edit_tags', 'can_edit_artifacts', 'can_edit_media');
        $this->bitauth->update_group($group->group_id, $group);
    }
    



}

/* End of file curate.php */
/* Location: ./system/application/controllers/curate.php */