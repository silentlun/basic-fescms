<?php

use yii\db\Migration;

/**
 * Class m210316_071708_menu
 */
class m210316_071708_menu extends Migration
{
    const TBL_NAME = '{{%menu}}';
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
            'name' => $this->string()->notNull(),
            'parentid' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'route' => $this->string()->notNull(),
            'data' => $this->string()->notNull()->defaultValue(''),
            'icon' => $this->string()->notNull(),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'display' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-display', '{{%menu}}', 'display,sort,id');
        //添加数据
        $this->batchInsert('{{%menu}}', ['id', 'name', 'parentid', 'route', 'data', 'icon', 'sort', 'display'],
            [
                ['1', '设置', '0', '/backend/setting/index', '', 'fa-cog', '1', '1'],
                ['2', '内容', '0', '/backend/content/index', '', 'fa-edit', '2', '1'],
                ['3', '菜单', '0', '/backend/menu/index', '', 'fa-th-large', '3', '1'],
                ['4', '权限', '0', '/backend/admin/index', '', 'fa-key', '4', '1'],
                ['5', '扩展', '0', '/backend/expand/*', '', 'fa-cube', '5', '1'],
                
                
                ['11', '网站设置', '1', '/backend/setting/index', '', '', '0', '1'],
                ['12', '附件设置', '1', '/backend/setting/upload', '', '', '0', '1'],
                ['13', '自定义设置', '1', '/backend/setting/custom', '', '', '0', '1'],
                
                
                ['17', '内容管理', '2', '/backend/content/index', '', '', '0', '1'],
                ['18', '添加内容', '17', '/backend/content/create', '', '', '0', '0'],
                ['19', '修改内容', '17', '/backend/content/update', '', '', '0', '0'],
                ['20', '删除内容', '17', '/backend/content/delete', '', '', '0', '0'],
                
                ['21', '栏目管理', '2', '/backend/category/index', '', '', '0', '1'],
                ['22', '添加栏目', '21', '/backend/category/create', '', '', '0', '0'],
                ['23', '修改栏目', '21', '/backend/category/update', '', '', '0', '0'],
                ['24', '删除栏目', '21', '/backend/category/delete', '', '', '0', '0'],
                
                ['25', '附件管理', '2', '/backend/attachment/index', '', '', '0', '1'],
                ['26', '删除附件', '25', '/backend/attachment/delete', '', '', '0', '0'],
                ['27', '查看附件', '25', '/backend/attachment/view-layer', '', '', '0', '0'],
                ['28', '查看缩略图', '25', '/backend/attachment/thumbs', '', '', '0', '0'],
                ['29', '删除缩略图', '25', '/backend/attachment/thumbdelete', '', '', '0', '0'],
                ['30', '附件地址替换', '25', '/backend/attachment/address', '', '', '0', '0'],
                
                ['31', '推荐位管理', '2', '/backend/position/index', '', '', '0', '1'],
                ['32', '添加推荐位', '31', '/backend/position/create', '', '', '0', '0'],
                ['33', '修改推荐位', '31', '/backend/position/update', '', '', '0', '0'],
                ['34', '删除推荐位', '31', '/backend/position/delete', '', '', '0', '0'],
                ['35', '信息管理', '31', '/backend/position/data', '', '', '0', '0'],
                ['36', '删除信息', '31', '/backend/position/remove', '', '', '0', '0'],
                
                ['37', '管理员管理', '4', '/backend/admin/index', '', '', '0', '1'],
                ['38', '添加管理员', '37', '/backend/admin/create', '', '', '0', '0'],
                ['39', '修改管理员', '37', '/backend/admin/update', '', '', '0', '0'],
                ['40', '删除管理员', '37', '/backend/admin/delete', '', '', '0', '0'],
                
                ['41', '角色管理', '4', '/backend/role/index', '', '', '0', '1'],
                ['42', '添加角色', '41', '/backend/role/create', '', '', '0', '0'],
                ['43', '修改角色', '41', '/backend/role/update', '', '', '0', '0'],
                ['44', '删除角色', '41', '/backend/role/delete', '', '', '0', '0'],
                ['45', '角色权限设置', '41', '/backend/role/priv', '', '', '0', '0'],
                
                ['46', '菜单管理', '3', '/backend/menu/index', '', '', '0', '1'],
                ['47', '添加菜单', '46', '/backend/menu/create', '', '', '0', '0'],
                ['48', '修改菜单', '46', '/backend/menu/update', '', '', '0', '0'],
                ['49', '删除菜单', '46', '/backend/menu/delete', '', '', '0', '0'],
                
                ['50', '前台菜单管理', '3', '/backend/menu-frontend/index', '', '', '0', '1'],
                ['51', '添加前台菜单', '50', '/backend/menu-frontend/create', '', '', '0', '0'],
                ['52', '修改前台菜单', '50', '/backend/menu-frontend/update', '', '', '0', '0'],
                ['53', '删除前台菜单', '50', '/backend/menu-frontend/delete', '', '', '0', '0'],
                
                ['54', '日志管理', '5', '/backend/log/index', '', '', '0', '1'],
                ['55', '查看日志', '54', '/backend/log/view', '', '', '0', '0'],
                ['56', '删除日志', '54', '/backend/log/delete', '', '', '0', '0'],
                
                ['57', '留言管理', '5', '/backend/feedback/index', '', '', '0', '1'],
                ['58', '查看留言', '57', '/backend/feedback/view', '', '', '0', '0'],
                ['59', '删除留言', '57', '/backend/feedback/delete', '', '', '0', '0'],
                
                ['60', '合作伙伴', '5', '/backend/partner/index', '', '', '0', '1'],
                ['61', '添加合作伙伴', '60', '/backend/partner/create', '', '', '0', '0'],
                ['62', '修改合作伙伴', '60', '/backend/partner/update', '', '', '0', '0'],
                ['63', '删除合作伙伴', '60', '/backend/partner/delete', '', '', '0', '0'],
                
                ['64', '友情链接', '5', '/backend/link/index', '', '', '0', '1'],
                ['65', '添加友情链接', '64', '/backend/link/create', '', '', '0', '0'],
                ['66', '修改友情链接', '64', '/backend/link/update', '', '', '0', '0'],
                ['67', '删除友情链接', '64', '/backend/link/delete', '', '', '0', '0'],
            ]);
        
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
