<?php
/***/

$home_config = array(
    //分页配置
    'paginate'      => array(
        'type'      => 'eyou',
        'var_page'  => 'page',
        'list_rows' => 15,
    ),

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件 
    //'exception_tmpl'         => ROOT_PATH.'public/errpage/404.html',
    // errorpage 错误页面
    //'error_tmpl'         => ROOT_PATH.'public/errpage/404.html',
    
    /**假设这个访问地址是 www.xxxxx.dev/index/goods/goodsInfo/id/1.html 
     *就保存名字为 index_goods_goodsinfo_1.html     
     *配置成这样, 指定 模块 控制器 方法名 参数名
     */
    'HTML_CACHE_ARR'=> array(),
);

$html_config = include_once 'html.php';
return array_merge($home_config, $html_config);
?>