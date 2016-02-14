<?php

use yii\fluent\models\Block;
use yii\db\Migration;

class m160213_215600_create_block extends Migration
{
    public function up()
    {
        $this->createTable(Block::tableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->unique()->notNull(),
            'type' => $this->string(200)->notNull(),
            'title' => $this->string(200),
            'content' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(Block::tableName());
    }
}
