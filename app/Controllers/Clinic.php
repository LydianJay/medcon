<?php

namespace App\Controllers;

class Clinic extends BaseController
{
    private $private_data;

    public function __construct() 
    {
        
    }

    private function getServices()
    {
        $this->private_data['table'] = $this->getTable('clinic')->get()->getResult();
    }
   

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $this->data['table'] = $this->getTable('clinic')->where('status', 1)->get()->getResult();
        $this->data['current_module']    = $this->data['usermodules']['clinic'];
        return view('modules/students/clinic/index', $this->data);
    }


    public function admin()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data['adminmodules']['clinic'];

        $this->getServices();
        echo view('header', $this->data);
        echo view('modules/admin/clinic/view', $this->private_data);
        echo view('footer');
    }


    public function add()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data['adminmodules']['clinic'];



        echo view('header', $this->data);
        echo view('modules/admin/clinic/form');
        echo view('footer');
    }



    public function postAdd()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }

        $title      = $this->request->getPost('title');
        $content    = $this->request->getPost('content');
        
        $sql = [
            'title'         => $title,
            'description'   => $content,
            'status'        => 1,
        ];

        $this->getTable('clinic')->insert($sql);
        return redirect()->to(site_url('admin/clinic'));
    }



}