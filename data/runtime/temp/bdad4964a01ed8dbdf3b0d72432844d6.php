<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:31:"./template/pc/lists_product.htm";i:1689839117;s:48:"/Users/gjj/hzwork/eyoucms/template/pc/header.htm";i:1689946396;s:48:"/Users/gjj/hzwork/eyoucms/template/pc/banner.htm";i:1689649654;s:48:"/Users/gjj/hzwork/eyoucms/template/pc/footer.htm";i:1689757245;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $eyou['field']['seo_title']; ?></title>
<meta name="description" content="<?php echo $eyou['field']['seo_description']; ?>" />
<meta name="keywords" content="<?php echo $eyou['field']['seo_keywords']; ?>" />
<link href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_ico"); echo $__VALUE__; ?>" rel="shortcut icon" type="image/x-icon" />
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/pintuer.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/header.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/style/style.css","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/font-awesome/css/font-awesome.min.css","","","",""); echo $__VALUE__; ?>
<!--[if lt IE 9]><?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/respond.js","","","",""); echo $__VALUE__; ?> <![endif]-->
</head>
<body>
<div id="mobile-mask">
	<!--网站公用头部——开始-->
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
    <!-- 频道banner,可在栏目图片里编辑 -->
<div class="channel-banner" <?php if(!(empty($eyou['field']['typelitpic']) || (($eyou['field']['typelitpic'] instanceof \think\Collection || $eyou['field']['typelitpic'] instanceof \think\Paginator ) && $eyou['field']['typelitpic']->isEmpty()))): ?> style="background-image: url(<?php echo $eyou['field']['typelitpic']; ?>)" <?php else: ?> style="background-image: url(<?php echo gettoptype($eyou['field']['typeid'],'litpic'); ?>)" <?php endif; ?>> 
	<div class="banner-info">
		<div class="container text-center">
			<h3 class="text-white"><?php echo $eyou['field']['typename']; ?></h3>
			<p class="Conv_DINCondensedC text-white"><?php echo $eyou['field']['englist_name']; ?></p>
		</div>
	</div>
