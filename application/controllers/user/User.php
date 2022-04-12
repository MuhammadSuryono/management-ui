<?php

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function index()
    {
        $this->set_javascript_file('/assets/js/pages/user.js');
        $this->parseData['content'] = 'user/index';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'User';

        $this->load_view();
    }

    public function detail($id)
    {
        $this->set_javascript_file('/assets/js/pages/user-detail.js');
        $req = $this->http_request_get('user/' . $id);
        $this->parseData['content'] = 'user/detail';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;
        $this->parseData['title_budge'] = 'User Detail';
        $this->parseData['data'] = $req->data;

        $this->load_view();
    }
}