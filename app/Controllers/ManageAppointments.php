<?php

namespace App\Controllers;

class ManageAppointments extends BaseController
{
    private $private_data;
    
    public function __construct() 
    {
        $this->private_data['serviceList']         = $this->getTable('service')->get()->getResult();    
        $this->private_data['username']            = session()->get('lastname') .' '. session()->get('firstname') .' '. substr(session()->get('middlename'), 0, 1) . '.';
        $this->get_appointments();
    }

    private function get_appointments()
    {
        $this->private_data['appointments'] = $this->db->table('appointments')->select('*, service.serviceName as name')
        ->join('service', 'service.serviceID = appointments.serviceID', 'inner')
        ->get()->getResult();
    }

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }
        
        
        echo view('header', $this->data);
        echo view('modules/students/appointments/view', $this->private_data);
        echo view('footer');
    }

    
}
