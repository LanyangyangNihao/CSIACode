<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/template/uploadimgnew/upload.htm";i:1689649653;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <title>图片选择 - <?php echo $version; ?></title>
        <link rel="stylesheet" type="text/css" href="/public/plugins/uploadimgnew/layui/css/layui.css?v=<?php echo $version; ?>">
        <link rel="stylesheet" type="text/css" href="/public/plugins/uploadimgnew/css/image-upload.css?ver=<?php echo $version; ?>">
        <link href="/public/static/admin/font/css/font-awesome.min.css?ver=<?php echo $version; ?>" rel="stylesheet" />
        <link href="/public/static/admin/font/css/iconfont.css?ver=<?php echo $version; ?>" rel="stylesheet" />
        <link rel="stylesheet" href="/public/plugins/ztree/css/zTreeStyle/zTreeStyle.css?ver=<?php echo $version; ?>" type="text/css">
        <script type="text/javascript" src="/public/static/common/js/jquery.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/layui/layui.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/jquery.cookie.js?v=<?php echo $version; ?>"></script>
        
        <style type="text/css">
            .group-item .group-button {display: none;}
            .group-item:hover .group-button {display: block;}
            .group-item:hover .group-count {display: none;}
            .ztree .node_name{
                font-size: 13px !important;
            }
            .hover{
                line-height: 22px;
            }
            .ui-layout-pane {   
                background: #fff;   
            } 
            .ui-layout-center{
                padding:0 15px 60px 15px;
            }
            .ztree li a {
                display: inline-block !important;
            }
            .ztree li a.curSelectedNode{
                height: 20px;
            }
        </style>
        <script type="text/javascript">
            var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
            var module_name = "<?php echo MODULE_NAME; ?>";
            var __root_dir__ = "";
            var __lang__ = "<?php echo $admin_lang; ?>";
        </script>
    </head>

    <body>
        <div class="upload-box ui-layout-center">
            <div class="upload-body">
                <div class="upload-main">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <ul class="layui-tab-title">
                            <li id="bendi" class="layui-this">本地图片</li>
                            <li id="tiqu">远程图片</li>
                        </ul>
                        <div class="layui-tab-content" style="height: 100%;">
                            <div class="layui-tab-item layui-show" id="bendi_cont">
                                <div class="upload-con">
                                    <div class="upload-group">
                                        <div>
                                            <ul class="upload-nav" id="tab">
                                                <li class="item active" id="li_tag_item_group" data-value="1">我的分组</li>
                                                <li class="item" id="li_tag_item_imgdir" data-value="2">图片目录</li>
                                            </ul>
                                        </div>
                                        <div id="container">
                                            <div id="content1">
                                                <div class="upload-group-add">
                                                    <button onclick="addcate();" class="layui-btn layui-btn-primary layui-border-blue"><i class="iconfont e-wenjianjiatianjia"></i>添加分组</button>
                                                </div>
                                                <div class="upload-group-con">
                                                    <div class="group-item <?php if(empty($type_id) || (($type_id instanceof \think\Collection || $type_id instanceof \think\Paginator ) && $type_id->isEmpty())): ?> active <?php endif; ?>">
                                                        <div class="group-item-l">
                                                            <a href="javascript:void(0);" data-src="<?php echo $default_upload_list_url; ?>" id="typename_0" data-type_id="0" onclick="openIframes(this);">默认分组
                                                                <?php if(empty($admin_logic_1639031991) || (($admin_logic_1639031991 instanceof \think\Collection || $admin_logic_1639031991 instanceof \think\Paginator ) && $admin_logic_1639031991->isEmpty())): ?>
                                                                <!-- <span style=" margin-left: 15px;"><i class="fa fa-refresh" onclick="syn_old_imgdata(true);" title="点击同步站点图片"></i></span> -->
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="group-item-r" id="count_0" style="text-align: right;margin: 0 auto;"><?php echo (isset($uploads_total_list[0]['total']) && ($uploads_total_list[0]['total'] !== '')?$uploads_total_list[0]['total']:0); ?></div>
                                                    </div>
                                                    <?php if(is_array($uploads_type_list) || $uploads_type_list instanceof \think\Collection || $uploads_type_list instanceof \think\Paginator): $i = 0; $__LIST__ = $uploads_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <div class="group-item <?php if($type_id == $vo['id']): ?> active <?php endif; ?>">
                                                        <div class="group-item-l"><a href="javascript:void(0);" data-src="<?php echo $vo['url']; ?>" id="typename_<?php echo $vo['id']; ?>" data-type_id="<?php echo $vo['id']; ?>" onclick="openIframes(this);"><?php echo $vo['upload_type']; ?></a></div>
                                                        <div class="group-item-r group-count" id="count_<?php echo $vo['id']; ?>" style="text-align: right;margin: 0 auto;"><?php echo (isset($uploads_total_list[$vo['id']]['total']) && ($uploads_total_list[$vo['id']]['total'] !== '')?$uploads_total_list[$vo['id']]['total']:0); ?></div>
                                                        <div class="group-item-r group-button">
                                                            <a href="javascript:void(0)" onclick="editcate(this, '<?php echo $vo['id']; ?>')">编辑</a> 
                                                            <a href="javascript:void(0)" onclick="delcate(this, '<?php echo $vo['id']; ?>')">删除</a>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div>
                                            <div id="content2" style="display: none">
                                                <div class="upload-dirimg-con ui-layout-east">
                                                    <div class="ztreeContent">
                                                        <div id="tree" class="ztree"></div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <iframe name="content_body" id="content_body" src="<?php echo $current_upload_list_url; ?>" width="100%" height="100%" frameborder="0" style="height: 460px;"></iframe>
                                </div>
                            </div>
                            <div class="layui-tab-item" id="tiqu_cont">
                                <div class="upload-con">
                                    <div class="image-selector-network">
                                        <form class="layui-form" id="layui-form" action="<?php echo url('Uploadimgnew/ajax_remote_to_imglocal'); ?>" method="post">
                                          <div class="layui-form-item">
                                            <label class="layui-form-label"></label>
                                            <div class="layui-input-inline" style="width: 400px;">
                                              <input type="text" name="imgremoteurl" lay-verify="imgremoteurl" autocomplete="off" placeholder="请输入图片地址" class="layui-input">
                                            </div>
                                            <div class="layui-input-inline">
                                              <a onclick="remote_to_imglocal();" class="layui-btn layui-btn-normal">提取图片</a>
                                            </div>  
                                          </div>
                                          <div class="layui-form-item">
                                            <label class="layui-form-label"></label>
                                            <div class="layui-form-mid layui-word-aux">
                                               需要http://.........大小不要超过<?php echo $basicConfig['file_size']; ?><?php echo $basicConfig['max_sizeunit']; ?>，支持图片类型 <?php echo $basicConfig['image_type']; ?>
                                            </div>
                                          </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="upload-footer">
                    <button type="button" class="layui-btn layui-btn-primary layui-btn-off">取消</button>
                    <button type="button" class="layui-btn layui-btn-normal layui-btn-yes">确定</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="input_type_id" value="<?php echo (isset($type_id) && ($type_id !== '')?$type_id:0); ?>">
        <input type="hidden" id="input_top_tab" value="bendi">
        <script src="/public/static/admin/js/jquery.layout-latest.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/ztree/js/jquery.ztree.core.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript">
            var callback = "<?php echo $info['func']; ?>";
            var num = "<?php echo (isset($info['num']) && ($info['num'] !== '')?$info['num']:1); ?>";
        </script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/upload.js?ver=<?php echo $version; ?>0"></script>
    </body>
</html>
