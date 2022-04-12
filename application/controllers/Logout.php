<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/login'));
    }
}
