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
        $data['page'] = 'contacts';
        return $this->view('contacts/index', $data);
    }
}