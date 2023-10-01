<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"./application/admin/template/field/addonextitem.htm";i:1689649653;s:83:"/Users/gjj/hzwork/eyoucms/application/admin/template/diy_extend/archives_extend.htm";i:1689649653;}*/ ?>

<!-- 用户自定义扩展模板文件 -->

<!-- 用户自定义扩展模板文件，仅用于文档的新增和编辑页面 -->

<?php 
    // 这里可以实现原生php代码
    $diyExtendLogic = new \app\admin\logic\DiyExtendLogic;
 ?>

<!-- 这里自定义HTML表单代码 -->

<!-- end -->
<script>
    // 获取联动地址
    function GetFieldRegionData_1670295376(t,type){
        var name = $(t).attr('data-name');
        var parent_id = parseInt($(t).val());

        if(!parent_id || 0 >= parent_id){
            if ('province' == type) {
                $('#city_'+name).hide();
                $('#area_'+name).hide();
            }else if ('city' == type){
                $('#area_'+name).hide();
            }
            return false;
        }

        var url = "<?php echo url('Field/ajax_get_region_data'); ?>";
        $.ajax({
            url: url,
            data: {parent_id:parent_id,_ajax:1},
            type:'post',
            dataType:'json',
            success:function(res){
                if (res.region_html) {
                    // 输出下一级栏目选项
                    if ('province' == type) {
                        res = '<option value="-1">请选择</option>'+ res.region_html;
                        $('#city_'+name).empty().html(res);
                        $('#city_'+name).show();
                        $('#area_'+name).hide();
                        $('#area_'+name).empty();
                    }else if ('city' == type){
                        res = '<option value="-1">请选择</option>'+ res.region_html;
                        $('#area_'+name).empty().html(res);
                        $('#area_'+name).show();
                    }
                }
            },
            error : function(e) {
                layer.closeAll();
                layer.alert(e.responseText, {icon: 5});
            }
        });
    }
