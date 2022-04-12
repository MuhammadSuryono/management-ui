<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function index()
    {
        $this->js[] = base_url('assets/js/pages/dashboard.js');

        $this->parseData['content'] = 'dashboard/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'Dashboard';

        $this->load_view();
    }


}