<?php

namespace App\Controllers;


class Inventory extends BaseController
{
    private $private_data;
    private $module;


    public function __construct() 
    {
        $this->private_data['table_field']       = ['Generic Name', 'Brand Name', 'Type', 'Quantity', 'Date Received', 'Expiration Date', 'Inventory ID', '.' ,'.'];
        $this->private_data['medtype']            = ['Tablet', 'Capsule', 'Liquid', 'Other'];
    }

    private function getinventory()
    {
        $this->private_data['query'] = $this->db->table('inventory')->select('*')->join('batch', 'batch.batchID = inventory.batchID', 'inner')->orderBy('genericName', 'ASC')->get()->getResult();
    }

    private function searchInventory($param)
    {
        
        $this->private_data['query'] = $this->db->table('inventory')->select('*')
        ->join('batch', 'batch.batchID = inventory.batchID', 'inner')
        ->like('genericName', $param, 'after')
        ->orderBy('genericName', 'ASC')->get()->getResult();

    }

    public function index()
    {

        $this->auth('inventory');


        $param                           = $this->request->getGet('search');
        $this->data['msg']               = session()->get('msg');
        session()->remove('msg'); // clean up
        
        $param == null ? $this->getinventory() : $this->searchInventory($param);

        echo view('header', $this->data);
        echo view('modules/admin/inventory/view', $this->private_data);
        echo view('footer');
    }


    public function add() 
    {

        $this->auth('inventory');


        

        echo view('header', $this->data);
        echo view('modules/admin/inventory/add', $this->private_data);
        echo view('footer');
    }



    public function modify()
    {
        $this->auth('inventory');

        $id                              = $this->request->getGet('id'); 
        $apply                           = $this->request->getGet('apply');
        $result     = $this->db->table('inventory')->select('*')->join('batch', 'batch.batchID = inventory.batchID', 'inner')->
                    where('inventoryID', $id)->get()->getResult()[0];

        $this->private_data['current']        = $result;
        $this->private_data['id']             = $id;
        
        // ===== To Be Used in 'apply()' ===============
        session()->set('apply_id', $id);
        session()->set('apply_batch_id', $result->batchID);
        // =============================================

        echo view('header', $this->data);
        echo view('modules/admin/inventory/modify', $this->private_data);
        echo view('footer');
    }

    public function apply()
    {
        $this->auth('inventory');

        
        $id         = session()->get('apply_id');
        $batchID    = session()->get('apply_batch_id');

        $this->private_data['msg'] = 'Modify Success!';
        $postData = [];
        $postField = [
            'generic', 'brand',
            'type', 'qty', 
            'date', 'exp',
            'desc'
        ];            
        
        foreach($postField as $field) {
            $data               = $this->request->getPost($field);
            $postData[$field]   = $data; 
        }

        $inventory = [
            'medType'       => $postData['type'],
            'genericName'   => $postData['generic'],
            'brandName'     => $postData['brand'],
            'qty'           => $postData['qty'],
            'description'   => $postData['desc']
        ];

        $batch = [
            'recDate' => $postData['date'],
            'expDate' => $postData['exp']
        ];

        $this->db->table('inventory')->set($inventory)->where('inventoryID', $id)->update();
        $this->db->table('batch')->set($batch)->where('batchID', $batchID)->update();
        session()->remove(['apply_id', 'apply_batch_id']);
        session()->set('msg', 'Modify Success!');
        return redirect()->to(site_url('admin/inventory'));
    }


    public function delete()
    {
        $this->auth('inventory');

        $id     = $this->request->getPost('id');
        $entry  = $this->db->table('inventory')->where('inventoryID', $id)->get()->getResult()[0];
        

        // delete inventory
        $this->db->table('inventory')->where('inventoryID', $id)->delete();
        // delete batch
        $this->db->table('batch')->where('batchID', $entry->batchID)->delete();

        session()->set('msg', 'Deleted an entry!');
        return redirect()->to(site_url('admin/inventory'));
    }

    public function post_add()
    {
        $this->auth('inventory');




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
