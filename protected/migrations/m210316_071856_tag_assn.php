<?php

use yii\db\Migration;

/**
 * Class m210316_071856_tag_assn
 */
class m210316_071856_tag_assn extends Migration
{
    const TBL_NAME = '{{%tag_assn}}';
    
    /**
     *
     * {@inheritdoc}
     *
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable(self::TBL_NAME, [
            'post_id' => $this->integer()->unsigned()->notNull(),
            'tag_id' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);
        $this->addPrimaryKey('', self::TBL_NAME, ['post_id', 'tag_id']);
    }
    
    /**
     *
     * {@inheritdoc}
     *
     */
    public function safeDown()
    {
        
        $this->dropTable(self::TBL_NAME);
    }
}
