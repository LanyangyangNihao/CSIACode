<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:43:"./application/admin/template/system/web.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/layout.htm";i:1689649653;s:73:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/theme_css.htm";i:1689649653;s:67:"/Users/gjj/hzwork/eyoucms/application/admin/template/system/bar.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/footer.htm";i:1689649653;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen"/>
<link href="/public/plugins/layui/css/layui.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/page.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/font/css/font-awesome.min.css?v=<?php echo $version; ?>" rel="stylesheet" />
<link href="/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/public/static/admin/font/css/font-awesome-ie7.min.css?v=<?php echo $version; ?>">
<![endif]-->
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var GetUploadify_url = "<?php echo url('Uploadimgnew/upload'); ?>";
    // 插件专用旧版上传图片框
    if ('Weapp@execute' == "<?php echo CONTROLLER_NAME; ?>@<?php echo ACTION_NAME; ?>") {
      GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
    }
    var __root_dir__ = "";
    var __lang__ = "<?php echo $admin_lang; ?>";
    var __seo_pseudo__ = <?php echo (isset($global['seo_pseudo']) && ($global['seo_pseudo'] !== '')?$global['seo_pseudo']:1); ?>;
    var __web_xss_filter__ = <?php echo (isset($global['web_xss_filter']) && ($global['web_xss_filter'] !== '')?$global['web_xss_filter']:0); ?>;
    var __is_mobile__ = <?php echo (isset($is_mobile) && ($is_mobile !== '')?$is_mobile:0); ?>;
</script>  
<link href="/public/static/admin/js/jquery-ui/jquery-ui.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<link href="/public/static/admin/js/perfect-scrollbar.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<!-- <link type="text/css" rel="stylesheet" href="/public/plugins/tags_input/css/jquery.tagsinput.css?v=<?php echo $version; ?>"> -->
<style type="text/css">html, body { overflow: visible;}</style>
<link href="/public/static/admin/css/diy_style.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css" />

<!-- 官方内置样式表，升级会覆盖变动，请勿修改，否则后果自负 -->

