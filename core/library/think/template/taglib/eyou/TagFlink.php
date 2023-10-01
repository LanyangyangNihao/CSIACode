<?php
/***/

namespace think\template\taglib\eyou;

use think\Db;

/**
 * 友情链接
 */
class TagFlink extends Base
{
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 获取友情链接
     * @author wengxianhu by 2018-4-20
     */
    public function getFlink($type = 'text', $limit = '', $groupid = 1)
    {
        if ($type == 'text' || $type == 'textall') {
            $typeid = 1;
        } elseif ($type == 'image') {
            $typeid = 2;
        }

        $condition = array();
        if (!empty($typeid)) {
            $condition['a.typeid'] = array('eq', $typeid);
        }
        if (!empty($groupid) && $groupid != 'all') {

            /*多语言*/
            $groupid = model('LanguageAttr')->getBindValue($groupid, 'links_group');
            /*--end*/

            $condition['a.groupid'] = array('eq', $groupid);
        }
        // 多城市站点
        if (self::$city_switch_on) {
            if (!empty(self::$site_info)) {
                $site_flink_showall = tpCache('site.site_flink_showall');
                if (self::$site_info['level'] == 1) { // 省份
                    $province_where = [self::$siteid];
                    if (empty($site_flink_showall)) { // 分站是否显示全国
                        $province_where[] = 0;
                    }
                    $condition[] = Db::raw(" (a.province_id IN (".implode(',', $province_where).") AND a.city_id = 0) ");
                } else if (self::$site_info['level'] == 2) { // 城市
                    $province_where = '';
                    if (empty($site_flink_showall)) { // 分站是否显示全国
                        $province_where = ' OR a.province_id = 0 ';
                    }
                    $condition[] = Db::raw(" ((a.city_id = ".self::$siteid." AND a.area_id = 0) {$province_where} ) ");
                } else { // 区域
                    $province_where = '';
                    if (empty($site_flink_showall)) { // 分站是否显示全国
                        $province_where = ' OR a.province_id = 0 ';
                    }
                    $condition[] = Db::raw(" (a.area_id = ".self::$siteid." {$province_where} ) ");
                }
            } else {   //以下为主站内容展示
                //主页不显示分站友情链接
                $condition[] = Db::raw("a.province_id = 0");
            }
        }
        $condition['a.lang'] = self::$home_lang;
        $condition['a.status'] = 1;
        $result = M("links")->alias('a')->where($condition)
            ->order('a.sort_order asc')
            ->limit($limit)
            ->cache(true,EYOUCMS_CACHE_TIME,"links")
            ->select();
        foreach ($result as $key => $val) {
            $val['logo'] = get_default_pic($val['logo']);
            $val['target'] = ($val['target'] == 1) ? ' target="_blank" ' : ' target="_self" ';
            $val['nofollow'] = ($val['nofollow'] == 1) ? ' rel="nofollow" ' : '';
            $result[$key] = $val;
        }

        return $result;
    }
}