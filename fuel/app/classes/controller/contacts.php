<?php
/**
 * User: Thomas Gredin
 * Date: 02/02/2018
 * Time: 19:03
 */

namespace Controller;

class Contacts extends \Fuelblade\Controller\Blade
{
    public function action_index()
    {
        $data = array();

        \Config::load('globalsettings', true);
        $data['content'] = \Config::get('globalsettings.contact_page_content');

        $data['page'] = 'contacts';
        return $this->view('contacts/index', $data);
    }
}