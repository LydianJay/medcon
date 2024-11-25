<?php

namespace App\Controllers;

use Twilio\Rest\Client;

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

    public function index()
    {


        $this->data['msg'] = session()->getFlashdata('msg');
        return view('login', $this->data);
    }

    public function signin()
    {
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');
        $sha256     = hash('sha256', $password);

        $result     = $this->db->table('users')->select('*')
            ->where("email = '$email' AND password = '$sha256' ")
            ->get()
            ->getResult();


        if (count($result) < 1) {
            $this->session->setFlashdata('error_auth', "Incorrect password or email");
            return redirect()->to(site_url(''));
        }
        else if($result[0]->status != 1){
            $this->session->setFlashdata('error_auth', "Your Account is not approved yet, Please comeback after few hours or contact system administrator");
            return redirect()->to(site_url(''));
        } 
        else {

            $data       = $result[0];

            $groupQuery = $this->db->table('usergroups')->select('groupName, level, groupID')
                ->where('groupID', $data->groupID)->get()
                ->getResult()[0];
            $userdata   = [
                'firstname'     => $data->fname,
                'lastname'      => $data->lname,
                'middlename'    => $data->mname,
                'birthdate'     => $data->bday,
                'address'       => $data->address,
                'email'         => $data->email,
                'phone'         => $data->phone,
                'group'         => $data->groupID,
                'id'            => $data->userID,
                'groupName'     => $groupQuery->groupName,
                'groupID'       => $groupQuery->groupID,
                'level'         => $groupQuery->level,
            ];
            $this->session->set($userdata);

            switch($groupQuery->groupID) {

                case 1:
                    $this->data['module_name']      = 'usermodules';
                    $this->data['current_module']   = $this->data[$this->data['module_name']]['appointments'];
                    session()->set('module_name', 'usermodules');
                    return redirect()->to(site_url('appointments'));
                    break;
                case 2:
                    $this->data['module_name']      = 'usermodules';
                    $this->data['current_module']   = $this->data[$this->data['module_name']]['appointments'];
                    session()->set('module_name', 'usermodules');
                    return redirect()->to(site_url('appointments'));
                    break;
                case 3:
                    $this->data['module_name']      = 'doctormodules';
                    $this->data['current_module']   = $this->data[$this->data['module_name']]['users'];
                    session()->set('module_name', 'doctormodules');
                    return redirect()->to(site_url('admin/users'));
                    break;
                case 4:
                    $this->data['module_name']      = 'adminmodules';
                    $this->data['current_module']   = $this->data[$this->data['module_name']]['appointments'];
                    session()->set('module_name', 'adminmodules');
                    return redirect()->to(site_url('admin/appointments'));
                    break;
                case 5:
                    $this->data['module_name']      = 'dentistmodules';
                    $this->data['current_module']   = $this->data[$this->data['module_name']]['dental'];
                    session()->set('module_name', 'dentistmodules');
                    return redirect()->to(site_url('admin/dental'));
                    break;

            }

            

            

            
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
            "address",
            "phone",
            "email",
            "password",
            "confirm",
            "file",
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

            $file = $this->request->getFile('file');
            if ($file == null) {
                echo 'Is null!';
            } else {
                $username = $fieldmap['fname'] . $fieldmap['mname'] . $fieldmap['lname'];
                $filename = hash('md5', $username);

                $file->move('uploads/Faculty', $filename . '.' . 'png');
            }

            $sha256 = hash('sha256', $fieldmap['password']);

            $data = [
                'fname'     => ucwords($fieldmap['fname']),
                'mname'     => ucwords($fieldmap['mname']),
                'lname'     => ucwords($fieldmap['lname']),
                'email'     => $fieldmap['email'],
                'password'  => $sha256,
                'groupID'   => $fieldmap['group'],
                'address'   => $fieldmap['address'],
                'bday'      => $fieldmap['birthdate'],
                'phone'     => $fieldmap['phone'],
                'status'    => 1,
            ];

            $this->db->table('users')->insert($data);
            $this->sendSMS($fieldmap['phone'], 'Hi, You have been registered to medcon, please wait for your account to be approved');
            $this->session->setFlashdata('msg', "Account Registered, Please wait for approval!");
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
            "file",
            "ename",
            "ephone",
        );

        $fieldmap = [];

        foreach ($fields as $field) {
            $fieldData          = $this->request->getPost($field);
            $fieldmap[$field]   = $fieldData;
        }

        $phoneLen   = strlen($fieldmap['phone']);
        $ephoneLen  = strlen($fieldmap['ephone']);

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

        if ($phoneLen != 11 || $ephoneLen != 11) {
            $this->session->setFlashdata('phone_error', "Invalid Phone Number!");
            $hasErrors = true;
        }

        if ($hasErrors) {
            return redirect()->to(site_url('signup'));
        } else {
            $file = $this->request->getFile('file');
            if($file == null){
                echo 'Is null!';
            }
            else {
                $username = $fieldmap['fname'] . $fieldmap['mname'] . $fieldmap['lname'];
                $filename = hash('md5', $username);
               
                $file->move('uploads/COR', $filename . '.'. 'png');
            }
            
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
                'cNum'      => $fieldmap['ephone'],
                'cPerson'   => $fieldmap['ename'],
            ];

            $this->db->table('users')->insert($data);

            $id = $this->db->insertID();

            $studentData = [
                'studentID' => $id,
                'year'      => $fieldmap['year'],
                'courseID'  => $fieldmap['course'],
            ];

            $this->db->table('students')->insert($studentData);

            $this->sendSMS($fieldmap['phone'], 'Hi, You have been registered to medcon, please wait for your account to be approved');
            $this->session->setFlashdata('msg', "Account Registered, Please wait for approval!");
            return redirect()->to(site_url(''));
        }
    }
}
