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
        $this->data['registerfaculty']  = site_url('registerfaculty');
        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';
        $this->data['courseList']       = $this->db->table('course')->get()->getResult();
        $this->data['designation']      = $this->db->table('usergroups')->where("level > 0 AND level < 3")->get()->getResult();
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

    public function register_faculty() 
    {
        $fields = array(
            "fname",    "mname",    "lname",
            "group",    "email",    
            "password", "confirm",
        );

        $fieldmap = [];
        
        foreach($fields as $field) {
            $fieldData          = $this->request->getPost($field);
            $fieldmap[$field]   = $fieldData;
        }
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


        if($hasErrors) {
            return redirect()->to(site_url('signupfaculty'));
        }
        else {
            $sha256 = hash('sha256', $fieldmap['password'] );
            
            $data = [
                'fname'     => $fieldmap['fname'],
                'mname'     => $fieldmap['mname'],
                'lname'     => $fieldmap['lname'],
                'email'     => $fieldmap['email'],
                'password'  => $sha256,
                'groupID'   => $fieldmap['group'],
            ];

            $this->db->table('faculty')->insert($data);
            return redirect()->to(site_url(''));
        }
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

        if(empty($fieldmap['course']) || empty($fieldmap['year'])){
            $hasErrors = true;
            $this->session->setFlashdata('phone_error', "Invalid Course or Year!");
        }
        
        if($phoneLen != 11) {
            $this->session->setFlashdata('phone_error', "Invalid Phone Number!");
            $hasErrors = true;
        }

        if($hasErrors) {
            return redirect()->to(site_url('signup'));
        }
        else {
            $sha256 = hash('sha256', $fieldmap['password'] );
            
            $data = [
                'fname'     => $fieldmap['fname'],
                'mname'     => $fieldmap['mname'],
                'lname'     => $fieldmap['lname'],
                'bday'      => $fieldmap['birthdate'],
                'phone'     => $fieldmap['phone'],
                'address'   => $fieldmap['address'],
                'email'     => $fieldmap['email'],
                'year'      => $fieldmap['year'],
                'courseID'  => $fieldmap['course'],
                'password'  => $sha256,
                'groupID'   => 1,
            ];

            $this->db->table('users')->insert($data);


            return redirect()->to(site_url(''));
        }
    }
}
