<?php

use yii\db\Migration;

/**
 * Class m210316_071507_admin_log
 */
class m210316_071507_admin_log extends Migration
{
    const TBL_NAME = '{{%admin_log}}';
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
            'user_id' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'route' => $this->string()->notNull()->defaultValue(''),
            'description' => 'mediumtext NOT NULL',
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-userid', self::TBL_NAME, 'user_id');
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }
}
