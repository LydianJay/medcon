<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function __construct()
    {


        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';
        $this->data['current_page']     = site_url('login');
        $this->data['signin']           = site_url('signin');
        $this->data['signup']           = site_url('signup');
        $this->data['register']         = site_url('register');
        $this->data['option']           = site_url('optionview');
        $this->data['signupfaculty']    = site_url('signupfaculty');
        $this->data['registerfaculty']  = site_url('registerfaculty');
        $this->data['courseList']       = $this->getTable('course')->get()->getResult();
        $this->data['designation']      = $this->db->table('usergroups')->where("level > 0 AND level < 3")->get()->getResult();
    }

    public function index(): string
    {
        return view('login', $this->data);
    }

    public function signin()
    {
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');
        $sha256     = hash('sha256', $password);

        $result     = $this->db->table('users')->select('*')->where("email = '$email' AND password = '$sha256' ")->get()->getResult();


        if (count($result) < 1) {
            $this->session->setFlashdata('error_auth', "Incorrect password or email");
            return redirect()->to(site_url(''));
        } else {

            $data       = $result[0];

            $userdata   = [
                'firstname'     => $data->fname,
                'lastname'      => $data->lname,
                'middlename'    => $data->mname,
                'birthdate'     => $data->bday,
                'group'         => $data->groupID,
                'course'        => $data->courseID,
                'year'          => $data->year,
                'id'            => $data->userID,
            ];
            $this->session->set($userdata);
            return redirect()->to(site_url('dashboard'));
        }
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
            "fname",
            "mname",
            "lname",
            "group",
            "birthdate",
            "phone",
            "email",
            "password",
            "confirm",
        );

        $fieldmap = [];

        foreach ($fields as $field) {
            $fieldData          = $this->request->getPost($field);
            $fieldmap[$field]   = $fieldData;
        }
        $hasErrors = false;


        if (empty($fieldmap['password'])) {
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password is Empty");
        } else if (strlen($fieldmap['password']) < 8) {
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password too short, minimum of 8 characters");
        } else if (strcmp($fieldmap['password'], $fieldmap['confirm']) != 0) {
            $this->session->setFlashdata('pass_error', "Password Does Not Match!");
            $hasErrors = true;
        }


        if ($hasErrors) {
            return redirect()->to(site_url('signupfaculty'));
        } else {
            $sha256 = hash('sha256', $fieldmap['password']);

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
            "fname",
            "mname",
            "lname",
            "course",
            "year",
            "role",
            "address",
            "phone",
            "birthdate",
            "email",
            "password",
            "confirm",
        );

        $fieldmap = [];

        foreach ($fields as $field) {
            $fieldData          = $this->request->getPost($field);
            $fieldmap[$field]   = $fieldData;
        }


        $phoneLen = strlen($fieldmap['phone']);

        $hasErrors = false;

        if (empty($fieldmap['password'])) {
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password is Empty");
        } else if (strlen($fieldmap['password']) < 8) {
            $hasErrors = true;
            $this->session->setFlashdata('pass_error', "Password too short, minimum of 8 characters");
        } else if (strcmp($fieldmap['password'], $fieldmap['confirm']) != 0) {
            $this->session->setFlashdata('pass_error', "Password Does Not Match!");
            $hasErrors = true;
        }

        if (empty($fieldmap['course']) || empty($fieldmap['year'])) {
            $hasErrors = true;
            $this->session->setFlashdata('phone_error', "Invalid Course or Year!");
        }

        if ($phoneLen != 11) {
            $this->session->setFlashdata('phone_error', "Invalid Phone Number!");
            $hasErrors = true;
        }

        if ($hasErrors) {
            return redirect()->to(site_url('signup'));
        } else {
            $sha256 = hash('sha256', $fieldmap['password']);
            
            $data = [
                'fname'     => $fieldmap['fname'],
                'mname'     => $fieldmap['mname'],
                'lname'     => $fieldmap['lname'],
                'bday'      => $fieldmap['birthdate'],
                'phone'     => $fieldmap['phone'],
                'address'   => $fieldmap['address'],
                'email'     => $fieldmap['email'],
                'password'  => $sha256,
                'groupID'   => 1,
            ];

            $this->db->table('users')->insert($data);
            

            $id = $this->db->insertID();

            $studentData = [
                'studentID' => $id,
                'year'      => $fieldmap['year'],
                'courseID'  => $fieldmap['course'],
            ];

            $this->db->table('students')->insert($studentData);

            return redirect()->to(site_url(''));
        }
    }
}
