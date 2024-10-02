<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    private $db;
    private $data;
    private $session;

    public function __construct()
    {

        $this->db                       = \Config\Database::connect();
        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';
        $this->session                  = session();


        $sesfield = array(
            'firstname',
            'lastname',
            'middlename',
            'birthdate',
            'group',
            'course',
            'year',
            'id',
        );

        foreach ($sesfield as $ses) {
            $this->data['userdata'][$ses] = session()->get($ses);
        }
    }

    public function index()
    {
        echo view('header', $this->data);
        echo view('footer');
    }
}
