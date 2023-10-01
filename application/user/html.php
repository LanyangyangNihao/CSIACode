<?php
/***/

// 全局变量数组
$global = config('tpcache');
empty($global) && $global = tpCache('global');
// 系统模式
$web_cmsmode = isset($global['web_cmsmode']) ? $global['web_cmsmode'] : 2;
/*页面缓存有效期*/
$app_debug = true;
$web_htmlcache_expires_in = -1;
if (1 == $web_cmsmode) { // 运营模式
    $app_debug = false;
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
);
?>