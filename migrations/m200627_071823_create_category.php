<?php

use yii\db\Migration;

/**
 * Class m200627_071823_create_category
 */
class m200627_071823_create_category extends Migration
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

        $this->createTable('{{%category}}' , [
            'id' => $this->primaryKey()->unsigned(),
            'parent_id' => $this->integer()->unsigned()->notNull(),
            'title' => $this->string(256)->notNull(),
            'description' => $this->string(256),
            'keywords' => $this->string(256),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }

}
