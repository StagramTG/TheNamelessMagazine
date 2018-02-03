<?php
/**
 * User: Thomas Gredin
 * Date: 24/01/2018
 * Time: 20:46
 */

namespace Admin\Controller;

class Users extends Admin
{
    public function action_index()
    {
        $data = array();
        $data['users'] = \Auth\Model\Auth_User::query()->get();

        $data['page'] = 'users';
        return $this->view('admin/users/index', $data);
    }
}