<?php
/**
 * User: Thomas Gredin
 * Date: 02/02/2018
 * Time: 18:11
 */

namespace Controller;

class Articles extends \Fuelblade\Controller\Blade
{
    public function action_index()
    {
        $page = \Input::get('page');
        $data = array();

        if($page != null)
        {
            $data['articles'] = \Model\Article::query()
                ->related('users')
                ->related('categories')
                ->order_by('created_at', 'desc')
                ->where('draft', '=', 0)
                ->offset($page * 10)
                ->limit(10)
                ->get();
        }
        else
        {
            $data['articles'] = \Model\Article::query()
                ->related('users')
                ->related('categories')
                ->order_by('created_at', 'desc')
                ->where('draft', '=', 0)
                ->limit(10)
                ->get();
        }

        $data['page'] = 'articles';
        return $this->view('articles/index', $data);
    }
}