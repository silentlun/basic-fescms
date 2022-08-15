<?php

use yii\db\Migration;

/**
 * Class m220805_072219_visitor_stat
 */
class m220805_072219_visitor_stat extends Migration
{
    const TBL_NAME = '{{%visitor_stat}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'uuid' => $this->string(50)->notNull()->defaultValue(''),
            'platform' => $this->string(20)->notNull()->defaultValue(''),
            'ip' => $this->string(30)->notNull()->defaultValue(''),
            'views' => $this->integer()->unsigned()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-created', self::TBL_NAME, 'created_at,uuid');
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }
}
