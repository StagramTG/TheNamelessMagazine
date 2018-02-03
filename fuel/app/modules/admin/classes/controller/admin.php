<?php
/**
 * User: Thomas Gredin
 * Date: 23/01/2018
 * Time: 21:17
 */

namespace Admin\Controller;

class Admin extends \Fuelblade\Controller\Blade
{
    public function before()
    {
        parent::before();
        if(!\Auth::check())
        {
            \Response::redirect('/login');
        }
    }

    public function action_index()
    {
        $data = array();
        $data['page'] = 'dashboard';

        return $this->view('admin/index', $data);
    }

    public function action_registerUser()
    {
        if (\Input::method() == 'POST')
        {
            $data = \Input::post();

            $new_user = \Auth::create_user(
                $data['username'],
                $data['password'],
                $data['email']
            );

            if($new_user)
            {
                \Session::set_flash('register_success', true);
            }
            else
            {
                \Session::set_flash('register_error', true);
            }
        }

        $this->template->page = 'user.register';
        $this->template->content = \View::forge('admin/register');
    }
}