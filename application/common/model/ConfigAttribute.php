<?php
/***/

namespace app\common\model;

use think\Model;

/**
 * 全局自定义变量设置
 */
class ConfigAttribute extends Model
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }
}