</div>
<!-- 频道banner end -->	
	
	<div class="layout text-center bg-white">
		<div class="container">
			<div class="line">
				<ul class="nav-tree text-center">
						
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "first", "active", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); if($eyou['field']['grade'] == '2'):  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = $eyou['field']['typeid']; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field1 = $__LIST__;if($field1['parent_id'] == $field['id']): $field['currentstyle'] = 'cur'; endif; endif; else: echo htmlspecialchars_decode("");endif; $field1 = []; endif; ?>
						<li><a href=<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>"javacript:void(0);"<?php else: ?>"<?php echo $field['typeurl']; ?>"<?php endif; ?> title="<?php echo $field['typename']; ?>" class="<?php echo $field['currentstyle']; ?>"><?php echo $field['typename']; if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?><i class="fa fa-angle-down margin-left"></i><?php endif; ?></a>
						<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
						<ul>
						<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
							<li class="children">
								<a href="<?php echo $field2['typeurl']; ?>" class="<?php echo $field2['currentstyle']; ?>" title="<?php echo $field2['typename']; ?>"><?php echo $field2['typename']; ?></a>
							</li>
						<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?>
						</ul>
						<?php endif; ?>
						</li>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</ul>
			</div>
		</div>
	</div>	
	
	<div class="layout bg-gray">
		<div class="blank-small"></div>
		<div class="container">
			<div class="line">
				<div class="filter-box bg-white">
					<div class="padding-big">
					<?php  $tagScreening = new \think\template\taglib\eyou\TagScreening; $_result = $tagScreening->getScreening("active", "", "", "", "");if(!empty($_result["list"]) || (($_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator ) && $_result["list"]->isEmpty())): $field = $_result; if(is_array($field['list']) || $field['list'] instanceof \think\Collection || $field['list'] instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $field['list'];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$vo): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<dl class="clearfix">
						<dt class="text-main" style="width: 10%"><?php echo $vo['title']; ?>：</dt>
						<dd>
							<div class="filter-nav">
								<ul>
								<?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$val): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
									<li><a <?php echo $val['onClick']; ?> class="radius-rounded <?php echo $val['currentstyle']; ?>"><?php echo $val['name']; ?></a></li>
								<?php echo isset($val["ey_1563185380"])?$val["ey_1563185380"]:""; ?><?php echo (1 == $e && isset($val["ey_1563185376"]))?$val["ey_1563185376"]:""; ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $val = []; ?>
								</ul>
							</div>
						</dd>
					</dl>	
					<?php echo isset($vo["ey_1563185380"])?$vo["ey_1563185380"]:""; ?><?php echo (1 == $e && isset($vo["ey_1563185376"]))?$vo["ey_1563185376"]:""; ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $vo = []; ?>
					<?php echo $field['hidden']; endif; $field = []; ?>
					</div>	
				</div>
			</div>		
		</div>
		<div class="blank-small"></div>
		
		<div class="container">
			<div class="line-big">
				<div class="product-list">
					<?php  $typeid = "";  if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> "",      "keyword"=> "",      "idlist"=> "",      "idrange"=> "", ); $tagList = new \think\template\taglib\eyou\TagList; $_result_tmp = $tagList->getList($param, 6, "", "", "desc", "on","off","");if(!empty($_result_tmp) && (is_array($_result_tmp) || $_result_tmp instanceof \think\Collection || $_result_tmp instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = $_result = $_result_tmp["list"]; $__PAGES__ = $_result_tmp["pages"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 20, false);$field["seo_description"] = text_msubstr($field["seo_description"], 0, 160, true);$i= intval($key) + 1;$mod = ($i % 3 ); ?>
					<div class="x4">
						<div class="media media-y bg-white margin-big-bottom">
							<div class="padding-large">
								<a href="<?php echo $field['arcurl']; ?>" title="<?php echo $field['title']; ?>"><img src="<?php echo $field['litpic']; ?>" class="img-responsive"></a>
								<div class="media-body text-left">
									<h2><a href="<?php echo $field['arcurl']; ?>" class="text-middle"><?php echo $field['title']; ?></a></h2>
									<!-- <p><?php echo $field['seo_description']; ?></p> -->
									<div class="price-info height margin-big-top">
										<ul>
											
											<li class="v2-2 text-gray text-right float-right">
												<i class="fa fa-eye margin-small-right margin-left"></i><?php echo $field['click']; ?>
											</li>
											<div class="clearfix"></div>
										</ul>
									</div>
								</div>							
							</div>
						</div>
					</div>
                    <?php if($mod == '0'): ?><div style="clear:both"></div><?php endif; ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</div>
				<!-- 分页 -->
				<div class="blank-middle"></div>
				<div class="text-center">
					<ul class="pagination">
					    <?php  $__PAGES__ = isset($__PAGES__) ? $__PAGES__ : ""; $tagPagelist = new \think\template\taglib\eyou\TagPagelist; $__VALUE__ = $tagPagelist->getPagelist($__PAGES__, "pre,pageno,next", "9"); echo $__VALUE__; ?>
					</ul>
				</div>
                <div class="blank-large"></div>
				<!-- 分页 -->
			</div>
		</div>

	</div>
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
</div><!-- id="mobile-mask" -->
<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/pintuer.js","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/common.js","","","",""); echo $__VALUE__; ?>
<!-- 菜单 -->
<script type="text/javascript">
$(document).ready(function(){
	$('.nav-tree li').hover(function(){
	$(this).children('ul').show();
	$(this).focus().addClass('focusa')	
	},function(){
	$(this).children('ul').hide();
	$(this).focus().removeClass('focusa')	
		});	
	});
</script>
</body>
</html>