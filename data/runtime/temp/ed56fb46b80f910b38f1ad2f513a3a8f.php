<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:23:"./template/pc/index.htm";i:1689757308;s:48:"/Users/gjj/hzwork/eyoucms/template/pc/header.htm";i:1689946396;s:48:"/Users/gjj/hzwork/eyoucms/template/pc/footer.htm";i:1689757245;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--首页seo标题-->
<title><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_title"); echo $__VALUE__; ?>_<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_name"); echo $__VALUE__; ?></title>
<!--首页seo描述-->
<meta name="description" content="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_description"); echo $__VALUE__; ?>" />
<!--首页seo关键词-->
<meta name="keywords" content="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_keywords"); echo $__VALUE__; ?>" />
<!--网站地址栏图标-->
<link href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_ico"); echo $__VALUE__; ?>" rel="shortcut icon" type="image/x-icon" />
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/pintuer.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/header.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/style.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/font-awesome/css/font-awesome.min.css","","","",""); echo $__VALUE__; ?>
<!--[if lt IE 9]><?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/respond.js","","","",""); echo $__VALUE__; ?><![endif]-->
</head>
<body>
<!--header——开始-->
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/jquery.min.js","","","",""); echo $__VALUE__; ?>
<!-- 友好的弹出提示框 -->
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/public/plugins/layer-v3.1.0/layer.js","","","",""); echo $__VALUE__; ?>
<!-- 支持子目录 -->
<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("ey_common_hidden"); echo $__VALUE__; ?>

<div id="log">
    <div class="dialog">
        <div class="dialog-head">
            <span class="dialog-close close rotate-hover"></span>
        </div>
        <div class="dialog-body">
            <div class="register">
                <div class="blank-middle"></div>
                <div class="tab text-center">
                  <ul>
                    <li id="signtab1" onclick="setTab('signtab',1,2)" class="cur">登录</li>
                    <!-- <li id="signtab2" onclick="setTab('signtab',2,2)">注册</li> -->
                  </ul>
                </div>
                <!-- 登录开始 -->
                <div id="con_signtab_1">
                    <form method="post" id="popup_login_submit">
                        <!-- 用户名 -->
                        <div class="form-group">
                            <div class="field field-icon">
                                <input type='text' name='username' id='username' class="input text-main radius-none" value="" data-validate="required:必填" placeholder="用户名">
                                <span class="icon fa fa-user text-gray"></span>
                            </div>
                        </div>
                        <!-- 密码 -->
                        <div class="form-group">
                            <div class="field field-icon">
                                <input type='password'  name='password' id="password" class="input text-main radius-none" placeholder="密码" value=""/>
                                <span class="icon fa fa-key text-gray"></span>
                            </div>
                        </div>
                        <!-- 验证码包括手机验证码专用样式input-group-->
                        <div class="form-group" id="ey_login_vertify">
                            <div class="field field-icon">
                                <div class="input-group">
                                    <input type='text'  name='vertify' autocomplete="off" class="input text-main radius-none" placeholder="图形验证码" value=""/>
                                    <span class="addon"><img src="<?php echo url("api/Ajax/vertify","type=users_login",true,false,null,null,null);?>" class="chicuele" id="imgVerifys" onclick="ey_fleshVerify();" title="看不清？点击更换验证码" align="absmiddle"></span>
                                    <span class="icon fa fa-key text-gray"></span>
                                </div>
                            </div>
                        </div>
                        <!-- 提交 -->
                        <div class="form-button">
                            <input type="hidden" name="referurl" value=""/>
                            <input type="hidden" name="website" value="website"/>
                            <input type="button" name="submit" onclick="popup_login_submit();" class="button bg-yellow button-large button-block border-none radius-none text-white" value="提交"/>
                        </div>
                    </form>
                    <p class="margin-top text-right">
                        <a href="<?php echo url('user/Users/reg'); ?>">注册账号</a>&nbsp;|&nbsp;
                        <a href="<?php echo url('user/Users/retrieve_password'); ?>">忘记密码</a>
                    </p>
                </div>
                <!-- 登录end -->

                <!-- 注册开始 -->
                <div id="con_signtab_2" style="display:none;">
                    <form method="post">
                        <!-- 用户名 -->
                        <div class="form-group">
                            <div class="field field-icon">
                                <input type='text' name='username' class="input text-main radius-none" value="" data-validate="required:必填" placeholder="手机/邮箱/账号">
                                <span class="icon fa fa-user text-gray"></span>
                            </div>
                        </div>

                        <!-- 密码 -->
                        <div class="form-group">
                            <div class="field field-icon">
                                <input type='password' name='password' class="input text-main radius-none" value="" data-validate="required:必填" placeholder="密码" />
                                <span class="icon fa fa-key text-gray"></span>
                            </div>
                        </div>

                        <!-- 手机 -->
                        <div class="form-group">
                            <div class="field field-icon">
                                <input type='text' name='username' class="input text-main radius-none" value="" data-validate="required:必填" placeholder="请输入手机号">
                                <span class="icon fa fa-phone text-gray"></span>
                            </div>
                        </div>

                        <!-- 验证码包括手机验证码专用样式input-group-->
                        <div class="form-group">
                            <div class="field field-icon">
                                <div class="input-group">
                                    <input type='text' name='phone' class="input text-main radius-none" placeholder="请输入短信验证码" value=""/>
                                    <span class="addon"><img src="<?php echo url("api/Ajax/vertify","type=users_login",true,false,null,null,null);?>" class="chicuele" id="imgVerifys" onclick="ey_fleshVerify();" title="看不清？点击更换验证码" align="absmiddle"></span>
                                    <span class="icon fa fa-phone text-gray"></span>
                                </div>
                            </div>
                        </div>
                        <!-- 提交 -->
                        <div class="form-button">
                            <input type="submit" class="button bg-yellow button-large button-block border-none radius-none text-white" value="提交"/>
                        </div>
                    </form>
                </div>
                <!-- 注册end -->

                <!-- 第三方账号登录 -->
                <div id="ey_third_party_login">
                    <div class="blank-middle"></div>
                    <div class="line"><span class="text-gray bg-white text-default">社交账号登录</span><hr></div>
                    <div class="blank-small"></div>
                    <div class="bnt-login">
                        <a id="ey_third_party_qqlogin" title="QQ登录" href="<?php echo url("plugins/QqLogin/login","",true,false,1,null,0);?>" class="qq"><i class="fa fa-qq"></i></a>
                        <a id="ey_third_party_wxlogin" title="微信登录" href="<?php echo url("plugins/WxLogin/login","",true,false,1,null,0);?>" class="weixin"><i class="fa fa-weixin"></i></a>
                        <a id="ey_third_party_wblogin" title="微博登录" href="<?php echo url("plugins/Wblogin/login","",true,false,1,null,0);?>" class="weibo"><i class="fa fa-weibo"></i></a>
                    </div>
                </div>
                <!-- 第三方账号登录 -->
            </div>
        </div>
    </div>
