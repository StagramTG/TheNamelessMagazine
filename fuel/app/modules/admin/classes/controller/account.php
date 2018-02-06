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
            $success = true;
            try
            {
                $success = \Auth::update_user(array(
                    'old_password' => \Input::post('oldpassword'),
                    'password' => \Input::post('newpassword')
                ));

                if ($success) \Session::set_flash('update_success', true);
                else \Session::set_flash('update_fail', true);
            }
            catch (\Exception $e)
            {
                \Session::set_flash('update_fail', true);
            }

            \Response::redirect('/admin/account/userpassword');
        }

        if(\Input::post('email'))
        {
            // Update email
            $success = \Auth::update_user(array(
                'email' => \Input::post('email')
            ));

            if ($success) \Session::set_flash('update_success', true);
            else \Session::set_flash('update_fail', true);

            \Response::redirect('/admin/account/useremail');
        }

        \Response::redirect('/admin/account/user');
    }
}