<style type="text/css">
	/*左侧收缩图标*/
	#foldSidebar i { font-size: 24px;color:<?php echo $global['web_theme_color']; ?>; }
    /*左侧菜单*/
    .eycms_cont_left{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl dd a:hover,.eycms_cont_left dl dd a.on,.eycms_cont_left dl dt.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl dd a:active{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist dd{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl.jslist dd a:hover,.eycms_cont_left dl.jslist dd a.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist:hover{ background:<?php echo $global['web_assist_color']; ?>; }
    /*栏目操作*/
    .cate-dropup .cate-dropup-con a:hover{ background-color: <?php echo $global['web_theme_color']; ?>; }
    /*按钮*/
    a.ncap-btn-green { background-color: <?php echo $global['web_theme_color']; ?>; }
    a:hover.ncap-btn-green { background-color: <?php echo $global['web_assist_color']; ?>; }
    .flexigrid .sDiv2 .btn:hover { background-color: <?php echo $global['web_theme_color']; ?>; }
    .flexigrid .mDiv .fbutton div.add{background-color: <?php echo $global['web_theme_color']; ?>; border: none;}
    .flexigrid .mDiv .fbutton div.add:hover{ background-color: <?php echo $global['web_assist_color']; ?>;}
	.flexigrid .mDiv .fbutton div.adds{color:<?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;}
	.flexigrid .mDiv .fbutton div.adds:hover{ background-color: <?php echo $global['web_theme_color']; ?>;}
    /*选项卡字体*/
    .tab-base a.current,
    .tab-base a:hover.current {color:<?php echo $global['web_theme_color']; ?> !important;}
    .tab-base a.current:after,
    .tab-base a:hover.current:after {background-color: <?php echo $global['web_theme_color']; ?>;}
    .addartbtn input.btn:hover{ border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>; }
    .addartbtn input.btn.selected{ color: <?php echo $global['web_theme_color']; ?>;border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>;}
	/*会员导航*/
	.member-nav-group .member-nav-item .btn.selected{background: <?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;box-shadow: -1px 0 0 0 <?php echo $global['web_theme_color']; ?>;}
	.member-nav-group .member-nav-item:first-child .btn.selected{border-left: 1px solid <?php echo $global['web_theme_color']; ?> !important;}
	/*搜索按钮图标*/
	.flexigrid .sDiv2 .fa-search{}
        
    /* 商品订单列表标题 */
   .flexigrid .mDiv .ftitle h3 {border-left: 3px solid <?php echo $global['web_theme_color']; ?>;} 
	
    /*分页*/
    .pagination > .active > a, .pagination > .active > a:focus, 
	.pagination > .active > a:hover, 
	.pagination > .active > span, 
	.pagination > .active > span:focus, 
	.pagination > .active > span:hover { border-color: <?php echo $global['web_theme_color']; ?>;color:<?php echo $global['web_theme_color']; ?>; }
    
    .layui-form-onswitch {border-color: <?php echo $global['web_theme_color']; ?> !important;background-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-enable.selected { background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-disable.selected {background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .pcwap-onoff .cb-enable.selected { background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .pcwap-onoff .cb-disable.selected {background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    input[type="text"]:focus,
    input[type="text"]:hover,
    input[type="text"]:active,
    input[type="password"]:focus,
    input[type="password"]:hover,
    input[type="password"]:active,
    textarea:hover,
    textarea:focus,
    textarea:active { border-color:<?php echo hex2rgba($global['web_theme_color'],0.8); ?>;box-shadow: 0 0 0 1px <?php echo hex2rgba($global['web_theme_color'],0.5); ?> !important;}
    .input-file-show:hover .type-file-button {background-color:<?php echo $global['web_theme_color']; ?> !important; }
    .input-file-show:hover {border-color: <?php echo $global['web_theme_color']; ?> !important;box-shadow: 0 0 5px <?php echo hex2rgba($global['web_theme_color'],0.5); ?> !important;}
    .input-file-show:hover span.show a,
    .input-file-show span.show a:hover { color: <?php echo $global['web_theme_color']; ?> !important;}
    .input-file-show:hover .type-file-button {background-color: <?php echo $global['web_theme_color']; ?> !important; }
    .color_z { color: <?php echo $global['web_theme_color']; ?> !important;}
    a.imgupload{
        background-color: <?php echo $global['web_theme_color']; ?> !important;
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    /*专题节点按钮*/
    .ncap-form-default .special-add{background-color:<?php echo $global['web_theme_color']; ?>;border-color:<?php echo $global['web_theme_color']; ?>;}
    .ncap-form-default .special-add:hover{background-color:<?php echo $global['web_assist_color']; ?>;border-color:<?php echo $global['web_assist_color']; ?>;}
    
    /*更多功能标题*/
    .on-off_panel .title::before {background-color:<?php echo $global['web_theme_color']; ?>;}
    .on-off_panel .on-off_list-caidan .icon_bg .on{color: <?php echo $global['web_theme_color']; ?>;}
    .on-off_panel .e-jianhao {color: <?php echo $global['web_theme_color']; ?>;}
    
     /*内容菜单*/
    .ztree li a:hover{color:<?php echo $global['web_theme_color']; ?> !important;}
    .ztree li a.curSelectedNode{background-color: <?php echo $global['web_theme_color']; ?> !important; border-color:<?php echo $global['web_theme_color']; ?> !important;}
    .layout-left .on-off-btn {background-color: <?php echo $global['web_theme_color']; ?> !important;}

    .iframe_loading{
        width:100%;
        background:url(/public/static/admin/images/loading-0.gif) no-repeat center center;
    }
    
    .layui-btn-normal {background-color: <?php echo $global['web_theme_color']; ?>;}
    
    /* 商品规格按钮 */
    /* .preset-bt{border-color: <?php echo $global['web_theme_color']; ?> !important;background:<?php echo $global['web_theme_color']; ?>;} */
</style>
<script type="text/javascript" src="/public/static/admin/js/jquery.js?v=<?php echo $version; ?>"></script>
<!-- <script type="text/javascript" src="/public/plugins/tags_input/js/jquery.tagsinput.js?v=<?php echo $version; ?>"></script> -->
<script type="text/javascript" src="/public/static/admin/js/jquery-ui/jquery-ui.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.cookie.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/admin.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.validation.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/common.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/perfect-scrollbar.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.mousewheel.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/plugins/layui/layui.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/myFormValidate.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/myAjax2.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
</head>
<script type="text/javascript" src="/public/static/admin/js/clipboard.min.js"></script>
<body class="system-web" style="overflow-y: scroll;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <?php if(\think\Request::instance()->param('tabase') != '-1'): ?>
    <div class="fixed-bar">
        <div class="item-title">
            <ul class="tab-base nc-row">
                <?php if(is_check_access(CONTROLLER_NAME.'@web') == '1'): ?>
                <li><a href="<?php echo url('System/web'); ?>" <?php if('web'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>网站信息</span></a></li>
                <?php endif; if($main_lang == $admin_lang): if(is_check_access(CONTROLLER_NAME.'@web2') == '1'): ?>
                    <li><a href="<?php echo url('System/web2'); ?>" <?php if('web2'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>核心设置</span></a></li>
                    <?php endif; endif; if(is_check_access(CONTROLLER_NAME.'@basic') == '1'): ?>
                <li><a href="<?php echo url('System/basic'); ?>" <?php if('basic'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>附件扩展</span></a></li>
                <?php endif; if($main_lang == $admin_lang): if(is_check_access(CONTROLLER_NAME.'@api_conf') == '1'): ?>
                    <li><a href="<?php echo url('System/api_conf'); ?>" <?php if(preg_match('/^api_conf/i', ACTION_NAME)): ?>class="current"<?php endif; ?>><span>接口API</span></a></li>
                    <?php endif; endif; if(is_check_access(CONTROLLER_NAME.'@customvar_index') == '1'): ?>
                <li><a href="<?php echo url('System/customvar_index'); ?>" <?php if('customvar_index'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>自定义变量</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
    <form method="post" id="handlepost" action="<?php echo url('System/web'); ?>" enctype="multipart/form-data" name="form1">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="site_url">站点状态</label>
                </dt>
                <dd class="opt">
                    <label class="curpoin"><input id="web_status0" name="web_status" value="0" type="radio" <?php if(!isset($config['web_status']) OR empty($config['web_status'])): ?> checked="checked"<?php endif; ?>>开启</label>
                    &nbsp;
                    <label class="curpoin"><input id="web_status1" name="web_status" value="1" type="radio" <?php if(isset($config['web_status']) AND $config['web_status'] == 1): ?> checked="checked"<?php endif; ?>>关闭</label>
                    <input type="hidden" id="old_web_status" value="<?php echo (isset($config['web_status']) && ($config['web_status'] !== '')?$config['web_status']:'0'); ?>">
                    <!-- <p class="notic2 red none" id="web_status_tips" style="text-indent: 1em;">提示：关闭网站，系统会切换成动态URL模式！</p> -->
                    <?php if($web_cmsmode == '2'): ?>
                    <dd class="variable">
                        <div><p><b>变量名</b></p></div>
                        <div class="r"><b>标签调用</b></div>
                    </dd>
                    <?php endif; ?>
                </dd>
            </dl>
            <div id="div_web_status_close" class="<?php if(!isset($config['web_status']) OR empty($config['web_status'])): ?>none<?php endif; ?>">
                <dl class="row">
                    <dt class="tit">
                        <label for="web_status_mode">&nbsp;</label>
                    </dt>
                    <dd class="opt">
                        <label class="curpoin">
                            <input type="radio" name="web_status_mode" value="0" <?php if(empty($config['web_status_mode'])): ?>checked="checked"<?php endif; ?>/>文案显示&nbsp;&nbsp;
                        </label>
                        <label class="curpoin">
                            <input type="radio" name="web_status_mode" value="1" <?php if(!empty($config['web_status_mode']) && 1 == $config['web_status_mode']): ?>checked="checked"<?php endif; ?>/>跳转链接&nbsp;&nbsp;
                        </label>
                        <label class="curpoin">
                            <input type="radio" name="web_status_mode" value="2" <?php if(!empty($config['web_status_mode']) && 2 == $config['web_status_mode']): ?>checked="checked"<?php endif; ?>/>模板页面&nbsp;&nbsp;
                        </label>
                    </dd>
                </dl>
                <dl class="row dl_web_status_mode <?php if(!empty($config['web_status_mode'])): ?>none<?php endif; ?>" id="dl_web_status_mode_0">
                    <dt class="tit">
                        <label for="web_status_text">&nbsp;</label>
                    </dt>
                    <dd class="opt">
                        <input id="web_status_text" name="web_status_text" value="<?php if(!isset($config['web_status_text'])): ?>网站暂时关闭，维护中……<?php else: ?><?php echo $config['web_status_text']; endif; ?>" class="input-txt" type="text" autocomplete="off" />
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row dl_web_status_mode <?php if(empty($config['web_status_mode']) || 1 != $config['web_status_mode']): ?>none<?php endif; ?>" id="dl_web_status_mode_1">
                    <dt class="tit">
                        <label for="web_status_url">&nbsp;</label>
                    </dt>
                    <dd class="opt">
                        <input id="web_status_url" name="web_status_url" value="<?php echo (isset($config['web_status_url']) && ($config['web_status_url'] !== '')?$config['web_status_url']:''); ?>" class="input-txt" type="text" placeholder="关闭后，访问网站跳转的URL，http://" autocomplete="off"/>
                        <p class="notic">如果设置跳转URL，必须带有http:// 或 https://</p>
                    </dd>
                </dl>
                <dl class="row dl_web_status_mode <?php if(empty($config['web_status_mode']) || 2 != $config['web_status_mode']): ?>none<?php endif; ?>" id="dl_web_status_mode_2">
                    <dt class="tit">
                        <label for="web_status_tpl">&nbsp;</label>
                    </dt>
                    <dd class="opt">
                        <input id="web_status_tpl" name="web_status_tpl" value="<?php echo (isset($config['web_status_tpl']) && ($config['web_status_tpl'] !== '')?$config['web_status_tpl']:''); ?>" class="input-txt" type="text" placeholder="关闭后，访问网站显示的个性化页面，public/close.html" autocomplete="off"/>
                        <p class="notic">静态模板路径前面不要带有子目录</p>
                    </dd>
                </dl>
            </div>
            <dl class="row">
                <dt class="tit">
                    <label for="web_name">网站名称</label>
                </dt>
                <dd class="opt ui-web_name ui-text">
                    <input id="web_name" name="web_name" value="<?php echo (isset($config['web_name']) && ($config['web_name'] !== '')?$config['web_name']:''); ?>" class="input-txt ui-input" type="text" data-num="10" />
                    <p class="notic">一般不超过10个字符</p>
                    <p class="ui-big-text none">一般不超过10个字符（<span class="ui-textTips">还可以输入10个字符</span>）</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_name</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_name');" class="ui-btn3 blue web_name" data-clipboard-text="{eyou:global name='web_name' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_logo">网站LOGO</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show div_web_logo_local" <?php if(isset($config['web_logo_is_remote']) AND $config['web_logo_is_remote'] == 1): ?>style="display: none;"<?php endif; ?>>
                        <span class="show">
                            <a id="img_a_web_logo" class="nyroModal" rel="gal" href="<?php echo (isset($config['web_logo_local']) && ($config['web_logo_local'] !== '')?$config['web_logo_local']:'javascript:void(0);'); ?>" target="_blank">
                                <i id="img_i_web_logo" class="fa fa-picture-o" <?php if(!(empty($config['web_logo_local']) || (($config['web_logo_local'] instanceof \think\Collection || $config['web_logo_local'] instanceof \think\Paginator ) && $config['web_logo_local']->isEmpty()))): ?>onmouseover="layer_tips=layer.tips('<img src=<?php echo (isset($config['web_logo_local']) && ($config['web_logo_local'] !== '')?$config['web_logo_local']:''); ?> class=\'layer_tips_img\'>',this,{tips: [1, '#fff']});"<?php endif; ?> onmouseout="layer.close(layer_tips);"></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input type="text" id="web_logo_local" name="web_logo_local" value="<?php echo (isset($config['web_logo_local']) && ($config['web_logo_local'] !== '')?$config['web_logo_local']:''); ?>" class="type-file-text" autocomplete="off">
                            <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                            <input class="type-file-file" onClick="GetUploadify(1,'','allimg','web_logo_img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <input type="text" id="web_logo_remote" name="web_logo_remote" value="<?php echo (isset($config['web_logo_remote']) && ($config['web_logo_remote'] !== '')?$config['web_logo_remote']:''); ?>" placeholder="http://" class="input-txt" <?php if(!isset($config['web_logo_is_remote']) OR empty($config['web_logo_is_remote'])): ?>style="display: none;"<?php endif; ?>>
                    &nbsp;
                    <label><input type="checkbox" name="web_logo_is_remote" id="web_logo_is_remote" value="1" <?php if(isset($config['web_logo_is_remote']) AND $config['web_logo_is_remote'] == 1): ?>checked="checked"<?php endif; ?> onClick="clickRemote(this, 'web_logo');">远程图片</label>
                    <span class="err"></span>
                    <p class="notic">默认网站LOGO，通用头部显示，显示尺寸以模板设计为主</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_logo</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_logo');" class="ui-btn3 blue web_logo" data-clipboard-text="{eyou:global name='web_logo' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_ico">地址栏图标</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a id="img_a_web_ico" class="nyroModal" rel="gal" href="<?php echo (isset($config['web_ico']) && ($config['web_ico'] !== '')?$config['web_ico']:'javascript:void(0);'); ?>?t=<?php echo time(); ?>" target="_blank">
                                <i id="img_i_web_ico" class="fa fa-picture-o" <?php if(!(empty($config['web_ico']) || (($config['web_ico'] instanceof \think\Collection || $config['web_ico'] instanceof \think\Paginator ) && $config['web_ico']->isEmpty()))): ?>onmouseover="layer_tips=layer.tips('<img src=<?php echo (isset($config['web_ico']) && ($config['web_ico'] !== '')?$config['web_ico']:''); ?>?t=<?php echo time(); ?> width=32 height=32>',this,{tips: [1, '#fff']});"<?php endif; ?> onmouseout="layer.close(layer_tips);"></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input type="text" id="web_ico" name="web_ico" value="<?php echo (isset($config['web_ico']) && ($config['web_ico'] !== '')?$config['web_ico']:''); ?>" class="type-file-text" autocomplete="off">
                            <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                            <input class="type-file-file" onClick="GetUploadify(1,'','allimg','web_ico_img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <span class="err"></span>
                    <p class="notic">建议尺寸 32 * 32 (像素) 的.ico文件。<br/>如果无法正常显示新上传图标，清空浏览器缓存后访问。</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_ico</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_ico');" class="ui-btn3 blue web_ico" data-clipboard-text="{eyou:global name='web_ico' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_basehost">网站网址</label>
                </dt>
                <dd class="opt">
                    <input id="web_basehost" name="web_basehost" value="<?php echo (isset($config['web_basehost']) && ($config['web_basehost'] !== '')?$config['web_basehost']:''); ?>" placeholder="<?php echo \think\Request::instance()->scheme(); ?>://" class="input-txt" type="text" />
                    <p class="notic"></p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_basehost</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_basehost');" class="ui-btn3 blue web_basehost" data-clipboard-text="{eyou:global name='web_basehost' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_title">首页标题</label>
                </dt>
                <dd class="opt ui-web_title ui-text">
                    <input id="web_title" name="web_title" value="<?php echo (isset($config['web_title']) && ($config['web_title'] !== '')?$config['web_title']:''); ?>" class="input-txt ui-input" type="text" data-num="80" />
                    <p class="notic">一般不超过80个字符</p>
                    <p class="ui-big-text none">一般不超过80个字符（<span class="ui-textTips">还可以输入80个字符</span>）</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_title</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_title');" class="ui-btn3 blue web_title" data-clipboard-text="{eyou:global name='web_title' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_keywords">首页关键词</label>
                </dt>
                <dd class="opt ui-keyword ui-text">
                    <input id="web_keywords" name="web_keywords" value="<?php echo (isset($config['web_keywords']) && ($config['web_keywords'] !== '')?$config['web_keywords']:''); ?>" class="input-txt ui-input" type="text" data-num="100" />
                    <p class="notic">一般不超过100个字符</p>
                    <p class="ui-big-text none">一般不超过100个字符（<span class="ui-textTips">还可以输入100个字符</span>）</p>

<!-- 
                    <input type="text" value="<?php echo (isset($config['web_keywords']) && ($config['web_keywords'] !== '')?$config['web_keywords']:''); ?>" name="web_keywords" id="web_keywords" class="input-txt ui-input" data-num="100">
                    <input type="hidden" id="web_keywords_1607062084" value="web_keywords">
                    <script type="text/javascript">
                        $(function() { $('#web_keywords').tagsInput({width: '450px', height: 'auto'}); });
                    </script>
                    <span class="err"></span>
                    <p class="notic">输入标签结束后可用回车或空格分开</p>
                     -->
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_keywords</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_keywords');" class="ui-btn3 blue web_keywords" data-clipboard-text="{eyou:global name='web_keywords' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_description">首页描述</label>
                </dt>
                <dd class="opt ui-web_description ui-text">
                    <textarea rows="5" cols="60" id="web_description" name="web_description" style="height:60px;" class="ui-input" data-num="200"><?php echo (isset($config['web_description']) && ($config['web_description'] !== '')?$config['web_description']:''); ?></textarea>
                    <p class="notic">建议不超过200个字符</p>
                    <p class="ui-big-text none">建议不超过200个字符（<span class="ui-textTips">还可以输入200个字符</span>）</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_description</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_description');" class="ui-btn3 blue web_description" data-clipboard-text="{eyou:global name='web_description' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_copyright">版权信息</label>
                </dt>
                <dd class="opt">
                    <textarea cols="60" id="web_copyright" name="web_copyright" class="h20"><?php echo (isset($config['web_copyright']) && ($config['web_copyright'] !== '')?$config['web_copyright']:''); ?></textarea>
                    <p class="notic"></p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_copyright</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_copyright');" class="ui-btn3 blue web_copyright" data-clipboard-text="{eyou:global name='web_copyright' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_recordnum">备案号</label>
                </dt>
                <dd class="opt ui-keyword">
                    <?php if($config['web_recordnum_mode'] == '1'): ?>
                        <textarea rows="5" cols="60" id="web_recordnum" name="web_recordnum" class="h40"><?php echo (isset($config['web_recordnum']) && ($config['web_recordnum'] !== '')?$config['web_recordnum']:''); ?></textarea>
                    <?php else: ?>
                        <textarea rows="5" cols="60" id="web_recordnum" name="web_recordnum" class="h20"><?php echo strip_tags(htmlspecialchars_decode($config['web_recordnum'])); ?></textarea>
                    <?php endif; ?>
                    <input type="hidden" id="web_recordnum_mode" name="web_recordnum_mode" value="<?php echo (isset($config['web_recordnum_mode']) && ($config['web_recordnum_mode'] !== '')?$config['web_recordnum_mode']:'0'); ?>">
                    &nbsp;[<a href="javascript:void(0);" onclick="show_recordnum(this);"><?php if($config['web_recordnum_mode'] == '
                    1'): ?>普通模式<?php else: ?>代码模式<?php endif; ?></a>]
                    <p class="notic"></p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_recordnum</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_recordnum');" class="ui-btn3 blue web_recordnum" data-clipboard-text="{eyou:global name='web_recordnum' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_garecordnum">公安备案号</label>
                </dt>
                <dd class="opt ui-keyword">
                    <?php if($config['web_garecordnum_mode'] == '1'): ?>
                        <textarea rows="5" cols="60" id="web_garecordnum" name="web_garecordnum" class="h40"><?php echo (isset($config['web_garecordnum']) && ($config['web_garecordnum'] !== '')?$config['web_garecordnum']:''); ?></textarea>
                    <?php else: ?>
                        <textarea rows="5" cols="60" id="web_garecordnum" name="web_garecordnum" class="h20"><?php echo strip_tags(htmlspecialchars_decode($config['web_garecordnum'])); ?></textarea>
                    <?php endif; ?>
                    <input type="hidden" id="web_garecordnum_mode" name="web_garecordnum_mode" value="<?php echo (isset($config['web_garecordnum_mode']) && ($config['web_garecordnum_mode'] !== '')?$config['web_garecordnum_mode']:'0'); ?>">
                    &nbsp;[<a href="javascript:void(0);" onclick="show_garecordnum(this);"><?php if($config['web_garecordnum_mode'] == '
                    1'): ?>普通模式<?php else: ?>代码模式<?php endif; ?></a>]
                    <p class="notic"></p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_garecordnum</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_garecordnum');" class="ui-btn3 blue web_garecordnum" data-clipboard-text="{eyou:global name='web_garecordnum' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row"><dt class="tit"><label><b>网站第三方代码</b></label></dt></dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_thirdcode_pc">电脑PC端</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="web_thirdcode_pc" name="web_thirdcode_pc" style="height:80px;"><?php echo (isset($config['web_thirdcode_pc']) && ($config['web_thirdcode_pc'] !== '')?$config['web_thirdcode_pc']:''); ?></textarea>
                    <p class="notic">代码会放在 &lt;/body&gt; 标签以上（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_thirdcode_pc</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_thirdcode_pc');" class="ui-btn3 blue web_thirdcode_pc" data-clipboard-text="{eyou:global name='web_thirdcode_pc' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="web_thirdcode_wap">手机移动端</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="web_thirdcode_wap" name="web_thirdcode_wap" style="height:80px;"><?php echo (isset($config['web_thirdcode_wap']) && ($config['web_thirdcode_wap'] !== '')?$config['web_thirdcode_wap']:''); ?></textarea>
                    <p class="notic">代码会放在 &lt;/body&gt; 标签以上（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）</p>
                </dd>
                <?php if($web_cmsmode == '2'): ?>
                <dd class="variable">
                    <div><p>web_thirdcode_wap</p></div>
                    <div class="r"><a href="javascript:void(0);" onclick="showtext('web_thirdcode_wap');" class="ui-btn3 blue web_thirdcode_wap" data-clipboard-text="{eyou:global name='web_thirdcode_wap' /}">复制标签</a></div>
                </dd>
                <?php endif; ?>
            </dl>
            <div class="bot">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="adsubmit();">确认提交</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

    $(function(){
        tipsText();

        // 关闭站点
        $('input[name=web_status]').click(function(){
            $('#div_web_status_close').hide();
            // $('#web_status_tips').hide();
            // var seo_pseudo = <?php echo (isset($seo_pseudo) && ($seo_pseudo !== '')?$seo_pseudo:0); ?>;
            // var old_web_status = $('#old_web_status').val();
            // if(2 == seo_pseudo && old_web_status == 0 && $(this).val() == 1){
            //     $('#web_status_tips').show();
            // }
            if ($(this).val() == 1) {
                $('#div_web_status_close').show();
            }
        });

        $('input[name=web_status_mode]').click(function(){
            var web_status_mode = $(this).val();
            $('.dl_web_status_mode').hide();
            $('#dl_web_status_mode_'+web_status_mode).show();
        });
    });

    function adsubmit(){
        if($('input[name=web_status]:checked').val() == 1){
            var web_status_mode = $('input[name=web_status_mode]:checked').val();
            if(web_status_mode == 1){
                if ($.trim($('input[name=web_status_url]').val()) == '') {
                    showErrorMsg('跳转的URL不能为空！');
                    $('input[name=web_status_url]').focus();
                    return false;
                } else if (!checkURL($('input[name=web_status_url]').val())) {
                    showErrorMsg('跳转的URL格式不正确！');
                    $('input[name=web_status_url]').focus();
                    return false;
                }
            }
        }
        layer_loading("正在处理");
        $('#handlepost').submit();
    }
    
    function web_logo_img_call_back(fileurl_tmp)
    {
        $("#web_logo_local").val(fileurl_tmp);
        $("#img_a_web_logo").attr('href', fileurl_tmp);
        $("#img_i_web_logo").attr('onmouseover', "layer_tips=layer.tips('<img src="+fileurl_tmp+" class=\\'layer_tips_img\\'>',this,{tips: [1, '#fff']});");
    }
    
    function web_ico_img_call_back(fileurl_tmp)
    {
        $("#web_ico").val(fileurl_tmp);
        $("#img_a_web_ico").attr('href', fileurl_tmp);
        $("#img_i_web_ico").attr('onmouseover', "layer_tips=layer.tips('<img src="+fileurl_tmp+" width=32 height=32>',this,{tips: [1, '#fff']});");
    }

    function showtext(classname){
        var clipboard1 = new Clipboard("."+classname);clipboard1.on("success", function(e) {layer.msg("复制成功");});clipboard1.on("error", function(e) {layer.msg("复制失败！请手动复制", {icon:5});}); 
    }
    
    function show_recordnum(obj)
    {
        var recordnumObj = $('#web_recordnum');
        var value = recordnumObj.val();
        var valuehtml = "";

        if (value.indexOf('&lt;/a&gt;') == -1) {
            valuehtml = '<a href="https://beian.miit.gov.cn/" rel="nofollow" target="_blank">'+value+'</a>';
        }

        var web_recordnum_mode = $('#web_recordnum_mode').val();
        if (web_recordnum_mode == 0) { // 切换为代码模式
            $('#web_recordnum_mode').val(1);
            $(obj).html('普通模式');
            recordnumObj.css('height', '40px');
            recordnumObj.val(valuehtml);
        } else { // 切换为普通模式
            $('#web_recordnum_mode').val(0);
            $(obj).html('代码模式');
            recordnumObj.css('height', '20px');
            recordnumObj.val(removeHTMLTag(value));
        }
    }
    
    function show_garecordnum(obj)
    {
        var gaRecordnumObj = $('#web_garecordnum');
        var value = gaRecordnumObj.val();
        var valuehtml = "";

        if (value.indexOf('&lt;/a&gt;') == -1) {
            var recordcode = value.replace(/([^\d\-]+)/g, '');
            valuehtml = '<a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode='+recordcode+'" rel="nofollow" target="_blank">'+value+'</a>';
        }

        var web_garecordnum_mode = $('#web_garecordnum_mode').val();
        if (web_garecordnum_mode == 0) { // 切换为代码模式
            $('#web_garecordnum_mode').val(1);
            $(obj).html('普通模式');
            gaRecordnumObj.css('height', '40px');
            gaRecordnumObj.val(valuehtml);
        } else { // 切换为普通模式
            $('#web_garecordnum_mode').val(0);
            $(obj).html('代码模式');
            gaRecordnumObj.css('height', '20px');
            gaRecordnumObj.val(removeHTMLTag(value));
        }
    }

    //过滤HTML标签
    function removeHTMLTag(str) {
        str = str.replace(/<\/?[^>]*>/g, ''); //去除HTML tag
        str = str.replace(/[ | ]*\n/g, '\n'); //去除行尾空白
        str = str.replace(/ /ig, ''); //去掉 
        return str;
    }

</script>

<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop">
        <i class="fa fa-angle-up"></i>
    </a>
    <a href="JavaScript:void(0);" id="btnbottom">
        <i class="fa fa-angle-down"></i>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#think_page_trace_open').css('z-index', 99999);
    });
</script>
</body>
</html>