<?php

use yii\db\Migration;

/**
 * Class m210316_075051_menu_frontend
 */
class m210316_075051_menu_frontend extends Migration
{
    const TBL_NAME = '{{%menu_frontend}}';
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
            'parentid' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'name' => $this->string(20)->notNull(),
            'route' => $this->string(100)->notNull()->defaultValue(''),
            'target' => $this->string(10)->notNull()->defaultValue(''),
            'display' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(0),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0),
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
