<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    private $data;
    private $session;

    public function __construct()
    {
        
        $this->db                       = \Config\Database::connect();
        $this->data['current_page']     = site_url('login');
        $this->data['signin']           = site_url('');
        $this->data['signup']           = site_url('signup');
        $this->data['register']         = site_url('register');
        $this->data['option']           = site_url('optionview');
        $this->data['signupfaculty']    = site_url('signupfaculty');
        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';
        $this->data['courseList']       = $this->db->table('course')->get()->getResult();
        $this->session = session();
        
    }

    public function index(): string
    {
        return view('login', $this->data);
    }

    public function signin()
    {
       
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password');
        echo "hellow wordl!";
    }

    public function sign_up()
    {
        return view('signup', $this->data);
    }

    public function sign_up_faculty() 
    {
        return view('signupfaculty', $this->data);
    }

    public function optionview() 
    {
        return view('optionview', $this->data);
    }

    public function register() 
    {
        $fields = array(
            "fname",    "mname",    "lname",
            "course",   "year",     "role",
            "address",  "phone",    "birthdate",
            "email",    "password", "confirm",
        );

        $fieldmap = [];
        
        foreach($fields as $field) {
            $fieldData          = $this->request->getPost($field);
            $fieldmap[$field]   = $fieldData;
            // echo "Field Name: " . $field . "    Field Data:    ". $fieldData . "<br>";
        }
        $phoneLen = strlen($fieldmap['phone']);

        $hasErrors = false;
        
        if(empty($fieldmap['password'])){
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password is Empty");
        }
        else if(strlen($fieldmap['password']) < 8 ) {
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password too short, minimum of 8 characters");
        }
        else if(strcmp($fieldmap['password'], $fieldmap['confirm']) != 0) {
            $this->session->setFlashdata('pass_error', "Password Does Not Match!");
            $hasErrors = true;
        }
        
        if($phoneLen != 11) {
            $this->session->setFlashdata('phone_error', "Invalid Phone Number!");
            $hasErrors = true;
        }

        if($hasErrors) {
            return redirect()->to(site_url('signup'));
        }
        else {
            return redirect()->to(site_url(''));
        }
    }
}
