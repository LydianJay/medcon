<?php

namespace App\Controllers;


class Registrar extends BaseController
{
    private $private_data;

    public function __construct()
    {
        
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

        $this->data['current_module']    = $this->data['adminmodules']['registrar'];

        echo view('header', $this->data);
        echo view('modules/admin/registrar/view');
        echo view('footer');
    }
}