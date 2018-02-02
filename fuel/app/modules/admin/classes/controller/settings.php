<?php
/**
 * User: Thomas Gredin
 * Date: 24/01/2018
 * Time: 20:46
 */

namespace Admin\Controller;

class Settings extends Admin
{
    public function action_index()
    {
        $this->template->page = 'settings';
        $this->template->content = \View::forge('settings/index');
    }
}