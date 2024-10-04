<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Admin extends BaseController
{
    private $private_data;
    private $module;



    public function __construct()
    {
        $this->private_data['serviceList']         = $this->getTable('service')->get()->getResult();
        $this->private_data['username']            = session()->get('lastname') . ' ' . session()->get('firstname') . ' ' . substr(session()->get('middlename'), 0, 1) . '.';
        $this->private_data['table_field']         = [
            'Name',
            'Service Type',
            'Request Date',
            'Schedule',
            'Status',
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

    private function getMedItem($id)
    {
        return  $this->db->table('inventory')->select('*')->
                join('batch', 'batch.batchID = inventory.batchID', 'inner')->
                where('inventoryID', $id)->get()->getResult();
    }


    private function searchInventory($param)
    {
        $this->private_data['meds'] = $this->db->table('inventory')->select('*')
        ->join('batch', 'batch.batchID = inventory.batchID', 'inner')
        ->like('genericName', $param, 'after')->where('qty > ', 0)->limit(10)
        ->orderBy('genericName', 'ASC')->get()->getResult();
    }

    public function index()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }

        $this->data['current_module']    = $this->data['adminmodules']['appointments'];

        echo view('header', $this->data);
        echo view('modules/admin/appointments/view', $this->private_data);
        echo view('footer');
    }


    public function modify($id)
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }


        $this->data['current_module']    = $this->data['adminmodules']['appointments'];

        $groupQuery = $this->db->table('usergroups')->select('groupName, level')
            ->where('groupID', $this->private_data['appointments'][$id]->groupID)->get()
            ->getResult()[0];

        $this->private_data['table_field'] = ['Generic Name', 'Brand Name', 
                                            'Expiration Date', 'Inventory ID'];

        $doClear                           = $this->request->getGet('clear');

        if($this->request->getGet('clear') ) {
            session()->remove(['added', 'last_added_id']);
        }

        session()->set('apID', $id);    // set appointment ID

        $this->private_data['param']       = $id;
        $this->private_data['groupInfo']   = $groupQuery;
        $this->private_data['current']     = $this->private_data['appointments'][$id];
        $this->private_data['id']          = $this->private_data['current']->appID;
        $name                              = $this->private_data['current']->fname . ' ' . $this->private_data['current']->lname;
        $search                            = $this->request->getGet('search');
        $add_id                            = $this->request->getGet('id');
        $qty                               = $this->request->getGet('qty');
        $s_cart                            = session()->get('added');
        $s_added                           = [];


        
        

        if($s_cart != null) {
            $s_added = $s_cart;
        }
       
        if($add_id != null && !empty($add_id) && session()->get('last_added_id') != $add_id) {
            $itemquery = $this->getMedItem($add_id);
            if(!empty($itemquery)) {
                if(!in_array($itemquery[0], $s_added )) {
                    $copy = clone $itemquery[0];
                    $copy->qty = $qty;
                    $s_added[] = $copy;
                    session()->set('added', $s_added);
                    session()->set('last_added_id', $add_id);
                }
            }
        }


        $this->private_data['cart'] = $s_added;




        if($search != null && !empty($search)) {
            $this->searchInventory($search);
        } else {
            $this->searchInventory('');
        }

        

        session()->set('email_name',    $name);
        session()->set('email_address', $this->private_data['current']->email);
        echo view('header', $this->data);
        echo view('modules/admin/appointments/form', $this->private_data);
        echo view('footer');
    }

    public function schedule($id)
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }

        $this->data['current_module']    = $this->data['adminmodules']['appointments'];
        $sched                           = $this->request->getPost('schedule');
        $time                            = $this->request->getPost('time');

        if (empty($sched) || $sched == null) {
            
            $orderList  = session()->get('added');

            foreach($orderList as $order) { // this just ensures that we have enought items
                
                $sqlResult =    $this->db->table('inventory')->where('inventoryID', $order->inventoryID)->
                                where('qty >=', $order->qty)->get()->getResult();
                if(empty($sqlResult)) {
                    session()->remove(['added', 'last_added_id']);
                    session()->setFlashdata('generic_error', "Not enought $order->genericName in inventory to complete the request");
                    $id = session()->get('apID');
                    session()->remove('apID'); // cleanup
                    return redirect()->to("/admin/modify/$id");
                }
            }

            // if it is ensured then proceed to update
            foreach($orderList as $r) {
                $this->db->table('inventory')->set('qty', "qty - {$r->qty}", false)->where('inventoryID', $r->inventoryID)->update();
            }


            $this->db->table('appointments')->set('status', 2)->where('appID', $id)->update();
        } else {
            $date = explode('-', $sched);
            $actual = $date[1] . '/' . $date[2] . '/' . $date[0];
            $this->db->table('appointments')->set('status', 1)->set('schedDate', $actual)->set('schedTime', $time)->where('appID', $id)->update();

            try {


                $this->mail->isSMTP();                                            //Send using SMTP
                $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $this->mail->Username   = 'medconnemsu@gmail.com';                     //SMTP username
                $this->mail->Password   = 'ampzczzunlrkgbll';                               //SMTP password
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $this->mail->Port       = 587;                                  // TCP port to connect

                $this->mail->setFrom('medconnemsu@gmail.com', 'medcon');
                $this->mail->addAddress(session()->get('email_address'), session()->get('email_name'));    // Add a recipient
                $this->mail->addReplyTo('medconnemsu@gmail.com', 'medcon');
                $msg = "Your request has been approved! Scheduled at $actual $time";
                $this->mail->isHTML(true);                                       
                $this->mail->Subject = 'Appoinment Request Scheduled';
                $this->mail->Body    = $msg;
                $this->mail->AltBody = $msg;

                $this->mail->send();

            } catch (Exception $e) {
                session()->setFlashdata('error_auth', "{$this->mail->ErrorInfo}");
                return redirect()->to(site_url(''));
            }
        }
        //clean up
        session()->remove(['added', 'last_added_id', 'apID']);
        // [NOTE] check invalidd schedule => schedule only occurs in future
        return redirect()->to('/admin/appointments');
    }
}
