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
        $data = array();

        $data['page'] = 'settings';
        return $this->view('admin/settings/index', $data);
    }

    public function post_updateContactPage()
    {
        $content = \Input::post('content');

        \Config::load('globalsettings');
        \Config::set('globalsettings.contact_page_content', $content);
        \Config::save('globalsettings');
        \Response::redirect('/admin/settings');
    }
}