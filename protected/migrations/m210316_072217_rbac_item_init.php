<?php

use yii\db\Migration;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;

/**
 * Class m210316_072217_rbac_item_init
 */
class m210316_072217_rbac_item_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authManager = $this->getAuthManager();
        
        $this->batchInsert($authManager->itemTable, ['name', 'type', 'description', 'created_at', 'updated_at'],
            [
                ['/backend/setting/manage', '2', '设置', '1586588064', '1586588064'],
                ['/backend/content/manage', '2', '内容', '1586588064', '1586588064'],
                ['/backend/menu/manage', '2', '菜单', '1586588064', '1586588064'],
                ['/backend/admin/manage', '2', '权限', '1586588064', '1586588064'],
                ['/backend/expand/manage', '2', '扩展', '1586588064', '1586588064'],
                
                ['/backend/attachment/index', '2', '附件管理', '1586588064', '1586588064'],
                ['/backend/attachment/delete', '2', '删除附件', '1586588064', '1586588064'],
                ['/backend/attachment/view-layer', '2', '查看附件', '1586588064', '1586588064'],
                ['/backend/attachment/thumbs', '2', '查看缩略图', '1586588064', '1586588064'],
                ['/backend/attachment/thumbdelete', '2', '删除缩略图', '1586588064', '1586588064'],
                ['/backend/attachment/address', '2', '附件地址替换', '1586588064', '1586588064'],
                
                ['/backend/setting/index', '2', '系统设置', '1586588064', '1586588064'],
                ['/backend/setting/upload', '2', '附件设置', '1586588064', '1586588064'],
                ['/backend/setting/custom', '2', '自定义设置', '1586588064', '1586588064'],
                
                ['/backend/content/index', '2', '内容管理', '1586588064', '1586588064'],
                ['/backend/content/create', '2', '添加内容', '1586588064', '1586588064'],
                ['/backend/content/update', '2', '修改内容', '1586588064', '1586588064'],
                ['/backend/content/delete', '2', '删除内容', '1586588064', '1586588064'],
                
                ['/backend/category/index', '2', '栏目管理', '1586588064', '1586588064'],
                ['/backend/category/create', '2', '添加栏目', '1586588064', '1586588064'],
                ['/backend/category/update', '2', '修改栏目', '1586588064', '1586588064'],
                ['/backend/category/delete', '2', '删除栏目', '1586588064', '1586588064'],
                
                
                ['/backend/tag/index', '2', '推荐位管理', '1586588064', '1586588064'],
                ['/backend/tag/create', '2', '添加推荐位', '1586588064', '1586588064'],
                ['/backend/tag/update', '2', '修改推荐位', '1586588064', '1586588064'],
                ['/backend/tag/delete', '2', '删除推荐位', '1586588064', '1586588064'],
                ['/backend/tag/data', '2', '推荐位信息管理', '1586588064', '1586588064'],
                ['/backend/tag/remove', '2', '删除推荐位信息', '1586588064', '1586588064'],
                
                ['/backend/menu/index', '2', '菜单管理', '1586588064', '1586588064'],
                ['/backend/menu/create', '2', '添加菜单', '1586588064', '1586588064'],
                ['/backend/menu/update', '2', '修改菜单', '1586588064', '1586588064'],
                ['/backend/menu/delete', '2', '删除菜单', '1586588064', '1586588064'],
                
                ['/backend/menu-frontend/index', '2', '前台菜单管理', '1586588064', '1586588064'],
                ['/backend/menu-frontend/create', '2', '添加前台菜单', '1586588064', '1586588064'],
                ['/backend/menu-frontend/update', '2', '修改前台菜单', '1586588064', '1586588064'],
                ['/backend/menu-frontend/delete', '2', '删除前台菜单', '1586588064', '1586588064'],
                
                ['/backend/admin/index', '2', '管理员管理', '1586588064', '1586588064'],
                ['/backend/admin/create', '2', '添加管理员', '1586588064', '1586588064'],
                ['/backend/admin/update', '2', '修改管理员', '1586588064', '1586588064'],
                ['/backend/admin/delete', '2', '删除管理员', '1586588064', '1586588064'],
                
                ['/backend/role/index', '2', '角色管理', '1586588064', '1586588064'],
                ['/backend/role/create', '2', '添加角色', '1586588064', '1586588064'],
                ['/backend/role/update', '2', '修改角色', '1586588064', '1586588064'],
                ['/backend/role/delete', '2', '删除角色', '1586588064', '1586588064'],
                ['/backend/role/priv', '2', '角色权限设置', '1586588064', '1586588064'],
                
                ['/backend/log/index', '2', '日志管理', '1586588064', '1586588064'],
                ['/backend/log/view', '2', '查看日志', '1586588064', '1586588064'],
                ['/backend/log/delete', '2', '删除日志', '1586588064', '1586588064'],
                
                ['/backend/feedback/index', '2', '留言管理', '1586588064', '1586588064'],
                ['/backend/feedback/view', '2', '查看留言', '1586588064', '1586588064'],
                ['/backend/feedback/delete', '2', '删除留言', '1586588064', '1586588064'],
                
                ['/backend/partner/index', '2', '合作伙伴管理', '1586588064', '1586588064'],
                ['/backend/partner/create', '2', '添加合作伙伴', '1586588064', '1586588064'],
                ['/backend/partner/update', '2', '修改合作伙伴', '1586588064', '1586588064'],
                ['/backend/partner/delete', '2', '删除合作伙伴', '1586588064', '1586588064'],
                
                ['/backend/link/index', '2', '友情链接管理', '1586588064', '1586588064'],
                ['/backend/link/create', '2', '添加友情链接', '1586588064', '1586588064'],
                ['/backend/link/update', '2', '修改友情链接', '1586588064', '1586588064'],
                ['/backend/link/delete', '2', '删除友情链接', '1586588064', '1586588064'],
                
            ]);
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200625_093630_rbac_item_init cannot be reverted.\n";
        
        return false;
    }
    
    /**
     * @throws yii\base\InvalidConfigException
     * @return DbManager
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }
        
        return $authManager;
    }
}
