<?php

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->parseData['isLogin'] = $this->isLogin();
    }

    public function all_division()
    {
        $req = $this->http_request_get('division' . $this->queryUrlRequest());
        echo json_encode($req);
    }

    public function create()
    {
        $post = array();
        foreach ($_POST as $key => $value) {
            $post[$key] = $this->input->post($key);
        }

        $req = $this->http_request_post('division', $post);
        echo json_encode($req);
    }

    public function update($id)
    {
        $post = array();
        foreach ($_POST as $key => $value) {
            $post[$key] = $this->input->post($key);
        }

        $req = $this->http_request_put('division/' . $id, $post);
        echo json_encode($req);
    }
}