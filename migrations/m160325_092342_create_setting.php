<?php

use yii\db\Migration;
use yii\fluent\models\Setting;

class m160325_092342_create_setting extends Migration
{
    public function up()
    {
        $this->createTable(Setting::tableName(), [
            'id' => $this->primaryKey(),
            'key' => $this->string(200)->unique()->notNull(),
            'value' => $this->string(200),
            'title' => $this->string(200)
        ]);
    }

    public function down()
    {
        $this->dropTable(Setting::tableName());
    }
}
