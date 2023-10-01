<?php
/***/

namespace app\admin\controller;

use think\Page;

class Region extends Base
{
    /**
    * 获取子类列表
    */  
    public function ajax_get_region($pid = 0, $level = 2, $region_id = '', $text = '--请选择--'){
        $data = model('Region')->getList($pid,'*','',$level);
        $html = "<option value=''>".urldecode($text)."</option>";
        foreach($data as $key=>$val){
            if ($val['id'] == $region_id) {
                unset($data[$key]);
                continue;
            }
            $html.="<option value='".$val['id']."'>".$val['name']."</option>";
        }
        $isempty = 0;
        if (empty($data)){
            $isempty = 1;
        }
        $this->success($html,'',['isempty'=>$isempty]);

    }
}