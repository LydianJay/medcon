<?php

namespace App\Controllers;


class Registrar extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $this->getStudents();
        $this->private_data['table_field'] = ['Last Name', 'First Name', 'Middle Name' ,  'Course', 'Year', 'Set ID number', ' ', ' '];
    }

    private function getStudents()
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->
        join('students', 'students.studentID = users.userID')->join('course','course.courseID = students.courseID')->
        where('status', 0)->limit(25)->get()->getResult();
    }


    private function setStudentStatus($id, $status, $newID) 
    {
        $this->db->table('users')->set('status', $status)->set('userID', $newID)->where('userID', $id)->update();
    }

    private function deleteUser($id)
    {   
        $this->db->table('users')->where('userID', $id)->delete();
        $this->db->table('students')->where('studentID', $id)->delete();
    }

    private function setStudentID($id, $newID)
    {
        $this->db->table('students')->set('studentID', $newID)->where('studentID', $id)->update();
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
        $this->data['current_module']    = $this->data['adminmodules']['registrar'];


        $approveID      = $this->request->getGet('approve');
        $disapproveID   = $this->request->getGet('disapprove');
        $newID          = $this->request->getGet('id');


        if($approveID != null && !empty($approveID)) {
            $this->setStudentStatus($approveID, 1, $newID);
            $this->setStudentID($approveID, $newID);
            $this->getStudents();
        }



        if($disapproveID != null && !empty($disapproveID)){
            $this->deleteUser($disapproveID);
            $this->getStudents(); // update table in view
        }




        echo view('header', $this->data);
        echo view('modules/admin/registrar/view', $this->private_data);
        echo view('footer');
    }
}