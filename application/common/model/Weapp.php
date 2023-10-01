<?php
/***/

namespace app\common\model;

use think\Db;
use think\Model;

/**
 * 插件模型
 */
class Weapp extends Model
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }

    /**
     * 获取插件列表所有信息，方便系统其它地方使用
     */
    public function getWeappList($code = '')
    {
        $result = cache('common_weapp_getWeappList');
        if (empty($result)) {
            $result = Db::name('weapp')->getAllWithIndex('code');
            foreach ($result as $key => &$value) {
                try {
                    if (!empty($value['data']) && $value['data']!="[]") {
                        if (preg_match('/^{.*}$/', $value['data'])) { // json格式
                            $value['data'] = json_decode($value['data'], true);
                        } else {
                            $value['data'] = unserialize($value['data']);
                        }
                    }
                    if (!empty($value['config'])) {
                        $value['config'] = json_decode($value['config'], true);
                    }
                } catch (\Exception $e) {}
            }
            cache('common_weapp_getWeappList', $result, null, 'weapp');
        }

        if (!empty($code)) {
            $result = !empty($result[$code]) ? $result[$code] : [];
        }

        return $result;
    }
}