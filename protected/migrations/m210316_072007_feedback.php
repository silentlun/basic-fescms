<?php

use yii\db\Migration;

/**
 * Class m210316_072007_feedback
 */
class m210316_072007_feedback extends Migration
{
    const TBL_NAME = '{{%feedback}}';
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
            'name' => $this->string(20)->notNull(),
            'email' => $this->string(50)->notNull()->defaultValue(''),
            'mobile' => $this->string(20)->notNull()->defaultValue(''),
            'content' => $this->text(),
            'status' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }
}
