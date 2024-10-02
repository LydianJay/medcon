<?php

namespace App\Controllers;

class Appointments extends BaseController
{

    public function __construct() {}

    public function index()
    {

        echo view('header', $this->data);
        echo view('modules/appointments/view');
        echo view('footer');
    }
}
