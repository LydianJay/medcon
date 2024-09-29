<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    private $data;
    

    public function __construct()
    {
        
        $this->db                       = \Config\Database::connect();
        $this->data['current_page']     = site_url('login');
        $this->data['signin']           = site_url('');
        $this->data['signup']           = site_url('signup');
        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';
        $this->data['courseList']       = $this->db->table('course')->get()->getResult();
        $this->data['roleList']         = $this->db->table('usergroups')->select('groupName, groupID')->where('level', 1)->orderBy('groupID', 'DESC')->get()->getResult();
        
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
