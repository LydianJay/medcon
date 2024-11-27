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

        $this->data['current_module']    = $this->data['usermodules']['account'];
        $this->private_data['msg'] = session()->getFlashdata('msg');

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
        
        $password   = $this->request->getPost('password');
        $confirm    = $this->request->getPost('confirm');
        $phone      = $this->request->getPost('phone');
        $address    = $this->request->getPost('address');
        $old        = hash('sha256', $this->request->getPost('old'));
        $id         = session()->get('id');
        

        $validate = $this->getTable('users')->select('password')->where('userID', $id)->where('password', $old)->get()->getResult();

        if(count($validate) <= 0) {
            session()->setFlashdata('msg', 'Invalid Old password');
            return redirect()->to(site_url('account'));
        }
        else if(strcmp($password, $confirm) != 0) {
            session()->setFlashdata('msg', 'Password does not match');
            return redirect()->to(site_url('account'));
        }
        else {
            $sha256     = hash('sha256', $password);

            $update = [
                'password' => $sha256,
                'address' => $address,
                'phone' => $phone,
            ];
            
            $this->getTable('users')->set('password', $sha256)->where('userID', $id)->update();
            session()->setFlashdata('msg', 'Password updated!');
            return redirect()->to(site_url('account'));
        }

    }

}