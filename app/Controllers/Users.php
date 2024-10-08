<?php

namespace App\Controllers;


class Users extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $this->private_data['table_field'] = ['Last Name', 'First Name', 'Middle Name' , 'Designation', 'Contact No.', 'Email'];
    }

    private function getUsers()
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->where('level < ', 3)->where('status', 1)->limit(15)->get()->getResult();
    }

    public function index()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data['adminmodules']['users'];


        $this->getUsers();

        echo view('header', $this->data);
        echo view('modules/admin/users/view', $this->private_data);
        echo view('footer');
    }

}