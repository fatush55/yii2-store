<?php

use yii\db\Migration;

/**
 * Class m200629_210049_create_order_product
 */
class m200629_210049_create_order_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET  utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order_product}}' , [
            'id' => $this->primaryKey()->unsigned(),
            'order_id' => $this->integer()->unsigned()->notNull(),
            'product_id' => $this->integer()->unsigned()->notNull(),
            'title' => $this->string(256)->notNull(),
            'price' => $this->decimal(6, 2)->notNull(),
            'qnt' => $this->tinyInteger(4)->notNull(),
            'sum' => $this->decimal(6, 2)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-order_product-order_id',
            'order_product',
            'order_id'
        );

        $this->addForeignKey(
            'fk-order_product-order_id',
            'order_product',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_product}}');
    }
}