</div>
<!-- 登录弹窗 end -->

<header id="pc-header">
    <div class="layout fixed navbar">
        <div class="container-layout">
            <div class="line">
                <div class="x2 logo">
           
                </div>
                <div class="x9 text-center">
                <ul class="nav nav-menu nav-inline" >
                 <li<?php if(\think\Request::instance()->param('m') == 'Index'): ?> class="active"<?php endif; ?>><a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>" title="首页">HOME</a></li>
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "active", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                <li class="<?php echo $field['currentstyle']; ?>">
                    <a href="<?php echo $field['typeurl']; ?>" class="first-level">
                    <?php echo $field['typename']; if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?><i class="fa fa-angle-down margin-small-left"></i><?php endif; ?></a>
                    <?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
                    <ul class="drop-menu"><?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                        <li><a href="<?php echo $field2['typeurl']; ?>"><?php echo $field2['typename']; ?></a></li><?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?>
                    </ul>
                    <?php endif; ?>
                    </a>
                </li>
                <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
              </ul>
                </div>
                <div class="x1">
                    <!-- 登录后的效果：文件模板存放在 system/users_info.htm ，具体更多写法请熟悉 ey_users 表字段 -->
                    <?php  $tagUser = new \think\template\taglib\eyou\TagUser; $__LIST__ = $tagUser->getUser("open", "off", "", "", "", "", "");if(!empty($__LIST__) || (($__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator ) && $__LIST__->isEmpty())): $field = $__LIST__;  $tagUser = new \think\template\taglib\eyou\TagUser; $__LIST__ = $tagUser->getUser("userinfo", "off", "", "", "", "", "");if(!empty($__LIST__) || (($__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator ) && $__LIST__->isEmpty())): $field = $__LIST__; ?>
                        <div id="<?php echo $field['htmlid']; ?>">
                            <!-- 登录前 start -->
                            <div class="log-in">
                                <div class="button-group">
                                    <a href="javascript:;" <?php echo $field['loginPopupId']; ?> data-target="#log" data-width="22%" data-toggle="click" data-mask="1" class="dialogs user-ico radius-circle dropdown-toggle text-center text-big">
                                    <i class="fa fa-user"></i></a>
                                </div>
                            </div>
                            <?php if(getUsersConfigData('shop.shop_open') == 1): ?>
                            <div class="shopBar badge-corner">
                                <a href="<?php  $tagDiyurl = new \think\template\taglib\eyou\TagDiyurl; $__VALUE__ = $tagDiyurl->getDiyurl("", "user/Shop/shop_cart_list", "", "", "", "", "", "", "ey_active"); echo $__VALUE__; ?>" class="shop-ico">
                                    <!-- <span class="badge bg-yellow">0</span> -->
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                            <!-- 登录前 end-->      
                        </div> 
                        <?php echo $field['hidden']; endif; $field = []; endif; $field = []; ?>
                    <span class="searchBar" <?php if(getUsersConfigData('shop.shop_open') == 0): ?>style="right: 60px;"<?php endif; ?>><a href="#none" class="search-ico"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!--弹出搜索 -->
