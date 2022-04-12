<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckLogin
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function login_check()
    {
        if($this->CI->router->class != 'Auth' && !$this->CI->session->userIsLogin)
        {
            redirect(base_url('/login'));
        }
    }
}
