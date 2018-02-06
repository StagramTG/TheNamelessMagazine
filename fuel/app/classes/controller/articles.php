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
        $article_by_page = 10;

        $page = intval(\Input::get('page'));
        $data = array();
        $data['page_index'] = 0;
        $data['page_count'] = ceil(\Model\Article::count() / $article_by_page) - 1;

        if($page != null)
        {
            $data['articles'] = \Model\Article::query()
                ->related('users')
                ->related('categories')
                ->order_by('created_at', 'desc')
                ->where('draft', '=', 0)
                ->offset($page * $article_by_page)
                ->limit($article_by_page)
                ->get();

            $data['page_index'] = $page;
        }
        else
        {
            $data['articles'] = \Model\Article::query()
                ->related('users')
                ->related('categories')
                ->order_by('created_at', 'desc')
                ->where('draft', '=', 0)
                ->limit($article_by_page)
                ->get();
        }

        $data['page'] = 'articles';
        return $this->view('articles/index', $data);
    }

    public function action_read()
    {
        $data = array();
        $data['page'] = 'articles';
        $data['article'] = \Model\Article::find(\Input::get('id'));

        return $this->view('articles/read', $data);
    }
}