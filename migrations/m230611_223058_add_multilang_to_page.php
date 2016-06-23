<?php

use yii\db\Migration;
use yii\fluent\models\Page;

/**
 * Handles the creation for table `language`.
 */
class m230611_223058_add_multilang_to_page extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn(Page::tableName(), 'source_id', $this->integer()->notNull());
        $this->addColumn(Page::tableName(), 'lang_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn(Page::tableName(), 'source_id');
        $this->dropColumn(Page::tableName(), 'lang_id');
    }
}
