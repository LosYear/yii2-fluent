<?php

use yii\fluent\models\Menu;
use yii\db\Migration;

class m160323_172741_create_menu extends Migration
{
    public function up()
    {
        $this->createTable(Menu::tableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->unique()->notNull(),
            'title' => $this->string(200)
        ]);
    }

    public function down()
    {
        $this->dropTable(Menu::tableName());
    }
}
