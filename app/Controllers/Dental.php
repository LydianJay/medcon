<?php

namespace App\Controllers;

class Dental extends BaseController
{
    private $private_data;

    public function __construct() 
    {
        
    }


    private function getAnnouncements()
    {
        $this->private_data['table'] = $this->getTable('announcements')->where('status', 1)->get()->getResult();
    }

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $this->data['table'] = $this->getTable('announcements')->where('status', 1)->get()->getResult();
        $this->data['current_module']    = $this->data['usermodules']['dental'];
        return view('modules/students/dental/index', $this->data);
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
        $this->data['current_module']    = $this->data['adminmodules']['dental'];



        echo view('header', $this->data);
        echo view('modules/admin/dental/form');
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
        $date       = $this->request->getPost('date');
        $content    = $this->request->getPost('content');
        
        $sql = [
            'title'     => $title,
            'date'      => $date,
            'content'   => $content,
            'status'    => 1,
        ];

        $this->getTable('announcements')->insert($sql);
        return redirect()->to(site_url('admin/dental'));
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
        $this->data['current_module']    = $this->data['adminmodules']['dental'];

        $this->getAnnouncements();
        echo view('header', $this->data);
        echo view('modules/admin/dental/view', $this->private_data);
        echo view('footer');
    }

}