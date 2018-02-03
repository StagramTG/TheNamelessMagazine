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

    public function action_edit()
    {
        $data = array();

        if(\Input::method() == 'POST')
        {
            if(\Input::post('id', false))
            {
                // Update
            }
            else
            {
                // Create
            }
        }
        else if(\Input::method() == 'GET')
        {
            if(\Input::get('id', false))
            {
                // display existing
            }
        }

        $data['page'] = 'users';
        return $this->view('admin/users/edit', $data);
    }
}