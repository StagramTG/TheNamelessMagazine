<?php

namespace Fuel\Migrations;

class Add_image_to_articles
{
	public function up()
	{
		\DBUtil::add_fields('articles', array(
			'image' => array('constraint' => 1024, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('articles', array(
			'image'
		));
	}
}