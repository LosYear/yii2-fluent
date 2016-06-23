<?php

use yii\fluent\models\Page;
use yii\db\Migration;

class m160319_170814_create_page extends Migration
{
    public function up()
    {
        $this->createTable(Page::tableName(), [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'slug' => $this->string(200)->notNull(),
            'content' => $this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable(Page::tableName());
    }
}
