<?php

use yii\db\Migration;

class m190125_092130_create_new_table_inventory_offers extends Migration
{
	public function up()
	{
		$this->createTable('link', [
			'id' => $this->string(6)->unique(),
            'url' => $this->string(255),
            'clicks' => $this->integer()->unsigned(),
		]);
	}
}
