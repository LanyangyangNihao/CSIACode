<?php
/***/

namespace think\template\taglib\eyou;

/**
 * 在内容页模板追加显示浏览量
 */
class TagArcclick extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 在内容页模板追加显示浏览量
     * @author wengxianhu by 2018-4-20
     */
    public function getArcclick($aid = '', $value = '', $type = '')
    {
        $aid = !empty($aid) ? intval($aid) : $this->aid;

        if (empty($aid)) {
            return '标签arcclick报错：缺少属性 aid 值。';
        }

        /*内容页或者其他页*/
        if (empty($type)) {
            if (!empty($this->aid)) {
                $type = 'view';
            } else {
                $type = 'lists';
            }
        }
        /*end*/

        // 第一种方案，js输出
        $url = get_absolute_url($this->root_dir."/index.php?m=api&c=Ajax&a=arcclick&type={$type}&aids={$aid}");
        $parseStr = "<script src='{$url}' type='text/javascript' language='javascript'></script>";

        // 第二种方案，执行ajax
        // $parseStr = "<i id='eyou_arcclick_220520_{$aid}' data-aid='{$aid}' class='eyou_arcclick' data-type='{$type}' data-root_dir='{$this->root_dir}' style='font-style:normal'></i>";

        return $parseStr;
    }
}