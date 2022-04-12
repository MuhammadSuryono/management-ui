<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->isLogin()) redirect("/dashboard");
    }

    public function login()
    {
        $this->js[] = base_url() . 'assets/js/pages/login.js';

        $this->set_main_page('auth/wrapper');
        $this->parseData['content'] = 'auth/login';
        $this->parseData['javascript'] = $this->js;
        $this->parseData['css'] = $this->css;

        $this->load_view();
    }

    public function postLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $body = [
            'username' => $username,
            'password' => $password,
        ];

        $req = $this->http_request_post("auth/login", $body);
        $statusLogin = false;
        
        if ($req->response->code == 200) {
            $statusLogin = true;
            $userData = [
                'userIsLogin' => true,
                'userData' => $req->data->user,
                'token' => $req->data->access_token,
                'roleBpu' => $req->data->role_bpu,
            ];
            $this->session->set_userdata($userData);
        }

        echo json_encode(["status" => $statusLogin, "message" => $req->response->message ,"data" => $req->data]);
    }

    public function authLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/login'));
    }
}
