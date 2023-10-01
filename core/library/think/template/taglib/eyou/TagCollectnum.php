<?php
/***/

namespace think\template\taglib\eyou;

/**
 * 在内容页模板显示收藏次数
 */
class TagCollectnum extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 在内容页模板显示下载次数
     * @author wengxianhu by 2018-4-20
     */
    public function getCollectnum($aid = '')
    {
        $aid = !empty($aid) ? intval($aid) : $this->aid;

        if (empty($aid)) {
            return '标签collectnum报错：缺少属性 aid 值。';
        }

        static $collectnum_js = null;
        static $static_aid = 0;
        if (null === $collectnum_js || $static_aid != $aid) {
            $static_aid = $aid;
            $collectnum_js = <<<EOF
<script type="text/javascript">
    function tag_collectnum_1609670918(aid)
    {
        var ajax = new XMLHttpRequest();
        ajax.open("post", "{$this->root_dir}/index.php?m=api&c=Ajax&a=collectnum", true);
        ajax.setRequestHeader("X-Requested-With","XMLHttpRequest");
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send("aid="+aid);
        ajax.onreadystatechange = function () {
            if (ajax.readyState==4 && ajax.status==200) {
        　　　　document.getElementById("eyou_collectnum_220520_"+aid).innerHTML = ajax.responseText;
          　}
        } 
    }
</script>
EOF;
        } else {
            $collectnum_js = '';
        }

        $parseStr = <<<EOF
<i id="eyou_collectnum_220520_{$aid}" class="eyou_collectnum" style="font-style:normal"></i> 
<script type="text/javascript">tag_collectnum_1609670918({$aid});</script>
EOF;

        $parseStr = $collectnum_js . $parseStr;

        return $parseStr;
    }
}