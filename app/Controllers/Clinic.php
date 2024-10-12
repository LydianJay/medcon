<?php

namespace App\Controllers;

class Clinic extends BaseController
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

        $this->data['table'] = $this->getTable('announcements')->where('status', 1)->get()->getResult();
        $this->data['current_module']    = $this->data['usermodules']['dental'];
        return view('modules/students/clinic/index', $this->data);
    }


   

}