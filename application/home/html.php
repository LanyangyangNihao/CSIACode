<?php
/***/


$html_cache_arr = array();
// 全局变量数组
$global = config('tpcache');
empty($global) && $global = tpCache('global');
// 系统模式
$web_cmsmode = isset($global['web_cmsmode']) ? $global['web_cmsmode'] : 2;
/*页面缓存有效期*/
$app_debug = true;
$uiset = input('param.uiset/s', 'off');
if (1 == $web_cmsmode && 'on' != $uiset) { // 运营模式
    $app_debug = false;
    $html_cache_arr = config('HTML_CACHE_ARR');
}
/*--end*/

return array(
    // 应用调试模式
    'app_debug' => $app_debug,
    // 模板设置
    'template' => array(
        // 模板路径
        'view_path' => './template/',
        // 模板后缀
        'view_suffix' => 'htm',
        // 模板引擎禁用函数
        'tpl_deny_func_list' => config('global.tpl_deny_func_list'),
        // 默认模板引擎是否禁用PHP原生代码 苦恼啊！ 鉴于百度统计使用原生php，这里暂时无法开启
        'tpl_deny_php'       => false,
    ),
    // 视图输出字符串内容替换
    'view_replace_str' => array(
        '__EVAL__'  => '', // 过滤模板里的eval函数，防止被注入
    ),

    /**假设这个访问地址是 www.xxxxx.dev/home/goods/goodsInfo/id/1.html 
     *就保存名字为 index_goods_goodsinfo_1.html     
     *配置成这样, 指定 模块 控制器 方法名 参数名
     */
    'HTML_CACHE_ARR'=> $html_cache_arr,
);
?>