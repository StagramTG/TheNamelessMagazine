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

    public function action_create()
    {
        $data = array();

        if(\Input::method() == 'POST')
        {
            // Create
            $new_user = \Auth::create_user(
                \Input::post('username'),
                \Input::post('password'),
                \Input::post('email')
            );

            \Response::redirect('/admin/users');
        }

        $data['page'] = 'users';
        return $this->view('admin/users/create', $data);
    }
}