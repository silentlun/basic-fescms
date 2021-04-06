<?php

use yii\db\Migration;

/**
 * Class m210316_071830_tag
 */
class m210316_071830_tag extends Migration
{
    const TBL_NAME = '{{%tag}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'module' => $this->string(20)->notNull()->defaultValue(''),
            'name' => $this->string(20)->notNull(),
            'cname' => $this->string(50)->notNull(),
            'frequency' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /* echo "m200411_125846_position cannot be reverted.\n";
        
        return false; */
        $this->dropTable(self::TBL_NAME);
    }
}
