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
        $this->template->page = 'users';
        $this->template->content = \View::forge('users/index');
    }
}