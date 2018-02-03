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
        \Config::load('globalsettings', true);
        $data = array();

        $data['page'] = 'settings';
        $data['contact_page_content'] = \Config::get('globalsettings.contact_page_content');
        return $this->view('admin/settings/index', $data);
    }

    public function post_updateContactsPage()
    {
        $content = \Input::post('content');

        \Config::load('globalsettings', true);
        \Config::set('globalsettings.contact_page_content', $content);
        \Config::save('globalsettings', 'globalsettings');
        \Response::redirect('/admin/settings');
    }
}