<div class="searchBar-m">
    <div class="mask"></div>
    <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
    <div class="form-group">
    <?php  $tagSearchform = new \think\template\taglib\eyou\TagSearchform; $_result = $tagSearchform->getSearchform("","","","","","default"); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
        <form method="get" action="<?php echo $field['action']; ?>" onsubmit="return searchForm();">
            <input type="text" name="keywords" id="keywords" class="input radius-none text-middle" value="<?php  $tagLang = new \think\template\taglib\eyou\TagLang; $__VALUE__ = $tagLang->getLang('a:1:{s:4:"name";s:5:"yybl6";}'); echo $__VALUE__; ?>" onFocus="this.value=''" onBlur="if(!value){value=defaultValue}"/>
            <button type="submit" name="submit" class="button radius-none border-none" value="Search"/></button>
            <?php echo $field['hidden']; ?>
        </form>
    <?php ++$e; endforeach;endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
    </div>
</div>
<!-- 弹出搜索 -->
<div class="clearfix"></div>




<script type="text/javascript">
    //头像下拉
    function head_nav_a()
    {
        $("#user_nav_z").show();
    }
    function head_nav_b()
    {
        $("#user_nav_z").hide();
    }

    var GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
</script>

<!-- <script type="text/javascript">
    function logins_drop_menu()
    {
        $('#ul_logins_drop-menu').toggle();
    }
</script> -->
<!-- 轮播广告 -->
<div class="layout bg-gray">
	<div class="line">
		<div class="x12">
			<div class="slides owl-carousel dot-center slides-arrow">
			<?php  $tagAdv = new \think\template\taglib\eyou\TagAdv; $_result = $tagAdv->getAdv(1, "", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, 10, true) : $_result->slice(0, 10, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field):  if ($i == 0) : $field["currentclass"] = $field["currentstyle"] = ""; else:  $field["currentclass"] = $field["currentstyle"] = ""; endif;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<div class="item">
					<a href='<?php echo $field['links']; ?>' <?php echo $field['target']; ?>><img src="<?php echo $field['litpic']; ?>" class="img-responsive"></a>
				</div>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			</div>
		</div>
	</div>
</div>
<!-- 轮播广告 -->

