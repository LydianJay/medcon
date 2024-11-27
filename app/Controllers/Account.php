<?php

namespace App\Controllers;

class Account extends BaseController
{
    private $private_data; 

    public function __construct() 
    {
        
    }


    public function index()
    {

        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $this->data['current_module']       = $this->data['usermodules']['account'];
        $this->private_data['address']      = session()->get('address');
        $this->private_data['phone']        = session()->get('phone');
        $this->private_data['msg']          = session()->getFlashdata('msg');

        echo view('header', $this->data);
        echo view('modules/students/account/form', $this->private_data);
        echo view('footer');
    }


    public function update()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }
        
       
        $phone      = $this->request->getPost('phone');
        $address    = $this->request->getPost('address');
        $file       = $this->request->getFile('file');
        
        $id         = session()->get('id');
        

        $validate = $this->getTable('users')->where('userID', $id)->get()->getResult();

        if($file->isValid()){
            $acc = $validate[0];

            $username = $acc->fname . $acc->mname . $acc->lname;
            $filename = hash('md5', $username);
            $file->move('uploads/Profile', $filename . '.' . 'png');
        } 


        $update = [
            'address' => $address,
            'phone' => $phone,
        ];

        session()->set('phone', $phone);
        session()->set('address', $address);

        $this->getTable('users')->where('userID', $id)->set($update)->update();
        session()->setFlashdata('msg', 'Account information Updated!');
        return redirect()->to(site_url('account'));
    }


    public function updateCredentials()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $password   = $this->request->getPost('password');
        $confirm    = $this->request->getPost('confirm');
       
        $old        = hash('sha256', $this->request->getPost('old'));
        $id         = session()->get('id');


        $validate = $this->getTable('users')->where('userID', $id)->where('password', $old)->get()->getResult();

        if (count($validate) <= 0) {
            session()->setFlashdata('msg', 'Invalid Old password');
            return redirect()->to(site_url('account'));
        } else if (strcmp($password, $confirm) != 0) {
            session()->setFlashdata('msg', 'Password does not match');
            return redirect()->to(site_url('account'));
        } 
        else if(!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) {
            session()->setFlashdata('msg', 'It must contains numbers and characters');
            return redirect()->to(site_url('account'));
        }
        else if(strlen($password) < 8) {
            session()->setFlashdata('msg', 'Password must be atleast 8 characters');
            return redirect()->to(site_url('account'));
        }
        else {
            $sha256     = hash('sha256', $password);

            $update = [
                'password' => $sha256,
            ];

            $this->getTable('users')->set($update)->where('userID', $id)->update();
            session()->setFlashdata('msg', 'Account Credentials Updated!');
            return redirect()->to(site_url('account'));
        }
    }
}