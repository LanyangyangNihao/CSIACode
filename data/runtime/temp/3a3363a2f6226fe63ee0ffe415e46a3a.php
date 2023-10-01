<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"./application/admin/template/public/dispatch_jump.htm";i:1689649653;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
	<link href="/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: '微软雅黑'; color: #CCC; font-size: 16px; }
        .system-message{ padding: 24px 30px; margin:auto; border: #e8e8e8 1px solid; top:50%; width:540px; background-color: #fff;box-shadow: 0 0 8px rgba(0,0,0,0.1);border-radius: 4px;overflow: hidden; }
        .system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 5px; }
        .system-message .jump{ padding-top: 10px; color: #999;}
        .system-message .success,.system-message .error{ line-height: 1.8em;  color: #999; font-size: 36px; font-family: '黑体'; }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
        
        .system-message .tit{position: relative;height: 50px;line-height: 50px;width: 100%;border-bottom: 1px solid #eee;}
        .system-message .tit i{position: absolute;font-size: 26px;color: #53bb4c;}
        .system-message .tit b{margin: 0 15px 0 25px;font-weight: normal;font-size: 18px;color: #53bb4c;}
        .system-message .tit span{font-size: 14px;margin: 0 10px;color: #999;}
        .system-message ul{margin: 10px auto; overflow: hidden;}
        .system-message ul li{float: left;list-style: none;margin:5px 18px 5px 0;}
        .system-message .buttom{margin: 10px auto; width: 100%; text-align: center; line-height: 40px; color: red;}
    </style>
    <script type="text/javascript">
        var __root_dir__ = "";
        var __lang__ = "<?php echo $admin_lang; ?>";
    </script> 
    <script type="text/javascript" src="/public/static/common/js/jquery.tools.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var height2=$('.system-message').height();
            var height1=$(window).height();
            $('.system-message').css('margin-top',((height1-height2)/3)-30);
        });
    </script>
    <script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
    <!-- Bootstrap core CSS -->
    <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
    <link href="/public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div style="display: block;height: 10px;background: #f4f4f4;clear: both;"></div>
<?php switch($code): case "1": 
            $post = $_POST;
            isset($post['typeid']) && $post['tid'] = $post['typeid'];
            if (!empty($data) && is_array($data)) {
                $post = array_merge($post, $data);
            }
            $data = $post;
            $row = \think\Db::name('archives')
                ->field("b.*, a.*, a.aid as aid, c.ifsystem")
                ->alias('a')
                ->join('__ARCTYPE__ b', 'a.typeid = b.id', 'LEFT')
                ->join('__CHANNELTYPE__ c', 'c.id = a.channel', 'LEFT')
                ->where('a.aid', 'eq', $data['aid'])
                ->find();
            $arcurl = get_arcurl($row);
            $arcurl_home = get_arcurl($row, false);
            $channel = $row['channel'];
            $arcrank = $row['arcrank'];
            $seo_pseudo = tpCache('seo.seo_pseudo');
            $lang = input('param.lang/s', 'cn');
            $gourl = cookie('ENV_GOBACK_URL');
            $gourl = preg_replace('/<script([^\>]*)>([\s\S]+)<\/script>/i', '', urldecode($gourl));
            $addurl = request()->baseFile()."?m=admin&c=Archives&a=add&typeid=".$data['tid']."&lang=".$lang;
            $env_list_url = cookie('ENV_LIST_URL');
            $env_list_url = preg_replace('/<script([^\>]*)>([\s\S]+)<\/script>/i', '', urldecode($env_list_url));
            $listurl = $env_list_url."&typeid=".$data['tid'];
            if (empty($row['ifsystem'])) {
                $listurl .= "&channel=".$data['channel'];
                $addurl .= "&channel=".$data['channel'];
            }
            $env_is_uphtml = cookie('ENV_IS_UPHTML');
            $action_name = $push_zzbaidu_type = request()->action();
            $ctl_name = request()->controller();
            if ('add' == $action_name) {
                $msg = '发布';
                $msg1 = '继续发布';
            } else {
                $msg = '编辑';
                $msg1 = '发布';
            }
            if (0 > $row['click'] && -1 < $arcrank) {
                $push_zzbaidu_type = 'add';
                \think\Db::name('archives')
                    ->where('aid', 'eq', $data['aid'])
                    ->update(['click'=>mt_rand(500, 1000), 'update_time'=>getTime()]);
            }
            $zzbaidutoken = config('tpcache.sitemap_zzbaidutoken');//不为空则实时推送Url的token
            $bdminipro = \think\Db::name('weapp')->where(['code'=>'BdDiyminipro','status'=>1])->count();//是否安装百度小程序

            $seo_uphtml_after = cookie('ENV_UPHTML_AFTER');
            if (!empty($seo_uphtml_after)) {
                $seo_uphtml_after = json_decode($seo_uphtml_after, true);
                $alltypeid = getalltype($data['tid'],'id');
            }
         ?>
        <div class="system-message">
            <div class="tit">
                <i class="iconfont e-complete"></i><span><b>成功<?php echo $msg; ?>文档</b>请选择你的后续操作：</span>
            </div>
            <ul>
                <li><span><?php echo $msg1; ?>文档</span><a href="<?php echo (isset($addurl) && ($addurl !== '')?$addurl:''); ?>" style="display: none;"><?php echo $msg1; ?>文档</a></li>
                <li><span>预览文档</span><a href="<?php echo (isset($arcurl) && ($arcurl !== '')?$arcurl:''); ?>" target="_blank" style="display: none;">预览文档</a></li>
                <li><span>更改文档</span><a href="<?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=edit&id=<?php echo $data['aid']; ?>&typeid=<?php echo $data['tid']; ?>&lang=<?php echo (\think\Request::instance()->param('lang') ?: 'cn'); ?>" style="display: none;">更改文档</a></li>
                <li><span>文档栏目列表</span><a href="<?php echo (isset($listurl) && ($listurl !== '')?$listurl:''); ?>" style="display: none;">文档栏目列表</a></li>
                <?php if(!(empty($gourl) || (($gourl instanceof \think\Collection || $gourl instanceof \think\Paginator ) && $gourl->isEmpty()))): ?>
                <li><span>[返回原列表]</span><a href="<?php echo (isset($gourl) && ($gourl !== '')?$gourl:''); ?>" style="display: none;">[返回原列表]</a></li>
                <?php endif; ?>
            </ul>
            <?php if(2 == $seo_pseudo && 1 != $env_is_uphtml): ?>
                <div class="buttom" id="tips">正在生成当前文档……请勿刷新！</div>
                <input type="hidden" id="is_uphtml" value="1">
            <?php else: ?>
                <input type="hidden" id="is_uphtml" value="0">
            <?php endif; ?>
        </div>
        <script type="text/javascript">
        $(function(){
            var is_uphtml = $('#is_uphtml').val();
            if (0 == is_uphtml) {
                $('.system-message ul li').each(function(i,o){
                    $(o).find('span').hide();
                    $(o).find('a').show();
                })
            }
        });
        </script>
        <?php 
            if (2 == $seo_pseudo && 1 != $env_is_uphtml) {
                cookie('ENV_IS_UPHTML', 1);
         ?>
        <script type="text/javascript">
            /* 生成静态页面代码 */
            var aid = <?php echo (isset($data['aid']) && ($data['aid'] !== '')?$data['aid']:0); ?>;
            var arcrank = <?php echo (isset($arcrank) && ($arcrank !== '')?$arcrank:0); ?>;
            var typeid = <?php echo (isset($data['tid']) && ($data['tid'] !== '')?$data['tid']:0); ?>;
            var method = "<?php echo (isset($data['method']) && ($data['method'] !== '')?$data['method']:''); ?>";
            var ctl_name = "<?php echo $ctl_name; ?>";
            var seo_uphtml_after_home = <?php echo (isset($seo_uphtml_after['seo_uphtml_after_home']) && ($seo_uphtml_after['seo_uphtml_after_home'] !== '')?$seo_uphtml_after['seo_uphtml_after_home']:0); ?>;
            var seo_uphtml_after_channel = <?php echo (isset($seo_uphtml_after['seo_uphtml_after_channel']) && ($seo_uphtml_after['seo_uphtml_after_channel'] !== '')?$seo_uphtml_after['seo_uphtml_after_channel']:0); ?>;
            var seo_uphtml_after_pernext = <?php echo (isset($seo_uphtml_after['seo_uphtml_after_pernext']) && ($seo_uphtml_after['seo_uphtml_after_pernext'] !== '')?$seo_uphtml_after['seo_uphtml_after_pernext']:0); ?>;
            if(aid > 0 && arcrank >= 0){
                $.ajax({
                url:__root_dir__+"/index.php?m=home&c=Buildhtml&a=upHtml&lang="+__lang__+"&id="+aid+"&t_id="+typeid+"&type=view&ctl_name="+ctl_name+"&seo_uphtml_after_pernext="+seo_uphtml_after_pernext+"&_ajax=1",
                    type:'GET',
                    dataType:'json',
                    data:{},
                    success:function(res){
                        layer.closeAll();
                        if (arcrank >= 0) {
                            // 百度自动推送
                            var zzbaidutoken = "<?php echo (isset($zzbaidutoken) && ($zzbaidutoken !== '')?$zzbaidutoken:''); ?>";
                            if (zzbaidutoken != '') {
                                push_zzbaidu('<?php echo $arcurl_home; ?>', '<?php echo $push_zzbaidu_type; ?>');
                            }
                            // 更新sitemap.xml地图
                            update_sitemap('<?php echo $ctl_name; ?>', '<?php echo $push_zzbaidu_type; ?>');
                            //百度小程序 API 提交 (自动推送)
                            var bdminipro = <?php echo (isset($bdminipro) && ($bdminipro !== '')?$bdminipro:0); ?>;
                            if (bdminipro != 0) {
                                push_bdminipro(aid, 1);
                            }
                        }
                        uphtml_channel();
                    },
                    error: function(e){
                        layer.closeAll();
                        layer.alert('生成文档失败，请手工生成静态！', {icon: 5, title: false});
                    },
                    complete:function(){

                    }
                });
            }else{
                $('#tips').html('');
                $('.system-message ul li').each(function(i,o){
                    $(o).find('span').hide();
                    $(o).find('a').show();
                });
            }
            /* end */
        </script>
        <?php 
            } else if (in_array($seo_pseudo, [1,3])) {
         ?>
        <script type="text/javascript">
            var aid = <?php echo (isset($data['aid']) && ($data['aid'] !== '')?$data['aid']:0); ?>;
            var arcrank = <?php echo (isset($arcrank) && ($arcrank !== '')?$arcrank:0); ?>;
            if(aid > 0 && arcrank >= 0){
                // 百度自动推送
                var zzbaidutoken = "<?php echo (isset($zzbaidutoken) && ($zzbaidutoken !== '')?$zzbaidutoken:''); ?>";
                if (zzbaidutoken != '') {
                    push_zzbaidu('<?php echo $arcurl_home; ?>', '<?php echo $push_zzbaidu_type; ?>');
                }
                // 更新sitemap.xml地图
                update_sitemap('<?php echo $ctl_name; ?>', '<?php echo $push_zzbaidu_type; ?>');
                //百度小程序 API 提交 (自动推送)
                var bdminipro = <?php echo (isset($bdminipro) && ($bdminipro !== '')?$bdminipro:0); ?>;
                if (bdminipro != 0) {
                    push_bdminipro(aid, 1);
                }
            }
        </script>
        <?php 
            }
         break; case "0": ?>
        <div class="system-message">
            <h1 class="glyphicon glyphicon-exclamation-sign" style="color:#F33"></h1>
            <p class="error">
                <?php if(stristr($msg, '__html__')): ?>
                    <?php echo str_replace('__html__','',$msg); else: ?>
                    <?php echo strip_tags($msg); endif; ?>
            </p>
            <p class="detail"></p>
            <p class="jump">页面自动 <a id="href" href="<?php echo $url; ?>" target="<?php if(empty($target) || (($target instanceof \think\Collection || $target instanceof \think\Paginator ) && $target->isEmpty())): ?>_self<?php else: ?><?php echo $target; endif; ?>">跳转</a> 等待时间：<b id="wait"><?php echo $wait; ?></b>
                <script type="text/javascript">
                    (function(){
                        var wait = document.getElementById('wait'),
                            href = document.getElementById('href').href,
                            target = document.getElementById('href').target;
                        var interval = setInterval(function(){
                            var time = --wait.innerHTML;
                            if(time <= 0) {
                                if ('_parent' == target) {
                                    parent.location.href = href;
                                } else {
                                    location.href = href;
                                }
                                clearInterval(interval);
                            };
                        }, 1000);
                    })();
                </script>
            </p>
        </div>
    <?php break; endswitch; ?>

<script type="text/javascript">
    // 发布/编辑文档后，生成相关栏目
    function uphtml_channel()
    {
        if(method === 'edit'){
            $('#tips').html('');
            $('.system-message ul li').each(function(i,o){
                $(o).find('span').hide();
                $(o).find('a').show();
            })
            return false;
        }

        if (0 == seo_uphtml_after_channel) {
            uphtml_index();
            return false;
        }

        $('#tips').html('生成文档成功，正在生成栏目……');

        setTimeout(function (){
            var alltypeid = <?php echo json_encode($alltypeid); ?>;
            for (var i = 0; i < alltypeid.length; i++) {
                $.ajax({
                    url:__root_dir__+"/index.php?m=home&c=Buildhtml&a=upHtml&lang="+__lang__+"&id="+aid+"&t_id="+alltypeid[i]+"&type=lists&ctl_name="+ctl_name+"&_ajax=1",
                    type:'GET',
                    dataType:'json',
                    async: false,
                    data:{},
                    beforeSend:function(){
                        
                    },
                    success:function(res){

                    },
                    error: function(e){
                        layer.alert('生成当前栏目失败，请手工生成静态！', {icon: 5, title: false});
                    }
                });
            }
            uphtml_index();
        }, 10);
    }

    // 发布/编辑文档后，生成首页
    function uphtml_index()
    {
        if (0 == seo_uphtml_after_home) {
            $('#tips').html('');
            $('.system-message ul li').each(function(i,o){
                $(o).find('span').hide();
                $(o).find('a').show();
            })
            return false;
        }

        var tips = '';
        if (1 == seo_uphtml_after_channel) {
            tips = '生成相关栏目成功，正在生成首页……';
        } else {
            tips = '生成文档成功，正在生成首页……';
        }
        $('#tips').html(tips);

        setTimeout(function (){
            $.ajax({
                url:__root_dir__+"/index.php?m=home&c=Buildhtml&a=upHtml&lang="+__lang__+"&type=index&_ajax=1",
                type:'GET',
                dataType:'json',
                data:{},
                beforeSend:function(){
                    
                },
                success:function(res){
                    $('#tips').html('');
                    $('.system-message ul li').each(function(i,o){
                        $(o).find('span').hide();
                        $(o).find('a').show();
                    })
                },
                error: function(e){
                    layer.alert('生成网站首页失败，请手工生成网站首页！', {icon: 5, title: false});
                }
            });
        }, 10);
    }
</script>

</body>
</html>