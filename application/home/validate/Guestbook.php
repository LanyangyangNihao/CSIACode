<?php
/***/

namespace app\home\validate;
use think\Validate;

class Guestbook extends Validate
{
    // 验证规则
    protected $rule = array(
        'typeid'    => 'require|token',
    );

    protected $message = array(
        'typeid.require' => '表单缺少标签属性{$field.hidden}',
    );
}