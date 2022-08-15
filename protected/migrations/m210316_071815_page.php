<?php

use yii\db\Migration;

/**
 * Class m210316_071815_page
 */
class m210316_071815_page extends Migration
{
    const TBL_NAME = '{{%page}}';
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
            'catid' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
            'title' => $this->string(100)->notNull(),
            'content' => 'mediumtext NOT NULL',
        ], $tableOptions);
        $this->createIndex('idx-catid', self::TBL_NAME, 'catid');
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }
}
