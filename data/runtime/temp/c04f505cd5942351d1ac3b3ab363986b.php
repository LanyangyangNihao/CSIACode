<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:55:"./application/admin/template/system/customvar_index.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/layout.htm";i:1689649653;s:73:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/theme_css.htm";i:1689649653;s:67:"/Users/gjj/hzwork/eyoucms/application/admin/template/system/bar.htm";i:1689649653;s:68:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/page.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/footer.htm";i:1689649653;}*/ ?>
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
<body class="bodystyle" style="overflow-y: scroll; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page" style="min-width: auto;">
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
    <div class="flexigrid">
        <div class="mDiv pt0">
            <div class="ftitle">
                <?php if(is_check_access('Links@index') == '1'): ?>
                <div class="sDiv">
                    <div class="fbutton" style="float: none;">
                        <a href="javascript:void(0);" data-closereload="1" data-href="<?php echo url('System/config_type', ['newframe'=>1]); ?>" onclick="openFullframe(this, '分组管理');">
                            <div class="adds">
                                <span>分组管理</span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <form class="navbar-form form-inline" id="searchForm" action="<?php echo U('System/customvar_index'); ?>" method="get" onsubmit="layer_loading('正在处理');">
                <?php echo (isset($searchform['hidden']) && ($searchform['hidden'] !== '')?$searchform['hidden']:''); ?>
                <div class="sDiv">
                    <div class="sDiv2">
                        <select name="type_id" class="select" style="margin:0px 5px;">
                            <option value="">--全部--</option>
                            <?php if(is_array($config_type) || $config_type instanceof \think\Collection || $config_type instanceof \think\Paginator): $i = 0; $__LIST__ = $config_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>" <?php if(\think\Request::instance()->param('type_id') == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['type_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="sDiv2">
                        <input type="text" size="30" name="keywords" value="<?php echo \think\Request::instance()->param('keywords'); ?>" class="qsbox" placeholder="搜索相关数据...">
                        <input type="submit" class="btn" value="搜索">
                        <i class="iconfont e-sousuo"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%">
                    <thead>
                    <tr>
                        <th class="sign w20 none" axis="col0">
                            <div class="tc"></div>
                        </th>
                        <th abbr="article_time" axis="col4" class="w250">
                            <div class="tl pl10">变量名称</div>
                        </th>
                        <th abbr="ac_id" axis="col4" class="w150">
                            <div class="tc">表单类型</div>
                        </th>
                        <th abbr="ac_id" axis="col4">
                            <div style="padding-left: 15px;">变量值</div>
                        </th>
                        <th abbr="ac_id" axis="col4" class="w150">
                            <div class="tc">分组</div>
                        </th>
                        <th axis="col1" class="w150">
                            <div class="tc">操作</div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv" style="height: auto; min-height: auto;">
            <form id="PostForm">
                <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
                    <table style="width: 100%">
                        <tbody id="tbody">
                        <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                            <tr>
                                <td class="no-data" align="center" axis="col0" colspan="50">
                                    <i class="fa fa-exclamation-circle"></i>没有符合条件的数据
                                </td>
                            </tr>
                        <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?>
                            <tr class="tr" id="tr_<?php echo $k; ?>">
                                <td class="sign none">
                                    <div class="w20 tc">
                                        <input type="hidden" name="attr_id[]" value="<?php echo $vo['attr_id']; ?>">
                                        <input type="hidden" name="attr_var_name[]" value="<?php echo $vo['attr_var_name']; ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="w250 tl">
                                        <span class="pl10">
                                            <span class="span_showhide span_attr_name"><?php echo $vo['attr_name']; ?></span>
                                            <input type="text" name="attr_name[]" value="<?php echo $vo['attr_name']; ?>" class="w200 input_showhide" style="display: none;">
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="w150 tc">
                                        <?php if($vo['attr_input_type'] == '4'): ?>
                                            <span title="不允许更改">开关类型</span>
                                            <input type="hidden" name="attr_input_type[]" value="<?php echo $vo['attr_input_type']; ?>" class="w200">
                                        <?php else: ?>
                                            <span class="span_showhide span_attr_input_type">
                                                <?php if($vo['attr_input_type'] == 2): ?>
                                                    多行文本
                                                <?php elseif($vo['attr_input_type'] == 3): ?>
                                                    上传图片
                                                <?php else: ?>
                                                    单行文本
                                                <?php endif; ?>
                                            </span>
                                            <select name="attr_input_type[]" class="input_showhide none" onchange="change_attr_input_type(this);">
                                                <option value="0" <?php if($vo['attr_input_type'] == '0'): ?>selected<?php endif; ?>>单行文本</option>
                                                <option value="2" <?php if($vo['attr_input_type'] == '2'): ?>selected<?php endif; ?>>多行文本</option>
                                                <option value="3" <?php if($vo['attr_input_type'] == '3'): ?>selected<?php endif; ?>>上传图片</option>
                                                <!-- <option value="4" <?php if($vo['attr_input_type'] == '4'): ?>selected<?php endif; ?>>开关类型</option> -->
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td style="width: 100%">
                                    <div style="padding-left: 15px;" class="ncap-form-default">
                                        <span class="span_showhide span_attr_value">
                                            <?php if(4 == $vo['attr_input_type']): if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                                                    开启
                                                <?php else: ?>
                                                    关闭
                                                <?php endif; elseif(3 == $vo['attr_input_type']): ?>
                                                <img src="<?php echo get_default_pic($vo['value']); ?>" height="50">
                                            <?php else: ?>
                                                <?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:''); endif; ?>
                                        </span>

                                        <?php switch($vo['attr_input_type']): case "1": break; case "2": ?>
                                                <textarea rows="5" cols="60" name="attr_value[]" style="height:36px;" class="input_showhide none"><?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:''); ?></textarea>
                                            <?php break; case "3": ?>
                                                <span class="input-file-show input_showhide" style="display: none;">
                                                    <span class="show">
                                                        <a id="img_a_<?php echo $vo['attr_var_name']; ?>" class="nyroModal" rel="gal" href="<?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'javascript:void(0);'); ?>" target="_blank">
                                                            <i id="img_i_<?php echo $vo['attr_var_name']; ?>" class="fa fa-picture-o" <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>onmouseover="layer_tips=layer.tips('<img src=<?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:''); ?> class=\'layer_tips_img\'>',this,{tips: [1, '#fff']});"<?php endif; ?> onmouseout="layer.close(layer_tips);"></i>
                                                        </a>
                                                    </span>
                                                    <span class="type-file-box">
                                                        <input type="text" id="<?php echo $vo['attr_var_name']; ?>" name="attr_value[]" value="<?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:''); ?>" class="type-file-text" autocomplete="off">
                                                        <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                                                        <input class="type-file-file" onClick="GetUploadify(1,'','allimg','<?php echo $vo['attr_var_name']; ?>_img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                                                    </span>
                                                </span>
                                                <script type="text/javascript">
                                                    function <?php echo $vo['attr_var_name']; ?>_img_call_back(fileurl_tmp)
                                                    {
                                                        $("#<?php echo $vo['attr_var_name']; ?>").val(fileurl_tmp);
                                                        $("#img_a_<?php echo $vo['attr_var_name']; ?>").attr('href', fileurl_tmp);
                                                        $("#img_i_<?php echo $vo['attr_var_name']; ?>").attr('onmouseover', "layer_tips=layer.tips('<img src="+fileurl_tmp+" class=\\'layer_tips_img\\'>',this,{tips: [1, '#fff']});");
                                                    }
                                                </script>
                                            <?php break; case "4": ?>
                                                <div class="onoff input_showhide" style="display: none;">
                                                    <label for="<?php echo $vo['attr_var_name']; ?>1" class="cb-enable <?php if(!empty($vo['value'])): ?>selected<?php endif; ?>">开启</label>
                                                    <label for="<?php echo $vo['attr_var_name']; ?>0" class="cb-disable <?php if(empty($vo['value'])): ?>selected<?php endif; ?>">关闭</label>
                                                    <input id="<?php echo $vo['attr_var_name']; ?>1" onclick="attr_switch(this);" value="1" type="radio" <?php if(!empty($vo['value'])): ?> checked="checked"<?php endif; ?>>
                                                    <input id="<?php echo $vo['attr_var_name']; ?>0" onclick="attr_switch(this);" value="0" type="radio" <?php if(empty($vo['value'])): ?> checked="checked"<?php endif; ?>>
                                                    <input type="hidden" name="attr_value[]" value="<?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'0'); ?>" class="input-txt">
                                                </div>
                                            <?php break; default: ?>
                                                <input type="text" name="attr_value[]" value="<?php echo (isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:''); ?>" class="input_showhide input-txt" style="display: none;">
                                        <?php endswitch; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="w150 tc">
                                        <span class="pl10">
                                            <span class="span_showhide span_attr_type_id"><?php echo $vo['type_name']; ?></span>
                                            <select name="attr_type_id[]" class="input_showhide none">
                                                <?php if(is_array($config_type) || $config_type instanceof \think\Collection || $config_type instanceof \think\Paginator): $i = 0; $__LIST__ = $config_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                                     <option value="<?php echo $type['id']; ?>" <?php if($vo['type_id'] == $type['id']): ?>selected<?php endif; ?>><?php echo $type['type_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </span>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="w150 tl">
                                        <?php if(is_check_access('System@customvar_save') == '1'): ?>
                                            <a class="btn blue" href="javascript:void(0);" onClick="customvar_edit(this);">编辑</a>
                                        <?php endif; if(is_check_access('System@customvar_del') == '1'): if($main_lang == $admin_lang): ?>
                                            <a class="btn red" href="javascript:void(0);" data-id="<?php echo $vo['id']; ?>" onClick="customvar_del(this);" <?php if($recycle_switch == '1'): ?> data-deltype="del" <?php else: ?> data-deltype="pseudo" <?php endif; ?>>删除</a>
                                            <?php endif; endif; ?>
                                        <a class="btn blue" href="javascript:void(0);" onclick="copyToClipBoard('<?php echo $vo['attr_var_name']; ?>', '<?php echo $vo['attr_var_title']; ?>')">标签调用</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="iDiv" style="display: none;"></div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <?php if($main_lang == $admin_lang): ?>
                <div class="fbutton">
                    <a href="javascript:void(0);" onclick="customvar_add();">
                        <div class="add" title="新增变量">
                            <span class="red"><i class="fa fa-plus"></i>新增变量</span>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <div class="fbutton">
                    <a href="javascript:void(0);" onclick="customvar_save(this);">
                        <div class="add" title="保存">
                            <span class=""><i class="fa fa-save"></i>保存</span>
                        </div>
                    </a>
                </div>
                <div class="fbuttonr">
    <div class="pages">
       <?php echo $page; ?>
    </div>
</div>
<div class="fbuttonr">
    <div class="total">
        <h5>共有<?php echo (isset($pager->totalRows) && ($pager->totalRows !== '')?$pager->totalRows:0); ?>条,每页显示
            <select name="pagesize" style="width: 60px;" onchange="ey_selectPagesize(this);">
                <option <?php if($pager->listRows == 20): ?> selected <?php endif; ?> value="20">20</option>
                <option <?php if($pager->listRows == 50): ?> selected <?php endif; ?> value="50">50</option>
                <option <?php if($pager->listRows == 100): ?> selected <?php endif; ?> value="100">100</option>
                <option <?php if($pager->listRows == 200): ?> selected <?php endif; ?> value="200">200</option>
            </select>
        </h5>
    </div>
</div>
            </div>
            <div style="clear:both"></div>
        </div>
        <!--分页位置-->
    </div>
</div>
<script type="text/javascript">
    $('#searchForm select[name=type_id]').change(function(){
        $('#searchForm').submit();
    });
    var config_type_list = <?php echo json_encode($config_type); ?>;
    var attr_input_type_list = <?php echo json_encode($attr_input_type); ?>;
    $(document).ready(function(){
        // 表格行点击选中切换
        $('#flexigrid > table>tbody >tr').click(function(){
            $(this).toggleClass('trSelected');
        });

        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });
    });
    
    function showtext(classname){
        var clipboard1 = new Clipboard("."+classname);clipboard1.on("success", function(e) {layer.msg("复制成功");});clipboard1.on("error", function(e) {layer.msg("复制失败！请手动复制", {icon:5});}); 
    }

    // tr数,取唯一标识
    var tr_id = $('#tbody tr').length;
    function customvar_add(){
        var html = '';
        html += '<tr class="tr" id="tr_'+tr_id+'">';
        html += '    <td class="sign none">';
        html += '      <div class="w20 tc"> ';
        html += '      </div>';
        html += '    </td>';
        html += '    <td>';
        html += '      <div class="w250 tl"> ';
        html += '        <span class="pl10">';
        html += '          <input type="text" name="attr_name[]" value="" class="w200 input_showhide">';
        html += '        </span>';
        html += '      </div>';
        html += '    </td>';
        html += '    <td>';
        html += '      <div class="w150 tc">';
        html += '        <select name="attr_input_type[]" class="input_showhide" onchange="change_attr_input_type(this);">';
        for(var i in attr_input_type_list){
            html += '            <option value="'+i+'">'+attr_input_type_list[i]+'</option>';
        }
        html += '        </select>';
        html += '      </div>';
        html += '    </td>';
        html += '    <td style="width: 100%">';
        html += '      <div style="padding-left: 15px;" class="ncap-form-default">';
        html += '        <input type="text" name="attr_value[]" value="" class="input_showhide input-txt">';
        html += '      </div>';
        html += '    </td>';
        html += '    <td>';
        html += '      <div class="w150 tc">';
        html += '        <select name="attr_type_id[]" class="input_showhide">';
        for(var i in config_type_list){
            html += '            <option value="'+config_type_list[i].id+'">'+config_type_list[i].type_name+'</option>';
        }
        html += '        </select>';
        html += '      </div>';
        html += '    </td>';
        html += '    <td class="">';
        html += '       <div class="w150 tl">';
        html += '          <a class="btn grey" href="javascript:void(0);">编辑</a>';
        html += '          <a href="javascript:void(0);" class="btn red" onclick="$(\'#tr_'+tr_id+'\').remove();"><i class="fa fa-trash-o"></i>删除</a> ';
        html += '          <a class="btn grey" href="javascript:void(0);">标签调用</a>';
        html += '       </div>';
        html += '    </td>';
        html += '</tr>';

        if ($('input[name*=attr_name]').length == 0) {
            $('#tbody').html(html);
        } else {
            $('#tbody').append(html);
        }
        tr_id += 1;
    }

    function change_attr_input_type(obj)
    {
        var html = '';
        var attr_input_type = $(obj).val();
        var trObj = $(obj).parent().parent().parent();
        var tr_id = trObj.attr('id');
        if (2 == attr_input_type) {
            html += '<textarea rows="5" cols="60" name="attr_value[]" style="height:36px;" class="input_showhide"></textarea>';
        } else if (3 == attr_input_type) {
            html += '<span class="input-file-show input_showhide">';
            html += '    <span class="show">';
            html += '        <a id="img_a_'+tr_id+'" class="nyroModal" rel="gal" href="javascript:void(0);" target="_blank">';
            html += '            <i id="img_i_'+tr_id+'" class="fa fa-picture-o" onmouseover="" onmouseout="layer.close(layer_tips);"></i>';
            html += '        </a>';
            html += '    </span>';
            html += '    <span class="type-file-box">';
            html += '        <input type="text" id="web_attr_'+tr_id+'" name="attr_value[]" value="" class="type-file-text" autocomplete="off">';
            html += '        <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">';
            html += '        <input class="type-file-file" onClick="GetUploadify(1,\'\',\'allimg\',\''+tr_id+'_img_call_back\')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">';
            html += '    </span>';
            html += '</span>';

            html += '<script type="text/javascript">';
            html += '    function '+tr_id+'_img_call_back(fileurl_tmp)';
            html += '    {';
            html += '        $("#web_attr_'+tr_id+'").val(fileurl_tmp);';
            html += '        $("#img_a_'+tr_id+'").attr("href", fileurl_tmp);';
            html += '        $("#img_i_'+tr_id+'").attr("onmouseover", "layer_tips=layer.tips(\'<img src="+fileurl_tmp+" class=\\\\\\\'layer_tips_img\\\\\\\'>\',this,{tips: [1, \'#fff\']});");';
            html += '    }';
            html += '<\/script>';
        } else if (4 == attr_input_type) {
            html += '<div class="onoff input_showhide">';
            html += '    <label for="'+tr_id+'_1" class="cb-enable">开启</label>';
            html += '    <label for="'+tr_id+'_0" class="cb-disable selected">关闭</label>';
            html += '    <input id="'+tr_id+'_1" onclick="attr_switch(this);" value="1" type="radio">';
            html += '    <input id="'+tr_id+'_0" onclick="attr_switch(this);" value="0" type="radio" checked="checked">';
            html += '    <input type="hidden" name="attr_value[]" value="0" class="input-txt">';
            html += '</div>';
        } else {
            html += '<input type="text" name="attr_value[]" value="" class="input_showhide input-txt">';
        }
        trObj.find('.ncap-form-default').html(html);
    }
    
    function attr_switch(obj)
    {
        var attr_value = $(obj).val();
        $(obj).parent().find("input[name='attr_value[]']").val(attr_value);
    }

    function customvar_edit(obj)
    {
        var trObj = $(obj).parent().parent().parent();
        trObj.find('.input_showhide').show();
        trObj.find('.span_showhide').hide();
        $(obj).removeAttr('onclick').unbind('click').click(function(){customvar_save_one(this);}).css("color","red").html("保存");
    }
    //提交保存单条
    function customvar_save_one(obj){
        var trObj = $(obj).parent().parent().parent();
        var attr_id =  trObj.find(('input[name*=attr_id]')).val();
        var attr_var_name = trObj.find(('input[name*=attr_var_name]')).val();
        var attr_name = trObj.find(('input[name*=attr_name]')).val();
        var attr_input_type = trObj.find(('select[name*=attr_input_type]')).val();
        if (attr_input_type === undefined){     //开关类型
            var attr_input_type = trObj.find(('input[name*=attr_input_type]')).val();
        }
        var attr_value = trObj.find(('[name*=attr_value]')).val();
        var attr_type_id = trObj.find(('select[name*=attr_type_id]')).val();
        if (attr_name === '') {
            layer.alert('变量名称不能为空！', {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '提示',
                btnAlign:'r',
                closeBtn: 3,
                success: function () {
                      $(".layui-layer-content").css('text-align', 'left');
                  }
            });
            return false;
        }
        layer_loading('正在处理');
        $.ajax({
            type : 'post',
            url : "<?php echo url('System/customvar_save_one'); ?>",
            data : {attr_id:attr_id,attr_var_name:attr_var_name,attr_name:attr_name,attr_input_type:attr_input_type,attr_value:attr_value,type_id:attr_type_id,_ajax:1},
            dataType : 'json',
            success : function(res){
                layer.closeAll();
                if(res.code == 1){
                    layer.msg(res.msg, {shade: 0.1, time: 1000}, function(){
//                        window.location.reload();
                    });
                    trObj.find(".span_attr_name").html(attr_name);
                    trObj.find(".span_attr_input_type").html(attr_input_type_list[attr_input_type]);
                    trObj.find(".span_attr_value").html(res.data.attr_value);  //返回正确的值
                    trObj.find(".span_attr_type_id").html(config_type_list[attr_type_id].type_name);
                    trObj.find('.input_showhide').hide();
                    trObj.find('.span_showhide').show();
                    $(obj).removeAttr('onclick').unbind('click').click(function(){customvar_edit(this);}).css("color","#3478bc").html("编辑");
                }else{
                    showErrorAlert(res.msg);
                }
            },
            error: function(e){
                layer.closeAll();
                showErrorAlert(e.responseText);
            }
        });
    }
    // 提交保存全部
    function customvar_save(obj){

        if ($('input[name*=attr_name]').length == 0) {
            layer.alert('至少新增一个自定义变量！', {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '提示',
                btnAlign:'r',
                closeBtn: 3,
                success: function () {
                      $(".layui-layer-content").css('text-align', 'left');
                  }
            });
            return false;
        } else {
            var is_empty = true;
            $('input[name*=attr_name]').each(function(index, item){
                if ($.trim($(item).val()) != '') {
                    is_empty = false;
                    return false;
                }
            });
            if (true == is_empty) {
                layer.alert('变量名称不能为空！', {
                    shade: layer_shade,
                    area: ['480px', '190px'],
                    move: false,
                    title: '提示',
                    btnAlign:'r',
                    closeBtn: 3,
                    success: function () {
                          $(".layui-layer-content").css('text-align', 'left');
                      }
                });
                return false;
            }
        }
        var url = "<?php echo url('System/customvar_save', ['_ajax'=>1]); ?>";
        layer_loading('正在处理');
        $.ajax({
            type : 'post',
            url : url,
            data : $('#PostForm').serialize(),
            dataType : 'json',
            success : function(res){
                layer.closeAll();
                if(res.code == 1){
                    layer.msg(res.msg, {icon: 6, time: 1000}, function(){
                        // parent.gourl(res.url);
                        window.location.href = res.url;
                    });
                }else{
                    showErrorMsg(res.msg);
                }
            },
            error: function(e){
                layer.closeAll();
                showErrorAlert(e.responseText);
            }
        });
    }

    function customvar_del(obj) {
        var deltype = $(obj).attr('data-deltype');
        var confirm_title = '确认删除至回收站？';
        if ('del' == deltype){
            confirm_title = '确认删除？';
        }
        layer.confirm(confirm_title, {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '提示',
                btnAlign:'r',
                closeBtn: 3,
                btn: ['确定', '取消'] ,//按钮
                success: function () {
                      $(".layui-layer-content").css('text-align', 'left');
                  }
            }, function(){
                // 确定
                layer_loading('正在处理');
                $.ajax({
                    type : 'post',
                    url : "<?php echo url('System/customvar_del'); ?>",
                    data : {del_id:$(obj).attr('data-id'),deltype:deltype,_ajax:1},
                    dataType : 'json',
                    success : function(data){
                        layer.closeAll();
                        if(data.code == 1){
                            layer.msg(data.msg, {icon: 6});
                            window.location.reload();
                            // $('#dl_'+$(obj).attr('data-attr_var_name')).remove();
                        }else{
                            layer.msg(data.msg, {icon: 5,time: 2000});
                        }
                    }
                });
            }, function(index){
                layer.close(index);
                return false;// 取消
            }
        );
    }

    /**
     * 代码调用js
     * @param id  id
     * @param limit 条数
     */
    function copyToClipBoard(attr_var_name, attr_var_title) {
        var contentdiv = '<div class="dialog_content" style="margin: 0px; padding: 0px;"><dl style="padding:10px 30px;line-height:30px;"><dd>变量值：</dd>'
        contentdiv += '<dd><input type="text" style=" width:400px;margin-bottom:10px;" value="{'+'eyou:global name=\''+attr_var_name+'\' /}"></dd>'
        contentdiv += '<dd>变量名称：</dd>'
        contentdiv += '<dd><input type="text" style=" width:400px;margin-bottom:10px;" value="{'+'eyou:global name=\''+attr_var_title+'\' /}"></dd>'
        height = '250px';

        contentdiv += '<dd style="border-top: dotted 1px #E7E7E7; color: #F60;">请将相应标签复制并粘贴到对应模板文件中！</dd></dl></div>'
        layer.open({
            shade: layer_shade,
            title: '标签调用',
            type: 1,
            skin: 'layui-layer-demo',
            area: ['480px', height], //宽高
            content: contentdiv
        });
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