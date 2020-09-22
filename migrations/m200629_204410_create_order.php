<?php

use yii\db\Migration;

/**
 * Class m200629_204410_create_order
 */
class m200629_204410_create_order extends Migration
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

        $this->createTable('{{%order}}' , [
            'id' => $this->primaryKey()->unsigned(),
            'qnt' => $this->tinyInteger(4)->unsigned()->notNull(),
            'sum' => $this->decimal(6, 2)->defaultValue(0.00)->notNull(),
            'status' => $this->tinyInteger(3)->defaultValue(0),
            'name' => $this->string(256)->notNull(),
            'email' => $this->string(256)->notNull(),
            'phone' => $this->string(256)->notNull(),
            'address' => $this->string(256)->notNull(),
            'note' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
