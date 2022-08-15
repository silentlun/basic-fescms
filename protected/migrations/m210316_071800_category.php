<?php

use yii\db\Migration;

/**
 * Class m210316_071800_category
 */
class m210316_071800_category extends Migration
{
    const TBL_NAME = '{{%category}}';
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
            'model_id' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
            'type' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0),
            'parent_id' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'catname' => $this->string(30)->notNull(),
            'catdir' => $this->string(30)->notNull(),
            'image' => $this->string(100)->notNull()->defaultValue(''),
            'category_template' => $this->string(100)->notNull()->defaultValue(''),
            'list_template' => $this->string(100)->notNull()->defaultValue(''),
            'show_template' => $this->string(100)->notNull()->defaultValue(''),
            'page_template' => $this->string(100)->notNull()->defaultValue(''),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-parentid', self::TBL_NAME, 'parent_id,sort,id');
        
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
