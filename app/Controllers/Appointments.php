<?php

namespace App\Controllers;

class Appointments extends BaseController
{

    public function __construct() {}

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        echo view('header', $this->data);
        echo view('modules/appointments/view');
        echo view('footer');
    }
}