</script>
<?php if(is_array($addonFieldExtList) || $addonFieldExtList instanceof \think\Collection || $addonFieldExtList instanceof \think\Paginator): $i = 0; $__LIST__ = $addonFieldExtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if((('Custom' == $controller_name && isset($vo['ifeditable']) && $vo['ifeditable'] == 1) || ('Custom' != $controller_name && (!isset($vo['ifeditable']) || $vo['ifeditable'])))): switch($vo['dtype']): case "hidden": ?>
                <!-- 隐藏域 start -->
                <dl class="row" style="display: none;">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="hidden" class="input-txt" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>">
                    </dd>
                </dl>
                <!-- 隐藏域 start -->
            <?php break; case "region": if(empty($vo['set_type']) || (($vo['set_type'] instanceof \think\Collection || $vo['set_type'] instanceof \think\Paginator ) && $vo['set_type']->isEmpty())): ?>
                <!-- 区域选项 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                            <label>
                                <input type="radio" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="<?php echo $v2['id']; ?>" <?php if(isset($vo['trueValue']) AND in_array($v2['id'], $vo['trueValue'])): ?>checked="checked"<?php endif; ?>><?php echo $v2['name']; ?>
                            </label>&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 区域选项 end -->
                <?php else: ?>
                    <dl class="row">
                        <dt class="tit">
                            <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                        </dt>
                        <dd class="opt">
                            <!--一级-->
                            <select name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" id="province_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" data-name="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" onchange="GetFieldRegionData_1670295376(this,'province');" <?php if(!empty($vo['region_level']) && $vo['region_level'] > 1): ?>disabled<?php endif; ?>>
                                <option  value="-1">请选择</option>
                                <option <?php if($vo['trueValue'][0] === 0 || $vo['trueValue'][0] ==='0'): ?> selected <?php endif; ?> value="0">全国</option>
                                <?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v_p): $mod = ($i % 2 );++$i;?>
                                    <option <?php if($vo['trueValue'][0] == $v_p['id']): ?> selected <?php endif; ?> value="<?php echo $v_p['id']; ?>"><?php echo $v_p['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <!--二级-->
                            <select name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" id="city_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" data-name="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" onchange="GetFieldRegionData_1670295376(this,'city');" <?php if(empty($vo['city_list']) || (($vo['city_list'] instanceof \think\Collection || $vo['city_list'] instanceof \think\Paginator ) && $vo['city_list']->isEmpty())): ?>style="display: none;"<?php endif; if(!empty($vo['region_level']) && $vo['region_level'] > 2): ?>disabled<?php endif; ?>>
                                <?php if(is_array($vo['city_list']) || $vo['city_list'] instanceof \think\Collection || $vo['city_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['city_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v_p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($vo['trueValue'][1] == $v_p['id']): ?> selected <?php endif; ?> value="<?php echo $v_p['id']; ?>"><?php echo $v_p['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <!--三级-->
                            <select name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" id="area_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" <?php if(empty($vo['trueValue'][2]) || (($vo['trueValue'][2] instanceof \think\Collection || $vo['trueValue'][2] instanceof \think\Paginator ) && $vo['trueValue'][2]->isEmpty())): ?>style="display: none;"<?php endif; ?>>
                                <?php if(is_array($vo['area_list']) || $vo['area_list'] instanceof \think\Collection || $vo['area_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['area_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v_p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($vo['trueValue'][2] == $v_p['id']): ?> selected <?php endif; ?> value="<?php echo $v_p['id']; ?>"><?php echo $v_p['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>

                            <span class="err"></span>
                            <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                        </dd>
                    </dl>
                <?php endif; break; case "text": ?>
                <!-- 单行文本框 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" class="input-txt" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>">&nbsp;<?php echo (isset($vo['dfvalue_unit']) && ($vo['dfvalue_unit'] !== '')?$vo['dfvalue_unit']:''); ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 单行文本框 end -->
            <?php break; case "multitext": ?>
                <!-- 多行文本框 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <textarea rows="5" cols="60" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" style="height:60px;"><?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?></textarea>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 多行文本框 end -->
            <?php break; case "checkbox": ?>
                <!-- 复选框 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                        <label><input type="checkbox" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" value="<?php echo $v2; ?>" <?php if(isset($vo['trueValue']) AND in_array($v2, $vo['trueValue'])): ?>checked="checked"<?php endif; ?> onclick="func_<?php echo $vo['name']; ?>_eyempty();"><?php echo $v2; ?></label>&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <input type="hidden" name="<?php echo $vo['fieldArr']; ?>[<?php echo $vo['name']; ?>_eyempty]" value="<?php if(!empty($vo['trueValue'])): ?>1<?php else: ?>0<?php endif; ?>">
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <script type="text/javascript">
                    function func_<?php echo $vo['name']; ?>_eyempty()
                    {
                        var len = $("input[name='<?php echo $vo['fieldArr']; ?>[<?php echo $vo['name']; ?>][]']:checked").length;
                        $("input[name='<?php echo $vo['fieldArr']; ?>[<?php echo $vo['name']; ?>_eyempty]']").val(len);
                    }
                </script>
                <!-- 复选框 end -->
            <?php break; case "radio": ?>
                <!-- 单选项 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                        <label><input type="radio" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="<?php echo $v2; ?>" <?php if(isset($vo['trueValue']) AND in_array($v2, $vo['trueValue'])): ?>checked="checked"<?php endif; ?>><?php echo $v2; ?></label>&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 单选项 end -->
            <?php break; case "switch": ?>
                <!-- 开关 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>1" class="cb-enable <?php if(0 != $vo['dfvalue']): ?>selected<?php endif; ?>">是</label>
                            <label for="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>0" class="cb-disable <?php if(0 == $vo['dfvalue']): ?>selected<?php endif; ?>">否</label>
                            <input id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>1" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="1" type="radio" <?php if(0 != $vo['dfvalue']): ?>checked="checked"<?php endif; ?>>
                            <input id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>0" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="0" type="radio" <?php if(0 == $vo['dfvalue']): ?>checked="checked"<?php endif; ?>>
                        </div>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <script type="text/javascript">
                    $(function(){
                        //自定义radio样式
                        $(".cb-enable").on('click', function(){
                            var parent = $(this).parents('.onoff');
                            $('.cb-disable',parent).removeClass('selected');
                            $(this).addClass('selected');
                            $('.checkbox',parent).attr('checked', true);
                        });
                        $(".cb-disable").on('click', function(){
                            var parent = $(this).parents('.onoff');
                            $('.cb-enable',parent).removeClass('selected');
                            $(this).addClass('selected');
                            $('.checkbox',parent).attr('checked', false);
                        });
                    });
                </script>
                <!-- 开关 end -->
            <?php break; case "select": ?>
                <!-- 下拉框 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <select name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>">
                            <?php if(is_array($vo['dfvalue']) || $vo['dfvalue'] instanceof \think\Collection || $vo['dfvalue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['dfvalue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $v2; ?>" <?php if(isset($vo['trueValue']) AND in_array($v2, $vo['trueValue'])): ?>selected<?php endif; ?>><?php echo $v2; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 下拉框 end -->
            <?php break; case "img": ?>
                <!-- 单张图 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show div_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local" <?php if($vo[$vo['name'].'_eyou_is_remote'] != '0'): ?>style="display: none;"<?php endif; ?>>
                            <span class="show">
                                <a id="img_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" target="_blank" class="nyroModal" rel="gal" href="<?php echo (isset($vo[$vo['name'].'_eyou_local']) && ($vo[$vo['name'].'_eyou_local'] !== '')?$vo[$vo['name'].'_eyou_local']:'javascript:void(0);'); ?>">
                                    <i id="img_i_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" class="fa fa-picture-o" <?php if(!(empty($vo[$vo['name'].'_eyou_local']) || (($vo[$vo['name'].'_eyou_local'] instanceof \think\Collection || $vo[$vo['name'].'_eyou_local'] instanceof \think\Paginator ) && $vo[$vo['name'].'_eyou_local']->isEmpty()))): ?>onmouseover="layer_tips=layer.tips('<img src=<?php echo $vo[$vo['name'].'_eyou_local']; ?> class=\'layer_tips_img\'>',this,{tips: [1, '#fff']});"<?php endif; ?> onmouseout="layer.close(layer_tips);"></i>
                                </a>
                            </span>
                            <span class="type-file-box">
                                <input type="text" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local]" value="<?php echo (isset($vo[$vo['name'].'_eyou_local']) && ($vo[$vo['name'].'_eyou_local'] !== '')?$vo[$vo['name'].'_eyou_local']:''); ?>" class="type-file-text" autocomplete="off">
                                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                                <input class="type-file-file" onClick="GetUploadify(1,'','allimg','<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_call_back')" size="30" hidefocus="true" nc_type="change_site_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>"
                                     title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                            </span>
                        </div>
                        <input type="text" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_remote" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_remote]" value="<?php echo (isset($vo[$vo['name'].'_eyou_remote']) && ($vo[$vo['name'].'_eyou_remote'] !== '')?$vo[$vo['name'].'_eyou_remote']:''); ?>" placeholder="http://" class="input-txt" <?php if($vo[$vo['name'].'_eyou_is_remote'] != '1'): ?>style="display: none;"<?php endif; ?>>
                        &nbsp;
                        <label><input type="checkbox" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_is_remote]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_is_remote" value="1" <?php if($vo[$vo['name'].'_eyou_is_remote'] == '1'): ?>checked="checked"<?php endif; ?> onClick="clickRemote(this, '<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou');">远程图片</label>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <script type="text/javascript">
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_call_back(fileurl_tmp)
                    {
                      $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local").val(fileurl_tmp);
                      $("#img_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('href', fileurl_tmp);
                      $("#img_i_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('onmouseover', "layer_tips=layer.tips('<img src="+fileurl_tmp+" class=\\'layer_tips_img\\'>',this,{tips: [1, '#fff']});");
                    }
                </script>
                <!-- 单张图 end -->
            <?php break; case "file": ?>
            <!-- 单个文件 start -->
            <dl class="row">
                <dt class="tit">
                    <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show div_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local" <?php if($vo[$vo['name'].'_eyou_is_remote'] != '0'): ?>style="display: none;"<?php endif; ?>>
                        <span class="show">
                            <a id="file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" class="nyroModal" rel="gal" href="<?php echo (isset($vo[$vo['name'].'_eyou_local']) && ($vo[$vo['name'].'_eyou_local'] !== '')?$vo[$vo['name'].'_eyou_local']:'javascript:void(0);'); ?>" download="<?php echo get_filename($vo[$vo['name'].'_eyou_local']); ?>">
                                <i id="file_i_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" class="layui-icon layui-icon-file-b" ></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input type="text" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local]" value="<?php echo (isset($vo[$vo['name'].'_eyou_local']) && ($vo[$vo['name'].'_eyou_local'] !== '')?$vo[$vo['name'].'_eyou_local']:''); ?>" class="type-file-text" autocomplete="off">
                            <input type="button" name="button" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button" value="选择上传..." class="type-file-button">
                            <input title="点击前方文件图标可下载文件，点击按钮选择文件并提交表单后上传生效" class="type-file-file" type="file" data-type="<?php echo $vo['upload_flag']; ?>" onchange="upload_file_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_1585641737(this)" size="30" hidefocus="true" nc_type="change_site_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>">
                        </span>
                    </div>
                    <input type="text" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_remote" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_remote]" value="<?php echo (isset($vo[$vo['name'].'_eyou_remote']) && ($vo[$vo['name'].'_eyou_remote'] !== '')?$vo[$vo['name'].'_eyou_remote']:''); ?>" placeholder="http://" class="input-txt" <?php if($vo[$vo['name'].'_eyou_is_remote'] != '1'): ?>style="display: none;"<?php endif; ?>>
                    &nbsp;
                    <label><input type="checkbox" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_is_remote]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_is_remote" value="1" <?php if($vo[$vo['name'].'_eyou_is_remote'] == '1'): ?>checked="checked"<?php endif; ?> onClick="clickRemote(this, '<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou');">远程文件</label>
                    <span class="err"></span>
                    <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                </dd>
            </dl>
            <script type="text/javascript">
                function upload_file_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_1585641737(e){
                    var data_type = $(e).attr('data-type');
                    if ('qny' == data_type) {
                        // 七牛云上传
                        <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_file(e);
                    } else if ('oss' == data_type) {
                        // OSS上传
                        <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_file(e);
                    } else if ('cos' == data_type) {
                        // COS上传
                        <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_file(e);
                    } else {
                        // 本地上传
                        <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_file(e);
                    }
                }
                function judgeExtFile(ext) {
                    var type = '<?php echo $vo['ext']; ?>';
                    var extArr = [];
                    extArr = type.split("|");
                    var exts = ext.replace(".","");
                    return extArr.indexOf(exts);
                }

                // 七牛云
                function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_file(e) {
                    // 获取文件路径名
                    var file = $(e)[0].files[0];

                    // 验证上传格式
                    var fileName = file.name;
                    var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                    var ext = judgeExtFile(fileExt);
                    if (ext == -1) {
                        showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                        return false;
                    }

                    // 验证上传大小
                    size = parseInt("<?php echo $vo['filesize']; ?>");
                    if (file.size > size) {
                        showErrorMsg('附件大小超过限制,可在附件设置中修改');
                        return false;
                    }

                    // 执行上传
                    layer_loading('上传七牛云');
                    $.ajax({
                        type: 'POST',
                        url: '/index.php?m=plugins&c=Qiniuyun&a=qiniu_upload',
                        data: {_ajax: 1},
                        dataType: "JSON",
                        success: function(res1) {
                            if (1 == res1.code) {
                                var token  = res1.data.token;
                                var formData = new FormData();
                                formData.append('file', file);
                                formData.append('token', token);

                                fileName = res1.data.filePath + fileExt;
                                formData.append('key', fileName);
                                $.ajax({
                                    url: res1.data.uphost,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: formData,
                                    timeout: 1200000,
                                    cache: false,
                                    processData: false,
                                    contentType: false,
                                    xhr: function () {
                                        myXhr = $.ajaxSettings.xhr();
                                        if (myXhr.upload) {
                                            myXhr.upload.addEventListener('progress', function(e){
                                                var curr = e.loaded;
                                                var total = e.total;
                                                process = parseInt(curr / total * 100);
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传中...'+process+"%");
                                            });
                                        }
                                        return myXhr;
                                    },
                                    success: function(res2) {
                                        layer.closeAll();
                                        $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传成功');
                                        setTimeout(function() {
                                            $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button').text('选择上传...');
                                        }, 2000);
                                        var video_url = res1.data.domain + "/" + res2.key;
                                        $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local").val(video_url);
                                        $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('href',video_url);
                                        var  arr = video_url.split("/");
                                        var download = arr[arr.length-1];
                                        $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('download',download);
                                    },
                                    error: function(e) {
                                        layer.closeAll();
                                        showErrorMsg(e.responseText);
                                        return false;
                                    }
                                });
                            } else {
                                layer.closeAll();
                                showErrorMsg(res1.msg);
                            }
                        },
                        error: function(e) {
                            layer.closeAll();
                            showErrorMsg(e.responseText);
                        }
                    });
                }

                //OSS
                function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_file(e) {
                    // 获取文件路径名
                    var file = $(e)[0].files[0];

                    // 验证上传格式
                    var fileName = file.name;
                    var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                    var ext = judgeExtFile(fileExt);
                    if (ext == -1) {
                        showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                        return false;
                    }

                    // 验证上传大小
                    size = parseInt("<?php echo $vo['filesize']; ?>");
                    if (file.size > size) {
                        showErrorMsg('附件大小超过限制,可在附件设置中修改');
                        return false;
                    }

                    // 执行上传
                    layer_loading('上传阿里云OSS');
                    $.ajax({
                        type: 'POST',
                        url: '/index.php?m=plugins&c=AliyunOss&a=oss_upload',
                        data: {_ajax: 1},
                        dataType: "JSON",
                        success: function(res1){
                            if (1 == res1.code){
                                fileName = res1.data.filePath + fileExt;
                                //组装发送数据
                                var request = new FormData();
                                request.append("OSSAccessKeyId",res1.data.accessid);
                                request.append("policy",res1.data.policy);
                                request.append("Signature",res1.data.signature);
                                request.append("key",fileName);
                                request.append("success_action_status",201);
                                request.append('file', file);

                                $.ajax({
                                    url : res1.data.host,
                                    data : request,
                                    processData: false,
                                    cache: false,
                                    contentType: false,
                                    dataType: 'xml',
                                    type : 'post',
                                    xhr: function () {
                                        myXhr = $.ajaxSettings.xhr();
                                        if (myXhr.upload) {
                                            myXhr.upload.addEventListener('progress', function(e){
                                                var curr = e.loaded;
                                                var total = e.total;
                                                var process = parseInt(curr / total * 100);
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传中...'+process+"%");
                                            });
                                        }
                                        return myXhr;
                                    },
                                    success : function(data) {
                                        layer.closeAll();
                                        var res = $(data).find('PostResponse');
                                        if (res) {
                                            var key = res.find('Key').text();
                                            $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传成功');
                                            setTimeout(function() {
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('选择上传...');
                                            }, 2000);
                                            var video_url = res1.data.domain + "/" + key;
                                            $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local").val(video_url);
                                            $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('href',video_url);
                                            var  arr = video_url.split("/");
                                            var download = arr[arr.length-1];
                                            $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('download',download);

                                        } else {
                                            $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传失败');
                                            setTimeout(function() {
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('选择上传...');
                                            }, 2000);
                                        }
                                    },
                                    error : function(e) {
                                        layer.closeAll();
                                        console.log(e.responseText);
                                    }
                                });
                            } else {
                                layer.closeAll();
                                showErrorMsg(res1.msg);
                            }
                        },
                        error: function(e) {
                            layer.closeAll();
                            showErrorMsg(e.responseText);
                        }
                    });
                }

                //COS
                function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_file(e) {
                    // 获取文件路径名
                    var file = $(e)[0].files[0];

                    // 验证上传格式
                    var fileName = file.name;
                    var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                    var ext = judgeExtFile(fileExt);
                    if (ext == -1) {
                        showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式，可在附件设置中修改');
                        return false;
                    }

                    // 验证上传大小
                    size = parseInt("<?php echo $vo['filesize']; ?>");
                    if (file.size > size) {
                        showErrorMsg('附件大小超过限制，可在附件设置中修改');
                        return false;
                    }

                    // 上传参数
                    var formData = new FormData();
                    formData.append('file', file);
                    formData.append('file_ext', fileExt);

                    // 执行上传
                    $.ajax({
                        type: 'post',
                        url: '/index.php?m=plugins&c=Cos&a=cos_upload&_ajax=1',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        xhr: function () {
                            myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) {
                                myXhr.upload.addEventListener('progress', function(e){
                                    var curr = e.loaded;
                                    var total = e.total;
                                    process = parseInt(curr / total * 100);
                                    if (100 == process) {
                                        process = 99;
                                        layer_loading('上传腾讯云');
                                    }
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media").text('上传中...'+process+"%");
                                });
                            }
                            return myXhr;
                        },
                        success: function(res) {
                            layer.closeAll();
                            if (1 == res.code) {
                                video_url = res.data.url;
                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local").val(video_url);
                                $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('href',video_url);
                                var  arr = video_url.split("/");
                                var download = arr[arr.length-1];
                                $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('download',download);

                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传成功');
                            } else {
                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").text('上传失败');
                            }
                            setTimeout(function() {
                                $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button').text('选择上传...');
                            }, 2000);
                        },
                        error: function(e) {
                            layer.closeAll();
                            showErrorMsg(e.responseText);
                        }
                    });
                }

                // 本地上传
                function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_file(e){
                    // 获取文件路径名
                    var file = $(e)[0].files[0];
                    // 验证上传格式
                    var fileName = file.name;
                    var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                    var ext = judgeExtFile(fileExt);
                    if (ext == -1) {
                        showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                        return false;
                    }

                    // 验证上传大小
                    size = parseInt("<?php echo $vo['filesize']; ?>");
                    if (file.size > size) {
                        showErrorMsg('附件大小超过限制,可在附件设置中修改');
                        return false;
                    }

                    // 定义上传数据
                    var formData = new FormData();
                    formData.append('file', file);

                    // 执行上传
                    layer_loading('上传本地');
                    $.ajax({
                        type: 'post',
                        url : "<?php echo url('Ueditor/DownloadUploadFileAjax'); ?>",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        xhr: function () {
                            myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) {
                                myXhr.upload.addEventListener('progress', function(e){
                                    var curr = e.loaded;
                                    var total = e.total;
                                    process = parseInt(curr / total * 100);
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").html('上传中...'+process+"%");
                                });
                            }
                            return myXhr;
                        },
                        success: function (res) {
                            layer.closeAll();
                            if (res.code==0){
                                layer.msg(res.msg)
                                setTimeout(function() {
                                    $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button').html('选择上传...');
                                }, 2000);
                            }else {
                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button").html('上传成功');
                                setTimeout(function() {
                                    $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_button').html('选择上传...');
                                }, 2000);

                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_local").val(res.file_url);
                                $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('href',res.file_url);
                                var  arr = res.file_url.split("/");
                                var download = arr[arr.length-1];
                                $("#file_a_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").attr('download',download);
                            }
                        }
                    });
                }
            </script>
            <!-- 单个文件 end -->
            <?php break; case "imgs": ?>
                <!-- 多张图 start -->
                <dl class="row" id="dl_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <div class="tab-pane pics" id="tab_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>">
                          <!-- <a href="javascript:void(0);" onClick="GetUploadify(100,'','allimg','<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_call_back');" class="imgupload">
                                <i class="fa fa-photo"></i>上传图片
                            </a> -->
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td >
                                        <div class="sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>">
                                            <?php if(is_array($vo[$vo['name'].'_eyou_imgupload_list']) || $vo[$vo['name'].'_eyou_imgupload_list'] instanceof \think\Collection || $vo[$vo['name'].'_eyou_imgupload_list'] instanceof \think\Paginator): $k2 = 0; $__LIST__ = $vo[$vo['name'].'_eyou_imgupload_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2;?>
                                            <div class="images_upload images_upload_html" style="display:inline-block;">
                                                <div class="images_upload_box">
                                                    <input type="hidden" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" value="<?php echo $v2['image_url']; ?>">
                                                    <a href="<?php echo $v2['image_url']; ?>" onclick="" class="upimg" target="_blank" title="拖动修改排序">
                                                        <img src="<?php echo $v2['image_url']; ?>">
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ClearPicArr2(this,'<?php echo $v2['image_url']; ?>')" class="delect" title="删除"></a>
                                                </div>
                                                <textarea rows="5" cols="60" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_intro][]" placeholder="图片注释"><?php echo $v2['intro']; ?></textarea>
                                            </div>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <div class="images_upload"></div>
                                        </div>
                                        <a href="javascript:void(0);" onClick="GetUploadify(100,'','allimg','<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_call_back');"  class="img-upload mb15" title="点击上传">
                                             <div class="y-line"></div>
                                             <div class="x-line"></div>
                                         </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- 上传图片显示的样板 start -->
                        <div class="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_tpl none">
                            <div class="images_upload images_upload_html" style="display:inline-block;">
                                <div class="images_upload_box">
                                    <input type="hidden" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>][]" value="" />
                                    <a href="javascript:void(0);" onClick="" class="upimg" title="拖动修改排序">
                                        <img src="/public/static/admin/images/add-button.jpg"/>
                                    </a>
                                    <a href="javascript:void(0)" class="delect" title="删除">&nbsp;&nbsp;</a>
                                </div>
                                <textarea rows="5" cols="60" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_eyou_intro][]"  placeholder="图片注释"></textarea>
                            </div>
                        </div>
                        <!-- 上传图片显示的样板 end -->
                    </dd>
                </dl>
                <script type="text/javascript">
                    // 上传多图回调函数
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_call_back(paths){

                        var  last_div = $(".<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_tpl").html();
                        for (var i=0;i<paths.length ;i++ )
                        {
                            if ($(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html").length > 0) {
                                $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html:last").after(last_div);  // 插入一个 新图片
                            } else {
                                $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload:last").before(last_div);  // 插入一个 新图片
                            }
                            $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html:last").find('a:eq(0)').attr('href',paths[i]).attr('onclick','').attr('target', "_blank");// 修改他的链接地址
                            $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html:last").find('img').attr('src',paths[i]);// 修改他的图片路径
                            $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html:last").find('a:eq(1)').attr('onclick',"<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ClearPicArr2(this,'"+paths[i]+"')").text('');
                            $(".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> .images_upload_html:last").find('input').val(paths[i]); // 设置隐藏域 要提交的值
                        }
                    }
                    /*
                     * 上传之后删除组图input
                     * @access   public
                     * @val      string  删除的图片input
                     */
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ClearPicArr2(obj,path)
                    {
                        // 删除数据库记录
                        $.ajax({
                            type:'GET',
                            url:"<?php echo url('Field/del_channelimgs', ['_ajax'=>1]); ?>",
                            data:{filename:path,channel:"<?php echo (isset($channeltype) && ($channeltype !== '')?$channeltype:'0'); ?>",fieldid:"<?php echo $vo['id']; ?>",aid:"<?php echo (isset($aid) && ($aid !== '')?$aid:'0'); ?>"},
                            success:function(){
                                $(obj).parent().parent().remove(); // 删除完服务器的, 再删除 html上的图片
                                $.ajax({
                                    type:'GET',
                                    url:"<?php echo url('Uploadimgnew/delupload', ['_ajax'=>1]); ?>",
                                    data:{action:"del", filename:path},
                                    success:function(){}
                                });
                            }
                        });
                    }

                    /** 以下 产品相册的拖动排序相关 js*/

                    $( ".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" ).sortable({
                        start: function( event, ui) {

                        }
                        ,stop: function( event, ui ) {

                        }
                    });
                    //因为他们要拖动，所以尽量设置他们的文字不能选择。
                    // $( ".sort-list-<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" ).disableSelection();
                </script>
                <!-- 多张图 end -->
            <?php break; case "int": ?>
                <!-- 整数类型 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" placeholder="只允许纯数字" class="input-txt" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^0-9]/g,''));">&nbsp;<?php echo (isset($vo['dfvalue_unit']) && ($vo['dfvalue_unit'] !== '')?$vo['dfvalue_unit']:''); ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 整数类型 end -->
            <?php break; case "float": ?>
                <!-- 小数类型 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" placeholder="允许带有小数点的数值" class="input-txt" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^0-9\.]/g,''));">&nbsp;<?php echo (isset($vo['dfvalue_unit']) && ($vo['dfvalue_unit'] !== '')?$vo['dfvalue_unit']:''); ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 小数类型 end -->
            <?php break; case "decimal": ?>
                <!-- 金额类型 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" placeholder="允许带有小数点的金额" class="input-txt" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^0-9\.]/g,''));">&nbsp;<?php echo (isset($vo['dfvalue_unit']) && ($vo['dfvalue_unit'] !== '')?$vo['dfvalue_unit']:''); ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <!-- 金额类型 end -->
            <?php break; case "datetime": ?>
                <!-- 日期和时间 start -->
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" class="input-txt" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" value="<?php echo $vo['dfvalue']; ?>" autocomplete="off">
                        <span class="add-on input-group-addon">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        </span>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <script type="text/javascript">
                    layui.use('laydate', function() {
                        var laydate = layui.laydate;

                        //常规用法
                        laydate.render({
                            elem: "#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>"
                            ,type: 'datetime'
                        });
                    })
                </script>
                <!-- 日期和时间 end -->
            <?php break; case "htmltext": ?>
                <!-- HTML文本 start -->
                <?php if($editor['editor_select'] == '1'): ?>
                    <dl class="row">
                        <dt class="tit">
                            <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                        </dt>
                        <dd class="opt">
                            <?php if($vo['name']=='content'): if(!(empty($have_content_ey_m) || (($have_content_ey_m instanceof \think\Collection || $have_content_ey_m instanceof \think\Paginator ) && $have_content_ey_m->isEmpty()))): ?>
                                <div class="pcwap-onoff">
                                    <label onclick="contentSwitch(1);" class="cb-enable selected">PC端详情</label>
                                    <label onclick="contentSwitch(2);" class="cb-disable">手机端详情</label>
                                </div>
                                <?php endif; if(isset($vo['first']) AND 1 == $vo['first']): ?>
                                    <label class="curpoin"><input  type="checkbox" id="editor_remote_img_local" data-val="<?php echo $vo['editor']['editor_remote_img_local']; ?>" <?php if($vo['editor']['editor_remote_img_local'] == '1'): ?> checked <?php endif; ?>>远程图片本地化</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(1);">[手动]</a>&nbsp;
                                    <label class="curpoin"><input type="checkbox" id="editor_img_clear_link" data-val="<?php echo $vo['editor']['editor_img_clear_link']; ?>" <?php if($vo['editor']['editor_img_clear_link'] == '1'): ?> checked <?php endif; ?>>清除非本站链接</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(2);">[手动]</a>&nbsp;
                                    <?php if('Arctype' == $controller_name && 'single_edit' == $action_name): ?>
                                    <label class="curpoin"><input class="check" type="checkbox" name="empty_logic" value="1" <?php if(!(empty($info['empty_logic']) || (($info['empty_logic'] instanceof \think\Collection || $info['empty_logic'] instanceof \think\Paginator ) && $info['empty_logic']->isEmpty()))): ?> checked="checked" <?php endif; ?>>提取下级栏目内容</label>&nbsp;<p class="notic">当内容详情没有填写时，前台内容部分将自动调用下级栏目的内容</p>
                                    <?php endif; endif; ?>
                                <div id="div_hint" style="float: right;display: none;">
                                    <a style="color: #f00;">左侧编辑器如不填写，就自动引用pc端的内容</a>
                                    <a class="ui_tips" style="margin-left: 5px;" href="javascript:void(0);" onmouseover="layer_tips = layer.tips('1、pc和手机端调用标签共用，不用额外调用。<br/>2、pc不填写不会自动引用手机端内容。', this, {time:100000});" onmouseout="layer.close(layer_tips);"></a>
                                </div>
                            <?php else: if(isset($vo['first']) AND 1 == $vo['first']): ?>
                                    <label class="curpoin"><input  type="checkbox" id="editor_remote_img_local" data-val="<?php echo $vo['editor']['editor_remote_img_local']; ?>" <?php if($vo['editor']['editor_remote_img_local'] == '1'): ?> checked <?php endif; ?>>远程图片本地化</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(1);">[手动]</a>
                                    <label class="curpoin"><input type="checkbox" id="editor_img_clear_link" data-val="<?php echo $vo['editor']['editor_img_clear_link']; ?>" <?php if($vo['editor']['editor_img_clear_link'] == '1'): ?> checked <?php endif; ?>>清除非本站链接</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(2);">[手动]</a>
                                <?php endif; endif; ?>
                            <div style="clear: both;"></div>
                            <?php if($vo['name']=='content' || $vo['name']=='content_ey_m'): ?>
                                <textarea  class="span12 ckeditor" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" data-func="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" title=""><?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?></textarea>
                                <textarea style="display: none;" class="span12 ckeditor" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ey_m" data-func="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ey_m" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_ey_m]" title=""><?php echo (isset($content_ey_m_dfvalue) && ($content_ey_m_dfvalue !== '')?$content_ey_m_dfvalue:''); ?></textarea>
                                <?php if(!(empty($have_content_ey_m) || (($have_content_ey_m instanceof \think\Collection || $have_content_ey_m instanceof \think\Paginator ) && $have_content_ey_m->isEmpty()))): ?>
                                <div id="content_ey_m_div" <?php if($vo['name']=='content'): ?>style="display: none"<?php endif; ?>>
                                    <p id="content_ey_m_all_tit">
                                        <i class="iconfont e-left" style="float: left;font-size: 18px;"></i>正文预览 <i class="iconfont e-xiaochengxu1" style="float: right;font-size: 24px;"></i>
                                    </p>
                                    <div id="content_ey_m_all_div">
                                        <div id="phone_title_div" <?php if(!empty($nid) and $nid == 'single'): ?>style="display:none"<?php endif; ?>>这里是标题</div>
                                        <div id="phone_time_div" <?php if(!empty($nid) and $nid == 'single'): ?>style="display:none"<?php endif; ?>>2022-03-31</div>
                                        <div id="phone_preview_div"></div>
                                    </div>
                                </div>
                                <?php endif; else: ?>
                                <textarea class="span12 ckeditor" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" data-func="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" title=""><?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?></textarea>
                                <span class="err"></span>
                                <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <style>
                        #addonFieldExt_content_ey_m{
                            max-width: 58%;
                            width: 100%;
                            float: left;
                            margin-right: 2%;
                            display: block;
                        }
                        #content_ey_m_div{
                            float: right;
                            width: 39%;
                            max-width: 470px;
                            display: block;
                            border: solid 1px #eee;
                            zoom: 1;
                            -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
                            -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
                            box-shadow: 0 1px 4px rgb(0 0 0 / 10%);
                        }
                        #content_ey_m_all_tit{
                            padding: 10px 10px;
                            text-align: center;
                            font-size: 17px;
                            color: #444;
                            font-weight: 500;
                            border-bottom: solid 1px #eee;
                        }
                        #content_ey_m_all_div{
                            width: 100%;
                            height: 491px;
                            overflow: auto;
                            box-sizing: border-box;
                        }
                        #phone_title_div{
                            font-size: 20px;
                            font-weight: bold;
                            padding: 5px 10px;
                            margin-top: 10px;
                            color: #444;
                        }
                        #phone_time_div{
                            padding: 0 10px;
                            margin-bottom: 5px;
                        }
                        #phone_preview_div{
                            padding: 10px;
                            width: 100%;
                            /*height: 491px;*/
                            /*overflow: auto;*/
                            /*border: solid 1px #eee;*/
                            box-sizing: border-box;
                        }
                        #phone_preview_div img {
                            -ms-interpolation-mode: bicubic;
                        }
                        #phone_preview_div img {
                            max-width: 100%;
                        }
                        #phone_preview_div video{
                            max-width: 100%;
                        }
                    </style>
                    <script type="text/javascript">
                        function contentSwitch(id) {
                            if (id == 1){
                                $("#addonFieldExt_content").show();
                                $("#addonFieldExt_content_ey_m").hide();
                                $("#content_ey_m_div").hide();
                                $("#div_hint").hide();
                            }else{
                                $("#addonFieldExt_content_ey_m").show();
                                $("#content_ey_m_div").show();
                                $("#addonFieldExt_content").hide();
                                $("#div_hint").show();
                            }
                        }
                        $(function(){
                            //自定义radio样式
                            $(".cb-enable").on('click', function(){
                                var parent = $(this).parents('.pcwap-onoff');
                                $('.cb-disable',parent).removeClass('selected');
                                $(this).addClass('selected');
                                $('.checkbox',parent).attr('checked', true);
                            });
                            $(".cb-disable").on('click', function(){
                                var parent = $(this).parents('.pcwap-onoff');
                                $('.cb-enable',parent).removeClass('selected');
                                $(this).addClass('selected');
                                $('.checkbox',parent).attr('checked', false);
                            });
                        });
                    </script>

                    <?php if(isset($vo['first']) AND 1 == $vo['first']): ?>
                    <script type="text/javascript">
                        // 打开多图选择及上传界面
                        function OpenImagesList(e, obj) {
                            var func = '';
                            if (e.path && e.path[10] && e.path[10].id && undefined != e.path[10].id) {
                                func = e.path[10].id;
                            } else {
                                func = $(obj).parent().parent().parent().parent().parent().parent().parent().parent().parent().attr('id');
                            }
                            if (func.indexOf('addonFieldExt_') == -1) {
                                func = 'addonFieldExt_content';
                            }
                            var OpenUrl = "<?php echo url('Uploadimgnew/upload', ['num'=>30, 'path'=>'allimg', 'is_water'=>1]); ?>";
                            OpenUrl += "&func=images_call_" + func;
                            top.layer.open({
                                type: 2,
                                title: '图片上传',
                                shade: layer_shade,
                                maxmin: false,
                                shadeClose: false,
                                area: ['1000px', '625px'],
                                content: OpenUrl
                            });
                        }
                    </script>
                    <?php endif; ?>

                    <script type="text/javascript">
                        var ue_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?> = UE.getEditor('<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>',{
                            serverUrl :"<?php echo url('Ueditor/index',array('savepath'=>'allimg')); ?>",
                            zIndex: 999,
                            initialFrameWidth: "100%", //初化宽度
                            initialFrameHeight: 450, //初化高度
                            focus: false, //初始化时，是否让编辑器获得焦点true或false
                            maximumWords: 99999,
                            removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
                            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
                            autoHeightEnabled: false,
                            toolbars: ueditor_toolbars
                        });

                        //必须在提交前渲染编辑器；
                        function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>() {
                            //判断编辑模式状态:0表示【源代码】HTML视图；1是【设计】视图,即可见即所得；-1表示不可用
                            if(UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").queryCommandState('source') != 0) {
                                UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").execCommand('source'); //切换到【设计】视图
                            }
                        }

                        // 加载图片到编辑器指定位置
                        function images_call_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>(fileurl_tmp,filename_tmp) {
                            var addBody = '';
                            $.each(fileurl_tmp, function(index, items) {
                                addBody += '<p><img src="'+items+'" alt="'+filename_tmp[index]+'"></p>';
                            });
                            UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").execCommand('inserthtml', addBody);
                        }

                        // 自动远程图片本地化/自动清除非本站链接
                        function ajax_auto_editor_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>(local,link) {
                            var body = UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").getContent();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo url('Archives/ajax_auto_editor'); ?>",
                                data: {local:local,link:link,body:body,_ajax:1},
                                dataType: "JSON",
                                async:false,
                                success: function(res){
                                    if (res.code == 1) {
                                        UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").setContent(res.data.body);
                                    }
                                }
                            });
                        }

                    </script>
                    <?php if($vo['name']=='content' || $vo['name']=='content_ey_m'): ?>
                    <script type="text/javascript">
                        //编辑器发生变动执行方法
                        function get_ue_content_ey_m_1645596891(){
                            try{
                                var content_ey_m_text = UE.getEditor("addonFieldExt_content_ey_m").getContent();
                            }catch (e){
                                var content_ey_m_text = '';
                            }
                            if (content_ey_m_text === '' || content_ey_m_text === undefined){  //手机端为空时候，pc端编辑器信息给正文预览
                                content_ey_m_text = UE.getEditor("<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>").getContent();
                            }
                            $('#phone_preview_div').html(content_ey_m_text);
                        }
                        var ue_addonFieldExt_content_ey_m = UE.getEditor('addonFieldExt_content_ey_m',{
                            serverUrl :"<?php echo url('Ueditor/index',array('savepath'=>'allimg')); ?>",
                            zIndex: 999,
                            initialFrameWidth: "100%", //初化宽度
                            initialFrameHeight: 478, //初化高度
                            focus: false, //初始化时，是否让编辑器获得焦点true或false
                            maximumWords: 99999,
                            removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
                            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
                            autoHeightEnabled: false,
                            toolbars: ueditor_toolbars_ey_m
                        });
                        //必须在提交前渲染编辑器；
                        function addonFieldExt_content_ey_m() {
                            //判断编辑模式状态:0表示【源代码】HTML视图；1是【设计】视图,即可见即所得；-1表示不可用
                            if(UE.getEditor("addonFieldExt_content_ey_m").queryCommandState('source') != 0) {
                                UE.getEditor("addonFieldExt_content_ey_m").execCommand('source'); //切换到【设计】视图
                            }
                        }
                        // 加载图片到编辑器指定位置
                        function images_call_addonFieldExt_content_ey_m(fileurl_tmp,filename_tmp) {
                            var addBody = '';
                            $.each(fileurl_tmp, function(index, items) {
                                addBody += '<p><img src="'+items+'" alt="'+filename_tmp[index]+'"></p>';
                            });
                            UE.getEditor("addonFieldExt_content_ey_m").execCommand('inserthtml', addBody);
                        }

                        // 自动远程图片本地化/自动清除非本站链接
                        function ajax_auto_editor_addonFieldExt_content_ey_m(local,link) {
                            var body = UE.getEditor("addonFieldExt_content_ey_m").getContent();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo url('Archives/ajax_auto_editor'); ?>",
                                data: {local:local,link:link,body:body,_ajax:1},
                                dataType: "JSON",
                                async:false,
                                success: function(res){
                                    if (res.code == 1) {
                                        UE.getEditor("addonFieldExt_content_ey_m").setContent(res.data.body);
                                    }
                                }
                            });
                        }
                        var myDate = new Date();
                        var myYear = myDate.getFullYear(); //获取完整的年份
                        var myMonth = myDate.getMonth() + 1; //获取当前月份(0-11,0代表1月)
                        var myToday = myDate.getDate(); //
                        $('#phone_time_div').html(myYear+'-'+ myMonth+'-'+ myToday);
                        function get_ue_phone_title_1645596891(){
                            if ($("input[name='title']").length > 0){
                                var phone_title = $("input[name='title']")[0].value;
                                $('#phone_title_div').text(phone_title);
                            }
                        }
                        phone_title_1645596891 = window.setInterval(function(){ get_ue_phone_title_1645596891(); }, 500);
                    </script>
                    <?php endif; else: ?>
                    <dl class="row">
                        <dt class="tit">
                            <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                        </dt>
                        <dd class="opt">
                            <?php if(isset($vo['first']) AND 1 == $vo['first']): ?>
                            <label class="curpoin"><input type="checkbox" id="editor_remote_img_local" data-val="<?php echo $vo['editor']['editor_remote_img_local']; ?>" <?php if($vo['editor']['editor_remote_img_local'] == '1'): ?> checked <?php endif; ?> >远程图片本地化</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(1);">[手动]</a>
                            &nbsp;
                            <label class="curpoin"><input type="checkbox" id="editor_img_clear_link" data-val="<?php echo $vo['editor']['editor_img_clear_link']; ?>" <?php if($vo['editor']['editor_img_clear_link'] == '1'): ?> checked <?php endif; ?> >清除非本站链接</label>&nbsp;<a href="javascript:void(0);" onclick="editor_handle_210607(2);">[手动]</a>
                            <?php endif; ?>
                            <textarea id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]"><?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?></textarea>
                            <span class="err"></span>
                            <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                        </dd>
                    </dl>
                    <script type="text/javascript">
                        // 加载编辑器，若存在编辑器则先进行销毁
                        try {
                            var elemtid = "<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>";
                            var editor = CKEDITOR.instances[elemtid];
                            if (editor) editor.destroy(true);
                        } catch(e) {}

                        CKEDITOR.replace(elemtid, {
                            filebrowserBrowseUrl: "<?php echo url('Ueditor/index', ['savepath'=>'allimg', 'action'=>'uploadimage']); ?>",
                            filebrowserImageBrowseUrl: "<?php echo url('Ueditor/index', ['savepath'=>'allimg', 'action'=>'uploadimage']); ?>",
                            filebrowserUploadUrl: "<?php echo url('Ueditor/index', ['savepath'=>'allimg', 'action'=>'uploadimage']); ?>",
                            filebrowserImageUploadUrl: "<?php echo url('Ueditor/index', ['savepath'=>'allimg', 'action'=>'uploadimage']); ?>",
                        });

                        // 自动远程图片本地化/自动清除非本站链接
                        function ajax_auto_editor_<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>(local,link) {
                            var body = CKEDITOR.instances.<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>.getData();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo url('Archives/ajax_auto_editor'); ?>",
                                data: {local:local,link:link,body:body,_ajax:1},
                                dataType: "JSON",
                                async:false,
                                success: function(res){
                                    if (res.code == 1) {
                                        CKEDITOR.instances.<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>.setData(res.data.body);
                                    }
                                }
                            });
                        }
                    </script>
                    <?php if($vo['name']=='content' || $vo['name']=='content_ey_m'): ?>
                    <script type="text/javascript">
                        // 自动远程图片本地化/自动清除非本站链接
                        function ajax_auto_editor_addonFieldExt_content_ey_m(local,link) {
                        }
                    </script>
                    <?php endif; endif; ?>
                <!-- HTML文本 end -->
            <?php break; ?>

            <!-- 多媒体类型 start -->
            <?php case "media": ?>
                <dl class="row">
                    <dt class="tit">
                        <label><?php if(isset($vo['ifrequire']) AND !empty($vo['ifrequire'])): ?><em>*</em><?php endif; ?><?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:''); ?></label>
                    </dt>
                    <dd class="opt">
                        <input type="text" class="input-txt" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_media_url" name="<?php echo $vo['fieldArr']; ?>[<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>]" value="<?php echo (isset($vo['dfvalue']) && ($vo['dfvalue'] !== '')?$vo['dfvalue']:''); ?>" style="width: 400px !important;" >
                        <input type="file" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media" onchange="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media_20210408(this)" style="display: none;">
                        <?php if('qny' == $vo['upload_flag']): ?>
                        <button type="button" class="layui-btn" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media" onclick="$('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media').attr('data-type', 'qny').trigger('click');">七牛云上传</button>
                        <?php elseif('oss' == $vo['upload_flag']): ?>
                        <button type="button" class="layui-btn" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media" onclick="$('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media').attr('data-type', 'oss').trigger('click');">oss上传</button>
                        <?php elseif('cos' == $vo['upload_flag']): ?>
                        <button type="button" class="layui-btn" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media" onclick="$('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media').attr('data-type', 'cos').trigger('click');">cos上传</button>
                        <?php else: ?>
                        <button type="button" class="layui-btn" id="<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_upload_media" onclick="$('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media').attr('data-type', 'local').trigger('click');">本地上传</button>
                        <?php endif; ?>
                        <span class="err"></span>
                        <p class="notic"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></p>
                    </dd>
                </dl>
                <script>
                    // 上传媒体文件
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_upload_media_20210408(e){
                        var data_type = $(e).attr('data-type');
                        if ('qny' == data_type) {
                            // 七牛云上传
                            <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media(e);
                        } else if ('oss' == data_type) {
                            // OSS上传
                            <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media(e);
                        } else if ('cos' == data_type) {
                            // COS上传
                            <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media(e);
                        } else {
                            // 本地上传
                            <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_upload_media(e);
                        }
                    }
                    function judgeExtMedia(ext) {
                        var type = '<?php echo $vo['ext']; ?>';
                        var extArr = [];
                        extArr = type.split("|");
                        var exts = ext.replace(".","");
                        return extArr.indexOf(exts);
                    }

                    // 七牛云
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media(e) {
                        // 获取文件路径名
                        var file = $(e)[0].files[0];

                        // 验证上传格式
                        var fileName = file.name;
                        var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                        var ext = judgeExtMedia(fileExt);
                        if (ext == -1) {
                            showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                            return false;
                        }

                        // 验证上传大小
                        size = parseInt("<?php echo $vo['filesize']; ?>");
                        if (file.size > size) {
                            showErrorMsg('文件大小超过限制,可在附件设置中修改');
                            return false;
                        }

                        // 执行上传
                        layer_loading('上传七牛云');
                        $.ajax({
                            type: 'POST',
                            url: '/index.php?m=plugins&c=Qiniuyun&a=qiniu_upload',
                            data: {_ajax: 1},
                            dataType: "JSON",
                            success: function(res1) {
                                if (1 == res1.code) {
                                    var token  = res1.data.token;
                                    var formData = new FormData();
                                    formData.append('file', file);
                                    formData.append('token', token);

                                    fileName = res1.data.filePath + fileExt;
                                    formData.append('key', fileName);
                                    $.ajax({
                                        url: res1.data.uphost,
                                        type: 'POST',
                                        dataType: 'JSON',
                                        data: formData,
                                        timeout: 1200000,
                                        cache: false,
                                        processData: false,
                                        contentType: false,
                                        xhr: function () {
                                            myXhr = $.ajaxSettings.xhr();
                                            if (myXhr.upload) {
                                                myXhr.upload.addEventListener('progress', function(e){
                                                    var curr = e.loaded;
                                                    var total = e.total;
                                                    process = parseInt(curr / total * 100);
                                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media").text('上传中...'+process+"%");
                                                });
                                            }
                                            return myXhr;
                                        },
                                        success: function(res2) {
                                            layer.closeAll();
                                            $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media").text('上传成功');
                                            setTimeout(function() {
                                                $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_qny_upload_media').text('七牛云上传');
                                            }, 2000);
                                            var video_url = res1.data.domain + "/" + res2.key;
                                            $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_media_url").val(video_url);
                                        },
                                        error: function(e) {
                                            layer.closeAll();
                                            showErrorMsg(e.responseText);
                                            return false;
                                        }
                                    });
                                } else {
                                    layer.closeAll();
                                    showErrorMsg(res1.msg);
                                }
                            },
                            error: function(e) {
                                layer.closeAll();
                                showErrorMsg(e.responseText);
                            }
                        });
                    }

                    //OSS
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media(e) {
                        // 获取文件路径名
                        var file = $(e)[0].files[0];

                        // 验证上传格式
                        var fileName = file.name;
                        var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                        var ext = judgeExtMedia(fileExt);
                        if (ext == -1) {
                            showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                            return false;
                        }

                        // 验证上传大小
                        size = parseInt("<?php echo $vo['filesize']; ?>");
                        if (file.size > size) {
                            showErrorMsg('文件大小超过限制,可在附件设置中修改');
                            return false;
                        }

                        // 执行上传
                        layer_loading('上传阿里云OSS');
                        $.ajax({
                            type: 'POST',
                            url: '/index.php?m=plugins&c=AliyunOss&a=oss_upload',
                            data: {_ajax: 1},
                            dataType: "JSON",
                            success: function(res1){
                                if (1 == res1.code){
                                    fileName = res1.data.filePath + fileExt;
                                    //组装发送数据
                                    var request = new FormData();
                                    request.append("OSSAccessKeyId",res1.data.accessid);
                                    request.append("policy",res1.data.policy);
                                    request.append("Signature",res1.data.signature);
                                    request.append("key",fileName);
                                    request.append("success_action_status",201);
                                    request.append('file', file);

                                    $.ajax({
                                        url : res1.data.host,
                                        data : request,
                                        processData: false,
                                        cache: false,
                                        contentType: false,
                                        dataType: 'xml',
                                        type : 'post',
                                        xhr: function () {
                                            myXhr = $.ajaxSettings.xhr();
                                            if (myXhr.upload) {
                                                myXhr.upload.addEventListener('progress', function(e){
                                                    var curr = e.loaded;
                                                    var total = e.total;
                                                    var process = parseInt(curr / total * 100);
                                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media").text('上传中...'+process+"%");
                                                });
                                            }
                                            return myXhr;
                                        },
                                        success : function(data) {
                                            layer.closeAll();
                                            var res = $(data).find('PostResponse');
                                            if (res) {
                                                var key = res.find('Key').text();
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media").text('上传成功');
                                                setTimeout(function() {
                                                    $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media').text('oss上传');
                                                }, 2000);
                                                var video_url = res1.data.domain + "/" + key;
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_media_url").val(video_url);
                                            } else {
                                                $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media").text('上传失败');
                                                setTimeout(function() {
                                                    $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_oss_upload_media').text('oss上传');
                                                }, 2000);
                                            }
                                        },
                                        error : function(e) {
                                            layer.closeAll();
                                            console.log(e.responseText);
                                        }
                                    });
                                } else {
                                    layer.closeAll();
                                    showErrorMsg(res1.msg);
                                }
                            },
                            error: function(e) {
                                layer.closeAll();
                                showErrorMsg(e.responseText);
                            }
                        });
                    }

                    //COS
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media(e) {
                        // 获取文件路径名
                        var file = $(e)[0].files[0];

                        // 验证上传格式
                        var fileName = file.name;
                        var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                        var ext = judgeExtMedia(fileExt);
                        if (ext == -1) {
                            showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式，可在附件设置中修改');
                            return false;
                        }

                        // 验证上传大小
                        size = parseInt("<?php echo $vo['filesize']; ?>");
                        if (file.size > size) {
                            showErrorMsg('文件大小超过限制，可在附件设置中修改');
                            return false;
                        }

                        // 上传参数
                        var formData = new FormData();
                        formData.append('file', file);
                        formData.append('file_ext', fileExt);

                        // 执行上传
                        $.ajax({
                            type: 'post',
                            url: '/index.php?m=plugins&c=Cos&a=cos_upload&_ajax=1',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            xhr: function () {
                                myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                    myXhr.upload.addEventListener('progress', function(e){
                                        var curr = e.loaded;
                                        var total = e.total;
                                        process = parseInt(curr / total * 100);
                                        if (100 == process) {
                                            process = 99;
                                            layer_loading('上传腾讯云');
                                        }
                                        $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media").text('上传中...'+process+"%");
                                    });
                                }
                                return myXhr;
                            },
                            success: function(res) {
                                layer.closeAll();
                                if (1 == res.code) {
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media").text('上传成功');
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_media_url").val(res.data.url);
                                } else {
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media").text('上传失败');
                                }
                                setTimeout(function() {
                                    $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_cos_upload_media').text('cos上传');
                                }, 2000);
                            },
                            error: function(e) {
                                layer.closeAll();
                                showErrorMsg(e.responseText);
                            }
                        });
                    }

                    // 本地上传
                    function <?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_upload_media(e){
                        // 获取文件路径名
                        var file = $(e)[0].files[0];

                        // 验证上传格式
                        var fileName = file.name;
                        var fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
                        var ext = judgeExtMedia(fileExt);
                        if (ext == -1) {
                            showErrorMsg('仅支持<?php echo $vo['ext']; ?>格式,可在附件设置中修改');
                            return false;
                        }

                        // 验证上传大小
                        size = parseInt("<?php echo $vo['filesize']; ?>");
                        if (file.size > size) {
                            showErrorMsg('文件大小超过限制,可在附件设置中修改');
                            return false;
                        }

                        // 定义上传数据
                        var formData = new FormData();
                        formData.append('file', file);

                        // 执行上传
                        layer_loading('上传本地');
                        $.ajax({
                            type: 'post',
                            url : "<?php echo url('Ueditor/upVideo', ['savepath'=>'media']); ?>",
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            xhr: function () {
                                myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                    myXhr.upload.addEventListener('progress', function(e){
                                        var curr = e.loaded;
                                        var total = e.total;
                                        process = parseInt(curr / total * 100);
                                        $("#upload_video_litpic_local").html('上传中...'+process+"%");
                                    });
                                }
                                return myXhr;
                            },
                            success: function (res) {
                                layer.closeAll();
                                if ("SUCCESS" == res.state) {
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_upload_media").html('上传成功');
                                    setTimeout(function() {
                                        $('#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_local_upload_media').html('本地上传');
                                    }, 2000);
                                    $("#<?php echo $vo['fieldArr']; ?>_<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>_media_url").val(res.url);
                                } else {
                                    showErrorMsg(res.msg);
                                }
                            }
                        });
                    }
                </script>
            <?php break; ?>
            <!-- 多媒体类型 end -->
        <?php endswitch; endif; endforeach; endif; else: echo "" ;endif; ?>

