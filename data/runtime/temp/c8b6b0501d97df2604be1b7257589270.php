<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"./application/admin/template/archives/index.htm";i:1689649653;s:73:"/Users/gjj/hzwork/eyoucms/application/admin/template/public/theme_css.htm";i:1689649653;}*/ ?>
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
    <title>内容管理</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen"/>
    <!-- <link rel="stylesheet" href="/public/plugins/ztree/css/amazeui.min.css"> -->
    <link rel="stylesheet" href="/public/plugins/ztree/css/iframe.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="/public/plugins/ztree/css/zTreeStyle/zTreeStyle.css?v=<?php echo $version; ?>" type="text/css">
    <link href="/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/public/static/admin/css/left_nav_tree.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
    <style type="text/css">
        .ztree{padding:0px 5px 30px 10px;}
        /* .ztree li{line-height: 30px;} */
        .ztree .node_name{font-size: 14px !important;}
        .ztree .level1 .node_name{font-size: 14px !important;display: block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;line-height: 16px;padding-right: 5px;}
        .ztree li a:hover{text-decoration: none;color: #3398cc;}
        .ztree li a.curSelectedNode{background-color:#3398cc;color: #fff;border-color: #3398cc;opacity: 1;vertical-align: middle; height: unset;line-height: unset;}
        .ztree li a.curSelectedNode:hover{color: #fff !important;}
        .ztree li span{margin: 0 2px;}
        .ui-layout-west{background-color: #fff;}
        .title-cate{padding:8px 0 8px 28px;border-bottom: 1px solid #eee;color: #999;font-size: 15px;height: 24px;line-height: 24px; background: url("/public/plugins/ztree/css/zTreeStyle/img/titleIcon.png") no-repeat 10px center;background-size: 15px 15px;}
        .allshow-wrap{padding:10px 0 0 10px;}
        .allshow{font-size: 14px;color: #333;cursor: pointer;display: inline-block;line-height: 30px;height: 30px;}
        .allshow i{width: 18px; height: 18px;display: inline-block;background-image: url("/public/plugins/ztree/css/zTreeStyle/img/zTreeStandard.png");vertical-align: middle;}
        .allshow span{margin-left: 4px;}
        .allshow .center_close {background-position: -74px -18px;}
        .allshow .center_open {background-position: -92px -18px;}
        .layout-main{position: fixed; width:100%; height:100%;} 
        .layout-left{float: left; position: relative; margin-top: 10px;margin-right: 10px;width: 160px; height: calc(100% - 20px); background-color: #fff; overflow: hidden; overflow-y:auto;} 
        .layout-left .on-off-btn{cursor: pointer; position: absolute; text-align: center; display: block; right: 0; top: 50%; margin-top: -13px; width: 12px; height: 26px; line-height: 26px; background-color: #3398cc; border-radius: 4px 0 0 4px;} 
        .layout-left .on-off-btn i{font-size: 18px; color: #fff;} 
        .layout-left .layout-left-box{display: block; overflow: hidden; height:auto; width: 100%;} 
        .layout-right{float: left; display: block; width: calc(100% - 182px); background-color: #F5F5F5; height: 100%; overflow: hidden;} 
        .layout-left.close{width: 12px; background-color: #f4f4f4; margin-right: 0;} .layout-left.close .layout-left-box{display: none;}
    </style>
    
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
    <script type="text/javascript">
        var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
        var module_name = "<?php echo MODULE_NAME; ?>";
        var __root_dir__ = "";
        var __lang__ = "<?php echo $admin_lang; ?>";
        var __main_lang__ = "<?php echo $main_lang; ?>";
    </script>
    <script type="text/javascript" src="/public/static/admin/js/jquery.js"></script>
    <script src="/public/static/admin/js/jquery.layout-latest.min.js"></script>
    <script type="text/javascript" src="/public/plugins/ztree/js/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
    <script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
    <!--[if lt IE 9]>
    <script src="/public/static/admin/js/html5shiv.js"></script>
    <script src="/public/static/admin/js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

        // 读取 cookie
        function getCookie(c_name)
        {
            if (document.cookie.length>0)
            {
              c_start = document.cookie.indexOf(c_name + "=")
              if (c_start!=-1)
              { 
                c_start=c_start + c_name.length+1 
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                    return unescape(document.cookie.substring(c_start,c_end))
              } 
            }
            return "";
        }

        function setCookies(name, value, time)
        {
            var cookieString = name + "=" + escape(value) + ";";
            if (time != 0) {
                var Times = new Date();
                Times.setTime(Times.getTime() + time);
                cookieString += "expires="+Times.toGMTString()+";"
            }
            document.cookie = cookieString+"path=/";
        }

        // var myLayout;
        // $(document).ready(function () {
        //     myLayout = $("body").layout({
        //     /*  全局配置 */
        //         closable:                   true    /* 是否显示点击关闭隐藏按钮*/
        //     ,   resizable:                  true    /* 是否允许拉动*/
        //     ,   maskContents:               true    /* 加入此参数，框架内容页就可以拖动了*/
        //     /*  顶部配置 */
        //     ,   north__spacing_open:        0       /* 顶部边框大小*/
        //     /*  底部配置 */
        //     ,   south__spacing_open:        0       /* 底部边框大小*/
        //     /*  some pane-size settings*/
        //     ,   west__minSize:              160     /*左侧最小宽度*/
        //     ,   west__maxSize:              160     /*左侧最大宽度*/
        //     /*  左侧配置 */
        //     ,   west__slidable:             false
        //     ,   west__animatePaneSizing:    false
        //     ,   west__fxSpeed_size:         "slow"  /* 'fast' animation when resizing west-pane*/
        //     ,   west__fxSpeed_open:         1000    /* 1-second animation when opening west-pane*/
        //     ,   west__fxSettings_open:      { easing: "easeOutBounce" } // 'bounce' effect when opening*/
        //     ,   west__fxName_close:         "none"  /* NO animation when closing west-pane*/
        //     ,   stateManagement__enabled:   false   /*是否读取cookies*/
        //     ,   showDebugMessages:          false 
        //     }); 
        // });

        var zNodes = <?php echo $zNodes; ?>;
        var setting = {
            view:{
                dblClickExpand:false
                ,showLine:true
                 ,showIcon: false
            },
            data:{
                simpleData:{
                    enable:true
                }
            },
            callback:{
                beforeCollapse:zTreeBeforeCollapse
                ,beforeExpand:beforeExpand
                ,onExpand:onExpand
                ,onClick:onClick
            }
        };

        var curExpandNode=null;
        function beforeExpand(treeId, treeNode) {
            var pNode=curExpandNode?curExpandNode.getParentNode():null;
            var treeNodeP=treeNode.parentTId?treeNode.getParentNode():null;
            var zTree=$.fn.zTree.getZTreeObj("tree");
            for(var i=0,l=!treeNodeP?0:treeNodeP.children.length;i<l; i++){
                if(treeNode!==treeNodeP.children[i]){zTree.expandNode(treeNodeP.children[i],false);}
            };
            while (pNode){
                if(pNode===treeNode){break;}
                pNode=pNode.getParentNode();
            };
            if(!pNode){singlePath(treeNode);}

            // 记忆功能
            var str = getCookie('admin-arctreeClicked-Arr');
            var arr = [];
            if('' == str || null == str || 'null' == str){
                arr.push(treeNode.id);
            }else{
                arr = JSON.parse(str);
                if (!arr.includes(treeNode.id) ){
                    arr.push(treeNode.id);
                }
            }
            arr = JSON.stringify(arr);
            setCookies('admin-arctreeClicked-Arr', arr);
        };

        function zTreeBeforeCollapse(treeId, treeNode) {
            // 记忆功能
            var str = getCookie('admin-arctreeClicked-Arr');
            var arr = [];
            if('' != str){
                arr = JSON.parse(str);
                arr.splice($.inArray(treeNode.id,arr),1);
                arr = JSON.stringify(arr);
                setCookies('admin-arctreeClicked-Arr', arr);
                setCookies('admin-arctreeClicked_All', 0);
            }
        };

        function singlePath(newNode) {
            if (newNode === curExpandNode) return;
            if (curExpandNode && curExpandNode.open==true) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (newNode.parentTId === curExpandNode.parentTId) {
                    zTree.expandNode(curExpandNode, false);
                } else {
                    var newParents = [];
                    while (newNode) {
                        newNode = newNode.getParentNode();
                        if (newNode === curExpandNode) {
                            newParents = null;
                            break;
                        } else if (newNode) {
                            newParents.push(newNode);
                        }
                    }
                    if (newParents!=null) {
                        var oldNode = curExpandNode;
                        var oldParents = [];
                        while (oldNode) {
                            oldNode = oldNode.getParentNode();
                            if (oldNode) {
                                oldParents.push(oldNode);
                            }
                        }
                        if (newParents.length>0) {
                            zTree.expandNode(oldParents[Math.abs(oldParents.length-newParents.length)-1], false);
                        } else {
                            zTree.expandNode(oldParents[oldParents.length-1], false);
                        }
                    }
                }
            }
            curExpandNode = newNode;
        };

        function onExpand(event,treeId,treeNode){curExpandNode=treeNode;};
        
        function onClick(e,treeId,treeNode){
            var zTree=$.fn.zTree.getZTreeObj("tree");
            zTree.expandNode(treeNode,null,null,null,true);
        }

        $(function(){
            $.fn.zTree.init($("#tree"),setting,zNodes);
            $(".ui-layout-north li:first-child").click();
        });

        function expandAll(obj){
            var expand = $(obj).attr('data-expand');
            var zTree = $.fn.zTree.getZTreeObj("tree");
            if ('shrink' == expand) { // 展开时收缩
                zTree.expandAll(false);
                $(obj).attr('data-expand', 'spread').attr('title', '点击全部展开').html('<i class="center_close"></i><span>全部展开</span>');
                setCookies('admin-arctreeClicked-Arr', '');
                setCookies('admin-arctreeClicked_All', 0);
            } else { // 收缩时展开
                zTree.expandAll(true);
                $(obj).attr('data-expand', 'shrink').attr('title', '点击全部收缩').html('<i class="center_open"></i><span>全部收缩</span>');
                setCookies('admin-arctreeClicked-Arr', JSON.stringify(<?php echo $tree['parent_ids']; ?>));
                setCookies('admin-arctreeClicked_All', 1);//1为全部展开,0-为非全部展开
            }
        }

        $(function(){
            setCookies('admin-arctreeClicked-Arr',JSON.stringify(<?php echo $tree['cookied_treeclicked_arr']; ?>) );
        })
    </script>

    <script type="text/javascript">
        function quick_release()
        {
            //iframe窗
            layer.open({
                type: 2,
                title: '快捷发布文档',
                fixed: true, //不固定
                shadeClose: false,
                shade: layer_shade,
                maxmin: true, //开启最大化最小化按钮
                area: ['600px', '520px'],
                content: "//<?php echo $website_host; ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=release&iframe=1&lang=<?php echo \think\Request::instance()->param('lang'); ?>"
            });
        }
    </script>
    <script type="text/javascript">
         $(function(){
             //左侧菜单按钮
            $('.on-off-btn').on('click',function(){
                var hidden=$(this).parent().hasClass('close');
                if(!hidden){
                    $(this).parent().addClass('close');
                    $(this).children('i').attr("class", "fa fa-angle-right");
                    $('.layout-right').css("width","calc(100% - 27px)");
                    setCookies('admin-treeClicked-1649642233', 'close');
                }else{
                    $(this).parent().removeClass('close');
                    $(this).children('i').attr("class", "fa fa-angle-left");
                    $('.layout-right').css("width","calc(100% - 190px)");
                    setCookies('admin-treeClicked-1649642233', 'open');
                }         
            })
        })
    </script>
</head>

<body style="padding: 0px 10px 10px 10px;background-color: #f4f4f4; height: auto;">
    <div class="layout-main">
        <div class="layout-left <?php if(!empty($treeClicked_1649642233) && 'close' == $treeClicked_1649642233): ?>close<?php endif; ?>">
            <div class="layout-left-box">
                <div class="title-cate">内容栏目</div>
                <div class="allshow-wrap">
                    <?php if(!empty($tree['cookied_treeclicked'])): ?>
                    <div class="allshow" onclick="expandAll(this);" data-expand="shrink" title="点击全部收缩"><i class="center_open"></i><span>全部收缩</span></div> 
                    <?php else: ?>
                    <div class="allshow" onclick="expandAll(this);" data-expand="spread" title="点击全部展开"><i class="center_close"></i><span>全部展开</span></div> 
                    <?php endif; ?>
                </div>
                <div id="tree" class="ztree"></div>
            </div>
            <div class="on-off-btn">
                <?php if(!empty($treeClicked_1649642233) && 'close' == $treeClicked_1649642233): ?>
                <i class="fa fa-angle-right"></i>
                <?php else: ?>
                <i class="fa fa-angle-left"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="layout-right" <?php if(!empty($treeClicked_1649642233) && 'close' == $treeClicked_1649642233): ?>style="width: calc(100% - 27px);"<?php else: ?>style="width: calc(100% - 178px);"<?php endif; ?>>
             <iframe name="content_body" id="content_body" class="iframe_loading" src="//<?php echo $website_host; ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=index_archives&lang=<?php echo \think\Request::instance()->param('lang'); ?>" width="100%" height="100%" frameborder="0"></iframe>
        </div>
    </div>
    <script type="text/javascript">
        // iframe 框架显示加载图标，提高体验
        $(".iframe_loading").load(function(){
            // setTimeout(function(){
                $('.iframe_loading').removeClass('iframe_loading');
            // }, 500);
        })
    </script>
</body>
</html>