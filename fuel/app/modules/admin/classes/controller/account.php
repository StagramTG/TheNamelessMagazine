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
}