<script>
    var notic_tips_230112 = 0;
    $(function(){
        auto_notic_tips();
        /**
        * 自动小提示
        */
        function auto_notic_tips()
        {
            var html = '<a class="ui_tips" href="javascript:void(0);" onmouseover="layer_tips = layer.tips($(this).parent().find(\'p.notic\').html(), this, {time:100000});" onmouseout="layer.close(layer_tips);">提示</a>';
            $.each($('dd.opt > p.notic'), function(index, item){
                var a_length = $(item).prev("a.ui_tips").length;
                if ($(item).html() != '' && 0 == a_length) {
                    $(item).before(html);
                    notic_tips_230112 = 1;
                }
            });
        }

        // 第一个自定义字段显示感汉号提示
        if (0 == notic_tips_230112) {
            var ganhaohtml = '<a class="ui_tips" href="javascript:void(0);" onmouseover="layer_tips = layer.tips($(this).parent().find(\'p.notic-ganhan-ico\').html(), this, {time:100000});" onmouseout="layer.close(layer_tips);"></a><p class="notic-ganhan-ico none">属于自定义字段。在“功能地图>频道模型>字段管理”里管理</p>';
            $($('#FieldAddonextitem').find('dl > dd').find('p.notic').get(0)).parent().append(ganhaohtml);
        }
    });
</script>