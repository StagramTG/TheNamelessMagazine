<?php
/**
 * User: Thomas Gredin
 * Date: 25/01/2018
 * Time: 20:56
 */

namespace Admin\Controller;

class Categories extends Admin
{
    public function action_index()
    {
        $categories = \Model\Category::find('all');
        $data = array();
        $data['categories'] = $categories;
        $data['page'] = 'categories';

        return $this->view('admin/categories/index', $data);
    }

    public function action_edit()
    {
        $category = null;

        if(\Input::method() == 'POST')
        {
            if(\Input::post('id', false))
            {
                // Update existing category
                $updated_category = \Model\Category::find(\Input::post('id'));

                $name = \Input::post('name');
                if ($name == null || $name == "")
                {
                    \Session::set_flash('error_update', true);
                }
                else
                {
                    $updated_category->name = $name;
                    $updated_category->save();
                    \Session::set_flash('success_update', true);
                }

                $category = $updated_category;
            }
            else
            {
                // Create new
                $name = \Input::post('name');
                if ($name == null || $name == "")
                {
                    \Session::set_flash('error_create', true);
                }
                else
                {
                    $new_category = new \Model\Category();
                    $new_category->name = $name;
                    $new_category->save();

                    \Session::set_flash('success_create', true);
                }
            }
        }
        else if(\Input::method() == 'GET')
        {
            if(\Input::get('id', false))
            {
                // Update existing category
                $category = \Model\Category::find(\Input::get('id'));
            }
        }

        $data = array();
        $data['category'] = $category;
        $data['page'] = 'categories';

        return $this->view('admin/categories/edit', $data);
    }

    public function post_delete()
    {
        $id = \Input::post('id');
        $category = \Model\Category::find($id);
        if($category == null)
        {
            \Response::redirect('404');
        }

        $category->delete();
        \Response::redirect('/admin/categories');
    }
}