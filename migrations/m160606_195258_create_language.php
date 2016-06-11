<?php

use yii\db\Migration;
use yii\fluent\models\Language;

/**
 * Handles the creation for table `language`.
 */
class m160606_195258_create_language extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(Language::tableName(), [
            'id' => $this->primaryKey(),
            'lang_id' => $this->string(10)->unique()->notNull(),
            'friendly_url' => $this->string(10)->unique()->notNull(),
            'title' => $this->string(20)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Language::tableName());
    }
}
