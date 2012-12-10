<?php

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //session_start();
        $this->load->helper('url');
        //dev profiler
        //$this->output->enable_profiler(true);

    }


    public function index()
    {
        $data['page'] = 'Ralph';
        $this->load->view('bootstrap_head', $data);
        //$this->load->view('bootstrap_body');
        //$this->load->view('bootstrap_exhibit');
        $this->load->view('bootstrap_exhibit_home');
        $this->load->view('bootstrap_foot');
    }
    
    public function exhibit_home()
    {
        $data['page'] = 'Ralph';
        $this->load->view('bootstrap_head', $data);
        $this->load->view('bootstrap_exhibit_home');
        $this->load->view('bootstrap_foot');
    }
    
    public function exhibit_page()
    {
        $data['page'] = 'Ralph';
        $this->load->view('bootstrap_head', $data);
        $this->load->view('bootstrap_exhibit');
        $this->load->view('bootstrap_foot');
    }
    
    public function object()
    {
        $data['page'] = 'Sample';
        $this->load->view('bootstrap_head', $data);
        $this->load->view('bootstrap_object');
        $this->load->view('bootstrap_foot');
    }
    
    public function boot()
    {
        $this->load->view('bootstrap');
    }


}

/* End of file main.php */
/* Location: ./system/application/controllers/main.php */