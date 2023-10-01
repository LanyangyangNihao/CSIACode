<?php
/***/

namespace app\home\controller;

class Recruit extends Base
{
    // 模型标识
    public $nid = 'recruit';
    // 模型ID
    public $channeltype = '';
    
    public function _initialize() {
        parent::_initialize();
        $channeltype_list = config('global.channeltype_list');
        $this->channeltype = $channeltype_list[$this->nid];
    }

    public function lists($tid)
    {
        $tid_tmp = $tid;
        $seo_pseudo = config('ey_config.seo_pseudo');
    	if (empty($tid)) {
            $map = array(
                'channeltype'   => $this->channeltype,
                'parent_id' => 0,
                'is_hidden' => 0,
                'status'    => 1,
            );
    	} else {
            if (3 == $seo_pseudo) {
                $map = array('dirname'=>$tid);
            } else {
                if (!is_numeric($tid) || strval(intval($tid)) !== strval($tid)) {
                    abort(404,'页面不存在');
                }
                $map = array('id'=>$tid);
            }
        }
        $map['lang'] = $this->home_lang; // 多语言
        $row = M('arctype')->field('id,dirname')->where($map)->order('sort_order asc')->limit(1)->find();
        $tid = !empty($row['id']) ? intval($row['id']) : 0;
        $dirname = !empty($row['dirname']) ? $row['dirname'] : '';

        /*301重定向到新的伪静态格式*/
        $this->jumpRewriteFormat($tid, $dirname, 'lists');
        /*--end*/

        if (3 == $seo_pseudo) {
            $tid = $dirname;
        } else {
            $tid = $tid_tmp;
        }

        return action('home/Lists/index', $tid);
    }

    public function view($aid)
    {
        $result = model('Recruit')->getInfo($aid);
        if (empty($result)) {
            abort(404,'页面不存在');
        } elseif ($result['arcrank'] == -1) {
            $this->success('待审核稿件，你没有权限阅读！');
            exit;
        }
        // 外部链接跳转
        if ($result['is_jump'] == 1) {
            header('Location: '.$result['jumplinks']);
            exit;
        }
        /*--end*/

        $tid = $result['typeid'];
        $arctypeInfo = model('Arctype')->getInfo($tid);
        /*301重定向到新的伪静态格式*/
        $this->jumpRewriteFormat($aid, $arctypeInfo['dirname'], 'view');
        /*--end*/

        return action('home/View/index', $aid);
    }
}