<?php

namespace App\Controllers;

class Login extends BaseController
{

    private $data;


    public function __construct()
    {
        $this->data['current_page']     = site_url('login');
        $this->data['signin']           = site_url('');
        $this->data['signup']           = site_url('signup');
        $this->data['web_owner']        = 'NEMSU Students';
    }

    public function index(): string
    {
        return view('login', $this->data);
    }

    public function login()
    {

        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password');
        echo "hellow wordl!";
    }

    public function sign_up()
    {
        return view('signup', $this->data);
    }
}
