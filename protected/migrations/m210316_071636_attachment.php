<?php

use yii\db\Migration;

/**
 * Class m210316_071636_attachment
 */
class m210316_071636_attachment extends Migration
{
    const TBL_NAME = '{{%attachment}}';
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
            'module' => $this->string(20)->notNull(),
            'filename' => $this->string(100)->notNull(),
            'filepath' => $this->string(100)->notNull(),
            'filesize' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'fileext' => $this->string(15)->notNull(),
            'created_by' => $this->string(20)->notNull()->defaultValue(''),
            'isimage' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(0),
            'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
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
