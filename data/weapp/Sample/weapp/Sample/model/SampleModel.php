<?php
/***/

namespace weapp\Sample\model;

use think\Model;

/**
 * 模型
 */
class SampleModel extends Model
{
    /**
     * 数据表名，不带前缀
     */
    public $name = 'weapp_sample';

    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }
}