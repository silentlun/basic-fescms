<?php

use yii\db\Migration;

/**
 * Class m210316_071646_attachment_index
 */
class m210316_071646_attachment_index extends Migration
{
    const TBL_NAME = '{{%attachment_index}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'keyid' => $this->string(30)->notNull(),
            'aid' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('keyid', self::TBL_NAME, 'keyid');
        $this->createIndex('aid', self::TBL_NAME, 'aid');
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200331_012925_attachment_index cannot be reverted.\n";
        $this->dropTable(self::TBL_NAME);
        
        return false;
    }
}
