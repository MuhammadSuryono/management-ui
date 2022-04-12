<?php

class Level extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function index()
    {
        $this->set_javascript_file('/assets/js/pages/level.js');
        $this->parseData['content'] = 'level/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'Levels';

        $this->load_view();
    }
}