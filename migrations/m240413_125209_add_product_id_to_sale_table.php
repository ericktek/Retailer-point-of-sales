<?php

use yii\db\Migration;

/**
 * Class m240413_125209_add_product_id_to_sale_table
 */
class m240413_125209_add_product_id_to_sale_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sale}}', 'products_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%sale}}', 'products_id');
    }
}
