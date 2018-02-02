<?php

namespace Fuel\Migrations;

class Add_draft_to_articles
{
	public function up()
	{
		\DBUtil::add_fields('articles', array(
			'draft' => array('null' => false, 'type' => 'bool'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('articles', array(
			'draft'
		));
	}
}