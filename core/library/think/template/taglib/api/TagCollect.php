<?php
/***/

namespace think\template\taglib\api;

use think\Db;

/**
 * 文档收藏信息
 */
class TagCollect extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 获取文档收藏信息
     * @author wengxianhu by 2018-4-20
     */
    public function getCollect($aid = '', $type = 'default', $users = [])
    {
        if (empty($aid)) {
            return false;
        }
        
        $is_collect = 0;
        if (!empty($users['users_id'])) {
            $result = Db::name("users_collection")
                ->where(['aid' => $aid, 'users_id' => $users['users_id']])
                ->find();
            if (!empty($result)){
                $is_collect = 1;
            }
        }

        return [
            'is_collect'=>$is_collect
        ];
    }
}