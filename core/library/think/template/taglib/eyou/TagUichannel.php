<?php
/***/

namespace think\template\taglib\eyou;

/**
 * 栏目列表编辑
 */
class TagUichannel extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 栏目列表编辑
     * @author wengxianhu by 2018-4-20
     */
    public function getUichannel($typeid = '', $e_id = '', $e_page = '')
    {
        if (empty($e_id) || empty($e_page)) {
            echo '标签uichannel报错：缺少属性 e-id | e-page 。';
            return false;
        }

        $result = false;
        $inc = get_ui_inc_params($e_page);
        $inckey = self::$home_lang."_channel_{$e_id}";
        if (empty($inc[$inckey])) {
            $inckey = "channel_{$e_id}"; // 兼容v1.2.1之前的数据
        }

        $info = false;
        if ($inc && !empty($inc[$inckey])) {
            $data = json_decode($inc[$inckey], true);
            $info = $data['info'];
        } else {
            if (!empty($typeid)) {
                $new_typeid = model('LanguageAttr')->getBindValue($typeid, 'arctype');
                !empty($new_typeid) && $typeid = $new_typeid;
            }
            $info['typeid'] = $typeid;
        }

        $result = array(
            'info'  => $info,
        );

        return $result;
    }
}