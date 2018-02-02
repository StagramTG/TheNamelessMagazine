<?php

namespace Model;

class Article extends \Orm\Model
{
	protected static $_properties = array(
		"id" => array(
			"label" => "Id",
			"data_type" => "int",
		),
		"title" => array(
			"label" => "Title",
			"data_type" => "varchar",
		),
		"content" => array(
			"label" => "Content",
			"data_type" => "text",
		),
		"user_id" => array(
			"label" => "User id",
			"data_type" => "int",
		),
		"category_id" => array(
			"label" => "Category id",
			"data_type" => "int",
		),
        "draft" => array(
            "label" => "Draft",
            "data_type" => "bool",
        ),
        "image" => array(
            "label" => "Image",
            "data_type" => "varchar",
        ),
		"created_at" => array(
			"label" => "Created at",
			"data_type" => "int",
		),
		"updated_at" => array(
			"label" => "Updated at",
			"data_type" => "int",
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'articles';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
	    'categories' => array(
	        'model_to' => 'Model\\Category',
            'key_from' => 'category_id',
            'key_to'   => 'id'
        ),
        'users' => array(
            'model_to' => 'Auth\\Model\\Auth_User',
            'key_from' => 'user_id',
            'key_to'   => 'id'
        )
	);

}
