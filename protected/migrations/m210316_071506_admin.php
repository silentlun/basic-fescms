<?php

use yii\db\Migration;

/**
 * Class m210316_071506_admin
 */
class m210316_071506_admin extends Migration
{
    const TBL_NAME = '{{%admin}}';
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
            'username' => $this->string(20)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull()->defaultValue(''),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string(50)->notNull()->unique(),
            'prev_login_time' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'prev_login_ip' => $this->string(15)->notNull()->defaultValue(''),
            'last_login_time' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'last_login_ip' => $this->string(15)->notNull()->defaultValue(''),
            
            'status' => $this->smallInteger()->unsigned()->notNull()->defaultValue(10),
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
