<?php
/***/

namespace app\home\model;

use think\Db;
use think\Model;

/**
 * 产品图片
 */
class ProductImg extends Model
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }
    
    /**
     * 获取指定产品的所有图片
     * @author 小虎哥 by 2018-4-3
     */
    public function getProImg($aids = [], $field = '*')
    {
        $where = [];
        !empty($aids) && $where['aid'] = ['IN', $aids];
        $result = Db::name('ProductImg')->field($field)
            ->where($where)
            ->order('sort_order asc')
            ->select();
        !empty($result) && $result = group_same_key($result, 'aid');

        return $result;
    }
}