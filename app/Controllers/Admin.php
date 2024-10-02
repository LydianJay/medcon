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


    public function modify($id) 
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }
        $groupQuery = $this->db->table('usergroups')->select('groupName, level')
                    ->where('groupID', $this->private_data['appointments'][$id]->groupID)->get()
                    ->getResult()[0];

        $this->private_data['groupInfo']   = $groupQuery;
        $this->private_data['current']     = $this->private_data['appointments'][$id];
        $this->private_data['id']          = $this->private_data['current']->appID;
        echo view('header', $this->data);
        echo view('modules/admin/appointments/form', $this->private_data);
        echo view('footer');
    }

    public function schedule($id)
    {
        if (session()->get('firstname') == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        }

        $sched = $this->request->getPost('schedule');

        if(empty($sched) || $sched == null) {
            echo 'Set 2'. '<br>' . $id. ' Data';
            $this->db->table('appointments')->set('status', 2)->where('appID', $id)->update();
        }
        else {
            echo 'Set 1' . '<br>' . $id . ' Data';
            $date = explode('-', $sched);
            $actual = $date[1].'/'.$date[2].'/'.$date[0];
            $this->db->table('appointments')->set('status', 1)->set('schedDate', $actual)->where('appID', $id)->update();
        }
        
        // [NOTE] check invalidd schedule => schedule only occurs in future
        return redirect()->to('/admin/appointments');
        

    }
    
}
