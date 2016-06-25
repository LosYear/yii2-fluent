<?php

use yii\db\Migration;
use yii\fluent\models\MenuItem;

/**
 * Handles the creation for table `language`.
 */
class m230611_253058_add_multilang_to_menuitem extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn(MenuItem::tableName(), 'source_id', $this->integer()->notNull());
        $this->addColumn(MenuItem::tableName(), 'lang_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn(MenuItem::tableName(), 'source_id');
        $this->dropColumn(MenuItem::tableName(), 'lang_id');
    }
}
