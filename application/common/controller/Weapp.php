<?php
/***/

namespace app\common\controller;
use think\Session;
use think\WeappController;
class Weapp extends WeappController {

    /**
     * 析构函数
     */
    function __construct() 
    {
        parent::__construct();
    }    
    
    /*
     * 初始化操作
     */
    public function _initialize() 
    {
        if (!session_id()) {
            Session::start();
        }
        header("Cache-control: private");  // history.back返回后输入框值丢失问题 
        $this->session_id = session_id(); // 当前的 session_id
        !defined('SESSION_ID') && define('SESSION_ID', $this->session_id); //将当前的session_id保存为常量，供其它方法调用
    }
    
    /**
     * 多语言功能操作权限
     */
    public function language_access()
    {
        if (is_language() && $this->main_lang != $this->admin_lang) {
            $lang_title = model('Language')->where('mark',$this->main_lang)->value('title');
            $this->error('当前语言没有此功能，请切换到【'.$lang_title.'】语言');
        }
    }
}