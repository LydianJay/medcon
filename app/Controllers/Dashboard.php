<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    private $sesfield;
    public function __construct()
    {

        $this->sesfield = array(
            'firstname',
            'lastname',
            'middlename',
            'birthdate',
            'group',
            'course',
            'year',
            'id',
        );

        foreach ($this->sesfield as $ses) {
            $this->data['userdata'][$ses] = session()->get($ses);
        }
    }



    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        echo view('header', $this->data);
        echo view('footer');
    }

    public function appointments()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else {
            redirect()->to(site_url('appointments'));
        }
    }

    public function signout()
    {
        session()->remove($this->sesfield);
        return redirect()->to(site_url(''));
    }
}
