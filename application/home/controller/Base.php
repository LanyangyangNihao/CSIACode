<?php
/***/

namespace app\home\controller;
use think\Controller;
use app\common\controller\Common;
use think\Db;
use think\Request;
use app\home\logic\FieldLogic;

class Base extends Common {

    public $fieldLogic;

    /**
     * 初始化操作
     */
    public function _initialize() {
        parent::_initialize();

        $this->fieldLogic = new FieldLogic();
        
        // 设置URL模式
        set_home_url_mode();
        
        // 子目录
        $this->assign('RootDir', ROOT_DIR);
    }

    /**
     * 301重定向到新的伪静态格式（针对被搜索引擎收录的旧伪静态URL）
     * @param intval $id 栏目ID/文档ID
     * @param string $dirname 目录名称
     * @param string $type 栏目页/文档页
     * @return void
     */
    public function jumpRewriteFormat($id, $dirname = null, $type = 'lists')
    {
        $seo_pseudo = config('ey_config.seo_pseudo');
        $seo_rewrite_format = config('ey_config.seo_rewrite_format');
        if (3 == $seo_pseudo && 1 == $seo_rewrite_format) {
            if ('lists' == $type) {
                $url = typeurl('home/Lists/index', array('dirname'=>$dirname));
            } else {
                $url = arcurl('home/View/index', array('dirname'=>$dirname, 'aid'=>$id));
            }
            //重定向到指定的URL地址 并且使用301
            $this->redirect($url, 301);
        }
    }
}