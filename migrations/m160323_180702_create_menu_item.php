<?php

use yii\fluent\models\MenuItem;
use yii\db\Migration;

class m160323_180702_create_menu_item extends Migration
{
    public function up()
    {
        $this->createTable(MenuItem::tableName(), [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer()->notNull(),
            'root_id' => $this->integer()->notNull(),
            'title' => $this->string(200)->notNull(),
            'link' => $this->string(200)
        ]);
    }

    public function down()
    {
        $this->dropTable(MenuItem::tableName());
    }
}
