<?php

namespace App\Controllers;


class Registrar extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $this->getStudents();
        $this->private_data['table_field'] = ['Last Name', 'First Name', 'Middle Name' ,  'Course', 'Year', 'ID number', ' ', ' '];
    }

    private function getStudents()
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->
        join('students', 'students.studentID = users.userID')->join('course','course.courseID = students.courseID')->
        where('status', 0)->limit(25)->get()->getResult();
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

        echo view('header', $this->data);
        echo view('modules/admin/registrar/view', $this->private_data);
        echo view('footer');
    }
}