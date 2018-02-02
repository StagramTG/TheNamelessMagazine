<?php
/**
 * User: Thomas Gredin
 * Date: 23/01/2018
 * Time: 18:04
 */

namespace Controller;

class Home extends \Fuelblade\Controller\Blade
{
    public function action_index()
    {
        $data = array();
        $data['articles'] = \Model\Article::query()
            ->related('users')
            ->related('categories')
            ->order_by('created_at', 'desc')
            ->where('draft', '=', 0)
            ->limit(10)
            ->get();

        return $this->view('home/index', $data);
    }

    public function action_404()
    {
        $this->template->content = \View::forge('home/404', array());
    }


    public function action_login()
    {
        if(\Auth::check())
        {
            // Already connected, redirect to admin
            \Response::redirect('/admin');
        }

        if(\Input::method() == 'POST')
        {
            if(\Auth::instance()->login(\Input::post('username'), \Input::post('password')))
            {
                \Response::redirect('/admin');
            }
            else
            {
                \Session::set_flash('connection_error', true);
            }
        }

        return $this->view('home/login');
    }

    public function action_logout()
    {
        if(\Auth::check())
        {
            \Auth::logout();
        }

        \Response::redirect('/');
    }
}