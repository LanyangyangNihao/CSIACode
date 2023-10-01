<?php
/***/
namespace app\admin\model;

use think\Db;
use think\Model;
use app\common\model\Region as RegionBase;

/**
 * 区域分类
 */
class Region extends RegionBase
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }
}