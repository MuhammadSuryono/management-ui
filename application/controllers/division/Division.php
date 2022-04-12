<?php

class Division extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function index()
    {
        $this->set_javascript_file('/assets/js/pages/division.js');
        $this->parseData['content'] = 'division/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'Divisions';

        $this->load_view();
    }
}