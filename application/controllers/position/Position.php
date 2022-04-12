<?php

class Position extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function index()
    {
        $this->set_javascript_file('/assets/js/pages/position.js');
        $this->parseData['content'] = 'position/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'Positions';

        $this->load_view();
    }
}