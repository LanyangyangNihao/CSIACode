<?php
/***/
namespace app\common\model;

use think\Db;
use think\Model;

/**
 * 模型
 */
class AskScoreLevel extends Model
{
    /**
     * 数据表名，不带前缀
     */
    public $name = 'ask_score_level';

    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }

}