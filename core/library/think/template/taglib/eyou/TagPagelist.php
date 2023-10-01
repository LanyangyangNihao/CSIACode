<?php
/***/

namespace think\template\taglib\eyou;

use think\Db;

/**
 * 列表分页代码
 */
class TagPagelist extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 获取列表分页代码
     * @author wengxianhu by 2018-4-20
     */
    public function getPagelist($pages = '', $listitem = '', $listsize = '', $pre_text = '', $next_text = '')
    {
        if (empty($pages)) {
            echo '标签pagelist报错：只适用在标签list之后。';
            return false;
        }
        if (!empty($this->tid)) {
            $seodata = tpCache('seo');
            if (2 == $seodata['seo_pseudo'] && 4 == $seodata['seo_html_listname']) {
                $arctypeRow = Db::name('arctype')->field('rulelist')->where(['id'=>$this->tid])->find();
                if (!empty($arctypeRow['rulelist']) && !preg_match('/{page}/i', $arctypeRow['rulelist'])) {
                    return '';
                }
            }
        }
        $listitem = !empty($listitem) ? $listitem : 'info,index,end,pre,next,pageno';
        $listsize = !empty($listsize) ? $listsize : '3';

        $value = $pages->render($listitem, $listsize, $pre_text, $next_text);

        return $value;
    }
}