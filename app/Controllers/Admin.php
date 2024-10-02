<?php

namespace App\Controllers;

class Admin extends BaseController
{
    private $private_data;
    
    public function __construct() 
    {
        $this->private_data['serviceList']         = $this->getTable('service')->get()->getResult();    
        $this->private_data['username']            = session()->get('lastname') .' '. session()->get('firstname') .' '. substr(session()->get('middlename'), 0, 1) . '.';
        $this->private_data['table_field']         = [
            'Name', 'Service Type', 'Request Date', 'Schedule', 'Status',       
        ];
        $this->private_data['serviceAssoc']        = [];
        foreach ($this->private_data['serviceList'] as $service) {
            $this->private_data['serviceAssoc'][$service->serviceID] = $service->serviceName;
        }
        $this->get_appointments();
    }

    private function get_appointments()
    {
        $this->private_data['appointments'] = $this->db->table('appointments')->select('*, service.serviceName as sname, users.fname as fname, users.lname as lname')
        ->join('service', 'service.serviceID = appointments.serviceID', 'inner')->join('users', 'users.userID = appointments.userID', 'inner')->orderBy('status', 'ASC')
        ->get()->getResult();
    }

    public function index()
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }
        
        
        echo view('header', $this->data);
        echo view('modules/admin/appointments/view', $this->private_data);
        echo view('footer');
    }

    
}
