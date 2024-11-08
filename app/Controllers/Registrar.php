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

    private function searchStudents($name)
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->
        join('students', 'students.studentID = users.userID')->join('course','course.courseID = students.courseID')->
        where('status', 0)->where('fname',$name,'after')->limit(25)->get()->getResult();
    }

    private function getUserByID($id)
    {
        $info = $this->getTable('users')
        ->join('usergroups', 'users.groupID = usergroups.groupID')
        ->where('level < ', 3)
        ->where('userID', $id)
        ->get()
        ->getResult()[0];

        if ($info->level == 0) {
            $this->private_data['schoolinfo'] = $this->db->table('students')->join('course', 'course.courseID = students.courseID')->where('studentID', $id)->get()->getResult()[0];
        }
        $this->private_data['info'] = $info;
    }


    private function setStudentStatus($id, $status, $newID) 
    {
        $this->db->table('users')->set('status', $status)->set('schoolID', $newID)->where('userID', $id)->update();
    }

    private function deleteUser($id)
    {   
        $this->db->table('users')->where('userID', $id)->delete();
        $this->db->table('students')->where('studentID', $id)->delete();
    }

    private function setStudentID($id, $newID)
    {
        $this->db->table('users')->set('schoolID', $newID)->where('userID', $id)->update();
    }


    public function index()
    {
        $this->auth('registrar');

        

        $approveID      = $this->request->getGet('approve');
        $disapproveID   = $this->request->getGet('disapprove');
        $newID          = $this->request->getGet('id');
        $searchVal      = $this->request->getGet('search');



        if($searchVal != null && !empty($searchVal)) {
            $this->searchStudents($searchVal);
        }

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


    public function more($id)
    {
        $this->auth('registrar');

        

        $this->getUserByID($id);

        $filepath = $this->private_data['info']->fname . $this->private_data['info']->mname . $this->private_data['info']->lname;
        $hash = hash('md5', $filepath);
        $this->private_data['cor'] = base_url('uploads/COR/' . $hash . '.' . 'png');

        echo view('header', $this->data);
        echo view('modules/admin/registrar/more', $this->private_data);
        echo view('footer');
    }
}