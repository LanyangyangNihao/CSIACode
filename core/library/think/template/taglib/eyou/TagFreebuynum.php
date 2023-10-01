<?php
/***/

namespace think\template\taglib\eyou;

/**
 * 付费文档订单数或用户数
 */
class TagFreebuynum extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 付费文档订单数或用户数
     * @author wengxianhu by 2018-4-20
     */
    public function getFreebuynum($aid = '', $modelid = '')
    {
        $aid = !empty($aid) ? intval($aid) : $this->aid;

        if (empty($aid)) {
            return '标签freebuynum报错：缺少属性 aid 值。';
        }

        $times = getTime();
        static $freebuynum_js = null;
        if (!empty($this->aid) || null === $freebuynum_js) {
            $freebuynum_js = <<<EOF
<script type="text/javascript">
    function tag_freebuynum(aid)
    {
        var ajax = new XMLHttpRequest();
        ajax.open("post", "{$this->root_dir}/index.php?m=api&c=Ajax&a=freebuynum&aid="+aid, true);
        ajax.setRequestHeader("X-Requested-With","XMLHttpRequest");
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send("modelid={$modelid}");
        ajax.onreadystatechange = function () {
            if (ajax.readyState==4 && ajax.status==200) {
        　　　　document.getElementById("eyou_freebuynum_{$times}_"+aid).innerHTML = ajax.responseText;
          　}
        } 
    }
</script>
EOF;
        } else {
            $freebuynum_js = '';
        }

        $parseStr = <<<EOF
<i id="eyou_freebuynum_{$times}_{$aid}" class="eyou_freebuynum" style="font-style:normal"></i> 
<script type="text/javascript">tag_freebuynum({$aid});</script>
EOF;

        $parseStr = $freebuynum_js . $parseStr;

        return $parseStr;
    }
}