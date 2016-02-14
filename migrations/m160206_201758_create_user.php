<?php

use yii\fluent\models\User;
use yii\db\Migration;

class m160206_201758_create_user extends Migration
{
    public function up()
    {
        $this->createTable(User::tableName(), [
            'id' => $this->primaryKey(),
            'email' => $this->string(200)->unique()->notNull(),
            'password_hash' => $this->string(200)->notNull(),
            'is_root' => $this->boolean(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'last_login_at' => $this->timestamp()->notNull(),
            'auth_key' => $this->string(200)
        ]);
    }

    public function down()
    {
        $this->dropTable(User::tableName());
    }
}
