<?php

use yii\db\Migration;

/**
 * Handles the creation for table `fluent_message`.
 */
class m160625_195320_create_fluent_message extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('fluent_message', [
            'id' => $this->primaryKey(),
            'category' => $this->string(35),
            'message' => $this->string(200)->notNull(),
            'translation' => $this->string(200)->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'source_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('fluent_message');
    }
}
