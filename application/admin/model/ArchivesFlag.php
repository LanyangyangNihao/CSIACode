<?php
/***/

namespace app\admin\model;

use think\Db;
use think\Model;

/**
 * 文档属性
 */
class ArchivesFlag extends Model
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }

    /**
     * 获取启用的文档属性列表
     * @return [type] [description]
     */
    public function getList($where = [])
    {
    	if (empty($where)) {
    		$where['status'] = ['gt', 0];
    	}
        $result = Db::name('archives_flag')->where($where)
        	->order("sort_order asc, id asc")
        	->cache(true, EYOUCMS_CACHE_TIME, 'archives_flag')
        	->select();

        return $result;
    }
}