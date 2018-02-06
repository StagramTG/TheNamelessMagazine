<?php
/**
 * User: Thomas Gredin
 * Date: 05/02/2018
 * Time: 21:59
 */

namespace Admin\Controller;

class Account extends Admin
{
    public function action_index()
    {
        $data = array();
        $data['page'] = 'account';
        $data['articles'] = \Model\Article::query()
            ->where('user_id', '=', \Auth::get('id'))
            ->limit(5)
            ->get();

        return $this->view('admin/account/index', $data);
    }

    public function action_user()
    {
        $data = array();
        $data['page'] = 'account';
        $data['tab'] = 'general';

        return $this->view('admin/account/user/general', $data);
    }

    public function action_useremail()
    {
        $data = array();
        $data['page'] = 'account';
        $data['tab'] = 'email';

        return $this->view('admin/account/user/email', $data);
    }

    public function action_userpassword()
    {
        $data = array();
        $data['page'] = 'account';
        $data['tab'] = 'password';

        return $this->view('admin/account/user/password', $data);
    }

    public function post_updateUser()
    {
        if(\Input::post('newpassword'))
        {
            // Update password
        }

        if(\Input::post('email'))
        {
            // Update email
        }

        \Response::redirect('/admin/account/user');
    }
}