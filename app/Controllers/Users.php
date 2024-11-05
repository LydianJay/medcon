<?php

namespace App\Controllers;


class Users extends BaseController
{
    private $private_data;

    public function __construct()
    {
        $this->data['module_name'] = session()->get('module_name');
        $this->private_data['table_field'] = ['Last Name', 'First Name', 'Middle Name' , 'Designation', 'Contact No.', 'Email'];
    }

    private function getUsers()
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->where('level < ', 3)->where('status', 1)->limit(15)->get()->getResult();
    }


    private function getUsersByName($name)
    {
        $this->private_data['query'] = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->
        where('level < ', 3)->where('status', 1)->like('fname', $name, 'first')->
        limit(15)->get()->getResult();
    }


    private function getUserByID($id)
    {
        $info = $this->getTable('users')->join('usergroups', 'users.groupID = usergroups.groupID')->where('level < ', 3)->
        where('status', 1)->where('userID', $id)->get()->getResult()[0];

        if($info->level == 0){
            $this->private_data['schoolinfo'] = $this->db->table('students')->join('course', 'course.courseID = students.courseID')->where('studentID', $id)->get()->getResult()[0];
        }
        $this->private_data['info'] = $info;
    }

    public function index()
    {
        $this->auth('users');

        $search = $this->request->getGet('search');
        if($search != null && !empty($search)){
            $this->getUsersByName($search);
        }
        else {
            $this->getUsers();
        }


        echo view('header', $this->data);
        echo view('modules/admin/users/view', $this->private_data);
        echo view('footer');
    }


    public function more($id)
    {
        $this->auth('users');




        $this->getUserByID($id);
        $filepath = $this->private_data['info']->fname . $this->private_data['info']->mname . $this->private_data['info']->lname;
        $hash = hash('md5', $filepath);
        $this->private_data['cor'] = base_url('uploads/Faculty/' . $hash . '.' . 'png');
        echo view('header', $this->data);
        echo view('modules/admin/users/more', $this->private_data);
        echo view('footer');
    }



}