<?php

use yii\db\Migration;
use yii\fluent\models\Block;

/**
 * Handles the creation for table `language`.
 */
class m160611_223058_add_multilang_to_block extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn(Block::tableName(), 'source_id', $this->integer()->notNull());
        $this->addColumn(Block::tableName(), 'lang_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn(Block::tableName(), 'source_id');
        $this->dropColumn(Block::tableName(), 'lang_id');
    }
}
