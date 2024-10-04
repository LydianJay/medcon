<?php

namespace App\Controllers;

class Appointments extends BaseController
{
    private $private_data;
    private $module;




    public function __construct()
    {
        $this->initData();
        $this->module                              = &$this->data['usermodules']['appointments'];
        $this->private_data['serviceList']         = $this->getTable('service')->get()->getResult();
        $this->private_data['username']            = session()->get('lastname') . ' ' . session()->get('firstname') . ' ' . substr(session()->get('middlename'), 0, 1) . '.';

        $this->get_appointments();
    }

    private function get_appointments()
    {
        $this->private_data['appointments'] = $this->db->table('appointments')->select('*, service.serviceName as name')
            ->join('service', 'service.serviceID = appointments.serviceID', 'inner')
            ->where('userID', session()->get('id'))->orderBy('status', 'ASC')
            ->get()->getResult();
    }

    public function index()
    {

        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }


        $this->data['current_module']    = $this->data['usermodules']['appointments'];
        echo view('header', $this->data);
        echo view('modules/students/appointments/view', $this->private_data);
        echo view('footer');
    }

    public function form()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $this->get_appointments();
        $this->data['current_module']    = $this->data['usermodules']['appointments'];
        echo view('header', $this->data);
        echo view('modules/students/appointments/form', $this->private_data);
        echo view('footer');
    }

    public function submitform()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Not authorized. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $desc = $this->request->getPost('description');
        $type = $this->request->getPost('service');




        $sql = [
            'reqDate'       => date('m/d/Y'),
            'description'   => $desc,
            'userID'        => session()->get('id'),
            'serviceID'     => $type,
        ];

        $this->db->table('appointments')->insert($sql);

        return redirect()->to(site_url('appointments'));
    }
}
