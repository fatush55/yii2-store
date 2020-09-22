<?php

use yii\db\Migration;

/**
 * Class m200625_212232_create_tale_product
 */
class m200625_212232_create_tale_product extends Migration
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

        $this->createTable('{{%product}}' , [
            'id' => $this->primaryKey()->unsigned(),
            'slug' => $this->string(256)->unique(),
            'category_id' => $this->integer()->notNull() ,
            'title' => $this->string(256)->notNull(),
            'price' => $this->decimal(6,2)->unsigned()->notNull(),
            'discount' => $this->decimal(6,2)->unsigned()->notNull(),
            'content' => $this->text()->notNull(),
            'description' => $this->string(256),
            'keywords' => $this->string(256),
            'img' =>  $this->string(256)->notNull()->defaultValue('images/product-default'),
            'is_offer' => $this->tinyInteger(4)->defaultValue(0)
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('{{%product}}');
    }
}
