<?php

use yii\db\Migration;

/**
 * Class m210316_071724_setting
 */
class m210316_071724_setting extends Migration
{
    const TBL_NAME = '{{%setting}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey()->unsigned(),
            'type' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(0),
            'name' => $this->string(30)->notNull()->unique(),
            'value' => $this->text(),
            'field' => $this->string(50)->notNull()->defaultValue(''),
            'fieldlabel' => $this->string(50)->notNull()->defaultValue(''),
        ], $tableOptions);
        $this->createIndex('idx-type', self::TBL_NAME, 'type');
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /* echo "m200413_050457_config cannot be reverted.\n";
        
        return false; */
        $this->dropTable(self::TBL_NAME);
    }
}
