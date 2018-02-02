<?php
/**
 * User: Thomas Gredin
 * Date: 24/01/2018
 * Time: 20:46
 */

namespace Admin\Controller;

class Articles extends Admin
{
    public function action_index()
    {
        $data = array();
        $data['page'] = 'articles';
        $data['articles'] = \Model\Article::query()->order_by('created_at', 'desc')->get();

        return $this->view('articles/index', $data);
    }

    public function action_edit()
    {
        $article = null;

        if(\Input::method() == 'POST')
        {
            if(\Input::post('id', false))
            {
                // Update existing article
                $update_article = \Model\Article::find(\Input::post('id'));
                $update_article->title = \Input::post('title');
                $update_article->content = \Input::post('content');
                $update_article->category_id = \Input::post('category');
                $update_article->draft = \Input::post('draft', false) == "draft" ? true: false;
                $update_article->image = \Input::post('image');

                $update_article->save();
                $article = $update_article;
            }
            else
            {
                // Create article with given data
                $new_article = new \Model\Article();
                $new_article->title = \Input::post('title');
                $new_article->content = \Input::post('content');
                $new_article->user_id = \Auth::get('id');
                $new_article->category_id = \Input::post('category');
                $new_article->draft = \Input::post('draft', false) == "draft" ? true: false;
                $new_article->image = \Input::post('image');

                $new_article->save();
                $article = $new_article;
            }
        }
        else if(\Input::method() == 'GET')
        {
            if(\Input::get('id', false))
            {
                // Set article
                $article = \Model\Article::find(\Input::get('id'));
            }
        }

        $data = array();
        $data['page'] = 'articles';
        $data['categories'] = \Model\Category::find('all');
        $data['article'] = $article;

        return $this->view('articles/edit', $data);
    }

    public function post_delete()
    {
        $id = \Input::post('id');
        $article = \Model\Article::find($id);
        if($article == null)
        {
            \Response::redirect('404');
        }

        $article->delete();
        \Response::redirect('/admin/articles');
    }
}