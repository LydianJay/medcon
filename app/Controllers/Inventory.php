<?php

namespace App\Controllers;


class Inventory extends BaseController
{
    private $private_data;
    private $module;


    public function __construct() 
    {
        $this->private_data['table_fields']       = [''];
        $this->private_data['medtype']            = ['Tablet', 'Capsule', 'Liquid', 'Other'];
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

        $this->data['current_module']    = $this->data['adminmodules']['inventory'];

        echo view('header', $this->data);
        echo view('modules/admin/inventory/view');
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
        $this->data['current_module']    = $this->data['adminmodules']['inventory'];

        

        echo view('header', $this->data);
        echo view('modules/admin/inventory/add', $this->private_data);
        echo view('footer');
    }

    public function post_add()
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data['adminmodules']['inventory'];



        $postField = [
            'gname',        'bname',
            'quantity',     'type',
            'receive',      'expire',
            'description',
        ];

        $postData = [];

        foreach($postField as $data) {
            $postData[$data] = $this->request->getPost($data);
            echo $postData[$data] . "<br>";
        }

        $batch      = [
            'recDate'       => $postData['receive'],
            'expDate'       => $postData['expire'],
        ];

        $this->db->table('batch')->insert($batch);

        $inventory  = [
            'medType'       => $postData['type'],
            'genericName'   => $postData['gname'],
            'brandName'     => $postData['bname'],
            'qty'           => $postData['quantity'],
            'description'   => $postData['description'],
            'batchID'       => $this->db->insertID(),
        ];

        $this->db->table('inventory')->insert($inventory);
        
        return redirect()->to(site_url('admin/inventory'));
    }   
}
