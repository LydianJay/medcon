<?php

namespace App\Controllers;

class Dental extends BaseController
{

    public function __construct() 
    {
        
    }


    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }


        $this->data['current_module']    = $this->data['usermodules']['dental'];
        return view('modules/students/dental/index', $this->data);
    }

}