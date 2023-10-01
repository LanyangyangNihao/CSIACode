<?php
/***/

namespace app\admin\validate;
use think\Validate;

class ProductAttribute extends Validate
{
    // 验证规则
    protected $rule = array(
        array('typeid','checkTypeid'),
        array('attr_name','require','属性名称不能为空'),
        array('attr_input_type', 'require', '请选择表单类型'),
        array('attr_values','checkAttrValues'),
    );
      
    /**
     *  自定义函数 判断 用户选择 从下面的列表中选择 可选值列表：不能为空
     * @param type $attr_values
     * @return boolean
     */
    protected function checkTypeid($typeid, $rule)
    {
        if(empty($typeid) || I('param.typeid/d') == 0)         
            return '请选择栏目……';
        else
            return true;
    }  
      
    /**
     *  自定义函数 判断 用户选择 从下面的列表中选择 可选值列表：不能为空
     * @param type $attr_values
     * @return boolean
     */
    protected function checkAttrValues($attr_values,$rule)
    {
        if(empty($attr_values) && I('param.attr_input_type/d') == '1')        
            return '可选值列表不能为空';
        else
            return true;
    }    
}