<!-- 产品推荐 -->
<div class="layout bg-gray">
	<div class="line">
		<div class="blank-middle"></div>
		<div class="title-c text-center">
			<h3>PRODUCT LIST</h3>
		</div>
	</div>

	<div class="container tab-normal">
		<div class="line tab">
			<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "3"; endif; if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 10; endif; $tagChannelartlist = new \think\template\taglib\eyou\TagChannelartlist; $_result = $tagChannelartlist->getChannelartlist($typeid, "self",""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$channelartlist): $channelartlist["typename"] = text_msubstr($channelartlist["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $channelartlist;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
			<div class="tab-head text-center">
				<ul class="tab-nav">
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "son", "", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<li <?php if($i == '1'): ?>class="active"<?php endif; ?>><a href="#tab-<?php echo $i; ?>"><?php echo $field['typename']; ?></a> </li>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</ul>
			</div>
			<div class="blank-middle"></div>
			<div class="tab-body">
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "son", "", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<div class="tab-panel <?php if($i == '1'): ?>active<?php endif; ?>" id="tab-<?php echo $i; ?>">
					<div class="line">
						<div class="owl-carousel dot-center carousel-pro">
						<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = $field['typeid']; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 12; endif; $modelid = ""; $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> $modelid,      "joinaid"=> "",      "keyword"=> "",      "release"=> "off",      "idlist"=> "",      "idrange"=> "",      "aid"=> "", ); $tag = array (
  'typeid' => '$field.typeid',
  'titlelen' => '25',
  'infolen' => '60',
  'row' => '12',
); $tagArclist = new \think\template\taglib\eyou\TagArclist; $_result = $tagArclist->getArclist($param, $row, "", "","desc","",$tag,"0","on","off","","");if(!empty($_result["list"]) && (is_array($_result["list"]) || $_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = is_array($_result["list"]) ? array_slice($_result["list"],0, $row, true) : $_result["list"]->slice(0, $row, true);  $__TAG__ = $_result["tag"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 25, false);if($field["is_b"] == 1) : $field["title"] = "<strong>".$field["title"]."</strong>";endif;$field["seo_description"] = text_msubstr($field["seo_description"], 0, 60, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
							<div class="item media media-y bg-white">
								<div class="padding-large">
									<a href="<?php echo $field['arcurl']; ?>" title="<?php echo $field['title']; ?>"><img src="<?php echo $field['litpic']; ?>" class="img-responsive"></a>
									<div class="media-body text-center">
										<h2><a href="<?php echo $field['arcurl']; ?>" class="height-middle text-main text-middle"><?php echo $field['title']; ?></a></h2>
										<div class="margin-big-top margin-bottom">
											<a href="<?php echo $field['arcurl']; ?>" class="button border-none radius-rounded text-center text-white">More<i class="fa fa-angle-right margin-small-left"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
						</div>
					</div>
				</div>
				<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			</div>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $typeid = $row = ""; unset($channelartlist); ?>
		</div>
	</div>
	<div class="blank-large"></div>
</div>
<!-- 产品推荐 -->

<!-- 关于我们begin	 -->
<div class="layout home-about" style="background-image:url(<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_templets_pc"); echo $__VALUE__; ?>/skin/images/indpic.jpg)">
	<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "8"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?>
	<div class="blank-big"></div>
	<div class="title-c text-center">
		<h3 class="text-white"><?php echo $field['typename']; ?></h3>
	</div>
	<?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
	<div class="container">
	<div class="line bg-white">
		<div class="x6">
			<div class="padding-large">
				<!--公司简介——开始-->
				<h2 class="text-main"><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_name"); echo $__VALUE__; ?></h2>
				<p class="text-sub text-default height-big">
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "8"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", "single_content"); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?><?php echo html_msubstr($field['content'],0,200); ?>...<?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?></p>
				<div class="blank-small"></div>
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "1"; endif; if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 10; endif; $tagChannelartlist = new \think\template\taglib\eyou\TagChannelartlist; $_result = $tagChannelartlist->getChannelartlist($typeid, "self",""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$channelartlist): $channelartlist["typename"] = text_msubstr($channelartlist["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $channelartlist;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<a href="<?php  $__VALUE__ = isset($channelartlist["typeurl"]) ? $channelartlist["typeurl"] : "变量名不存在"; echo $__VALUE__; ?>" class="button radius-rounded bg-yellow">查看更多<i class="fa fa-angle-right margin-small-left"></i></a>
				<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $typeid = $row = ""; unset($channelartlist); ?>
				<!--公司简介——结束-->
			</div>
		</div>
		<div class="x6">
		  <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_templets_pc"); echo $__VALUE__; ?>/skin/images/aboutpic.jpg" class="img-responsive">
		</div>
	</div>
	</div>
	<div class="blank-large"></div>
</div>
<!-- 关于我们end -->

<!-- 解决方案 begin-->
<!-- 新闻动态 -->
<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "4"; endif; if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 10; endif; $tagChannelartlist = new \think\template\taglib\eyou\TagChannelartlist; $_result = $tagChannelartlist->getChannelartlist($typeid, "self",""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$channelartlist): $channelartlist["typename"] = text_msubstr($channelartlist["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $channelartlist;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
<div class="layout bg-white">
	<div class="container">
		<div class="line-small">
				<div class="blank-big"></div>
				<div class="title-c text-center">
					<h3><?php  $__VALUE__ = isset($channelartlist["typename"]) ? $channelartlist["typename"] : "变量名不存在"; echo $__VALUE__; ?></h3>
				</div>
			<div class="solution">
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 9; endif; $modelid = ""; $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> $modelid,      "joinaid"=> "",      "keyword"=> "",      "release"=> "off",      "idlist"=> "",      "idrange"=> "",      "aid"=> "", ); $tag = array (
  'titlelen' => '20',
  'row' => '9',
  'infolen' => '100',
); $tagArclist = new \think\template\taglib\eyou\TagArclist; $_result = $tagArclist->getArclist($param, $row, "", "","desc","",$tag,"0","on","off","","");if(!empty($_result["list"]) && (is_array($_result["list"]) || $_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = is_array($_result["list"]) ? array_slice($_result["list"],0, $row, true) : $_result["list"]->slice(0, $row, true);  $__TAG__ = $_result["tag"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 20, false);if($field["is_b"] == 1) : $field["title"] = "<strong>".$field["title"]."</strong>";endif;$field["seo_description"] = text_msubstr($field["seo_description"], 0, 100, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<div class="x4">
					<div class="media-img margin-little-bottom">
						<a href="<?php echo $field['arcurl']; ?>" target="_blank">
							<img src="<?php echo $field['litpic']; ?>" alt="<?php echo $field['title']; ?>" class="img-responsive">
							<div class="mask">
								<div class="subtitle">
									<h2 class="text-white text-big margin-bottom padding-big-top"><?php echo $field['title']; ?></h2>
									<p class="text-white text-default"><?php echo $field['seo_description']; ?></p>
									<p class="more text-white padding-bottom">更多</p>
								</div>
							</div>
							<div class="linear-link">
							<div class="subtitle">
								<h3 class="text-white text-middle margin-small-bottom"><?php echo $field['title']; ?></h3>
								<!-- <p class="text-white"><?php echo html_msubstr($field['seo_description'],0,18,true); ?></p> -->
							</div>
							</div>
						</a>
					</div>
				</div>
				<?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			</div>
		</div>
	</div>
	<div class="blank-large"></div>
</div>
<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $typeid = $row = ""; unset($channelartlist); ?>
<!-- 解决方案 end-->

<!-- 新闻动态 -->
<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "2"; endif; if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 10; endif; $tagChannelartlist = new \think\template\taglib\eyou\TagChannelartlist; $_result = $tagChannelartlist->getChannelartlist($typeid, "self",""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$channelartlist): $channelartlist["typename"] = text_msubstr($channelartlist["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $channelartlist;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
<div class="layout bg-gray">
	<div class="container">
		<div class="line">
			<div class="blank-big"></div>
			<div class="title-c text-center">
				<h3><?php  $__VALUE__ = isset($channelartlist["typename"]) ? $channelartlist["typename"] : "变量名不存在"; echo $__VALUE__; ?></h3>
			</div>
			<div class="x6">
				<div class="home-news-l">
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 1; endif; $modelid = ""; $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> $modelid,      "joinaid"=> "",      "keyword"=> "",      "release"=> "off",      "idlist"=> "",      "idrange"=> "",      "aid"=> "", ); $tag = array (
  'limit' => '0,1',
  'titlelen' => '30',
); $tagArclist = new \think\template\taglib\eyou\TagArclist; $_result = $tagArclist->getArclist($param, $row, "", "","desc","",$tag,"0","on","off","","");if(!empty($_result["list"]) && (is_array($_result["list"]) || $_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = is_array($_result["list"]) ? array_slice($_result["list"],0, $row, true) : $_result["list"]->slice(0, $row, true);  $__TAG__ = $_result["tag"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 30, false);if($field["is_b"] == 1) : $field["title"] = "<strong>".$field["title"]."</strong>";endif;$field["seo_description"] = text_msubstr($field["seo_description"], 0, 160, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<div class="home-news-h">
						<div class="media-img">
							<img src="<?php echo $field['litpic']; ?>" alt="<?php echo $field['title']; ?>" class="img-responsive img-new-h">
							<div class="post-title">
								<h3><a href="<?php echo $field['arcurl']; ?>" target="_blank"><?php echo $field['title']; ?></a></h3>
								<p class="padding-top text-gray"><?php echo MyDate('Y-m-d',$field['update_time']); ?></p>
								<a href="<?php echo $field['arcurl']; ?>" class="button radius-none border-none text-center hidden-l"><i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</div>
			</div>
			<div class="x6">
				<div class="home-news-r">
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 5; endif; $modelid = ""; $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> $modelid,      "joinaid"=> "",      "keyword"=> "",      "release"=> "off",      "idlist"=> "",      "idrange"=> "",      "aid"=> "", ); $tag = array (
  'limit' => '1,5',
  'titlelen' => '20',
); $tagArclist = new \think\template\taglib\eyou\TagArclist; $_result = $tagArclist->getArclist($param, $row, "", "","desc","",$tag,"0","on","off","","");if(!empty($_result["list"]) && (is_array($_result["list"]) || $_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = is_array($_result["list"]) ? array_slice($_result["list"],1, $row, true) : $_result["list"]->slice(1, $row, true);  $__TAG__ = $_result["tag"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 20, false);if($field["is_b"] == 1) : $field["title"] = "<strong>".$field["title"]."</strong>";endif;$field["seo_description"] = text_msubstr($field["seo_description"], 0, 160, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<div class="line home-news-c margin-bottom bg-white">
						<div class="x3">
							<a href="<?php echo $field['arcurl']; ?>" title="<?php echo $field['title']; ?>"><img src="<?php echo thumb_img($field['litpic'],145,95,2); ?>" class="img-responsive img-new-w" alt="<?php echo $field['title']; ?>"></a>
						</div>
						<div class="x2 text-center">
							<div class="news-time Conv_DINCondensedC">
								<p class="text-large text-sub"><?php echo MyDate('d',$field['update_time']); ?></p>
								<p class="text-middle text-gray"><?php echo MyDate('Y-m',$field['update_time']); ?></p>
							</div>
						</div>
						<div class="x7">
							<div class="news-title">
								<h2><a href="<?php echo $field['arcurl']; ?>" class="text-main"><?php echo $field['title']; ?></a></h2>
								<p class="text-gray hidden-l"><?php echo html_msubstr($field['seo_description'],0,18,true); ?></p>
							</div>
						</div>
					</div>
				<?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="blank-large"></div>
</div>
<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $typeid = $row = ""; unset($channelartlist); ?>
<!-- 新闻动态 end-->
<!--网站公用底部——开始-->
<footer class="bg-main">
	<div class="container-layout">
		<ul>
			<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 4; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
			<li class="float-left item-<?php echo $i; ?> hidden-l hidden-s">
				<h3 class="text-middle margin-big-bottom"><?php echo $field['typename']; ?></h3>
				<ul>
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<li><a href="<?php echo $field2['typeurl']; ?>" title="<?php echo $field2['typename']; ?>"><?php echo $field2['typename']; ?></a></li>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?>
				</ul>
			</li>
			 <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			

		
		</ul>
	</div>
	<div class="blank-middle"></div>

	<!-- 友情链接 end -->
</footer>
<!--底部版权-->

<!-- 应用插件标签 start --> 
 <?php  $tagWeapp = new \think\template\taglib\eyou\TagWeapp; $__VALUE__ = $tagWeapp->getWeapp("default"); echo $__VALUE__; ?> 
<!-- 应用插件标签 end -->
<!--网站公用底部——结束-->
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/pintuer.js","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/common.js","","","",""); echo $__VALUE__; ?>
<!-- Owl Carousel -->
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/OwlCarousel2.21/owl.carousel.min.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/OwlCarousel2.21/owl.carousel.min.js","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/OwlCarousel2.21/custom.js","","","",""); echo $__VALUE__; ?>
</body>
</html>