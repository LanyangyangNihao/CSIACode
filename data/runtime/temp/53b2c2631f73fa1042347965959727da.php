<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:53:"./application/admin/template/archives/index_draft.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/layout.htm";i:1689649653;s:73:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/theme_css.htm";i:1689649653;s:68:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/page.htm";i:1689649653;s:70:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/footer.htm";i:1689649653;}*/ ?>
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

<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;min-width:auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page" style="min-width:auto;box-shadow:none;">
    <div class="flexigrid" style="margin-top: 0px;min-height: 600px;">
		<div class="fixed-bar">
		    <div class="item-title">
		        <a class="back_xin" href="<?php if(!(empty($menu) || (($menu instanceof \think\Collection || $menu instanceof \think\Paginator ) && $menu->isEmpty()))): ?><?php echo url('Index/switch_map'); else: ?><?php echo url('Archives/index'); endif; ?>" title="返回"><i class="iconfont e-fanhui"></i></a>
		        <div class="subject">
		            <h3>待审核文档</h3>
		            <h5></h5>
		        </div>
		    </div>
		</div>
        <div class="mDiv pt0">
            <div class="ftitle_nav">
                <div class="fbutton">
                    <a href="<?php echo url('Archives/index_draft'); ?>">
                        <div class="<?php if(empty($draft_type) || (($draft_type instanceof \think\Collection || $draft_type instanceof \think\Paginator ) && $draft_type->isEmpty())): ?>cur<?php endif; ?>" title="全部">
                            全部<span><?php echo (isset($allCount) && ($allCount !== '')?$allCount:0); ?></span>
                        </div>
                    </a>
                </div>
                <div class="fbutton">
                    <a  href="<?php echo url('Archives/index_draft', ['draft_type'=>'user']); ?>">
                        <div class="<?php if($draft_type == 'user'): ?>cur<?php endif; ?>" title="会员投稿">
                            前台投稿<span><?php echo (isset($userCount) && ($userCount !== '')?$userCount:0); ?></span>
                        </div>
                    </a>
                </div>
                <div class="fbutton">
                    <a href="<?php echo url('Archives/index_draft', ['draft_type'=>'admin']); ?>">
                        <div class="<?php if($draft_type == 'admin'): ?>cur<?php endif; ?>" title="后台发布">
                            后台发布<span><?php echo (isset($adminCount) && ($adminCount !== '')?$adminCount:0); ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <form id="searchForm" class="navbar-form form-inline" action="<?php echo url('Archives/index_draft'); ?>" method="get" onSubmit="layer_loading('正在处理');">
                <?php echo (isset($searchform['hidden']) && ($searchform['hidden'] !== '')?$searchform['hidden']:''); ?>
                <div class="sDiv">
                    <div class="sDiv2">
                        <input type="text" size="30" name="keywords" value="<?php echo \think\Request::instance()->param('keywords'); ?>" class="qsbox" placeholder="标题搜索...">
                        <input type="hidden" name="menu" value="<?php echo (isset($menu) && ($menu !== '')?$menu:0); ?>">
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
                        <th class="sign w40" axis="col0">
                            <div class="tc"><input type="checkbox" class="checkAll" autocomplete="off"></div>
                        </th>
                        <th abbr="article_title" axis="col3" class="w70">
                            <div class="tc">ID</div>
                        </th>
                        <th abbr="article_title" axis="col3" class="">
                            <div style="text-align: left;" class="text-l10">标题</div>
                        </th>
                        <th abbr="article_time" axis="col6" class="w110">
                            <div class="tl text-l10">发布人</div>
                        </th>
                        <th abbr="article_time" axis="col6" class="w120">
                            <div class="tc">栏目</div>
                        </th>
                        <th abbr="article_time" axis="col6" class="w60">
                            <div class="tc sort_style"><a href="<?php echo getArchivesSortUrl('arcrank'); ?>">审核&nbsp;<i <?php if(\think\Request::instance()->param('orderby') == 'arcrank'): if(\think\Request::instance()->param('orderway') == 'asc'): ?>class="asc"<?php else: ?>class="desc"<?php endif; endif; ?>></i></a></div>
                        </th>
                        <th abbr="article_time" axis="col6" class="w60">
                            <div class="tc">点击</div>
                        </th>
                        <?php if(!empty($arctype_info) && $arctype_info['current_channel'] == 4): ?>
                        <th abbr="download_time" axis="col6" class="w60">
                            <div class="tc">下载</div>
                        </th>
                        <?php endif; ?>
                        <th abbr="article_time" axis="col6" class="w100">
                            <div class="tc">发布时间</div>
                        </th>
                        <th axis="col1" class="w160">
                            <div class="tc">操作</div>
                        </th>
                        <th abbr="article_time" axis="col6" class="w60">
                            <div class="tc sort_style"><a href="<?php echo getArchivesSortUrl('sort_order'); ?>">排序&nbsp;<i <?php if(\think\Request::instance()->param('orderby') == 'sort_order'): if(\think\Request::instance()->param('orderway') == 'asc'): ?>class="asc"<?php else: ?>class="desc"<?php endif; endif; ?>></i></a></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv" style="height: auto;">
            <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
                <table style="width: 100%;">
                    <tbody>
                    <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                        <tr>
                            <td class="no-data" align="center" axis="col0" colspan="50">
                                <div class="no_row">
                                    <div class="no_pic"><img src="/public/static/admin/images/null-data.png"></div>
                                </div>
                            </td>
                        </tr>
                    <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?>
                        <tr>
                            <td class="sign">
                                <div id="aid_<?php echo $vo['aid']; ?>" data-typeid="<?php echo $vo['typeid']; ?>" class="tc w40"><input type="checkbox" name="ids[]" value="<?php echo $vo['aid']; ?>" autocomplete="off"></div>
                            </td>
                           
                            <td class="sort">
                                <div class="tc w70">
                                    <?php echo $vo['aid']; ?>
                                </div>
                            </td>
                            <td class="" style="width: 100%;">
                                <div class="tl pdl10" >
                                    <?php if(!(empty($vo['is_litpic']) || (($vo['is_litpic'] instanceof \think\Collection || $vo['is_litpic'] instanceof \think\Paginator ) && $vo['is_litpic']->isEmpty()))): ?>
                                        <i class="fa fa-picture-o color_z" onmouseover="layer_tips=layer.tips('<img src=<?php echo $vo['litpic']; ?> class=\'layer_tips_img\'>',this,{tips: [1, '#fff']});" onmouseout="layer.close(layer_tips);"></i>
                                    <?php endif; if(is_check_access('Archives@edit') == '1'): if(empty($channelRow[$vo['channel']]['ifsystem'])): ?>
                                            <a href="<?php echo url('Custom/edit',array('id'=>$vo['aid'],'typeid'=>\think\Request::instance()->param('typeid'), 'channel'=>$vo['channel'], 'referurl'=>$pageurl)); ?>" style="<?php if($vo['is_b'] == '1'): ?> font-weight: bold;<?php endif; ?>"><?php echo $vo['title']; ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo url($channelRow[$vo['channel']]['ctl_name'].'/edit',array('id'=>$vo['aid'],'typeid'=>\think\Request::instance()->param('typeid'), 'referurl'=>$pageurl)); ?>" style="<?php if($vo['is_b'] == '1'): ?> font-weight: bold;<?php endif; ?>"><?php echo $vo['title']; ?></a>
                                        <?php endif; else: ?>
                                    <?php echo $vo['title']; endif; $showArcFlagData = showArchivesFlagStr($vo); if(is_array($showArcFlagData) || $showArcFlagData instanceof \think\Collection || $showArcFlagData instanceof \think\Paginator): $i = 0; $__LIST__ = $showArcFlagData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;if($i == '1'): ?><span style="color: red;">[<?php endif; ?>
                                        <i style="font-size: 12px;"><?php echo $vo1['small_name']; ?></i>
                                        <?php if($i == count($showArcFlagData)): ?>]</span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="tl text-l10 w110 ellipsis">
                                    <?php echo (isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:'匿名'); ?>
                                </div>
                            </td>
                            <td class="">
                                <div class="w120 tc ellipsis"><a href="<?php echo url('Archives/index_draft', array('typeid'=>$vo['typeid'])); ?>" title="<?php echo $vo['typename']; ?>"><?php echo (isset($vo['typename']) && ($vo['typename'] !== '')?$vo['typename']:'<i class="red">数据出错！</i>'); ?></a></div>
                            </td>
                            <td>
                                <div class="tc w60">
                                    <?php if($vo['arcrank'] <= -1): ?>
                                        <span class="no" <?php if(is_check_access(CONTROLLER_NAME.'@edit') == '1'): ?> data-typeid="<?php echo $vo['typeid']; ?>" data-seo_pseudo="<?php echo (isset($seo_pseudo) && ($seo_pseudo !== '')?$seo_pseudo:'1'); ?>" onClick="changeTableVal('archives','aid','<?php echo $vo['aid']; ?>','arcrank',this);" <?php endif; ?> ><i class="fa fa-ban"></i>否</span>
                                    <?php else: ?>
                                        <span class="yes" <?php if(is_check_access(CONTROLLER_NAME.'@edit') == '1'): ?> data-typeid="<?php echo $vo['typeid']; ?>" data-seo_pseudo="<?php echo (isset($seo_pseudo) && ($seo_pseudo !== '')?$seo_pseudo:'1'); ?>" onClick="changeTableVal('archives','aid','<?php echo $vo['aid']; ?>','arcrank',this);" <?php endif; ?> ><i class="fa fa-check-circle"></i>是</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="tc w60">
                                    <?php echo $vo['click']; ?>
                                </div>
                            </td>
                            <?php if(!empty($arctype_info) && $arctype_info['current_channel'] == 4): ?>
                            <td>
                                <div class="tc w60">
                                    <?php echo $vo['downcount']; ?>
                                </div>
                            </td>
                            <?php endif; ?>
                            <td>
                                <div class="w100 tc">
                                    <?php echo date('Y-m-d',$vo['add_time']); ?>
                                </div>
                            </td>
                            <td class="operation">
                                <div class="w160 tc">
                                    <?php if(is_check_access('Archives@edit') == '1'): if(empty($channelRow[$vo['channel']]['ifsystem'])): ?>
                                            <a href="<?php echo url('Custom/edit',array('id'=>$vo['aid'],'typeid'=>\think\Request::instance()->param('typeid'), 'channel'=>$vo['channel'], 'referurl'=>$pageurl)); ?>" class="btn blue">编辑</a>
                                        <?php else: ?>
                                            <a href="<?php echo url($channelRow[$vo['channel']]['ctl_name'].'/edit',array('id'=>$vo['aid'],'typeid'=>\think\Request::instance()->param('typeid'), 'referurl'=>$pageurl)); ?>" class="btn blue">编辑</a>
                                        <?php endif; ?>
                                        <i></i>
                                    <?php endif; if(is_check_access('Archives@del') == '1'): ?>
                                        <a class="btn red"  href="javascript:void(0);" data-url="<?php echo url('Archives/del'); ?>" data-id="<?php echo $vo['aid']; ?>" <?php if($recycle_switch == '1'): ?> data-deltype="del" <?php else: ?> data-deltype="pseudo" <?php endif; ?> onClick="delfun(this);">删除</a>
                                        <i></i>
                                    <?php endif; ?>
                                    <a href="<?php echo $vo['arcurl']; ?>" target="_blank" class="btn blue">浏览</a>
                                </div>
                            </td>
                             <td class="sort">
                                <div class="w60 tc">
                                    <?php if(is_check_access('Archives@edit') == '1'): ?>
                                    <input type="text" onChange="changeTableVal('archives','aid','<?php echo $vo['aid']; ?>','sort_order',this);"  size="4"  value="<?php echo $vo['sort_order']; ?>" />
                                    <?php else: ?>
                                    <?php echo $vo['sort_order']; endif; ?>
                                </div>
                            </td>
                            
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="iDiv" style="display: none;"></div>
        </div>
        <div class="footer-oper">
            <span class="ml15">
                <input type="checkbox" class="checkAll" autocomplete="off">
            </span>
            <div class="nav-dropup">
                <button class="layui-btn layui-btn-primary dropdown-bt">批量操作<i class="layui-icon layui-icon-up"></i></button>
                <div class="dropdown-menus" style="display:none; <?php if(0 < $pager->totalRows && ($pager->totalRows < 4 || $pager->listRows < 4)): ?>top:28px;bottom:unset;border-bottom:1px solid rgba(0,0,0,.15);border-top:none;min-height: 250px;<?php endif; ?>">
                    <?php if(is_check_access('Archives@batch_attr') == '1'): ?>
                    <a href="javascript:void(0);" onclick="batch_attr(this, 'ids', '批量新增属性');" data-url="<?php echo url('Archives/batch_attr', ['opt'=>'add']); ?>">新增属性</a>
                    <a href="javascript:void(0);" onclick="batch_attr(this, 'ids', '批量删除属性');" data-url="<?php echo url('Archives/batch_attr', ['opt'=>'del']); ?>">删除属性</a>
                    <hr class="layui-bg-gray">
                    <?php endif; if(is_check_access('Archives@batch_copy') == '1'): ?>
                    <a href="javascript:void(0);" onclick="func_batch_copy(this, 'ids');" data-url="<?php echo url('Archives/batch_copy', array('typeid'=>\think\Request::instance()->param('typeid'))); ?>">复制文档</a>
                    <?php endif; if(is_check_access('Archives@move') == '1'): ?>
                    <a href="javascript:void(0);" onclick="func_move(this, 'ids');" data-url="<?php echo url('Archives/move', array('typeid'=>\think\Request::instance()->param('typeid'))); ?>">移动文档</a>
                    <?php endif; if(is_check_access('Archives@del') == '1'): ?>
                    <a href="javascript:void(0);" onclick="batch_del(this, 'ids');" data-url="<?php echo url('Archives/del'); ?>" <?php if($recycle_switch == '1'): ?> data-deltype="del" <?php else: ?> data-deltype="pseudo" <?php endif; ?>>删除文档</a>
                    <?php endif; if(is_check_access('Archives@check') == '1'): ?>
                    <hr class="layui-bg-gray">
                    <a href="javascript:void(0);" onclick="batch_check(this, 'ids');" data-type="check"  data-url="<?php echo url('Archives/check'); ?>">审核文档</a>
                    <a href="javascript:void(0);" onclick="batch_check(this, 'ids');" data-type="uncheck" data-url="<?php echo url('Archives/uncheck'); ?>">取消审核</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(is_check_access('RecycleBin@archives_index') == '1'): if($recycle_switch != '1'): ?> <a href="<?php echo url('RecycleBin/archives_index'); ?>" class="layui-btn layui-btn-primary" title="回收站">回收站</a> <?php endif; endif; ?>
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
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('input[name*=ids]').click(function(){
            if ($('input[name*=ids]').length == $('input[name*=ids]:checked').length) {
                $('.checkAll').prop('checked','checked');
            } else {
                $('.checkAll').prop('checked', false);
            }
        });
        $('input[type=checkbox].checkAll').click(function(){
            $('input[type=checkbox]').prop('checked',this.checked);
        });
    });
    
    $(document).ready(function(){

        // 表格行点击选中切换
        $('#flexigrid > table>tbody >tr').click(function(){
            $(this).toggleClass('trSelected');
        });

        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });

        // 选择栏目检索出相应文档列表
        $('#typeid').change(function(){
          $('#searchForm').submit();
        });

        // 批量操作
        $(".dropdown-bt").click(function(){
            $(".dropdown-menus").slideToggle(200);
            event.stopPropagation();
        })
        $(document).click(function(){
            $(".dropdown-menus").slideUp(200);
            event.stopPropagation();
        })
    });

    var aids = '';
    function func_move(obj, name)
    {
        var a = [];
        var k = 0;
        aids = '';
        $('input[name^='+name+']').each(function(i,o){
            if($(o).is(':checked')){
                a.push($(o).val());
                if (k > 0) {
                    aids += ',';
                }
                aids += $(o).val();
                k++;
            }
        })
        if(a.length == 0){
            layer.alert('请至少选择一项', {
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
            return;
        }

        var url = $(obj).attr('data-url');
        //iframe窗
        layer.open({
            type: 2,
            title: '移动文档',
            fixed: true, //不固定
            shadeClose: false,
            shade: layer_shade,
            maxmin: false, //开启最大化最小化按钮
            area: ['350px', '260px'],
            content: url
        });
    }

    /**
     * 获取修改之前的内容
     */
    function get_aids()
    {
        return aids;
    }
    var typeid_arr = [];   //已经生成过静态的typeid
    var build_finish = false;  //是否已经全部生成静态
    //检查是否已经生成静态，刷新页面
    function build_finish_polling(){
        if(build_finish === true){
            layer.closeAll();
            layer.msg('操作成功', {icon: 1});
            window.location.reload();
        }
    }
    /**
     * 批量审核
     */
    function batch_check(obj, name) {

        var url = $(obj).attr('data-url');
        var data_type = $(obj).attr('data-type');//uncheck

        var a = [];
        $('input[name^='+name+']').each(function(i,o){
            if($(o).is(':checked')){
                a.push($(o).val());
            }
        })
        if(a.length == 0){
            layer.alert('请至少选择一项', {
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
            return;
        }

        layer_loading('正在处理');
        var seo_pseudo = <?php echo (isset($seo_pseudo) && ($seo_pseudo !== '')?$seo_pseudo:1); ?>;
        $.ajax({
            type: "POST",
            url: url,
            data: {ids:a, _ajax:1},
            dataType: 'json',
            success: function (data) {
                if(data.code == 1){
                    var last = false;
                    if (data_type === 'check') {
                        if (2 == seo_pseudo) {
                            for(var i=0;i<a.length;i++){
                                var id_value = a[i];
                                var typeid =$("#aid_"+id_value).data('typeid');
                                if ((i+1) == a.length){
                                    last = true;
                                }
                                up_html(id_value,typeid,last);
                            }
                            window.setInterval(build_finish_polling, 500);
                        } else {
                            layer.closeAll();
                            layer.msg('操作成功', {icon: 1});
                            window.location.reload();
                        }
                    }else{
                        layer.closeAll();
                        layer.msg(data.msg, {icon: 1});
                        window.location.reload();
                    }
                }else{
                    layer.closeAll();
                    layer.alert(data.msg, {icon: 2, title:false});
                }
            },
            error:function(e){
                layer.closeAll();
                layer.alert(e.responseText, {icon: 2, title:false});
            }
        });
    }

    //生成静态页面
    function up_html(id_value,typeid,last){
        $.ajax({
            url:__root_dir__+"/index.php?m=home&c=Buildhtml&a=upHtml&lang="+__lang__+"&id="+id_value+"&t_id="+typeid+"&type=view&ctl_name=Archives&_ajax=1",
            type:'GET',
            dataType:'json',
            data:{},
            success:function(res1){
//                layer.closeAll();
//                layer.msg('生成完成', {icon: 1, time: 1500});
                if (typeid_arr.indexOf(typeid) === -1){
                    typeid_arr.push(typeid);
                    $.ajax({
                        url:__root_dir__+"/index.php?m=home&c=Buildhtml&a=upHtml&lang="+__lang__+"&id="+id_value+"&t_id="+typeid+"&type=lists&ctl_name=Archives&_ajax=1",
                        type:'GET',
                        dataType:'json',
                        data:{},
                        success:function(res2){
                            if (last === true){
                                build_finish = true;
                            }
//                        layer.closeAll();
//                        layer.msg('生成完成', {icon: 1, time: 1500});
                        },
                        error: function(e){
                            layer.closeAll();
                            layer.alert('生成当前栏目HTML失败，请手工生成栏目静态！', {icon: 5, title: false});
                        }
                    });
                }else{
                    if (last === true){
                        build_finish = true;
                    }
                }
            },
            error: function(e){
                layer.closeAll();
                layer.alert('生成HTML失败，请手工生成静态HTML！', {icon: 5, title: false});
            }
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