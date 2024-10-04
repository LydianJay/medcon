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




        $this->private_data['groupInfo']   = $groupQuery;
        $this->private_data['current']     = $this->private_data['appointments'][$id];
        $this->private_data['id']          = $this->private_data['current']->appID;
        $name = $this->private_data['current']->fname . ' ' . $this->private_data['current']->lname;

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

        $sched = $this->request->getPost('schedule');

        if (empty($sched) || $sched == null) {
            echo 'Set 2' . '<br>' . $id . ' Data';




            $this->db->table('appointments')->set('status', 2)->where('appID', $id)->update();
        } else {
            echo 'Set 1' . '<br>' . $id . ' Data';
            $date = explode('-', $sched);
            $actual = $date[1] . '/' . $date[2] . '/' . $date[0];
            $this->db->table('appointments')->set('status', 1)->set('schedDate', $actual)->where('appID', $id)->update();

            try {


                // $this->mail->isSMTP();                                            //Send using SMTP
                // $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                // $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                // $this->mail->Username   = 'medconnemsu@gmail.com';                     //SMTP username
                // $this->mail->Password   = 'ampzczzunlrkgbll';                               //SMTP password
                // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                // $this->mail->Port       = 587;                                  // TCP port to connect

                // $this->mail->setFrom('medconnemsu@gmail.com', 'medcon');
                // $this->mail->addAddress(session()->get('email_address'), session()->get('email_name'));    // Add a recipient
                // $this->mail->addReplyTo('medconnemsu@gmail.com', 'medcon');

                // $this->mail->isHTML(true);                                       
                // $this->mail->Subject = 'Appoinment Request';
                // $this->mail->Body    = "Your request has been approved! Scheduled at $actual";
                // $this->mail->AltBody = "Your request has been approved! Scheduled at $actual";;

                // $this->mail->send();


                echo 'Message has been sent';
            } catch (Exception $e) {
                session()->setFlashdata('error_auth', "{$this->mail->ErrorInfo}");
                return redirect()->to(site_url(''));
                echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            }
        }

        // [NOTE] check invalidd schedule => schedule only occurs in future
        return redirect()->to('/admin/appointments');
    }
}
