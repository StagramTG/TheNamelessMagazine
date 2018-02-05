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

        return $this->view('admin/account/index', $data);
    }
}