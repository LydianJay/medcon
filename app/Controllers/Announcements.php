<?php

namespace App\Controllers;
class Announcements extends BaseController
{
    private $private_data;
    public function __construct() {}


    private function getAnnouncements()
    {
        $this->private_data['table'] = $this->getTable('announcements')->get()->getResult();

    }

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data['usermodules']['announcement'];
       
        $this->getAnnouncements();

        echo view('header', $this->data);
        echo view('modules/students/announcements/view', $this->private_data);
        echo view('footer');
    }



    public function admin()
    {
       
        $this->auth('announcement');
        $this->getAnnouncements();
        echo view('header', $this->data);
        echo view('modules/admin/announcements/view',$this->private_data);
        echo view('footer');
    }


    public function add()
    {
        $this->auth('announcement');



        echo view('header', $this->data);
        echo view('modules/admin/announcements/form');
        echo view('footer');
    }

    public function postAdd()
    {
        $this->auth('announcement');

        $title      = $this->request->getPost('title');
        $content    = $this->request->getPost('content');
        $date       = $this->request->getPost('date');

        $sql = [
            'title'         => $title,
            'content'       => $content,
            'date'          => $date,
            'status'        => 1,
        ];

        $this->getTable('announcements')->insert($sql);
        return redirect()->to(site_url('admin/announcements'));
    }

}