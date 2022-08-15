<?php

use yii\db\Migration;

/**
 * Class m210316_071737_content
 */
class m210316_071737_content extends Migration
{
    const TBL_NAME = '{{%content}}';
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
            'thumb' => $this->string(100)->notNull()->defaultValue(''),
            'keywords' => $this->string(50)->notNull()->defaultValue(''),
            'description' => $this->text(),
            'content' => 'mediumtext NOT NULL',
            'template' => $this->string(100)->notNull()->defaultValue(''),
            'created_by' => $this->string(20)->notNull()->defaultValue(''),
            'url' => $this->string()->notNull()->defaultValue(''),
            'islink' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(0),
            'views' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-catid', self::TBL_NAME, 'catid,status,sort,id');
        
        //附表
        $this->createTable('{{%content_news}}', [
            'id' => $this->primaryKey()->unsigned(),
            'content_id' => $this->integer()->unsigned()->notNull()->unique(),
            'content' => 'mediumtext NOT NULL',
            'template' => $this->string(100)->notNull()->defaultValue(''),
        ], $tableOptions);
    }
    
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
        $this->dropTable('{{%content_news}}');
    }
}
